<?php

namespace App\Http\Controllers;

use App\Components\User\Models\User;
use App\Http\Resources\UserResource;
use App\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Report;
use App\ReportType;
use App\StageProject;
use Auth;
use Exception;
use Illuminate\Http\File;
class ReportController extends Controller
{
    //

    public function index()
    { 
        $rowsPerPage = (request()->get('rowsPerPage') > 0) ? request()->get('rowsPerPage') : 0;
        $sort_by = request()->get('sort_by');
        $descending = request()->get('descending');
        $project_id = request()->get('project_id');
        if ($descending == 'false') {
            $orderby = 'asc';
        } elseif ($descending == 'true') {
            $orderby = 'desc';
        } elseif ($descending == '') {
            $orderby = 'desc';
            $sort_by = 'id';
        }
        $user = Auth::user();
       // $ids=Auth::user()->childrenIds(Auth::id());
        $reports =  Report::with('project','reportCreator','project.members','type','project.owners','office','office.roles','office.parent')
        ->orderBy($sort_by, $orderby);
           
           if($user->hasRole('Engineering Office Manager')){
            $childrens=$user->childrenIds($user->id);
            array_push($childrens,$user->id);
            $reports = $reports->where('office_id', $user->id)
                       ->orWhereIn('created_by',$childrens);
        }
        else if($user->hasRole('Engineer') || $user->hasRole('Estate Owner')){
            $reports = $reports->where('office_id', $user->parent_id)
            ->orWhere('created_by', $user->id);
        }
        $project_note = $reports->latest()
        ->simplePaginate($rowsPerPage);
        return $this->respond($project_note);
    }

   public function stages(){
    $stages = StageProject::orderby('order')->get();
    return $this->respond($stages); 
   }

    public function store(Request $request)
    {
        if(Auth::user()->user_type_log=='ENGINEERING_OFFICE_MANAGER' || Auth::user()->user_type_log=='SITE_MANAGENMENT')
       { try {
            DB::beginTransaction();
            $project_id = $request->input('project_id');
            if(Auth::user()->user_type_log=='ENGINEERING_OFFICE_MANAGER') {
                if(Auth::user()->parent_id==null)
               $office_id = Auth::id();
               else
               $office_id = Auth::user()->parent_id;
            }
            else
            $office_id = $request->input('office_id');
            $report_type = $request->input('type');
         //  dd($request->all());
            $report = Report::create([
                        'project_id' => $project_id,
                        'type_id'=>$report_type,
                        'created_by'=>Auth::id(),
                        'office_id'=> $office_id,
                        'report_status' => $request->report_status,
                        'visit_request_id' => $request->visit_request_id,
                        'stage_id' => $request->stage_id
                    ]);
               $report->addMedia($request->pdfFile)->usingFileName('report'.time().'.pdf')->toMediaCollection('report');
       //  dd($request->medias);
               if (!empty($request->medias)) {
             //  $this->addMedias(explode(',',$request->medias), $report, 'report_attachment');
                foreach (explode(',',$request->medias) as $key => $file_name) {
                    $report->addMedia('uploads/'.config('constants.temp_upload_folder').'/'.$file_name)
                        ->toMediaCollection('report_attachment');
                }
         }
            DB::commit();
            $output = $this->respondSuccess(__('messages.printed_saved_successfully'));
            
        } catch (Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }
        return $output;
        }
    }



    public function show($id)
    {
        try {
            $report = Report::with('project','reportCreator','media','project.members','type','office','office.roles','office.parent')->find($id);
                        
            $output = $this->respond($report);
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }




    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $data = $request->only('name', 'description');

            $project_id = $request->get('project_id');
            $report = Report::findOrFail($id);
                               

            $report->name = $data['name'];
            $report->description = $data['description'];
            $report->save();

            // //Add medias for project
            // if (!empty($request->medias)) {
            //     $this->addMedias($request->medias, $project_note, 'project_note');
            // }
            DB::commit();

            $output = $this->respondSuccess();
        } catch (Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }


       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $project_id = request()->get('project_id');
            $note = Report::findOrFail($id);
                      
            $note->delete();

            $output = $this->respondSuccess();
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }

    public function getOffices(Request $request){
        $offices= User::where('user_type_log','ENGINEERING_OFFICE_MANAGER')
        ->WhereHas('projects', function ($q) use ($request) {
                 $q->Where('projects.id', $request->project_id);
             })
        ->orWhereHas('projectCreator', function ($q) use ($request) {
                $q->Where('projects.id', $request->project_id);
            })
       ->get();
        $data = ['offices' => $offices];

        return $data;
    }
    public function getReportTypes(Request $request)
    {
        $types = collect(ReportType::all());
        $types = $types->map(function ($item) {
            if(app()->getLocale() == 'ar')
             $item->type_name = $item->type_name_ar;
            else
             $item->type_name = $item->type_name_en;
             return $item;
        });
        $projects = Project::with('owners', 'members','creator','report','report.reportCreator','report.type');
        $user=Auth::user();
        $userId = '';
        if($user->hasRole('Engineering Office Manager'))
        $userId = $user->id;
        else if($user->hasRole('Engineer'))
        $userId = $user->parent_id;
           $childrens=$user->childrenIds($userId);
           array_push($childrens,$userId);
           if($user->user_type_log=='ENGINEERING_OFFICE_MANAGER') {
            $projects = $projects->whereHas('members', function ($q) use ($childrens) {
                $q->WhereIn('user_id', $childrens);
            })->orWhere('owners', function ($q) use ($userId) {
                $q->Where('owner_id', $userId);
            });
        }
       else
        $projects = $projects->get();
        $offices= UserResource::collection(User::where('user_type_log','ENGINEERING_OFFICE_MANAGER')->get());
        $report_id=Report::latest()->first()?Report::latest()->first()->id+1:1;
        $data = ['offices' => $offices, 'types' => $types, 'projects' => $projects,'report_id'=>$report_id ];

        return $data;

    }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
               
       /* if (!$request->user()->can('specialty.view')) {
            return $this->respondWithError(__('messages.unauthorized_action'));

           // abort(403, 'Unauthorized action.');
        }*/
      


        $rowsPerPage = ($request->get('rowsPerPage') > 0) ? $request->get('rowsPerPage') : 0;
        $sort_by = $request->get('sort_by');
        $descending = $request->get('descending');

        if ($descending == 'false') {
            $orderby = 'asc';
        } elseif ($descending == 'true') {
            $orderby = 'desc';
        } elseif ($descending == '') {
            $orderby = 'desc';
            $sort_by = 'id';
        }

        // $roles = Role::where('type', 'employee')
        //             ->select('name', 'created_at', 'id');
   
            $specialties =Specialty::with('specialtyCreator')->where('id','>',0);
         


        

        if (!empty($request->get('name'))) {
            $term = $request->get('name');
            $specialties->where('name', 'like', "%$term%");
        }
       

        $specialties = $specialties->orderBy($sort_by, $orderby)
                    ->paginate($rowsPerPage);

  
        return $this->respondSuccess($specialties);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         
        try {
            DB::beginTransaction();
            $specialty_name = $request->input('name');
            $specialty = Specialty::create([
                            'name' => $specialty_name,
                            'en_name' =>$request->input('en_name'),
                            'ar_name' => $request->input('ar_name'),
                            'role_id'=> $request->input('role_id'),
                            'created_at'=>Carbon::now(),
                            'created_by'=>Auth::id()
                            //'type' => 'employee',hasRole
                        ]);
             DB::commit();
              //  Auth::user()->assignRole($role_name);
                $output = $this->respondSuccess(__('messages.saved_successfully'));
           
        } catch (Exception $e) {
            DB::rollBack();
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
                  DB::beginTransaction();
                 $specialty_name = $request->input('name');
                $specialty = Specialty::find($id);
                $specialty->name = $specialty_name;

                $specialty->en_name =$request->input('en_name');
                $specialty->ar_name = $request->input('ar_name');
                $specialty->role_id= $request->input('role_id');
           
                $specialty->save();
           
                DB::commit();
          
                $output = $this->respondSuccess(__('messages.updated_successfully'));
        
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
        //
        try {
            // $role = Role::where('type', 'employee')
            //             ->find($id);
            $specialty = Specialty::find($id);

            $specialty->delete();

            $output = $this->respondSuccess(__('messages.deleted_successfully'));
        } catch (Exception $e) {
            $output = $this->respondWentWrong($e);
        }
        return $output;
    }



    public function getspecialties(){

        $types=Specialty::select('id as key', 'name as value')
        ->get()
        ->toArray();
            return $types;
    }
    public function getspecialtiesByRole($role_id){

        $types=Specialty::where('role_id',$role_id)->select('id as key', 'name as value')
        ->get()
        ->toArray();
            return $types;
    }
}

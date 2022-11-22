<?php

namespace App\Http\Controllers;

use App\ReportType;
use Illuminate\Http\Request;

class ReportTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $types= ReportType::all();
        return $this->respond($types); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $type= new ReportType();
        $type->type_name_ar=$request->type_name_ar;
        $type->type_name_en=$request->type_name_en;
        $type->type_list_ar=$request->type_list_ar;
        $type->type_list_en=$request->type_list_en;
        $type->form= $request->form_name;
        $type->save();
        return $this->respondSuccess(__('messages.saved_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type= ReportType::find($id);
        return $this->respond($type); 
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
        $type=ReportType::find($id);
        $type->type_name_ar=$request->type_name_ar;
        $type->type_name_en=$request->type_name_en;
        $type->type_list_ar=$request->type_list_ar;
        $type->type_list_en=$request->type_list_en;
        $type->form= $request->form_name;
        $type->save();
        return $this->respondSuccess(__('messages.saved_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type=ReportType::find($id);
        $type->delete();
        return $this->respondSuccess(__('messages.saved_successfully'));
    }
}

<?php

namespace App\Http\Controllers;

use App;
use App\Http\Util\CommonUtil;
use App\ServiceType;
use Config;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    public function index()
    {
       
        $types= ServiceType::all();
        $types=$types->map(function($name, $key) {
             $name['name'] = Config::get('languages')[App::getLocale()]['display'] === 'Arabic' ? $name->name_ar : $name->name_en;
       return $name;
            });
        
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
        $service= new ServiceType();
        $service->name_ar=$request->name_ar;
        $service->name_en=$request->name_en;
        $service->save();
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
        $type= ServiceType::find($id);
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
        $service=ServiceType::find($id);
        $service->name_ar=$request->name_ar;
        $service->name_en=$request->name_en;
        $service->save();
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
        $type=ServiceType::find($id);
        $type->delete();
        return $this->respondSuccess(__('messages.saved_successfully'));
    }

}

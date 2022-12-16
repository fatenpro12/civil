<?php

namespace App\Http\Resources;

use App\Project;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'status' => $this->status,
            'favorite' =>$this->favorite,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'authorization_request_number'=>$this->authorization_request_number,
            'license_number'=>$this->license_number,
            'plot_number'=>$this->plot_number,
            'cadastral_decision_number'=>$this->cadastral_decision_number,
            'unit_number'=>$this->unit_number,
            'build_rate'=>$this->build_rate,
            'role_number'=>$this->role_number,
            'location'=>$this->location,
            'media'=>$this->getMedia('project_documents')->toArray(),
            'total_rate'=>$this->total_rate,
            'description'=>$this->description,
            'agency' => new OwnerResource($this->agency),
            'buiding_type' => $this->getFilterData(Project::getBuildingTypes(),$this->buiding_type),
            'project_type'=>$this->getFilterData(Project::getProjectTypes(),$this->project_type),
            'using'=> $this->getFilterData(Project::getBuildingUsing(),$this->using),
            'owners' => OwnerResource::collection($this->owners),
            'members' =>OwnerResource::collection($this->members),
            
        ];
    }
    public function getFilterData($array ,$data){
        $res = array_filter ($array, function($x) use ($data) {
            return $x['key'] == $data;
         });
         $item=array_pop($res); 
         return $item;
        // if($item!==null) return $item['value'];
    }
}


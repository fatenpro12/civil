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
            'media'=>$this->media,
            'agency' => new OwnerResource($this->agency),
            'buildingTypes' => array_filter(Project::getBuildingTypes(), function($x) {
               return $x['key'] == $this->buiding_type;
            }),
            'projectTypes'=>array_filter(Project::getProjectTypes(), function($x) {
                return $x['key'] == $this->project_type;
             }),
            'buildUsing'=> array_filter(Project::getBuildingUsing(), function($x) {
                return $x['key'] == $this->using;
             }),
            'owners' => OwnerResource::collection($this->owners),
            'members' =>OwnerResource::collection($this->members)
        ];
    }
}

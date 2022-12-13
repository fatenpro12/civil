<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignRequestResource extends JsonResource
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
            'id'=>$this->id,
            'customer'=>$this->customer->name,
            'customer_id' => $this->customer->id,
            'project'=>['projectId'=> $this->project->id,'projectName'=>$this->project->name],
            'offices'=> OwnerResource::collection($this->offices),
            'note'=>$this->note,
            'created_at'=>$this->created_at,
            'description'=>$this->description,
            'status'=>$this->status,
            'is_agreed'=>$this->is_agreed,
            'sent'=>$this->sent,
            'creator'=>$this->creator->name,
            'enginners' =>$this->enginners,
            'request_type' =>$this->request_type,
            'stages' =>$this->stages,
            'design_enginners' =>$this->designEnginners,
            'service_type' =>$this->service_type,
        ];
    }
}

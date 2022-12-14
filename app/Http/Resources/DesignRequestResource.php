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
            'status'=>$this->status,
            'is_agreed'=>$this->is_agreed,
            'sent'=>$this->sent,
            'creator'=>$this->creator->name,
            'enginners' =>$this->enginners,
            'request_type' =>$this->request_type,
            'stages' =>$this->stages,
            'media' =>$this->getMediaType(),
            'design_enginners' =>$this->designEnginners,
            'service_type' =>$this->service_type,
        ];
    }
    public function getMediaType(){
         if($this->request_type=='contractor_request')
         return $this->getMedia('pdfPriceContractor')->toArray();
         else if($this->request_type=='design_request')
         return $this->getMedia('pdfPrice')->toArray();
         else if($this->request_type=='support_service_request')
         return $this->getMedia('pdfPriceSupportService')->toArray();
    }
}

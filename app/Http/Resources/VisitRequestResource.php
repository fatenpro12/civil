<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VisitRequestResource extends JsonResource
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
            'projectId'=>$this->project->id,
            'projectName'=>$this->project->name,
            'offices'=> OwnerResource::collection($this->offices),
            'note'=>$this->note,
            'created_at'=>$this->created_at,
            'status'=>$this->status,
            'sent'=>$this->sent,
            'dead_line_date'=>$this->dead_line_date,
            'specialties'=>$this->specialties,
            'report'=> $this->report?->id,
            'request_enginners'=>$this->requestEnginners
        ];
    }
}

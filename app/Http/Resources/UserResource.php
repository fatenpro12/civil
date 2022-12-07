<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'signature' => $this->getFirstMedia('signature')?$this->getFirstMedia('signature')->original_url:'',
            'logo' => $this->getFirstMedia('logo')?$this->getFirstMedia('logo')->original_url:'',
            'title'=>$this->title,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'birth_date' => $this->birth_date,
            'alternate_num' => $this->alternate_num,
            'current_address' => $this->current_address,
            'active' => $this->active,
            'gender' =>$this->gender,
            'bank_name' => $this->bank_name,
            'account_no' => $this->account_no,
            'tax_payer_id' => $this->tax_payer_id,
            'note' =>$this->note,
            'role' =>$this->getRoleNames(),
            'last_login' =>$this->last_login,
            'specialty' =>$this->specialty?->name,
            'parent_id' =>$this->parent_id,
            'parent_logo' => $this->parent&&$this->parent->getFirstMedia('logo')?$this->parent->getFirstMedia('logo')->original_url:'',
            'personal_image' => $this->parent&&$this->parent->getFirstMedia('personal_image')?$this->parent->getFirstMedia('personal_image')->original_url:'',
            'parent_title'=>$this->parent?$this->parent->title:'',
            'user_type_log' => $this->user_type_log,
            'id_card_number' => $this->id_card_number
        ];
    }
}

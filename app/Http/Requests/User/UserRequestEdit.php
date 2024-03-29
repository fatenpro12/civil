<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequestEdit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('user');
       // dd($this->name,$id);
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'id_card_number' => 'required|unique:users,id_card_number,'.$id,
            'location_data'=>'required',
        ];
    }
    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(
            response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));
          
    }
    public function messages()
    {
        return [
            'required'  => 'The :attribute field is required.',
            'unique'    =>':attribute is already used',
            'email'    => ':attribute  not email'

        ];

    }
}

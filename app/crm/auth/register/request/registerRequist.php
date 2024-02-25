<?php
namespace App\crm\auth\register\request;
use App\crm\Base\Requist\apiRequest ;

class registerRequist extends apiRequest{
    public function authorize(): bool
    {
        return true;
    }
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required'

        ];
    }
}

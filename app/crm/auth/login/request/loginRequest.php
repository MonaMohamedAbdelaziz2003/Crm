<?php
namespace App\crm\auth\login\request;
use App\crm\Base\Requist\apiRequest ;

class loginRequest extends apiRequest{
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
            'email'    => 'required',
            'password' => 'required'
        ];
    }
}

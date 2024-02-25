<?php
namespace App\crm\customer\request;

use App\crm\Base\Requist\apiRequest;
// use  App\Http\Requests\apiRequest;

class createCustomerRequest extends apiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'name'=>'required|min:3'
        ];
    }
}

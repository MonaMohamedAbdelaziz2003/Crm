<?php

namespace App\crm\project\request;

use App\crm\Base\Requist\apiRequest ;

class createProjectRequest extends apiRequest
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
    public function rules(): array
    {
        return [
           'project_name'=>'required|min:3',
           'status'=>'required|numeric',
           'project_cost'=>'required|numeric'

        ];
    }
}

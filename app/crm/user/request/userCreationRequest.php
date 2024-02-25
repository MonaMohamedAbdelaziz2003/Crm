<?php
namespace App\crm\user\request;
use App\crm\Base\Requist\apiRequest;
class userCreationRequest extends apiRequest{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
           'name'=>'required|min:3',
           'email'=>'required|unique:users,email',
           'password'=>'required|min:3',
        ];
    }
}

<?php

namespace App\crm\Base\Requist;
// namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
abstract class apiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    abstract public function authorize();


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    abstract public function rules();


    protected function failedValidation(Validator $validator)
    {
       $errors=(new ValidationException($validator))->errors();
       if (!empty($errors)){
        $transformedError=[];
        foreach($errors as $faild=>$message){
            $transformedError[]=[
                $faild=>$message[0]
            ];
        }
        throw new HttpResponseException(
            response()->json(
                [
                    "status"=>"errors",
                    "errors"=>$transformedError
                ],
                status:JsonResponse::HTTP_BAD_REQUEST
            )

        );

       }
    }

}

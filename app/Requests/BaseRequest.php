<?php
namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\Libs\AppConstants;

class BaseRequest extends FormRequest
{
    protected $req_rules = [];

    protected $req_messages = [];

    protected $req_attributes = [];

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->error($validator->errors()->toArray(), 400));
    }
}

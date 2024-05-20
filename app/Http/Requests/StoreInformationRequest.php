<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreInformationRequest extends FormRequest
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
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'address' => 'required|string',
            'phone' => 'required|string',
        ];

    }
    public function messages(): array

{

    return [
        'address.string' => 'phone là kiểu chuỗi',
        'address.required' => 'Vui lòng nhâp address',
        'phone.string' => 'phone là kiểu chuỗi',
        'phone.required' => 'Vui lòng nhâp phone',
        'name.required' => 'Vui lòng nhâp name',
        'name.string' => ' name là kiểu chuỗi',
        'image.mimes' => 'Hình ảnh phải có đuôi là jpg,png, jpeg',
        'image.required' => 'chon Hình ảnh',


    ];

    }
    protected function failedValidation(Validator $validator)
    {

        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'error' => $errors,
                'status_code' => 402,
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

}
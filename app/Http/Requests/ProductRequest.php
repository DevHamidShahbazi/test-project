<?php

namespace App\Http\Requests;

use App\DTO\ProductModelDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
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
        $routeName = $this->route()->getName();

        if(Str::contains($routeName,['store']))
            return [
                "name" => ['required','string'],
                "description" => ['nullable','string'],
                "price" => ['required','string'],
                'image'=> ['required','max:50000'],
            ];

        if(Str::contains($routeName,['update']))
            return [
                "name" => ['required','string'],
                "description" => ['nullable','string'],
                "price" => ['required','string'],
                'image'=> ['max:50000'],
            ];

        return [];
    }

    public function toDTO() :ProductModelDTO
    {
        return  ProductModelDTO::fromRequest($this);
    }
}

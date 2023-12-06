<?php

namespace App\Http\Requests;

use App\DTO\OrderModelDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
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
                "count" => ['required','integer'],
                "product_id" => ['required','integer','exists:App\Models\Product,id'],
                "user_id" => ['integer','exists:App\Models\User,id'],
            ];

        return [];
    }

    public function toDTO() :OrderModelDTO
    {
        return  OrderModelDTO::fromRequest($this);
    }
}

<?php

namespace App\DTO;

use App\DTO\Contracts\BaseDTO;
use App\Http\Requests\ProductRequest;

class ProductModelDTO extends BaseDTO
{
    public function __construct(
        public string $name,
        public string $price,
        public ?string $description,
    ){}

    public static function fromRequest(ProductRequest $request) : static
    {
        return new static(
            name : $request->name,
            price : $request->price,
            description : $request?->description,
        );
    }
}

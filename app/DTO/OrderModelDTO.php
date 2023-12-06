<?php

namespace App\DTO;

use App\DTO\Contracts\BaseDTO;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;

class OrderModelDTO extends BaseDTO
{
    public function __construct(
        public string|int $count,
        public string|int $product_id,
        public string|int $user_id,
    ){}

    public static function fromRequest(OrderRequest $request) : static
    {
        return new static(
            count : $request->count,
            product_id : $request->product_id,
            user_id : auth()?->user()?->id,
        );
    }
}

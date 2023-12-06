<?php

namespace App\Repositories;


use App\Models\Order;
use App\Repositories\Contracts\BaseRepository;

class OrderRepository extends BaseRepository
{
    public function __construct(Order $model) {
        $this->model = $model;
    }
}

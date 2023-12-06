<?php

namespace App\DTO\Contracts;

class BaseDTO implements DTOInterface
{
    public function toArray():array
    {
        return call_user_func('get_object_vars', $this);
    }
}

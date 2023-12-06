<?php

namespace App\Repositories;

use App\DTO\Contracts\DTOInterface;
use App\Models\Product;
use App\Repositories\Contracts\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model) {
        $this->model = $model;
    }

    public function store(DTOInterface $dto): Model
    {
        $image = $this->storeMedia($this->model,'image','/Upload/product/');
        return Product::create(collect($dto)->merge(['image'=>$image])->toArray());
    }

    public function update(Model $targetModel, DTOInterface $dto): bool
    {
        if (request()->hasFile('image')){
            $image = $this->storeMedia($this->model,'image','/Upload/product/',true);
            return $targetModel->update(collect($dto)->merge(['image'=>$image])->toArray());
        }else{
            return $targetModel->update($dto->toArray());
        }
    }

}

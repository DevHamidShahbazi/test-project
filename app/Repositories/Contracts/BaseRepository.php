<?php

namespace App\Repositories\Contracts;

use App\DTO\Contracts\DTOInterface;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BaseRepository
{

    const PER_PAGE = 20;

    /**
     * Models instance.
     *
     * @var Builder|Model
     */
    protected Model | Builder $model;

    /**w
     * BaseRepository constructor.
     *
     * @throws Exception
     */

    public function __construct(Model | Builder $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function all() : Collection
    {
        return $this->model->all();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginated() : LengthAwarePaginator
    {
        return $this->model->latest()->paginate(self::PER_PAGE);
    }

    /**
     * @param DTOInterface $dto
     * @return Model
     */
    public function store(DTOInterface $dto): Model
    {
        return $this->model->create($dto->toArray());
    }

    /**
     * @param Model $targetModel
     * @param DTOInterface $dto
     * @return bool
     */
    public function update(Model $targetModel, DTOInterface $dto): bool
    {
        return $targetModel->update($dto->toArray());
    }

    /**
     * @param Model $model
     * @return Model
     */
    public function show(Model $model) : Model
    {
        return $model;
    }

    /**
     * @param int $modelID
     * @return Model|null
     *
     * @throws ModelNotFoundException
     */
    public function getByID(int $modelID): Model|null
    {
        return $this->model->findOrFail($modelID);
    }

    public function storeMedia(Model $model, string $requestName, string $routeName, bool $clearBeforeStore = false): string
    {
        if(request()->hasFile($requestName)) {
            $file = request($requestName);
            if ($clearBeforeStore && $model->$requestName != null){
                File::delete(public_path($model->$requestName));
            }
            $filename = Str::random(5).'-'.env('APP_NAME').'.'.$file->getClientOriginalExtension();
            $path = public_path($routeName);
            $file->move($path, $filename);
            return $routeName . $filename;
        }

    }
}

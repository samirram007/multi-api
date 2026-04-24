<?php

namespace App\Support\Repositories;

use Illuminate\Database\Eloquent\Model;

use App\Support\Contracts\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function query()
    {
        return $this->model->newQuery();
    }

    public function all(array $with = [])
    {
        return $this->query()->with($with)->get();
    }

    public function find(int $id, array $with = [])
    {
        return $this->query()->with($with)->findOrFail($id);
    }

    public function where(array $conditions, array $with = [])
    {
        $query = $this->query()->with($with);

        foreach ($conditions as $field => $value) {
            $query->where($field, $value);
        }

        return $query->get();
    }

    public function paginate(int $perPage = 15, array $with = [])
    {
        return $this->query()->with($with)->paginate($perPage);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = $this->find($id);
        return $model->delete();
    }


}

<?php 

namespace App\Commude\Repositories;

use App\Commude\Traits\DBtransactionHandler;
use Illuminate\Database\Eloquent\Model;

class EloquentRepository {
    use DBtransactionHandler;

    public function __construct(public Model $model) {}

    public function find(array $attr, string $relation)
    {
        $query = $this->model->query();

        if(array_key_exists('name', $attr)) {
            $query->where('name', 'LIKE', '%'.$attr['name'].'%');
        }
        
        return $query->with($relation)->orderBy('id', 'DESC')->paginate(array_key_exists('paginate', $attr) ? $attr['paginate'] : 10);
    }

    public function findById(string $id, string $relation)
    {
        return $this->model::findOrFail($id);
    }

    public function create(array $data)
    {
        return self::execute($this->model::create($data));
    }

    public function update(string $id, array $data)
    {
        return self::execute($this->model::findOrFail($id)->update($data));
    }

    public function delete(string $id)
    {
        return self::execute($this->model::findOrFail($id)->delete());
    }
}
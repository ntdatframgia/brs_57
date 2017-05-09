<?php
namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function all($column = ['*']);

    public function find($id, $conlum = ['*']);

    public function paginate($limit = null, $conlumn = ['*']);

    public function create(array $input);

    public function update(array $input, $id);

    public function where($conditions, $operator = null, $value = null);

    public function eagerLoadTrashed();

    public function delete($id);

    public function lists($column, $key = null);

}

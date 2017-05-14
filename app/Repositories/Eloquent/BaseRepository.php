<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;
    private $where;
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new Exception(tran('messages.not_instance'), ['model' => $this->model()]);
        }
        return $this->model = $model;
    }

    public function all($comlumn = ['*'])
    {
        return $this->model->all();
    }

    public function lists($column, $key = null)
    {
        return $this->model->pluck($column, $key);
    }

    public function paginate($limit = null, $column = ['*'])
    {
        $limit = is_null($limit) ? config('custom.limit') : $limit;
        return $this->model->paginate($limit, $column);
    }

    public function find($id, $column = ['*'])
    {
        return $this->model->findOrFail($id, $column);
    }

    public function eagerloadTrashed()
    {
        if (!is_null($this->withTrashed)) {
            $this->model->withTrashed();
        } elseif (!is_null($this->onlyTrashed)) {
            $this->model->onlyTrashed();
        }
        return $this;
    }

    public function where($conditions, $operator = null, $value = null)
    {
        if (func_num_args() == 2) {
            list($value, $operator) = [$operator, '='];
        }
        $this->where[] = [$conditions, $operator, $value];
        return $this;
    }

    public function create(array $input)
    {
        return $this->model->create($input);
    }

    public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($input);
        $model->save();
        return $model;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }
}

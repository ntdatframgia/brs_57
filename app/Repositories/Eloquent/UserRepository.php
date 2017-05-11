<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    function model()
    {
        return \App\Models\User::class;
    }

    public function updateProfile(array $data, $id, $attribute = 'id', $withSoftDelete = false)
    {
        try {
            if ($withSoftDelete) {
                $this->newQuery()->eagerTrashed();
            }
            $user = $this->model->find($id);
            $user->fill($data);
            if (!$user->save()) {
                throw new Exception(trans('messages.update_error'));
            }
            return true;
        } catch (Exception $e) {
            return redirect()->action('UserController@edit', ['id' => $id])->withErrors(trans('messages.update_error'));
        }
    }
}


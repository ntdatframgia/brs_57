<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    function model()
    {
        return \App\Models\Category::class;
    }

    public function recursive($data, $parentId = 0, $indent = '', $options = [])
    {
        foreach ($data as $category) {
            if ($category->parent_id == $parentId) {
                $options[$category->id] = $indent . $category->name;
                $options = $this->recursive($data, $category->id, $indent . '---- ', $options);
            }
        }
        return $options;
    }
}

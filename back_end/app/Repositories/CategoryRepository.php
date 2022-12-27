<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
    public function getCategoriesByUserId($userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }

    public function updateCategoryById($categoryId, $data)
    {
        return $this->model->find($categoryId)->update($data);
    }

    public function deleteCategoryById($categoryId)
    {
        return $this->model->find($categoryId)->delete();
    }
}

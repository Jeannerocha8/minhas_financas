<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = app(CategoryRepository::class)->getCategoriesByUserId($user->id);

        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = [
            'user_id' => $user->id,
            'title' => $request->title,
            'icon' => $request->icon,
        ];

        try {
            if ($request->categoryId === 0){
                Category::create($data);
            } else {
                app(CategoryRepository::class)->updateCategoryById($request->categoryId, $data);
            }

            return response()->json('Cadastrado com Sucesso', 201);
        } catch (\Exception $error) {
            return response()->json($error, 400);
        }
    }

    public function delete($categoryId)
    {
        try {
            app(CategoryRepository::class)->deleteCategoryById($categoryId);
            return response()->json('Deletado com sucesso');
        } catch (\Exception $error) {
            return response()->json($error);
        }
    }
}

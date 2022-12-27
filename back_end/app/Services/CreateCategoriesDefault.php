<?php
namespace App\Services;
use App\Models\Category;

class CreateCategoriesDefault
{
    public function run($userId)
    {
        $categoriesDefault = [
            ["title" => "Casa", "icon" => "fa-house"],
            ["title" => "Educação", "icon" => "fa-book-open"],
            ["title" => "Lazer", "icon" => "fa-umbrella-beach"],
            ["title" => "Eletrônicos", "icon" => "fa-desktop"],
            ["title" => "Restaurante", "icon" => "fa-utensils"],
            ["title" => "Saúde", "icon" => "fa-heart"],
            ["title" => "Serviços", "icon" => "fa-clipboard"],
            ["title" => "Transporte", "icon" => "fa-car"],
            ["title" => "Vestuário", "icon" => "fa-shirt"],
            ["title" => "Viagem", "icon" => "fa-plane"],
        ];

        foreach ($categoriesDefault as $category) {
            Category::create([
                'user_id' => $userId,
                'title' => $category["title"],
                'icon' => $category["icon"],
            ]);
        }
    }
}

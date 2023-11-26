<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        return CategoryResource::collection($category);
    }

    public function store(StoreCategoryRequest $request) {
        $request->validated($request->all());
        $category = Category::create($request->all());
        return CategoryResource::make($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category) {

    }

    public function show(Category $category) {
        return CategoryResource::make($category);
    }

<<<<<<< HEAD

=======
>>>>>>> 8de360d84eecb0c2607291ea37da89cc49d2abc7
}

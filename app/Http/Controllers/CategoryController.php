<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return CategoryResource::collection($category);
    }

    public function store(StoreCategoryRequest $request)
    {
        $request->validated($request->all());
        $category = Category::create($request->all());
        return CategoryResource::make($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validated($request->all());
        $category->update($request->all());
        return CategoryResource::collection($category);
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category);
    }

    public function delete(Category $category) {
        $category->delete();
        return response([
            "Deleted SuccessFully",
            CategoryResource::make($category)
        ]);
    }

}

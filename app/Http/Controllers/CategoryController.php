<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Input;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::select('id','name','image','category_code')->get();
        return $category;
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

    public function show($category)
    {
        $category = Category::find($category);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return CategoryResource::make($category);
    }

    public function delete(Category $category) {
        $category->delete();
//        $categories = Category::where('id', '>', $category->id)->get();
//        foreach ($categories as $cat) {
//            $cat->category_code = str_pad((int)$cat->category_code - 1, 2, '0', STR_PAD_LEFT);
//            $cat->save();
//        }
        return response([
           "message" => "Deleted SuccessFully",
            CategoryResource::make($category)
        ]);
    }

}

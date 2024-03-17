<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::select('id', 'name', 'name_ar', 'image', 'photo', 'category_code')->get();

        return $category;
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = Category::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => CategoryResource::make($category),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateCategoryRequest $request, $categoryId)
    {
        try {
            $category = Category::find($categoryId);
            if (! $category) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $category->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => CategoryResource::make($category),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($category)
    {
        $category = Category::find($category);
        if (! $category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return CategoryResource::make($category);
    }

    public function delete($categoryId)
    {
        try {
            $category = Category::find($categoryId);
            if (! $category) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $category->delete();

            //        $categories = Category::where('id', '>', $category->id)->get();
            //        foreach ($categories as $cat) {
            //            $cat->category_code = str_pad((int)$cat->category_code - 1, 2, '0', STR_PAD_LEFT);
            //            $cat->save();
            //        }
            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => CategoryResource::make($category),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

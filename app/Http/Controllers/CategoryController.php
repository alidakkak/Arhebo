<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryWithFilterResource;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Input;
use App\Models\Invitation;
use App\Models\Invitee;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::select('id', 'name', 'name_ar', 'image', 'photo', 'category_code')->get();

        return $category;
    }

    public function searchCategory(Request $request)
    {
        $search = '%'.$request->input('search').'%';
        $category = Category::where('name', 'LIKE', $search)
            ->orWhere('name_ar', 'LIKE', $search)
            ->orWhere('description', 'LIKE', $search)
            ->orWhere('description_ar', 'LIKE', $search)
            ->orWhere('category_code', 'LIKE', $search)->get();

        return CategoryResource::collection($category);
    }

    public function categoryWithFilter()
    {
        $category = Category::all();

        return CategoryWithFilterResource::collection($category);
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
        $category = Category::where('id' , $category)->first();

        if (! $category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $templates = $category->Template->filter(\request(['filter']))->get();

//
//        if ($filter) {
//                        $templates = $category->where('')
//            )->get();
//            return CategoryResource::collection($templates);
//        }
//
//        $allTemplates = $category->templates;
        return CategoryResource::collection($templates);
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

    //// Statistics For Category, Template, Invitation, Users, Invitees
    public function statistics()
    {
        $categoriesCount = Category::count();
        $templatesCount = Template::count();
        $invitationsCount = Invitation::count();
        $usersCount = User::count();
        $inviteesCount = Invitee::count();
        $number_of_people_invited_by_app = Invitee::select(DB::raw('count(distinct(phone)) as total'))->value('total');
        $number_of_coupons = Coupon::count();

        return [
            'categories' => $categoriesCount,
            'templates' => $templatesCount,
            'invitations' => $invitationsCount,
            'users' => $usersCount,
            'invitees' => $inviteesCount,
            'number_of_people_invited_by_app' => $number_of_people_invited_by_app,
            'number_of_coupons' => $number_of_coupons,
        ];
    }

    //// API To Get Attributes For WhatsApp Templates
    public function getInformation()
    {
        $array = ['event_name', 'from', 'to', 'miladi_date', 'hijri_date'];

        if (\request('q') === 'create') {
            return response($array, 200);
        } elseif (\request('q') === 'edit') {
            $input = Input::where('category_id', \request('category_id'))->pluck('input_name');

            return response(array_merge($array, $input->toArray()), 200);
        } else {
            return response([
                'message' => 'unknown q param',
            ], 422);
        }
    }
}

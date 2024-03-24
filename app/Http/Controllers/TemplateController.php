<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Http\Resources\TemplateByCodeResource;
use App\Http\Resources\TemplateResource;
use App\Http\Resources\TrendingResource;
use App\Models\Color;
use App\Models\ColorTemplate;
use App\Models\FilterTemplate;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{
    public function index()
    {
        $template = Template::all();

        return TemplateResource::collection($template);
    }

    public function searchTemplate(Request $request)
    {
        $search = '%'.$request->input('search').'%';
        $template = Template::where('title', 'LIKE', $search)->get();

        return TemplateResource::collection($template);
    }

    public function trending()
    {
        $mostUsedTemplate = Template::withCount('invitation')
            ->having('invitation_count', '>', 0)
            ->orderBy('invitation_count', 'desc')->limit(6)
            ->get();

        return TrendingResource::collection($mostUsedTemplate);
    }

    //    public function store(StoreTemplateRequest $request){
    //
    //        $template = Template::create($request->all());
    //
    //        foreach ($request->colors as $index => $color){
    //            $Color = Color::updateOrCreate(
    //                ['color' => $color["name"]],
    //                ['color' => $color["name"]]
    //            );
    //            ColorTemplate::create([
    //                'color_id' => $Color->id,
    //                'template_id' => $template->id,
    //                'descriptions' => $color['description'],
    //                'template' => $color['template'],
    //            ]);
    //        }
    //        return TemplateResource::make($template);
    //    }

    public function store(StoreTemplateRequest $request)
    {
        DB::beginTransaction();
        try {
            $template = Template::create($request->all());

            FilterTemplate::create([
                'template_id' => $template->id,
                'filter_id' => $request->input('filter_id'),
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => TemplateResource::make($template),
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateTemplateRequest $request, $templateId)
    {
        try {
            $template = Template::find($templateId);
            if (! $template) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $template->update($request->all());

            return response()->json([
                'message' => 'Updated SuccessFully',
                'data' => TemplateResource::make($template),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($templateId)
    {
        try {
            $template = Template::find($templateId);
            if (! $template) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $template->delete();

            //        $templates = Template::where('id' , '>' , $template->id)->get();
            //        foreach ($templates as $cat) {
            //            $cat->template_code = str_pad((int)$cat->template_code - 1, 4, '0', STR_PAD_LEFT);
            //            $cat->save();
            //        }

            return response()->json([
                'message' => 'Deleted SuccessFully',
                //   'data' => TemplateResource::make($template),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    //// Search Template By Code (Support)
    public function templateByCode(Request $request)
    {
        $template = Template::where('template_code', $request->template_code)->first();
        if (! $template) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return TemplateByCodeResource::make($template);
    }
}

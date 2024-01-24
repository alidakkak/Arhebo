<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Http\Resources\TemplateResource;
use App\Http\Resources\TrendingResource;
use App\Models\Color;
use App\Models\ColorTemplate;
use App\Models\Template;

class TemplateController extends Controller
{
    public function index()
    {
        $template = Template::all();

        return TemplateResource::collection($template);
    }

    public function trending()
    {
        $mostUsedTemplate = Template::withCount('invitation')
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
        $request->validated($request->all());
        $template = Template::create($request->all());

        return TemplateResource::make($template);
    }

    public function delete(Template $template)
    {
        $template->delete();

        //        $templates = Template::where('id' , '>' , $template->id)->get();
        //        foreach ($templates as $cat) {
        //            $cat->template_code = str_pad((int)$cat->template_code - 1, 4, '0', STR_PAD_LEFT);
        //            $cat->save();
        //        }
        return response([
            'message' => 'Deleted SuccessFully',
            TemplateResource::make($template),
        ]);
    }
}

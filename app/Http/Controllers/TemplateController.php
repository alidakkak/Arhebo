<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Http\Resources\TemplateResource;
use App\Models\Color;
use App\Models\ColorTemplate;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index (){
        $template = Template::all();
        return TemplateResource::collection($template);
    }

    public function store(StoreTemplateRequest $request){

        $template = Template::create($request->all());

        foreach ($request->colors as $index => $color){
            $Color = Color::updateOrCreate(
                ['color' => $color["name"]],
                ['color' => $color["name"]]
            );
            ColorTemplate::create([
                'color_id' => $Color->id,
                'template_id' => $template->id,
                'descriptions' => $color['description'],
                'image' => $color['image'],
            ]);
        }
        return TemplateResource::make($template);
    }
}

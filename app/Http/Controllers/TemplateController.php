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
        $request->validated($request->all());
        $template = Template::create($request->all());
        $colors = $request->color;
        foreach ($colors as $index => $color){
            $newColor = Color::create(['color' => $color]);
            ColorTemplate::create([
                'color_id' => $newColor->id,
                'template_id' => $template->id,
                'descriptions' => $color['descriptions'][$index],
                'image' => $color['image'][$index],
            ]);
        }
        return TemplateResource::make($template);
    }
}

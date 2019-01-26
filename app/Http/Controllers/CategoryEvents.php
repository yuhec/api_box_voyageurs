<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources;
use App\Models;
use Validator;

class CategoryEvents extends Controller
{

    private static $validationRules = [
        'category_id' => 'required|alpha_dash',
        'event_id' => 'required|alpha_dash',
        'box_id' => 'required|alpha_dash',
    ];

    public function index (Request $request) {
        $elements = Models\CategoryEvents::paginate($request->input('results_per_page'));

        return Resources\CategoryEvents::collection($elements);
    }
    public function show ($id) {
        return new Resources\CategoryEvents(Models\CategoryEvents::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\CategoryEvents;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\CategoryEvents::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\CategoryEvents::findOrFail($id);
        $element->delete();

        return new Resources\CategoryEvents($element);
    }
}

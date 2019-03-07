<?php

namespace api\Http\Controllers;

use Illuminate\Http\Request;
use api\Http\Resources;
use api\Models;
use Validator;

class Categories extends Controller
{
    private static $validationRules = [
        'name' => 'required|string|max:255',
    ];

    public function index (Request $request) {
        $elements = Models\Categories::orderBy('name', 'asc')
            ->paginate($request->input('results_per_page'));

        return Resources\Categories::collection($elements);
    }
    public function show ($id) {
        return new Resources\Categories(Models\Categories::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\Categories;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\Categories::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\Categories::findOrFail($id);
        $element->delete();

        return new Resources\Categories($element);
    }
}

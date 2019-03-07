<?php

namespace api\Http\Controllers;

use Illuminate\Http\Request;
use api\Http\Resources;
use api\Models;
use Validator;

class Destinations extends Controller
{

    private static $validationRules = [
        'city' => 'required|string|max:255',
        'country' => 'required|string|max:255',
    ];

    public function index (Request $request) {
        $elements = Models\Destinations::paginate($request->input('results_per_page'));

        return Resources\Destinations::collection($elements);
    }
    public function show ($id) {
        return new Resources\Destinations(Models\Destinations::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\Destinations;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\Destinations::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\Destinations::findOrFail($id);
        $element->delete();

        return new Resources\Destinations($element);
    }
}

<?php

namespace api\Http\Controllers;

use Illuminate\Http\Request;
use api\Http\Resources;
use api\Models;
use Validator;

class EventTypes extends Controller
{

    private static $validationRules = [
        'name' => 'required|string|max:255',
    ];

    public function index (Request $request) {
        $elements = Models\EventTypes::paginate($request->input('results_per_page'));

        return Resources\EventTypes::collection($elements);
    }
    public function show ($id) {
        return new Resources\EventTypes(Models\EventTypes::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\EventTypes;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\EventTypes::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\EventTypes::findOrFail($id);
        $element->delete();

        return new Resources\EventTypes($element);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources;
use App\Models;
use Validator;

class ActivityTypes extends Controller
{

    private static $validationRules = [
        'name' => 'required|string|max:255',
    ];

    public function index (Request $request) {
        $elements = Models\ActivityTypes::paginate($request->input('results_per_page'));

        return Resources\ActivityTypes::collection($elements);
    }
    public function show ($id) {
        return new Resources\ActivityTypes(Models\ActivityTypes::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\ActivityTypes;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\ActivityTypes::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\ActivityTypes::findOrFail($id);
        $element->delete();

        return new Resources\ActivityTypes($element);
    }
}

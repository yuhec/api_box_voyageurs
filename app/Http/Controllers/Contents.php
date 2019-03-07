<?php

namespace api\Http\Controllers;

use Illuminate\Http\Request;
use api\Http\Resources;
use api\Models;
use Validator;

class Contents extends Controller
{
    private static $validationRules = [
        'box_id' => 'required|alpha_dash',
        'item_id' => 'required|alpha_dash',
    ];

    public function index (Request $request) {
        $elements = Models\Contents::paginate($request->input('results_per_page'));

        return Resources\Contents::collection($elements);
    }
    public function show ($id) {
        return new Resources\Contents(Models\Contents::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\Contents;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\Contents::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\Contents::findOrFail($id);
        $element->delete();

        return new Resources\Contents($element);
    }
}

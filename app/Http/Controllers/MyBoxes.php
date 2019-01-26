<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources;
use App\Models;
use Validator;

class MyBoxes extends Controller
{

    private static $validationRules = [
        'user_id' => 'required|alpha_dash',
        'box_id' => 'required|alpha_dash',
    ];

    public function index (Request $request) {
        $elements = Models\MyBoxes::paginate($request->input('results_per_page'));

        return Resources\MyBoxes::collection($elements);
    }
    public function show ($id) {
        return new Resources\MyBoxes(Models\MyBoxes::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\MyBoxes;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\MyBoxes::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\MyBoxes::findOrFail($id);
        $element->delete();

        return new Resources\MyBoxes($element);
    }
}

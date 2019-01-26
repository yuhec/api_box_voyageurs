<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources;
use App\Models;
use Validator;

class Items extends Controller
{

    private static $validationRules = [
        'name' => 'required|string|max:255',
        'price' => 'required|float',
        'comments' => 'required|string|max:255',
    ];

    public function index (Request $request) {
        $elements = Models\Items::paginate($request->input('results_per_page'));

        return Resources\Items::collection($elements);
    }
    public function show ($id) {
        return new Resources\Items(Models\Items::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\Items;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\Items::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\Items::findOrFail($id);
        $element->delete();

        return new Resources\Items($element);
    }
}

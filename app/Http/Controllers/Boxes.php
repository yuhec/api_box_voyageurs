<?php

namespace api\Http\Controllers;

use Illuminate\Http\Request;
use api\Http\Resources;
use api\Models ;
use Validator;

class Boxes extends Controller
{
    private static $validationRules = [
        'name' => 'required|string|max:255',
        'price' => 'required|float',
        'comments' => 'nullable|string|max:255',
        'destination_id' => 'required|alpha_dash',
        'photo_id' => 'required|alpha_dash',
    ];

    public function index (Request $request) {
        $elements = Models\Boxes::orderBy('name', 'asc')
            ->paginate($request->input('results_per_page'));

        return Resources\Boxes::collection($elements);
    }
    public function show ($id) {
        return new Resources\Boxes(Models\Boxes::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\Boxes;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\Boxes::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\Boxes::findOrFail($id);
        $element->delete();

        return new Resources\Boxes($element);
    }
}

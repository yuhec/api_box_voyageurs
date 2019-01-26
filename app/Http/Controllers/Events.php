<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources;
use App\Models;
use Validator;

class Events extends Controller
{

    private static $validationRules = [
        'name' => 'required|string|max:255',
        'comments' => 'required|string|max:255',
        'price' => 'required|string|max:255',
        'address_id' => 'required|alpha_dash',
        'mark_id' => 'required|alpha_dash',
        'event_type_id' => 'required|alpha_dash',
        'activity_type_id' => 'required|alpha_dash',
    ];

    public function index (Request $request) {
        $elements = Models\Events::paginate($request->input('results_per_page'));

        return Resources\Events::collection($elements);
    }
    public function show ($id) {
        return new Resources\Events(Models\Events::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\Events;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\Events::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\Events::findOrFail($id);
        $element->delete();

        return new Resources\Events($element);
    }
}

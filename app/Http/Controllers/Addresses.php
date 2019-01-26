<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources;
use App\Models;
use Validator;

class Addresses extends Controller
{
    private static $validationRules = [
        'line_1' => 'nullable|string',
        'line_2' => 'nullable|string|max:255',
        'line_3' => 'nullable|string|max:255',
        'postcode' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'province' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'longitude' => 'nullable|string|max:255',
        'latitude' => 'nullable|string|max:255',
    ];

    public function index (Request $request) {
        $addresses = Models\Addresses::orderBy('city', 'desc')
            ->paginate($request->input('results_per_page'));

        return Resources\Addresses::collection($addresses);
    }
    public function show ($id) {
        return new Resources\Addresses(Models\Addresses::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\Addresses;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\Addresses::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\Addresses::findOrFail($id);
        $element->delete();

        return new Resources\Addresses($element);
    }
}

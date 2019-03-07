<?php

namespace api\Http\Controllers;

use Illuminate\Http\Request;
use api\Http\Resources;
use api\Models;
use Validator;

class Users extends Controller
{

    private static $validationRules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'shipping_address_id' => 'required|alpha_dash',
        'billing_address_id' => 'required|alpha_dash',
        'gender_id' => 'required|alpha_dash',
        'photo_id' => 'required|alpha_dash',
    ];

    public function index (Request $request) {
        $elements = Models\Users::paginate($request->input('results_per_page'));

        return Resources\Users::collection($elements);
    }
    public function show ($id) {
        return new Resources\Users(Models\Users::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\Users;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\Users::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\Users::findOrFail($id);
        $element->delete();

        return new Resources\Users($element);
    }
}

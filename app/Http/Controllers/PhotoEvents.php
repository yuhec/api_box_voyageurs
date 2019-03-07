<?php

namespace api\Http\Controllers;

use Illuminate\Http\Request;
use api\Http\Resources;
use api\Models;
use Validator;

class PhotoEvents extends Controller
{

    private static $validationRules = [
        'photo_id' => 'required|alpha_dash',
        'event_id' => 'required|alpha_dash',
    ];

    public function index (Request $request) {
        $elements = Models\PhotoEvents::paginate($request->input('results_per_page'));

        return Resources\PhotoEvents::collection($elements);
    }
    public function show ($id) {
        return new Resources\PhotoEvents(Models\PhotoEvents::findOrFail($id));
    }
    public function create (Request $request) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = new Models\PhotoEvents;
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), static::$validationRules);

        if ($validator->fails()) {
            return abort(400, $validator->errors()->__toString());
        }

        $element = Models\PhotoEvents::findOrFail($id);
        $element->fill($request->all());
        $element->save();

        return $element;
    }
    public function delete ($id) {
        $element = Models\PhotoEvents::findOrFail($id);
        $element->delete();

        return new Resources\PhotoEvents($element);
    }
}

<?php

namespace api\Http\Controllers;

use Illuminate\Http\Request;
use api\Http\Resources;
use api\Models;
use Validator;

class Destinations extends Controller
{

  private static $validationRules = [
    'city' => 'required|string|max:255',
    'country' => 'required|string|max:255',
    'photo' => 'required|array',
  ];

  public function index (Request $request) {
    $elements = Models\Destinations::paginate($request->input('results_per_page'));

    return Resources\Destinations::collection($elements);
  }
  public function show ($id) {
    return new Resources\Destinations(Models\Destinations::findOrFail($id));
  }
  public function create (Request $request) {
    $validator = Validator::make($request->all(), static::$validationRules);

    if ($validator->fails()) {
      return abort(400, $validator->errors()->__toString());
    }

    $photo_request = new Request();
    $photo_request->replace($request->input('photo'));
    $photo = Photos::store($photo_request);

    $element = new Models\Destinations;
    $element->photo_id = $photo->id;
    $element->fill($request->except(['photo']));
    $element->save();

    return $element;
  }
  public function update (Request $request, $id) {
    $validator = Validator::make($request->all(), static::$validationRules);

    if ($validator->fails()) {
      return abort(400, $validator->errors()->__toString());
    }

    $photo_request = new Request();
    $photo_request->replace($request->input('photo'));
    Photos::update($photo_request, $request->input('photo')['id']);

    $element = Models\Destinations::findOrFail($id);
    $element->fill($request->except(['photo', 'destination']));
    $element->save();

    return $element;
  }
  public function delete ($id) {
    $element = Models\Destinations::findOrFail($id);
    $element->delete();

    return new Resources\Destinations($element);
  }
}

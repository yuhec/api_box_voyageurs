<?php

namespace api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Destinations extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'country' => $this->country,
          'city' => $this->city,
          'photo_id' => $this->photo_id,
          'photo' => new Photos($this->photo),
          'created_at' => $this->created_at->toDateTimeString(),
          'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}

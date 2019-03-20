<?php

namespace api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Boxes extends JsonResource
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
          'name' => $this->name,
          'comments' => $this->comments,
          'destination' => new Destinations($this->destination),
          'created_at' => $this->created_at->toDateTimeString(),
          'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}

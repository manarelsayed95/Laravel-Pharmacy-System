<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAdressesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        [
            'id'=> $this->id,
            'street_name'=> $this->street_name,
            'building_number'=> $this->building_number,
            'floor_number'=> $this->floor_number,
            'flat_number'=> $this->flat_number,
            'is_main'=> $this->is_main,
            'area_id'=> $this->area_id,
            'user_id'=> $this->user_id,
        ];
    }
}

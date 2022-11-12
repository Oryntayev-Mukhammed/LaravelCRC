<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class GameResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'img' => $this->img,
            'discription' => $this->disc,
            'price' => $this->price,
            'discount' => $this->discount,
            'sold' => $this->sold,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:m:s')
        ];
    }
}

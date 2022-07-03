<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'price' => $this->price,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'image' => $this->image,
            'category' => $this->productCategory,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

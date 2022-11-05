<?php

namespace App\Http\Resources;

use App\Models\Subcategory;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $subcategory = SubcategoryResource::collection(Subcategory::where('id', $this->subcategory_id)->get());
        $category = '';

        foreach ($subcategory as $item) {
            $category = $item->category->name;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'subcategory' => $this->subcategory->name,
            'category' => $category,
            'brand' => $this->brand->name,
            'color' => $this->color,
            'size' => $this->size,
            'material' => $this->material,
            'in_stock' => $this->in_stock,
            'is_public' => $this->is_public ? 'TAK' : 'NIE',
            'price' => $this->price,
            'description' => $this->description,
            'created_at' => $this->created_at->toDate()->format('d-m-Y'),
            'user' => $this->user ? $this->user->name : 'system'
        ];
    }
}

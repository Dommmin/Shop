<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'category' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'color' => 'required',
            'types' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'in_stock' => 'required|numeric',
            'material' => 'required',
            'description' => 'required|min:10',
            'user_id' => 'nullable'
        ];
    }
}

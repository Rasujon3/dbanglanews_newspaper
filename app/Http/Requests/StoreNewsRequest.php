<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
                'title' => 'required|string|max:100|unique:news',
                'category_id' => 'required|integer',
                'subcategory_id'=> 'nullable|integer',
                'specialcategory_id' => 'nullable|integer',
                'description' => 'required',
                'image' => 'required',
                'status' => 'required',
         ];
    }
}

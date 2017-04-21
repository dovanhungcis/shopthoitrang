<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rules = [
            'id_sale' => 'required',
            'id_supplier' => 'required',
            'id_item' => 'required',
            'name' => 'required|min:3|unique:products',
            'quantity' => 'required',
            'detail_product' => 'required',
            'detail_size' => 'required',
            'detail_information' => 'required',
            'material_storage' => 'required'
        ];
        $photos = count($this->input('photos'));
        foreach (range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'required|image|mimes:jpeg,jpg,bmp,png|max:2000';
        }

        // dd($photos)
        // dd($rules);
        return $rules;
    }
}

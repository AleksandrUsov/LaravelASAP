<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:50'],
            'content' => ['string'],
            'user_id' => ['exists:users,id', 'int'],
            'category_id' => ['nullable', 'int'],
            'is_visible' => ['bool'],
            'published_at' => ['date', 'nullable'],
            'image' => ['nullable', 'mimes:jpg,jpeg,bmp,png', 'max:2048'],
        ];
    }
}

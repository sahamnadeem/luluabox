<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|string|min:3',
            'director'=>'required|string|min:3',
            'writer'=>'required|string|min:3',
            'story'=>'required|string|min:3',
            'detail'=>'required|string|min:10',
            'price'=>'required|numeric|min:3',
            'trailer'=>'required|active_url',
            'category_id'=>'required',
            'genre_id'=>'required',
        ];
    }
}

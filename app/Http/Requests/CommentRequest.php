<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Sentinel;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
		if(Sentinel::check())
			return true;
		return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'content'	=> 'required'
        ];
	}	
		
		
	/**
	* Get the error messages for the defined validation rules.
	*
	* @return array
	*/
	public function messages()
	{
		return [
			//'title.required' => 'A post title is required',
			//'content.required'  => 'A post content is required',
		];
	}
    
}

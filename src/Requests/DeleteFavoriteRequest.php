<?php

namespace WTG\Customer\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Add favorite request
 *
 * @package     WTG\Favorites
 * @subpackage  Requests
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class DeleteFavoriteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "favorite" => ['required', 'exists:favorites,id']
        ];
    }
}
<?php

namespace App\Http\Requests\API\Catalogs;

use App\Models\Catalogs\TreeFamilyCatalog;
use InfyOm\Generator\Request\APIRequest;

class CreateTreeFamilyCatalogAPIRequest extends APIRequest
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
        return TreeFamilyCatalog::$rules;
    }
}

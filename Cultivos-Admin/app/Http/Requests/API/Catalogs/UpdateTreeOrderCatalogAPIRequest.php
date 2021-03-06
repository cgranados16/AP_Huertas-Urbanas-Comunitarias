<?php

namespace App\Http\Requests\API\Catalogs;

use App\Models\Catalogs\TreeOrderCatalog;
use InfyOm\Generator\Request\APIRequest;

class UpdateTreeOrderCatalogAPIRequest extends APIRequest
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
        return TreeOrderCatalog::$rules;
    }
}

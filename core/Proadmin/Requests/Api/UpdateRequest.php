<?php

namespace App\Proadmin\Requests\Api;

use App\Proadmin\Rules\FieldTypeRule;

class UpdateRequest extends ApiRequest
{
    public function rules() : array
	{
		$fieldsTypes = $this->route()->parameters()['menu_item']->getFieldsType();
		$fieldsRequired = $this->route()->parameters()['menu_item']->getFieldsRequired();

		$rules = [];

		foreach ($this->all() as $key => $field) {
			$rules[$key] = [$fieldsRequired[$key], new FieldTypeRule($fieldsTypes[$key], $fieldsRequired[$key])];
		}

		return $rules;
    }
}

<?php

namespace App\Http\Requests\Payments;

use App\Http\Requests\Request;

class UpdateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return auth()->user()->can('manage_payments');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'type' => 'required|numeric',
			'amount' => 'required|numeric',
			'date' => 'required|date|date_format:Y-m-d',
			'customer_id' => 'required|numeric',
			'description' => 'required|max:255'
		];
	}

}

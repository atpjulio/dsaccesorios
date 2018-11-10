<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'shipping' => 'required',
            'total' => 'required',
            'status' => 'required',
            'order_phone' => 'required',
            'full_address' => 'required',
            'address_city' => 'required',
            'address_state' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'shipping.required' => 'El costo de envío es obligatorio',
            'order_phone.required' => 'El número de contacto del pedido es obligatorio',
            'full_address.required' => 'La dirección del pedido es obligatoria',
            'address_city.required' => 'El municipio del pedido es obligatorio',
            'address_state.required' => 'El departamento del pedido es obligatorio',
        ];
    }
}

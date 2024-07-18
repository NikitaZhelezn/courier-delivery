<?php

namespace App\Http\Requests\Api\Delivery;

use App\Enums\PackageTypes;
use App\Models\DeliveryOffice;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateDeliveryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'recipient_id' => [
                'required',
                'int',
                Rule::exists('recipients', 'id'),
            ],
            'post_office_type' => [
                'required',
                'string',
                Rule::in(DeliveryOffice::get('post_subname')->pluck('post_subname')->toArray()),
            ],
            'package_type' => [
                'required',
                'string',
                Rule::in(PackageTypes::toArray()),
            ],
            'package_width' => [
                'required',
                'number',
                'min:0.5',
                'max:999.99',
            ],
            'package_height' => [
                'required',
                'number',
                'min:0.5',
                'max:999.99',
            ],
            'package_length' => [
                'required',
                'number',
                'min:0.5',
                'max:999.99',
            ],
            'package_weight' => [
                'required',
                'number',
                'min:0.5',
                'max:999.99',
            ],
            'package_address' => [
                'required',
                'string',
                'min:10',
                'max:255'
            ],
            'delivery_address' => [
                'required',
                'string',
                'min:10',
                'max:255'
            ],
        ];
    }
}

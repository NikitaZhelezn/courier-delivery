<?php

namespace App\Services\Office;

use App\Models\DeliveryOffice;
use App\Services\AbstractClasses\PostOffice;
use Illuminate\Validation\ValidationException;

/**
 * Service that implements Post Office contract
 *
 * class NovaPostService;
 *
 * @package App\Services\Office;
 *
 * @public setPostOffice(DeliveryOffice $office): NovaPostService;
 * @public createDelivery(array $data): string;
 */
class NovaPostService implements PostOffice
{
    /** @var DeliveryOffice $office */
    protected DeliveryOffice $office;

    /**
     * @param DeliveryOffice $office
     * @return NovaPostService
     */
    public function setPostOffice(DeliveryOffice $office): NovaPostService
    {
        $this->office = $office;

        return $this;
    }

    /**
     * @param array $data
     * @return string
     * @throws ValidationException
     */
    public function createDelivery(array $data): string
    {
        return (new OfficeService())
            ->post($this->office->post_api_url,
                $this->office->post_api_key,
                [
                    'customer_name' => $data['customer_name'],
                    'phone_number' => $data['customer_phone'],
                    'email' => $data['customer_email'],
                    'package_address' => $data['package_address'],
                    'delivery_address' => $data['delivery_address'],
                ]
            );
    }
}

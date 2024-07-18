<?php

namespace App\Services\Delivery;

use App\Enums\DeliveryOfficeTypes;
use App\Models\Delivery;
use App\Models\DeliveryOffice;
use App\Models\Recipient;
use App\Services\Office\NovaPostService;
use App\Services\Office\OfficeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * class DeliveryService;
 *
 * @package App\Services\Delivery;
 *
 * @public createDelivery(Request $request): void;
 */
class DeliveryService
{
    public function __construct(
        protected OfficeService $service,
    ) {}

    /**
     * Create delivery for the Recipient.
     *
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function createDelivery(Request $request): void
    {
        $recipient = Recipient::find($request->get('recipient_id'));
        $postOffice = DeliveryOffice::where('post_subname', $request->get('post_office_type'));

        DB::beginTransaction();
        try {

            // Here we will add new Office types when we want to expand them.
            $response = match ($request->get('post_office_type')) {
                DeliveryOfficeTypes::NOVA_POST => (new NovaPostService())
                    ->setPostOffice($postOffice)->createDelivery([
                        'customer_name' => $recipient->fullName(),
                        'customer_phone' => $recipient->recipient_phone,
                        'customer_email' => $recipient->recipient_email,
                        'package_address' => $request->get('package_address'),
                        'delivery_address' => $request->get('delivery_address'),
                    ]),
                default => throw ValidationException::withMessages([
                    'error' => __('This service is currently unavailable')
                ]),
            };

            Delivery::create([
                'recipient_id' => $recipient->id,
                'post_id' => $postOffice->id,
                'post_delivery_id' => $response,
                'package_type' => $request->get('package_type'),
                'package_width' => $request->get('package_width'),
                'package_height' => $request->get('package_height'),
                'package_length' => $request->get('package_length'),
                'package_weight' => $request->get('package_weight'),
                'package_address' => $request->get('package_address'),
                'delivery_address' => $request->get('delivery_address'),
            ]);
            DB::commit();

            return;
        } catch (\Exception $e) {
            DB::rollBack();

            throw ValidationException::withMessages([
                'error' => $e->getMessage(),
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Delivery\CreateDeliveryRequest;
use App\Services\Delivery\DeliveryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

/**
 * class DeliveryController;
 *
 * @package App\Http\Controllers\Api\Delivery;
 *
 * @public store(CreateDeliveryRequest $request): JsonResponse;
 */
class DeliveryController extends Controller
{
    /**
     * @param DeliveryService $deliveryService
     */
    public function __construct(
        protected DeliveryService $deliveryService,
    ) {}

    /**
     * Create delivery for Recipient.
     *
     * @param CreateDeliveryRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(CreateDeliveryRequest $request): JsonResponse
    {
        $this->deliveryService->createDelivery($request);

        return response()->json([
            'message' => __('Delivery created.')
        ]);
    }
}

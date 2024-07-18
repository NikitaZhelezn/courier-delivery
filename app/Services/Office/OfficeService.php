<?php

namespace App\Services\Office;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

/**
 * Service that allows to use general functions for storing, updating, retrieving data.
 * class OfficeService;
 *
 * @package App\Services\Office;
 *
 * @public post(string $url, string $apiKey, array $data): string;
 */
class OfficeService
{
    /**
     * @param string $url
     * @param string $apiKey
     * @param array $data
     * @return string
     * @throws ValidationException
     */
    public function post(string $url, string $apiKey, array $data): string
    {
        try {
            $response = Http::withToken($apiKey)
                ->post($url, $data);

            if ($response->status() === 200) {
                return $response->json('delivery_id');
            }

            throw ValidationException::withMessages([
                'error' => $response->json('error'),
            ]);
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'error' => $e->getMessage(),
            ]);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

/**
 * class DeliveryOffice
 *
 * @package App\Models
 *
 * @property string $post_name;
 * @property string $post_subname;
 * @property string $post_api_url;
 * @property string $post_api_key;
 * @property string $api_data_keys;
 */
class DeliveryOffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_name',
        'post_subname',
        'post_api_url',
        'post_api_key',
        'api_data_keys',
    ];

    public $timestamps = true;

    /**
     * @return HasMany
     */
    public function delivery(): HasMany
    {
        return $this->hasMany(Delivery::class, 'post_id', 'id');
    }

//    /**
//     * @param array $deliveryData
//     * @return array
//     */
//    public function parseDataForCreation(array $deliveryData): array
//    {
//        $postKeys = json_decode($this->api_data_keys);
//        $data = [];
//
//        foreach ($postKeys as $item => $key) {
//            if
//        }
//    }
}

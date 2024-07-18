<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * class Delivery;
 *
 * @package App\Models
 *
 * @property int $recipient_id;
 * @property int $post_id;
 * @property string $post_delivery_id;
 * @property string $package_type;
 * @property string $package_width;
 * @property string $package_height;
 * @property string $package_length;
 * @property string $package_weight;
 * @property string $package_address;
 * @property Carbon $delivered_at;
 * @property Carbon $received_at;
 * @property Carbon $created_at;
 */
class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_id',
        'post_id',
        'post_delivery_id',
        'package_type',
        'package_width',
        'package_height',
        'package_length',
        'package_weight',
        'package_address',
        'delivery_address',
        'delivered_at',
        'received_at',
    ];

    public $timestamps = true;

    /**
     * Relation
     *
     * @return BelongsTo
     */
    public function recipient(): BelongsTo
    {
        return $this->belongsTo(Recipient::class, 'recipient_id', 'id');
    }

    /**
     * Relation
     *
     * @return BelongsTo
     */
    public function deliveryOffice(): BelongsTo
    {
        return $this->belongsTo(DeliveryOffice::class, 'post_id', 'id');
    }
}

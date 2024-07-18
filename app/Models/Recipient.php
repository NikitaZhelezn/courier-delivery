<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * class Recipient;
 *
 * @package App\Models;
 *
 * @property string $recipient_first_name;
 * @property string $recipient_last_name;
 * @property string|null $recipient_middle_name;
 * @property string $recipient_phone;
 * @property string $recipient_address;
 */
class Recipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_first_name',
        'recipient_last_name',
        'recipient_middle_name',
        'recipient_phone',
        'recipient_email',
        'recipient_address',
    ];

    public $timestamps = true;

    /**
     * Relation with deliveries
     *
     * @return HasMany
     */
    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }

    /**
     * Return full name of recipient
     *
     * @return string
     */
    public function fullName(): string
    {
        return $this->recipient_last_name.' '.$this->recipient_first_name.' '.$this->recipient_middle_name;
    }
}

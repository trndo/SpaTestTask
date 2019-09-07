<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservedSeat extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_last_name',
        'phone_number',
        'reserved_at',
        'file',
        'conference_room_id'
    ];

    /**
     * Reserved seat belongs to conference room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conferenceRoom()
    {
        return $this->belongsTo(ConferenceRoom::class);
    }
}

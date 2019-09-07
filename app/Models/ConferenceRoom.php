<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConferenceRoom extends Model
{
    private const UPLOADS_DIR = '/uploads/';

    protected $fillable = [
        'photo',
        'title',
        'number_of_seats',
        'description'
    ];

    /**
     * Conferense room has many reserved seats
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservedSeats()
    {
        return $this->hasMany(ReservedSeat::class);
    }

    public function getPhoto(): string
    {
        return self::UPLOADS_DIR.$this->photo;
    }
}

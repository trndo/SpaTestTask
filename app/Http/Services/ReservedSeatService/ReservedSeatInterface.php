<?php


namespace App\Http\Services\ReservedSeatService;


use Illuminate\Http\Request;

interface ReservedSeatInterface
{
    /**
     * Reserve seat in the conference room
     *
     * @param Request $request
     * @return mixed
     */
    public function createReservation(Request $request);

    /**
     * Get reserve seat by id
     *
     * @param int $id
     * @return mixed
     */
    public function getReservedSeat(int $id);
}

<?php


namespace App\Http\Services\ConferenceRoomService;


use Illuminate\Http\Request;

interface ConferenceRoomInterface
{
    /**
     * Find all conference rooms
     *
     * @return mixed
     */
    public function findAllRooms();

    /**
     * Create new conference room
     *
     * @param Request $request
     * @return mixed
     */
    public function createRoom(Request $request);

    /**
     * Get conference room by id
     *
     * @param int $id
     * @return mixed
     */
    public function getRoom(int $id);

    /**
     * Update conference room
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function updateRoom(Request $request, int $id);

    /**
     * Delete conference room
     *
     * @param int $id
     * @return mixed
     */
    public function deleteRoom(int $id);

    /**
     * Get reserved seats
     *
     * @param int $id
     * @return mixed
     */
    public function getReservedSeats(int $id);

}

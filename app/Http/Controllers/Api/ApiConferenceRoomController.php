<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\ConferenceRoomCollection;
use App\Http\Services\ConferenceRoomService\ConferenceRoomInterface;
use App\Models\ConferenceRoom;

class ApiConferenceRoomController extends Controller
{
    /**
     * @var ConferenceRoomInterface
     */
    private $conferenceRoom;

    public function __construct(ConferenceRoomInterface $conferenceRoom)
    {
        $this->conferenceRoom = $conferenceRoom;
    }

    public function getAllConferenceRooms()
    {
        return $conferenceRooms = new ConferenceRoomCollection(ConferenceRoom::paginate(6));
    }

}

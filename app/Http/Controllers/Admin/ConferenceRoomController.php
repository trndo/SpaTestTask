<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConferenceRoomRequest;
use App\Http\Services\ConferenceRoomService\ConferenceRoomInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ConferenceRoomController extends Controller
{
    protected $conferenceRoomService;

    public function __construct(ConferenceRoomInterface $conferenceRoomService)
    {
        $this->conferenceRoomService = $conferenceRoomService;
    }

    public function getAll(): View
    {
        $conferenceRooms = $this->conferenceRoomService->findAllRooms();

        return view('admin.room.rooms', compact('conferenceRooms'));
    }

    public function create(): View
    {
        return view('admin.room.create');
    }

    public function store(ConferenceRoomRequest $request): RedirectResponse
    {
        $this->conferenceRoomService->createRoom($request);

        return redirect('/admin/rooms');
    }

    public function read(int $id): View
    {
        $room = $this->conferenceRoomService->getRoom($id);
        $reservedSeats = $this->conferenceRoomService->getReservedSeats($id);

        return view('admin.room.show', [
            'room' => $room,
            'reservedSeats' => $reservedSeats
        ]);

    }

    public function edit(int $id): View
    {
        $room = $this->conferenceRoomService->getRoom($id);

        return view('admin.room.edit', compact('room'));
    }

    public function update(ConferenceRoomRequest $request, int $id): RedirectResponse
    {
        $this->conferenceRoomService->updateRoom($request, $id);

        return redirect('/admin/rooms');
    }

    public function delete($id): RedirectResponse
    {
        $this->conferenceRoomService->deleteRoom($id);

        return redirect()->back();
    }
}

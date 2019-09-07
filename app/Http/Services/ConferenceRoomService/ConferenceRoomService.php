<?php


namespace App\Http\Services\ConferenceRoomService;


use App\Http\Repositories\ConferenceRoomRepository;
use App\Http\Services\UploadingFileService\UploadingFileInterface;
use App\Models\ConferenceRoom;
use Illuminate\Http\Request;

class ConferenceRoomService implements ConferenceRoomInterface
{
    private const UPLOADS_DIR = '/uploads/';

    /**
     * @var ConferenceRoomRepository
     */
    private $repository;
    /**
     * @var UploadingFileInterface
     */
    private $uploadingFile;

    /**
     * ConferenceRoomService constructor.
     * @param ConferenceRoomRepository $repository
     * @param UploadingFileInterface $uploadingFile
     */
    public function __construct(ConferenceRoomRepository $repository, UploadingFileInterface $uploadingFile)
    {
        $this->repository = $repository;
        $this->uploadingFile = $uploadingFile;
    }

    /**
     * Find all conference rooms
     *
     * @return mixed
     */
    public function findAllRooms()
    {
        return $this->repository->all();
    }

    /**
     * Create new conference room
     *
     * @param Request $request
     * @return mixed
     */
    public function createRoom(Request $request)
    {
        $attributes = $request->all();

        $photo = $attributes['photo'];
        $uploadedImage = $this->uploadingFile->uploadFile($photo);
        $attributes['photo'] = $uploadedImage;

        return $this->repository->create($attributes);
    }

    /**
     * Get conference room by id
     *
     * @param int $id
     * @return mixed
     */
    public function getRoom(int $id): ConferenceRoom
    {
        return $this->repository->find($id);
    }

    /**
     * Update conference room
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function updateRoom(Request $request, int $id)
    {
        $attributes = $request->all();
        $photo = $attributes['photo'];
        $room = $this->repository->find($id);

        if ($photo) {
            $uploadedImage = $this->uploadingFile->uploadFile($photo);
            $attributes['photo'] = $uploadedImage;
            $this->deletePhoto($room->photo);
        }

        return $this->repository->update($id, $attributes);
    }

    /**
     * Delete conference room
     *
     * @param int $id
     * @return mixed
     */
    public function deleteRoom(int $id)
    {
        $room = $this->repository->find($id);
        $photo = $room->photo;
        if ($photo) {
            $this->deletePhoto($photo);
        }
        return $this->repository->delete($id);
    }

    /**
     * Get reserved seats
     *
     * @param int $id
     * @return mixed
     */
    public function getReservedSeats(int $id)
    {
        return $this->repository->find($id)->reservedSeats();
    }

    /**
     * Delete conference room photo
     *
     * @param string $photo
     */
    private function deletePhoto(string $photo): void
    {
        unlink(public_path().self::UPLOADS_DIR.$photo);
    }
}

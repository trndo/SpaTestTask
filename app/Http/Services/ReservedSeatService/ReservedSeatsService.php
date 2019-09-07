<?php


namespace App\Http\Services\ReservedSeatService;


use App\Http\Repositories\RepositoryInterfaces\RepositoryInterface;
use App\Http\Services\UploadingFileService\UploadingFileInterface;
use App\Models\ConferenceRoom;
use App\Models\ReservedSeat;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;

class ReservedSeatsService implements ReservedSeatInterface
{
    /**
     * @var RepositoryInterface
     */
    private $repository;
    /**
     * @var UploadingFileInterface
     */
    private $uploadingFile;

    /**
     * ReservedSeatsService constructor.
     * @param ReservedSeatsService $repository
     * @param UploadingFileInterface $uploadingFile
     */
    public function __construct(ReservedSeatsService $repository, UploadingFileInterface $uploadingFile)
    {
        $this->repository = $repository;
        $this->uploadingFile = $uploadingFile;
    }

    /**
     * Reserve seat in the conference room
     *
     * @param Request $request
     * @return mixed
     */
    public function createReservation(Request $request): array
    {
        $attributes = $request->all();

        if (!$this->checkIsAvailableNumberOfSeats($attributes['conferences_room_id'])) {

            return [
                'status' => false,
                'error' => 'Oops! We dont have any places!'
            ];
        }

        $file = $attributes['file'];
        $newFileName = $this->uploadingFile->uploadFile($file);
        $attributes['file'] = $newFileName;

        $this->repository->create($attributes);

        return [
            'status' => true,
        ];

    }

    /**
     * Get reserve seat by id
     *
     * @param int $id
     * @return mixed
     */
    public function getReservedSeat(int $id): ReservedSeat
    {
        return $this->repository->find($id);
    }

    /**
     * Check number of seats
     *
     * @param ConferenceRoom $room
     * @return bool
     */
    private function checkIsAvailableNumberOfSeats(ConferenceRoom $room): bool
    {
        return  $room->number_of_seats >= $room->reservedSeats()->count();
    }
}

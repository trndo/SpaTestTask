<?php


namespace App\Http\Repositories;

use App\Http\Repositories\RepositoryInterfaces\RepositoryInterface;
use App\Models\ConferenceRoom;

class ConferenceRoomRepository implements RepositoryInterface
{
    /**
     * @var ConferenceRoom
     */
    private $conferenceRoom;

    /**
     * ConferenceRoomRepository constructor.
     * @param ConferenceRoom $conferenceRoom
     */
    public function __construct(ConferenceRoom $conferenceRoom)
    {
        $this->conferenceRoom = $conferenceRoom;
    }


    /**
     * Create item
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->conferenceRoom->create($attributes);
    }

    /**
     * Find all items
     *
     * @return mixed
     */
    public function all()
    {
        return $this->conferenceRoom->all();
    }

    /**
     * Find item by id
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->conferenceRoom->find($id);
    }

    /**
     * Update item
     *
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function update(int $id, array $attributes)
    {
        return $this->conferenceRoom->find($id)->update($attributes);
    }

    /**
     * Delete item
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->conferenceRoom->find($id)->delete();
    }


}

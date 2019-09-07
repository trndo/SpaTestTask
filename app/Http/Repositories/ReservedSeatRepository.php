<?php


namespace App\Http\Repositories;


use App\Http\Repositories\RepositoryInterfaces\RepositoryInterface;
use App\Models\ReservedSeat;

class ReservedSeatRepository implements RepositoryInterface
{
    /**
     * @var ReservedSeat
     */
    private $reservedSeat;

    public function __construct(ReservedSeat $reservedSeat)
    {
        $this->reservedSeat = $reservedSeat;
    }

    /**
     * Create item
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->reservedSeat->create($attributes);
    }

    /**
     * Find all items
     *
     * @return mixed
     */
    public function all()
    {
       return $this->reservedSeat->all();
    }

    /**
     * Find item by id
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->reservedSeat->find($id);
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
        return $this->reservedSeat->find($id)->update($attributes);
    }

    /**
     * Delete item
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->reservedSeat->find($id)->delete();
    }
}

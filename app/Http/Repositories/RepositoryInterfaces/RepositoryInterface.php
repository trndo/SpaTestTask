<?php


namespace App\Http\Repositories\RepositoryInterfaces;


interface RepositoryInterface
{
    /**
     * Create item
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Find all items
     *
     * @return mixed
     */
    public function all();

    /**
     * Find item by id
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * Update item
     *
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function update(int $id, array $attributes);

    /**
     * Delete item
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}

<?php

namespace App\Contracts;


interface RepositoryContract
{

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attributes);

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);

}

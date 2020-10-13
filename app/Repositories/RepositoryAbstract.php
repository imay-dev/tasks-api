<?php

namespace App\Repositories;


use App\Contracts\RepositoryContract;

class RepositoryAbstract implements RepositoryContract
{

    /**
     * @var
     */
    protected $entity;

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->entity->all();
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function paginate(int $perPage)
    {
        return $this->entity->paginate($perPage);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attributes)
    {
        return $this->entity->store($attributes);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        return $this->entity->findOrFail($id);
    }

    /**
     * @param array $attributes
     * @param $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        return $this->show($id)->update($attributes);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        return $this->entity->delete($id);
    }
}

<?php

namespace App\Repositories;

use App\Contracts\Repository\RandomPlayersRepository;
use App\Person;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PersonRepository implements RandomPlayersRepository
{
    /**
     * @param int $limit
     * @return Collection|Person[]
     */
    public function getRandom(int $limit): Collection
    {
        return Person::inRandomOrder()->limit($limit)->get();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator
    {
        return Person::paginate();
    }

    /**
     * @param array $values
     * @return Person
     */
    public function store(array $values): Person
    {
        return Person::create($values);
    }

    /**
     * @param Person $person
     * @param array $attributes
     * @return Person
     */
    public function update(Person $person, array $attributes): Person
    {
        $person->update($attributes);
        return $person;
    }

    /**
     * @param Person $person
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Person $person)
    {
        return $person->delete();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Person;
use App\Repositories\PersonRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PersonController extends ApiController
{
    /**
     * @var PersonRepository
     */
    private $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * @OA\Get(
     *      path="/api/people",
     *      operationId="index",
     *      tags={"people"},
     *      summary="Get list of people",
     *      description="Returns list of people",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Response(response=400, description="Bad request")
     *     )
     *
     * Returns list of people
     *
     * @return LengthAwarePaginator
     */
    public function index()
    {
        return $this->personRepository->paginate();
    }

    /**
     *
     *   @OA\Post(
     *      path="/api/people",
     *      operationId="store",
     *      tags={"people"},
     *      summary="Store a person",
     *      description="Stores a person",
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Person")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Response(response=400, description="Bad request", @OA\JsonContent())
     *     )
     *
     * Returns list of people
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Person
     */
    public function store(StorePersonRequest $request)
    {
        return $this->personRepository->store($request->all());
    }

    /**
     *
     *  @OA\Get(
     *      path="/api/people/{id}",
     *      operationId="get",
     *      tags={"people"},
     *      summary="Get person",
     *      description="Returns a person",
     *      @OA\Parameter(name="id",in="path"),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Response(response=400, description="Bad request")
     *     )
     *
     *
     * Display the specified resource.
     *
     * @param \App\Person $person
     * @return Person
     */
    public function show(Person $person)
    {
        return $person;
    }


    /**
     *
     * @OA\Put(
     *      path="/api/people/{id}",
     *      operationId="update",
     *      tags={"people"},
     *      summary="Update a person",
     *      description="Update a person",
     *      @OA\Parameter(name="id",in="path"),
     *      @OA\RequestBody(
     *          @OA\JsonContent(ref="#/components/schemas/Person")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Response(response=400, description="Bad request", @OA\JsonContent())
     *     )
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Person $person
     * @return Person
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        return $this->personRepository->update($person, $request->all());
    }

    /**
     * @OA\Delete(
     *      path="/api/people/{id}",
     *      operationId="delete",
     *      tags={"people"},
     *      summary="Delete person",
     *      description="Delete a person",
     *      @OA\Parameter(name="id",in="path"),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Response(response=400, description="Bad request")
     *     )
     *
     * Remove the specified resource from storage.
     *
     * @param \App\Person $person
     * @return bool
     * @throws \Exception
     */
    public function destroy(Person $person)
    {
        return $this->personRepository->delete($person);
    }
}

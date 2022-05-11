<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Entity\DestroyRequest;
use App\Http\Requests\Entity\ListRequest;
use App\Services\EntityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    private EntityService $entity;

    public function __construct(EntityService $entity)
    {
        $this->entity = $entity;
    }

    public function index(ListRequest $request): JsonResponse
    {
        $entities = $this->entity->getList($request->all());
        return response()->json(['entities' => $entities], 200);
    }

    public function destroy(DestroyRequest $request): JsonResponse
    {
        return response()->json(['entity' => $this->entity->destroy($request->id)], 200);
    }







    public function create(Generator $faker)
    {
        $note = Note::factory(1)->create();

        return response($note->jsonSerialize(), ResponseAlias::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $crud = Note::findOrFail($id);
        $crud->category_id = $request->category_id;
        $crud->save();
        return response(null, Response::HTTP_OK);
    }


}

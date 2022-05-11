<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Entity\ListRequest;
use App\Models\Entity;
use App\Repositories\EntityRepository;
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

    public function index(ListRequest $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $entities = $this->entity->getList($request->all());
        return view('index', compact('entities'));
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

    public function destroy($id)
    {
        Note::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}

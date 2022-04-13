<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Faker\Generator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Telegram\Bot\Api;

class NoteController extends Controller
{
    public function index(): Response
    {
        return response(Note::all()->jsonSerialize(), Response::HTTP_OK);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FunEvents;

class FunEventsController extends Controller
{
    //
    public function index()
    {
        return FunEvents::all();
    }

    public function show($id)
    {
        return FunEvents::find($id);
    }

    public function store(Request $request)
    {
      $event =FunEvents::create($request->all());

        return response()->json($event, 201);
    }

    public function update(Request $request, $id)
    {
        $event = FunEvents::findOrFail($id);
        $event->update($request->all());

        return $event;
    }

    public function delete(Request $request, $id)
    {
        $event = FunEvents::findOrFail($id);
        $event->delete();

        return 204;
    }
}

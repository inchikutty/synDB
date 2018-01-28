<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExtApp;

class ExtAppController extends Controller
{
    //
    public function index()
    {
        return ExtApp::all();
    }

    public function show($id)
    {
        return ExtApp::find($id);
    }

    public function store(Request $request)
    {
      $event = ExtApp::create($request->all());

        return response()->json($event, 201);
    }

    public function update(Request $request, $id)
    {
        $event = ExtApp::findOrFail($id);
        $event->update($request->all());

        return $event;
    }

    public function delete(Request $request, $id)
    {
        $event = ExtApp::findOrFail($id);
        $event->delete();

        return 204;
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Mimi;
use Illuminate\Http\Request;

class MimiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mimi = Mimi::all();
        return response()->json($mimi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mimi' => 'required|string|max:150'
        ]);

        $mimi = Mimi::create([
            'mimi' => $validated['mimi'],
            'completed' => false,
        ]);

        return response()->json($mimi, 201);//nuevo recurso
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mimi $mimi)
    {
        $validated = $request->validate([
            'completed' => 'required|boolean',
        ]);

        $mimi->completed = $validated['completed'];
        $mimi->save();

        return response()->json($mimi, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mimi $mimi)
    {
        $mimi->delete();

        return response()->json(null, 204); //eliminacion exitosa pero sin contenido que devolver
    }
}

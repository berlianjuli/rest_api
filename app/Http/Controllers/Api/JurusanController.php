<?php

namespace App\Http\Controllers\Api;

use App\Models\Jurusan;
use App\Http\Controllers\Controller;
use App\Http\Resources\JurusanResource;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateJurusanRequest;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return JurusanResource::collection(Jurusan::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        return new JurusanResource(Jurusan::create($validated));
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        return new JurusanResource($jurusan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, Jurusan $jurusan)
    {
        $jurusan->update($request->validated());
        return new JurusanResource($jurusan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
 return response()->noContent();
    }
}

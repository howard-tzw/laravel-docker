<?php

namespace App\Http\Controllers;

use App\Models\AnimalType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = AnimalType::get();
        return response($types, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|unique:animal_types,name',
            'sort' => 'nullable|integer',
        ]);

        if (empty($request->sort)) {
            $max = AnimalType::get()->max('sort');
            $request['sort'] = $max + 1;
        }

        $type = AnimalType::create($request->input());
        return response($type, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function show(AnimalType $animalType)
    {
        return response($animalType, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnimalType $animalType)
    {
        $type = $animalType->update($request->all());
        return response($type, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnimalType  $animalType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnimalType $animalType)
    {
        $animalType->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

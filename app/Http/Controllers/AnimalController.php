<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnimalResource;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marker = $request->input('marker') ?? 1;
        $limit = $request->input('limit') ?? 10;

        $query = Animal::query();

        // 篩選欄位條件
        if (isset($request->filters)) {
            $filters = explode(',', $request->filters);
            foreach ($filters as $filter) {
                list($column, $value) = explode(':', $filter);
                $query->where($column, 'like', "%$value%");
            }
        }

        // 排序
        if (isset($request->sort)) {
            $sorts = explode(',', $request->sort);
            foreach ($sorts as $sort) {
                list($col, $val) = explode(':', $sort);
                if ($val == 'asc' || $val == 'desc') {
                    $query->orderBy($col, $val);
                }
            }
        } else {
            $query->orderBy('id', 'asc');
        }

        $animals = $query->orderBy('id', 'asc')->where('id', '>=', $marker)->paginate($limit);
        return response(['animals' => $animals], Response::HTTP_OK);
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
            'type_id' => 'required',
            'name' => 'required|max:255',
            'birthday' => 'required|date',
            'area' => 'required|string|max:255',
            'fix' => 'boolean',
            'description' => 'nullable',
            'personality' => 'nullable']
        );

        $animal = Animal::create(json_decode($request->getContent(), true));
        return response($animal, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return response(new AnimalResource($animal), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $animal->update($request->all());
        return response($animal, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

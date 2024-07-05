<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class GenreController extends BaseController
{
    /**
     * Display a listing of the genres.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $genres = Genre::all();

        return $this->sendResponse($genres->toArray(), 'Genres retrieved successfully.');
    }

    /**
     * Store a newly created genre in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:genres|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $genre = Genre::create($request->all());

        return $this->sendResponse($genre->toArray(), 'Genre created successfully.');
    }

    /**
     * Display the specified genre.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre): JsonResponse
    {
        return $this->sendResponse($genre->toArray(), 'Genre retrieved successfully.');
    }

    /**
     * Update the specified genre in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:genres|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $genre->name = $request->name;
        $genre->save();

        return $this->sendResponse($genre->toArray(), 'Genre updated successfully.');
    }

    /**
     * Remove the specified genre from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre): JsonResponse
    {
        $genre->delete();

        return $this->sendResponse([], 'Genre deleted successfully.');
    }
}

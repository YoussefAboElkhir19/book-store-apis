<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Author::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        //
        $data = $request->validated();
        return Author::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Return Author With Have Books
        return Author::with('books')
            ->where('id', '=', $id)
            ->first();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        //
        $data = $request->validated();
        if ($author->update($data))
            return "Update Successful";
        return "Faild Updatinggg";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
        return $author->delete();
    }
    public function trashed()
    {
        return Author::onlyTrashed()->get();
    }
    public function restore($id)
    {
        $author = Author::withTrashed()->where('id', '=', $id)->first();
        if ($author->trashed()) {
            return $author->restore();
        } else {
            return "Author Is Exists";
        }
    }
}

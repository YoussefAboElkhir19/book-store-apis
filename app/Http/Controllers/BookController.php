<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Book::all();
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
    public function store(StoreBookRequest $request)
    {
        //
        $data = $request->validated();
        return Book::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        //
        return Book::with(['user', 'author', 'language', 'topic'])
            ->where('id', '=', $id)
            ->first();
    }



    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateBookRequest $request, Book $book)
    // {
    //     //
    //     $data = $request->validated();
    //     if ($book->update($data))
    //         return "Update Successful";
    //     return "Faild Update";
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        return $book->delete();
    }
    public function trashed()
    {
        return Book::onlyTrashed()->get();
    }
    public function restore($id)
    {
        $book = Book::withTrashed()->where('id', $id)->first();
        if ($book->trashed()) {
            return $book->restore();
        } else {
            return "Book Is Exists";
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return User::with('books')->withCount('books')->get();
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
    public function store(StoreUserRequest $request)
    {
        //
        $data = $request->validated();
        return User::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return
            User::with('books.author', 'books.language', 'books.topic')
            ->where('id', '=', $id)
            ->first();
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $data = $request->validated();
        if ($user->update($data))
            return "Updating is Succesfull";
        return "not Updating";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        return $user->delete();
    }
    // fucntion to show users deleted
    public function trashed()
    {
        return  User::onlyTrashed()->get();
    }
    // function to ressroe data
    public function restore($id)
    {
        $user = User::withTrashed()->where('id', '=', $id)->first();
        if ($user->trashed()) {
            return $user->restore();
        } else {
            return "User Not Deleted Already Exist In Data ";
        }
    }
}

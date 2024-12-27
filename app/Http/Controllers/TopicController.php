<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Topic::get();
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
    public function store(StoreTopicRequest $request)
    {
        //
        $data = $request->validated();
        return Topic::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return
            Topic::with('books')
            ->where('id', '=', $id)
            ->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        //
        $data = $request->validated();
        if ($topic->update($data))
            return "Updateing Successfullll";

        return "Faild Updatinggggg";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
        $topic->delete();
    }
    public function trashed()
    {
        return Topic::onlyTrashed()->get();
    }
    public function restore($id)
    {
        $topic = Topic::withTrashed()->where('id', $id)->first();
        if ($topic->trashed()) {
            return $topic->restore();
        } else {
            return "Topic Is Exist";
        }
    }
}

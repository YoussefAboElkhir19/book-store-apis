<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Language::all();
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
    public function store(StoreLanguageRequest $request)
    {
        //
        $data = $request->validated();
        return Language::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return
            Language::with('books')
            ->where('id', '=', $id)
            ->first();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        //
        $data = $request->validated();
        if ($language->update($data))
            return "Updating Successfulll";
        return "Faild Updatagggg";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        //
        $language->delete();
    }
    public function trashed()
    {
        return Language::onlyTrashed()->get();
    }
    public function restore($id)
    {
        $lang = Language::withTrashed()->where('id', $id)->first();
        if ($lang->trashed()) {
            return $lang->restore();
        } else {
            return "Langues Is Existtt";
        }
    }
}

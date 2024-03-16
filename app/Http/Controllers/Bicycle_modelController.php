<?php

namespace App\Http\Controllers;

use App\Models\Bicycle_model;
use Illuminate\Http\Request;

class Bicycle_modelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bicycle_models', [
            'bicycle_models' => Bicycle_model::all()
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('bicycle_model', [
            'bicycle_model'=> Bicycle_model::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

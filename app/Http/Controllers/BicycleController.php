<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Bicycle_model;
use Gate;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view("bicycles", [
            'bicycles'=> Bicycle::paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bicycle_create', [
            'models' => Bicycle_model::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'status'=> ['required','boolean'],
            'bicycle_model_id'=> ['required','integer'],
            'location' => ['max:255'],
        ]);
        
        $bicycle = Bicycle::create($validated );
        $bicycle->save();

        return redirect()->intended('bicycle')->withErrors([
            'success' => 'Вы успешно добавили велосипед'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('bicycle_edit', [
            'bicycle'=> Bicycle::all()->where('id', $id)->first(),
            'models' => Bicycle_model::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valudated = $request->validate([
            'status' => 'required|boolean',
            'model_id' => 'required|integer',
            'location' => 'required|max:255'
        ]);

        $bicycle = Bicycle::all()->where('id' , $id)->first();
        $bicycle->status = $valudated['status'];
        $bicycle->bicycle_model_id = $valudated['model_id'];
        $bicycle->location = $valudated['location'];
        $bicycle->save();
        return redirect('/bicycle');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Gate::allows('destroy-bicycle', Bicycle::all()->where('id', $id)->first()))
        {
            return redirect()->intended('bicycle')->withErrors([
                'error' => 'У вас нет прав на удаление этого велосипеда',
            ]);
        }
        Bicycle::destroy($id);
        return redirect()->intended('bicycle')->withErrors([
            'success' => 'Вы успешно удалили велосипед с id = '.$id,
        ]);;
    }
}

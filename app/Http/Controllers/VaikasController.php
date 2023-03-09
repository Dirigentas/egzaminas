<?php

namespace App\Http\Controllers;

use App\Models\Vaikas;
use App\Models\Tevas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class VaikasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vaikas = Vaikas::all();

        return view('back.vaikas.index', [
            'vaikas' => $vaikas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tevas = Tevas::all();
        
        return view('back.vaikas.create', [
            'tevas' => $tevas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vaikas = new Vaikas;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            

            $photo->move(public_path().'/', $file);

            $vaikas->photo = '/'. $file;
        }

        $vaikas->restaurant = $request->restaurant;
        $vaikas->name = $request->name;
        $vaikas->price = $request->price;
        $vaikas->save();

        return redirect()->back()->with('ok', 'Pridėta sėkmingai');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaikas $vaikas)
    {
        $tevas = Tevas::all();

        return view('back.vaikas.edit', [
            'tevas' => $tevas,
            'vaikas' => $vaikas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vaikas $vaikas)
    {
        if ($request->delete_photo) {
            $vaikas->deletePhoto();
            return redirect()->back();
        }

        if ($request->file('photo')) {
            $photo = $request->file('photo');

            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            
            if ($vaikas->photo) {
                $vaikas->deletePhoto();
            }
            
            $photo->move(public_path().'/', $file);
            $vaikas->photo = '/'. $file;
        }

        $vaikas->restaurant = $request->restaurant;
        $vaikas->name = $request->name;
        $vaikas->price = $request->price;
        $vaikas->save();

        return redirect()->back()->with('ok', 'Informacija atnaujinta sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaikas $vaikas)
    {
        $vaikas->deletePhoto();
        $vaikas->delete();
        
        return redirect()->back()->with('ok', 'Įrašas ištrintas sėkmingai');
    }
}

?>
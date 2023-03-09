<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Firm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::all();

        return view('back.menu.index', [
            'menu' => $menu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $firm = Firm::all();
        
        return view('back.menu.create', [
            'firm' => $firm
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = new Menu;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            

            $photo->move(public_path().'/', $file);

            $menu->photo = '/'. $file;
        }

        $menu->restaurant = $request->restaurant;
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->save();

        return redirect()->back()->with('ok', 'Pridėta sėkmingai');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $firm = Firm::all();

        return view('back.menu.edit', [
            'firm' => $firm,
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        if ($request->delete_photo) {
            $menu->deletePhoto();
            return redirect()->back();
        }

        if ($request->file('photo')) {
            $photo = $request->file('photo');

            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            
            if ($menu->photo) {
                $menu->deletePhoto();
            }
            
            $photo->move(public_path().'/', $file);
            $menu->photo = '/'. $file;
        }

        $menu->restaurant = $request->restaurant;
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->save();

        return redirect()->back()->with('ok', 'Informacija atnaujinta sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->deletePhoto();
        $menu->delete();
        
        return redirect()->back()->with('ok', 'Įrašas ištrintas sėkmingai');
    }
}

?>
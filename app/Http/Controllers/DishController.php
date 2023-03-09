<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Firm;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dish = Dish::all();

        return view('back.dish.index', [
            'dish' => $dish
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = Menu::all();
        
        return view('back.dish.create', [
            'menu' => $menu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dish = new Dish;

        if ($request->file('photo')) {
            $photo = $request->file('photo');
            
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            

            $photo->move(public_path().'/', $file);

            $dish->photo = '/'. $file;
        }

        $dish->menu = $request->menu;
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->save();

        return redirect()->back()->with('ok', 'Patiekalas pridėtas sėkmingai');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $menu = Menu::all();

        return view('back.dish.edit', [
            'menu' => $menu,
            'dish' => $dish
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
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

        $menu->menu = $request->menu;
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->save();

        return redirect()->back()->with('ok', 'Patiekalo informacija atnaujinta sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $menu->deletePhoto();
        $menu->delete();
        
        return redirect()->back()->with('ok', 'Patiekalas ištrintas sėkmingai');
    }
}

?>
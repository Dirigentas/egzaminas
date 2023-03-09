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
        $menu->firm = $request->firm;
        $menu->name = $request->name;
        $menu->save();

        return redirect()->back()->with('ok', 'Meniu pridėtas sėkmingai');
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
        $menu->firm = $request->firm;
        $menu->name = $request->name;
        $menu->save();

        return redirect()->back()->with('ok', 'Meniu atnaujintas sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if (!$menu->tablesConnection()->count()) {
            $menu->delete();
            return redirect()->back()->with('ok', 'Meniu ištrintas sėkmingai');
        }

        return redirect()->back()->with('not', 'Pašalinti įrašo negalima, yra susietų duomenų');
    }
}

?>
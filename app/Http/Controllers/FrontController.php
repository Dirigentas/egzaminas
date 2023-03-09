<?php

namespace App\Http\Controllers;

use App\Models\Front;
use App\Models\Firm;
use App\Models\Menu;
use App\Models\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->s)
        {
            $s = explode(' ', $request->s);
            
            if(count($s) == 1) {
                $menu = Menu::where('name', 'like', '%'.$s[0].'%');
            }
            else {
                $menu = Menu::where('name', 'like', '%'.$s[0].'%'.$s[1].'%')->orWhere('name', 'like', '%'.$s[1].'%'.$s[0].'%');
            }
        } else {      
            if ($request->id && $request->id != 'all') {
                $menu = Menu::where('id', $request->id);
            }
            else {
                $menu = Menu::where('id', '>', 0);
            }
        }

        $menu = match($request->sort ?? '') {
            'asc_name' => $menu->orderBy('name'),
            'desc_name' => $menu->orderBy('name', 'desc'),
            default => $menu
        };
        
         $menu = $menu->get();

         $user = Auth::user();

         $firm = Firm::all()->sortBy('name');

        return view('front.home', [
            'menu' => $menu,
            'sortSelect' => Firm::SORT,
            'sortShow' => isset(Firm::SORT[$request->sort]) ? $request->sort : '',
            's' => $request->s ?? '',
            'user' => $user,
            'firm' => $firm,
            'firmShow' => $request->id ? $request->id : '',
        ]);
    }

    public function show(Firm $firm, Dish $dish)
    {
        $user = Auth::user();

        $menu = $firm->tablesConnection()->get();
        
        return view('front.firm', [
            'firm' => $firm,
            'menu' => $menu,
            'dish' => $dish,
            'user' => $user
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
     * Show the form for editing the specified resource.
     */
    public function edit(Front $front)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Front $front)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Front $front)
    {
        //
    }
}

?>
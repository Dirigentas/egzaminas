<?php

namespace App\Http\Controllers;

use App\Models\Front;
use App\Models\Tevas;
use App\Models\Vaikas;
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
                $vaikas = Vaikas::where('name', 'like', '%'.$s[0].'%');
            }
            else {
                $vaikas = Vaikas::where('name', 'like', '%'.$s[0].'%'.$s[1].'%')->orWhere('name', 'like', '%'.$s[1].'%'.$s[0].'%');
            }
        } else {      
            if ($request->id && $request->id != 'all') {
                $vaikas = Vaikas::where('id', $request->id);
            }
            else {
                $vaikas = Vaikas::where('id', '>', 0);
            }
        }

        $vaikas = match($request->sort ?? '') {
            'asc_price' => $vaikas->orderBy('price'),
            'desc_price' => $vaikas->orderBy('price', 'desc'),
            default => $vaikas
        };
        
         $vaikas = $vaikas->get();

         $user = Auth::user();

         $tevas = Tevas::all()->sortBy('name');

        return view('front.home', [
            'vaikas' => $vaikas,
            'sortSelect' => Vaikas::SORT,
            'sortShow' => isset(Vaikas::SORT[$request->sort]) ? $request->sort : '',
            's' => $request->s ?? '',
            'user' => $user,
            'tevas' => $tevas,
            'tevasShow' => $request->id ? $request->id : '',
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
    public function show(Front $front)
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
<?php

namespace App\Http\Controllers;

use App\Models\Tevas;
use App\Models\Vaikas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TevasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tevas = Tevas::all();

        return view('back.tevas.index', [
            'tevas' => $tevas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.tevas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|alpha|min:4|max:100',
            'city' => 'required|alpha|min:3|max:50',
            'start' => 'required|date_format:"H:i',
            'end' => 'required|date_format:"H:i',
            ],
        [
            'name' => 'Netinkamas vardo formatas',
            'surncityame' => 'Netinkamas miesto formatas',
            'start' => 'netinkamas laiko formatas',
            'end' => 'netinkamas laiko formatas, turi būti vėlesnis nei pradžios laikas',
        ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

        $tevas = new Tevas;
        $tevas->name = $request->name;
        $tevas->city = $request->city;
        $tevas->address = $request->address;
        $tevas->start = $request->start;
        $tevas->end = $request->end;
        $tevas->save();

        return redirect()->back()->with('ok', 'Pridėta sėkmingai');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tevas $tevas)
    {
        return view('back.tevas.edit', [
            'restaurant' => $tevas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tevas $tevas)
    {
        $tevas->name = $request->name;
        $tevas->city = $request->city;
        $tevas->address = $request->address;
        $tevas->start = $request->start;
        $tevas->end = $request->end;
        $tevas->save();

        return redirect()->back()->with('ok', 'Informacija atnaujinta sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tevas $tevas)
    {
        if (!$tevas->tablesConnection()->count()) {
            $tevas->delete();
            return redirect()->back()->with('ok', 'Įrašas ištrintas sėkmingai');
        }

        return redirect()->back()->with('not', 'Pašalinti įrašo negalima, yra susietų duomenų');
    }
}
?>
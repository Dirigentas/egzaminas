<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $firm = Firm::all();

        return view('back.firm.index', [
            'firm' => $firm
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.firm.create');
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

        $firm = new Firm;
        $firm->name = $request->name;
        $firm->city = $request->city;
        $firm->address = $request->address;
        $firm->start = $request->start;
        $firm->end = $request->end;
        $firm->save();

        return redirect()->back()->with('ok', 'Pridėta sėkmingai');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Firm $firm)
    {
        return view('back.firm.edit', [
            'restaurant' => $firm
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Firm $firm)
    {
        $firm->name = $request->name;
        $firm->city = $request->city;
        $firm->address = $request->address;
        $firm->start = $request->start;
        $firm->end = $request->end;
        $firm->save();

        return redirect()->back()->with('ok', 'Informacija atnaujinta sėkmingai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Firm $firm)
    {
        if (!$firm->tablesConnection()->count()) {
            $firm->delete();
            return redirect()->back()->with('ok', 'Įrašas ištrintas sėkmingai');
        }

        return redirect()->back()->with('not', 'Pašalinti įrašo negalima, yra susietų duomenų');
    }
}
?>
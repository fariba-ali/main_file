<?php

namespace App\Http\Controllers;

use App\Models\AllVacation;
use App\Models\VenderVacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenderVacationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('create vender vacation')) {
            $venderVacations = AllVacation::where('vender_id', Auth::user()->vender_id)->get();
            return view('vender.vacation.index', compact('venderVacations'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('create vender vacation')) {
            return view('vender.vacation.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('create vender vacation')) {
            AllVacation::create([
                'vender_name' => Auth::user()->name,
                'vender_id' => Auth::user()->vender_id,
                'fromH' => $request->fromH,
                'untilH' => $request->untilH,
                'firstDay' => $request->firstDay,
                'lastDay' => $request->lastDay
            ]);
            session()->flash('success', 'vacation created successfuly');
            return redirect(route('venderVacation.index'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('edit vender vacation')) {
            $allVacation=AllVacation::findorFail($id);
            return view('vender.vacation.create', compact('allVacation'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->can('edit vender vacation')) {
            $allVacation=AllVacation::findorFail($id);
            $allVacation->update([
                'fromH' => $request->fromH,
                'untilH' => $request->untilH,
                'firstDay' => $request->firstDay,
                'lastDay' => $request->lastDay
            ]);
            session()->flash('success', 'vacation editted successfuly');
            return redirect(route('venderVacation.index'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('delete vender vacation')) {
            $allVacation=AllVacation::findorFail($id);
            $allVacation->delete();
            session()->flash('success', 'vacation deleted successfuly');
            return redirect(route('venderVacation.index'));
        }
    }
}

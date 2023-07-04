<?php

namespace App\Http\Controllers;

use App\Models\AllVacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllVacations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('manage vacation')) {
            $allvacations = AllVacation::all();
            return view('allVacations.index', compact('allvacations'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('manage vacation')) {
            $vacation = AllVacation::findorFail($id);
            return view('allVacations.create',compact('vacation'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->can('manage vacation')) {
            $vacation = AllVacation::findorFail($id);
            $vacation->update([
                'vender_id'=>$request->vender_id,
                'vender_name'=>$request->vender_name,
                'accountant_name'=>$request->accountant_name,
                'accountant_id'=>$request->accountant_id,
                'fromH'=>$request->fromH,
                'untilH'=>$request->untilH,
                'firstDay'=>$request->firstDay,
                ';lastDay'=>$request->lastDay,
            ]);
            session()->flash('success', 'vacation editted successfuly');
            return redirect(route('allVacations.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('manage vacation')) {
            $vacation = AllVacation::findorFail($id);
            $vacation->delete();
            session()->flash('success', 'vacation editted successfuly');
            return redirect(route('allVacations.index'));
        }
    }
}

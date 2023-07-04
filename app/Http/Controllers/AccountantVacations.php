<?php

namespace App\Http\Controllers;

use App\Models\AllVacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountantVacations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('create accountant vacation')) {

            $accountantVacations = AllVacation::where('accountant_id',Auth::user()->id)->get();

            return view('accountantVacation.index', compact('accountantVacations'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('create accountant vacation')) {
            return view('accountantVacation.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('create accountant vacation')) {
            AllVacation::create([
                'accountant_name'=>Auth::user()->name,
                'accountant_id'=>Auth::user()->id,
                'created_by'=>Auth::user()->created_by,
                'fromH' => $request->fromH,
                'untilH' => $request->untilH,
                'firstDay' => $request->firstDay,
                'lastDay' => $request->lastDay
            ]);
            session()->flash('success', 'vacation created successfuly');
            return redirect(route('accountantVacation.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('edit accountant vacation')) {
            $accountVacation = AllVacation::findorFail($id);
            return view('accountantVacation.create', compact('accountVacation'));
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
        if (Auth::user()->can('edit accountant vacation')) {
            $accountVacation = AllVacation::findorFail($id);
            $accountVacation->update([
                'fromH' => $request->fromH,
                'untilH' => $request->untilH,
                'firstDay' => $request->firstDay,
                'lastDay' => $request->lastDay
            ]);
            session()->flash('success', 'vacation edited successfuly');
            return redirect(route('accountantVacation.index'));
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
       $accountantVacation=AllVacation::findorFail($id);
       $accountantVacation->delete();
        session()->flash('success', 'vacation deleted successfuly');
        return redirect(route('accountantVacation.index'));
    }
}

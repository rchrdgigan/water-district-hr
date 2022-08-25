<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use App\Http\Requests\PositionRequest;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.position.positions-management', [
            'positions' => DB::table('positions')->paginate(10)
        ]);
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
    public function store(PositionRequest $request)
    {
        $validated = $request->validated();
        $deduction = Position::create([
            'description' => $validated['description'],
            'rate' => $validated['rate'],
        ]);
        if($deduction){
            toast('Position has been saved!','success');
            return redirect()->back();
        }
        toast('Position has been failed to saved!','error');
        return redirect()->back();
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request)
    {
        $validated = $request->validated();
        $position = Position::where('id',$request->id)->update([
            'description' => $validated['description'],
            'rate' => $validated['rate'],
        ]);
        if($position){
            toast('Position has been updated!','success');
            return redirect()->back();
        }
        toast('Position has been failed to updated!','error');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $position = Position::findOrFail($request->id);
        if($position){
            $position->delete();
            toast('Position has been deleted!','info');
            return redirect()->back();
        }
        toast('Position has been failed to delete!','error');
        return redirect()->back();
    }
}

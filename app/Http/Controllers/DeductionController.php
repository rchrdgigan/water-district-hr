<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Deduction;
use App\Http\Requests\DeductionRequest;
use Illuminate\Support\Facades\DB;

class DeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.deduction.deduction-management', [
            'deductions' => DB::table('deductions')->paginate(10)
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
    public function store(DeductionRequest $request)
    {
        $validated = $request->validated();
        $deduction = Deduction::create([
            'description' => $validated['description'],
            'amount' => $validated['amount'],
        ]);
        toast('Deduction has been saved!','success');
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
    public function update(DeductionRequest $request)
    {
        $validated = $request->validated();
        $deduction = Deduction::where('id',$request->id)->update([
            'description' => $validated['description'],
            'amount' => $validated['amount'],
        ]);
        if($deduction){
            toast('Deduction has been updated!','success');
            return redirect()->back();
        }
        toast('Deduction has been updated failed!','error');
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
        $deduction = Deduction::findOrFail($request->id);
        if($deduction){
            $deduction->delete();
            toast('Deduction has been deleted!','info');
            return redirect()->back();
        }
        toast('Deduction has been failed to delete!','error');
        return redirect()->back();
    }
}

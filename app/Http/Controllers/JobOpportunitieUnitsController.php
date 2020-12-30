<?php

namespace App\Http\Controllers;

use App\JobOpportunities;
use App\JobOpportunitieUnits;
use Illuminate\Http\Request;

class JobOpportunitieUnitsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.job_opportunities_units.index';
        $this->create = 'admin.job_opportunities_units.create';
        $this->edit = 'admin.job_opportunities_units.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = JobOpportunitieUnits::all();
        return view($this->index, compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->create);
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
        $new_record = new JobOpportunitieUnits();
        $new_record->unit = $request->unit;
        $new_record->sort  = $request->sort;
        $new_record->save();
        return redirect('/admin/job_opportunities_units')->with('message','新增成功!');
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
        $list = JobOpportunitieUnits::find($id);
        return view($this->edit,compact('list','id'));
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
        //
        $old_record = JobOpportunitieUnits::find($id);
        $old_record->unit = $request->unit;
        $old_record->sort  = $request->sort;
        $old_record->save();

        return redirect('/admin/job_opportunities_units')->with('message','更新成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $unit = JobOpportunitieUnits::find($id);

        $hasUnit = JobOpportunities::where('unit_id', $id)->count();

        if($hasUnit)
            return redirect('/admin/job_opportunities_units')->with('message', '目前'.$unit->unit.'單位尚有'.$hasUnit.'個職缺名稱，請先刪除職缺名稱或更換單位');
        else {
            $unit->delete();
            return redirect('/admin/job_opportunities_units')->with('message', '刪除工程');
        }
    }
}

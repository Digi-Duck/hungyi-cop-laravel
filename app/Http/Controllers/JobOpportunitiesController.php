<?php

namespace App\Http\Controllers;

use App\JobOpportunities;
use App\JobOpportunitieUnits;
use Illuminate\Http\Request;

class JobOpportunitiesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.job_opportunities.index';
        $this->create = 'admin.job_opportunities.create';
        $this->edit = 'admin.job_opportunities.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = JobOpportunities::all();
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
        $units = JobOpportunitieUnits::all();

        return view($this->create, compact('units'));
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
        $new_record = new JobOpportunities();
        $new_record->unit_id = $request->unit_id;
        $new_record->position = $request->position;
        $new_record->save();

        return redirect('/admin/job_opportunities')->with('message', '新增成功');
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
        $units = JobOpportunitieUnits::all();
        $list = JobOpportunities::find($id);
        return view($this->edit, compact('list', 'units'));
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
        $old_recode = JobOpportunities::find($id);
        $old_recode->unit_id = $request->unit_id;
        $old_recode->position = $request->position;
        $old_recode->save();
        return redirect('/admin/job_opportunities')->with('message', '更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = JobOpportunities::find($id);
        $unit->delete();
        return redirect('/admin/job_opportunities')->with('message', '刪除成功');
    }
}

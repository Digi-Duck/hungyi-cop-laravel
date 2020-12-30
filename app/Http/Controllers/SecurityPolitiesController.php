<?php

namespace App\Http\Controllers;

use App\SecurityPolities;
use Illuminate\Http\Request;

class SecurityPolitiesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.security_polities.index';
        $this->create = 'admin.security_polities.create';
        $this->edit = 'admin.security_polities.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = SecurityPolities::find(1);
        return view($this->index, compact('list'));
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
    public function update(Request $request, $id)
    {
        //
        $old_record = SecurityPolities::find(1);
        $old_record->deaths = $request->deaths;
        $old_record->injury = $request->injury;
        $old_record->hospitalized = $request->hospitalized;
        $old_record->accidents_people = $request->accidents_people;
        $old_record->accidents_times = $request->accidents_times;
        $old_record->accidents_false = $request->accidents_false;
        $old_record->fines_times = $request->fines_times;
        $old_record->fines_million = $request->fines_million;
        $old_record->save();

        return redirect('/admin/security_polities')->with('message','更新成功!');
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
    }
}

<?php

namespace App\Http\Controllers;

use App\SafetyZonesSetings;
use Illuminate\Http\Request;

class SafetyZonesSetingsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.safety_zones_setings.index';
        $this->create = 'admin.safety_zones_setings.create';
        $this->edit = 'admin.safety_zones_setings.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = SafetyZonesSetings::find(1);
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
        $old_record = SafetyZonesSetings::find($id);
        $old_record->switch = $request->switch;
        $old_record->title = $request->title;
        $old_record->url = $request->url;
        $old_record->save();

        return redirect('/admin/safety_zones_setings')->with('message','更新成功!');
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

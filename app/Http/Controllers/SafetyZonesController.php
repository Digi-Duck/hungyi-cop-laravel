<?php

namespace App\Http\Controllers;

use App\SafetyZones;
use Illuminate\Http\Request;

class SafetyZonesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.safety_zones.index';
        $this->create = 'admin.safety_zones.create';
        $this->edit = 'admin.safety_zones.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = SafetyZones::all()->sortByDesc('sort');
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
        $new_record = new SafetyZones();
        $new_record->name = $request->name;
        $new_record->url = $request->url;
        $new_record->sort = $request->sort;
        $new_record->save();
        return redirect('/admin/safety_zones')->with('message','新增成功!');
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
        $list = SafetyZones::find($id);
        return view($this->edit, compact('list'));
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
        $list = SafetyZones::find($id);
        return view($this->edit, compact('list'));
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
        $old_record = SafetyZones::find($id);
        $old_record->sort = $request->sort;
        $old_record->url = $request->url;
        $old_record->name = $request->name;
        $old_record->save();
        return redirect('/admin/safety_zones')->with('message','修改成功!');
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
        $old_record = SafetyZones::find($id);
        $old_record->delete();
        return redirect('/admin/safety_zones')->with('message','刪除成功!');
    }
}

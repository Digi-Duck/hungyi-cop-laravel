<?php

namespace App\Http\Controllers;

use App\TechnologyBlocks;
use App\TechnologyDetails;
use App\TechnologyZones;
use Illuminate\Http\Request;

class TechnologyZonesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.technologys.index';
        $this->create = 'admin.technologys.create';
        $this->edit = 'admin.technologys.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = TechnologyZones::all();
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
        $new_record = New TechnologyZones();
        $new_record->sort = $request->sort;
        $new_record->title = $request->title;
        $new_record->subtitle = $request->subtitle;
        $new_record->content = $request->content;
        $new_record->save();

        return redirect('admin.technologys')->with('message', '新增成功！');
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
        $list = TechnologyZones::find($id);
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
        $old_record = TechnologyZones::find($id);
        $old_record->sort = $request->sort;
        $old_record->title = $request->title;
        $old_record->subtitle = $request->subtitle;
        $old_record->content = $request->content;
        $old_record->save();
        return redirect('admin/technologys')->with('message', '修改完成');
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
        $zone = TechnologyZones::find($id);

        $hasBlock = TechnologyBlocks::where('zones_id' , $id)->count();
        if($hasBlock)
            return redirect('admin/technologys')->with('message', '目前 '.$zone->title.' 內尚有 '.$hasBlock.' 個區塊，請先進入專區刪除剩餘區塊，才能刪除本技術專區！');
        else
            $zone->delete();

        return redirect('admin/technologys')->with('message', '刪除成功！');
    }
}

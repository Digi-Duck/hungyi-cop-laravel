<?php

namespace App\Http\Controllers;

use App\TechnologyBlocks;
use App\TechnologyDetails;
use App\TechnologyZones;
use Illuminate\Http\Request;

class TechnologyBlocksController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.technologys_blocks.index';
        $this->create = 'admin.technologys_blocks.create';
        $this->edit = 'admin.technologys_blocks.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($zones_id)
    {
        //
        $zone = TechnologyZones::find($zones_id);
        $lists = TechnologyBlocks::where('zones_id', $zone->id)->orderByDesc('sort')->get();
        $details = TechnologyDetails::orderByDesc('sort')->get();
        return view($this->index, compact('lists', 'zone', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($zones_id)
    {
        //
        $zone = TechnologyZones::find($zones_id);

        return view($this->create, compact('zone'));
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
        $new_record = new TechnologyBlocks();
        $new_record->sort = $request->sort;
        $new_record->title = $request->title;
        $new_record->style = $request->style;
        $new_record->zones_id = $request->zones_id;
        $new_record->save();
        return redirect('admin/technologys_blocks/'.$request->zones_id)->with('message', '新增成功！');
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
        $list = TechnologyBlocks::find($id);
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
        $old_record = TechnologyBlocks::find($id);
        $old_record->sort = $request->sort;
        $old_record->title = $request->title;
        $old_record->style = $request->style;
        $old_record->save();

        return redirect('admin/technologys_blocks/'.$old_record->zones_id)->with('message', '編輯成功！');
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
        $block = TechnologyBlocks::find($id);

        $hasDetail = TechnologyDetails::where('blocks_id' , $id)->count();
        if($hasDetail)
            return redirect('admin/technologys_blocks/'.$block->zones_id)->with('message', '目前 '.$block->title.' 內尚有 '.$hasDetail.' 個內容項目，請先刪除剩餘內容項目，才能刪除本區塊！');
        else
            $block->delete();

        return redirect('admin/technologys_blocks/'.$block->zones_id)->with('message', '刪除成功！');
    }
}

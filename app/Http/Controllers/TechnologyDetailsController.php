<?php

namespace App\Http\Controllers;

use App\TechnologyBlocks;
use App\TechnologyDetails;
use App\TechnologyZones;
use Illuminate\Http\Request;

class TechnologyDetailsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.technologys_details.index';
        $this->create = 'admin.technologys_details.create';
        $this->edit = 'admin.technologys_details.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($block_id)
    {
        //
        $block = TechnologyBlocks::find($block_id);
        $zone_id = $block->id;
        $zone = TechnologyZones::find($zone_id);
        return view($this->create, compact('block', 'zone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($block_id)
    {
        //
        $block = TechnologyBlocks::find($block_id);
        $zone_id = $block->zones_id;
        $zone = TechnologyZones::find($zone_id);
        return view($this->create, compact('block', 'zone'));
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
        $new_record = new TechnologyDetails();
        $new_record->sort = $request->sort;
        $new_record->title = $request->title;
        $new_record->content = $request->content;
        if ($request->hasFile('img')) {
            $files = $request->file('img')[0];
            $new_record->imgs = FilesController::imgZipUpload($request->file('img')[0], 'technologys_details_img', 1363, null, False);
        }
        $new_record->zones_id = $request->zones_id;
        $new_record->blocks_id = $request->blocks_id;
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
        $list = TechnologyDetails::find($id);
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
        $old_record = TechnologyDetails::find($id);
        $old_record->sort = $request->sort;
        $old_record->title = $request->title;
        $old_record->content = $request->content;
        if ($request->hasFile('img')) {
            FilesController::deleteUpload($old_record->imgs);
            $old_record->imgs = FilesController::imgZipUpload($request->file('img')[0], 'technologys_details_img', 1363, null, False);
        }
        $old_record->save();
        return redirect('admin/technologys_blocks/'.$old_record->zones_id)->with('message', '更新成功');
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
        $old_record = TechnologyDetails::find($id);
        $zone_id = $old_record->zones_id;
        FilesController::deleteUpload($old_record->imgs);
        $old_record->delete();
        return redirect('/admin/technologys_blocks/'.$zone_id)->with('message','刪除成功!');
    }
}

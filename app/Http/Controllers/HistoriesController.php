<?php

namespace App\Http\Controllers;

use App\Histories;
use Illuminate\Http\Request;

class HistoriesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.histories.index';
        $this->create = 'admin.histories.create';
        $this->edit = 'admin.histories.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = Histories::all();
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
        $new_record = new Histories();
        $new_record->year  = $request->year;
        $new_record->event  = $request->event;
        $new_record->capital = $request->capital;
        $new_record->address  = $request->address;
        $new_record->engineering  = $request->engineering;
        if ($request->hasFile('img')) {
            $files = $request->file('img')[0];
            $new_record->img = FilesController::imgUpload($files, 'award_img');
        }
        $new_record->save();

        return redirect('/admin/histories')->with('message', '新增成功!');
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
        $list = Histories::find($id);
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
        $list = Histories::find($id);
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
        $old_record = Histories::find($id);
        $old_record->year = $request->year;
        $old_record->event = $request->event;
        $old_record->capital = $request->capital;
        $old_record->address = $request->address;
        $old_record->engineering = $request->engineering;
        if ($request->hasFile('img')) {
            FilesController::deleteUpload($old_record->img);
            $old_record->img = FilesController::imgUpload($request->file('img')[0], 'award_img');
        }
        $old_record->save();
        return redirect('/admin/histories')->with('message','更新成功!');
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
        $old_record = Histories::find($id);
        FilesController::deleteUpload($old_record->img);
        $old_record->delete();
        return redirect('/admin/award_stories')->with('message', '刪除成功!');
    }
}

<?php

namespace App\Http\Controllers;

use App\SafetyMinutes;
use Illuminate\Http\Request;

class SafetyMinutesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.safety_minutes.index';
        $this->create = 'admin.safety_minutes.create';
        $this->edit = 'admin.safety_minutes.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = SafetyMinutes::all()->sortByDesc('sort');
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
        $new_record = new SafetyMinutes();
        if($request->hasFile('attachments')){
            $saveFile = FilesController::fileUpload($request->file('attachments')[0], 'safety_minutes_file');
            $new_record->file = $saveFile->path;
            $new_record->name = $saveFile->name;
        }
        $new_record->sort  = $request->sort;
        $new_record->save();
        return redirect('/admin/safety_minutes')->with('message','新增成功!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = SafetyMinutes::find($id);
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
        $list = SafetyMinutes::find($id);
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
        $old_record = SafetyMinutes::find($id);
        if($request->hasFile('attachments')){
            FilesController::deleteUpload($old_record->file);
            $saveFile = FilesController::fileUpload($request->file('attachments')[0], 'safety_minutes_file');
            $old_record->file = $saveFile->path;
            $old_record->name = $saveFile->name;
        }
        $old_record->sort  = $request->sort;
        $old_record->save();
        return redirect('/admin/safety_minutes')->with('message','更新成功!');
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
        $old_record = SafetyMinutes::find($id);
        FilesController::deleteUpload($old_record->file);
        $old_record->delete();
        return redirect('/admin/safety_minutes')->with('message','刪除成功!');
    }
}

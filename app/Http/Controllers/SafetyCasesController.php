<?php

namespace App\Http\Controllers;

use App\SafetyCases;
use Illuminate\Http\Request;

class SafetyCasesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.safety_cases.index';
        $this->create = 'admin.safety_cases.create';
        $this->edit = 'admin.safety_cases.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = SafetyCases::all()->sortByDesc('sort');
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
        $new_record = new SafetyCases();
        if($request->hasFile('attachments')){
            $saveFile = FilesController::fileUpload($request->file('attachments')[0], 'safety_cases_file');
            $new_record->file = $saveFile->path;
            $new_record->name = $saveFile->name;
        }
        $new_record->sort  = $request->sort;
        $new_record->save();
        return redirect('/admin/safety_cases')->with('message','新增成功!');
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
        $list = SafetyCases::find($id);
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
        $list = SafetyCases::find($id);
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
        $old_record = SafetyCases::find($id);
        if($request->hasFile('attachments')){
            FilesController::deleteUpload($old_record->file);
            $saveFile = FilesController::fileUpload($request->file('attachments')[0], 'safety_cases_file');
            $old_record->file = $saveFile->path;
            $old_record->name = $saveFile->name;
        }
        $old_record->sort  = $request->sort;
        $old_record->save();
        return redirect('/admin/safety_cases')->with('message','更新成功!');
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
        $old_record = SafetyCases::find($id);
        FilesController::deleteUpload($old_record->file);
        $old_record->delete();
        return redirect('/admin/safety_cases')->with('message','刪除成功!');
    }
}

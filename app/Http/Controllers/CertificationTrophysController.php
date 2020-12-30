<?php

namespace App\Http\Controllers;

use App\CertificationTrophys;
use Illuminate\Http\Request;

class CertificationTrophysController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.certification_trophys.index';
        $this->create = 'admin.certification_trophys.create';
        $this->edit = 'admin.certification_trophys.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = CertificationTrophys::all();
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
        $new_record = new CertificationTrophys();
        $new_record->title  = $request->title;
        $new_record->award_date  = $request->award_date;
        $new_record->content = $request->content;
        $new_record->sort  = $request->sort;
        if ($request->hasFile('img')) {
            $files = $request->file('img')[0];
            $new_record->img = FilesController::imgUpload($files, 'certification_img');
        }
        $new_record->save();

        return redirect('/admin/certification_trophys')->with('message', '新增成功!');
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
        $list = CertificationTrophys::find($id);
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
        $list = CertificationTrophys::find($id);
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
        $old_record = CertificationTrophys::find($id);
        $old_record->title = $request->title;
        $old_record->content = $request->content;
        $old_record->award_date = $request->award_date;
        $old_record->sort = $request->sort;
        if ($request->hasFile('img')) {
            FilesController::deleteUpload($old_record->img);
            $old_record->img = FilesController::imgUpload($request->file('img')[0], 'award_img');
        }
        $old_record->save();
        return redirect('/admin/certification_trophys')->with('message','更新成功!');
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
        $old_record = CertificationTrophys::find($id);
        FilesController::deleteUpload($old_record->img);
        $old_record->delete();
        return redirect('/admin/certification_trophys')->with('message', '刪除成功!');
    }
}

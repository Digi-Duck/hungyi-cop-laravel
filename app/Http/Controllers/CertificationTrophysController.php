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
        if ($request->img) {
            $new_record->img = FilesController::imgCropper($request->img, 'certification_img');
        } else {
            $new_record->img = '/img/404/noimg.png';
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
        if ($request->img) {
            if ($old_record->img != '/img/404/noimg.png') {
                FilesController::deleteUpload($old_record->img);
            }
            $old_record->img = FilesController::imgCropper($request->img, 'certification_img');
        }
        $old_record->save();
        return redirect('/admin/certification_trophys')->with('message', '更新成功!');
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
        if ($old_record->img != '/img/404/noimg.png')
            FilesController::deleteUpload($old_record->img);
        $old_record->delete();
        return redirect('/admin/certification_trophys')->with('message', '刪除成功!');
    }
}

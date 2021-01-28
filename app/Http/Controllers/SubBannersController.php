<?php

namespace App\Http\Controllers;

use App\SubBanners;
use Illuminate\Http\Request;

class SubBannersController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.sub_banners.index';
        $this->create = 'admin.sub_banners.create';
        $this->edit = 'admin.sub_banners.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = SubBanners::get();
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
        $list = SubBanners::find($id);
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
        $old_record = SubBanners::find($id);
        $img_path = mb_substr($old_record->img, 0, 4);
        if ($request->img) {
            if ($img_path != 'img/') {
                FilesController::deleteUpload($old_record->img);
            }

            $old_record->img = FilesController::imgCropper($request->img, 'subbanner_img');
        }
        $old_record->save();

        return redirect('admin/sub_banners')->with('message', '更新成功！');
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

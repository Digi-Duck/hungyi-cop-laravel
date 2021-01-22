<?php

namespace App\Http\Controllers;

use App\SecurityPolities;
use Illuminate\Http\Request;

class SecurityPolitiesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.security_polities.index';
        $this->create = 'admin.security_polities.create';
        $this->edit = 'admin.security_polities.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = SecurityPolities::get();
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
        $new_record = new SecurityPolities();
        $new_record->sort = $request->sort;
        $new_record->orange_text = $request->orange_text;
        $new_record->blue_text = $request->blue_text;
        $new_record->save();

        return redirect('admin/security_polities')->with('message', '新增成功！');
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
        $list = SecurityPolities::find($id);
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
        $old_record = SecurityPolities::find($id);
        $old_record->sort = $request->sort;
        $old_record->orange_text = $request->orange_text;
        $old_record->blue_text = $request->blue_text;
        $old_record->save();

        return redirect('/admin/security_polities')->with('message', '更新成功!');
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
        $old_record = SecurityPolities::find($id);
        $old_record->delete();
        return redirect('/admin/security_polities')->with('message', '刪除成功');
    }
}

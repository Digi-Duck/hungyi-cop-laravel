<?php

namespace App\Http\Controllers;

use App\Cctvs;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CctvsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.cctvs.index';
        $this->show = 'admin.cctvs.show';
        $this->create = 'admin.cctvs.create';
        $this->edit = 'admin.cctvs.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            $lists = Cctvs::all();
        } else {
            $lists = Cctvs::where('assign_names', 'like', '%'.Auth::user()->name.'%')->get();
        }

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
        $names = User::all();
        return view($this->create, compact('names'));
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
        $input = $request->all();
        $input['assign_names'] = implode(',', $request->input('assign_names'));
        Cctvs::create($input);
        return redirect('/admin/cctvs')->with('message','新增成功!');
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
        $list = Cctvs::find($id);
        $names = User::all();
        $assign_name = explode(',', $list->assign_names);
        return view($this->show, compact('list', 'names', 'assign_name'));
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
        $list = Cctvs::find($id);
        $assign_name = explode(',', $list->assign_names);
        $names = User::all();
        return view($this->edit, compact('list', 'names', 'assign_name'));
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
        $input = $request->all();
        // dd($input['assign_names']);
        $input['assign_names'] = implode(',', $request->input('assign_names'));
        Cctvs::find($id)->update($input);

        return redirect('/admin/cctvs')->with('message','更新成功!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cctv = Cctvs::find(1);
        $cctv->delete();

        return redirect('/admin/cctvs')->with('message','刪除成功!');
    }
}

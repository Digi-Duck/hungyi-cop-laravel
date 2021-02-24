<?php

namespace App\Http\Controllers;

use App\ProjectManagements;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectManagementsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.project_managements.index';
        $this->show = 'admin.project_managements.show';
        $this->create = 'admin.project_managements.create';
        $this->edit = 'admin.project_managements.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Gate::allows('admin')) {
            $lists = ProjectManagements::all();
        } else {
            $lists = ProjectManagements::where('assign_names', 'like', '%'.Auth::user()->name.'%')->get();
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

        if($request->input('assign_names'))
            $input['assign_names'] = implode(',', $request->input('assign_names'));

        if ($request->img)
            $input['img'] = FilesController::imgCropper($request->img, 'project_managements_img');
        else
            $input['img'] = '';

        ProjectManagements::create($input);
        return redirect('/admin/project_managements')->with('message','新增成功!');
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
        $list = ProjectManagements::find($id);
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
        $list = ProjectManagements::find($id);
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
        $old_record = ProjectManagements::find($id);
        $input = $request->all();
        if($request->input('assign_names'))
            $input['assign_names'] = implode(',', $request->input('assign_names'));

        if ($request->img)
            $input['img'] = FilesController::imgCropper($request->img, 'project_managements_img');
        else
            $input['img'] = $old_record->img;

        $old_record->update($input);

        return redirect('/admin/project_managements')->with('message','更新成功!');
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
        $old_record = ProjectManagements::find($id);
        FilesController::deleteUpload($old_record->img);
        $old_record->delete();
        return redirect('/admin/project_managements/')->with('message', '刪除成功!');
    }
}

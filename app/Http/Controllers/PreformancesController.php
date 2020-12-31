<?php

namespace App\Http\Controllers;

use App\Preformances;
use App\PreformancesImgs;
use Illuminate\Http\Request;

class PreformancesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.preformances.index';
        $this->create = 'admin.preformances.create';
        $this->edit = 'admin.preformances.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $lists = Preformances::all();

        return view($this->index, compact('lists', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view($this->create, compact('id'));
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
        $id = $request->id;
        $new_record = new Preformances;
        $new_record->title  = $request->title;
        $new_record->preformances_date  = $request->preformances_date;
        $new_record->location  = $request->location;
        $new_record->funds  = $request->funds;
        $new_record->content = $request->content;
        $new_record->sort  = $request->sort;
        $new_record->type_id = $id;
        $new_record->view_times = 0;
        if ($request->hasFile('img')) {
            $files = $request->file('img')[0];
            $new_record->imgs = FilesController::imgUpload($files, 'preformances_img');
        }
        $new_record->save();
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');

            foreach ($files as $file) {
                $path = FilesController::imgUpload($file, 'preformances_img');
                $query = new PreformancesImgs;
                $query->preformances_id = $new_record->id;
                $query->img = $path;
                $query->save();
            }
        }

        return redirect('/admin/performances/'.$id)->with('message', '新增成功!');
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

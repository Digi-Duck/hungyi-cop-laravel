<?php

namespace App\Http\Controllers;

use App\Performances;
use App\PerformancesImgs;
use Illuminate\Http\Request;

class PerformancesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.performances.index';
        $this->create = 'admin.performances.create';
        $this->edit = 'admin.performances.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $lists = Performances::all();

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
        $new_record = new Performances;
        $new_record->title  = $request->title;
        $new_record->performances_date  = $request->performances_date;
        $new_record->location  = $request->location;
        $new_record->funds  = $request->funds;
        $new_record->content = $request->content;
        $new_record->sort  = $request->sort;
        $new_record->type_id = $id;
        $new_record->view_times = 0;
        if ($request->hasFile('img')) {
            $files = $request->file('img')[0];
            $new_record->imgs = FilesController::imgUpload($files, 'performances_img');
        }
        $new_record->save();
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');

            foreach ($files as $file) {
                $path = FilesController::imgUpload($file, 'performances_img');
                $query = new PerformancesImgs;
                $query->performances_id = $new_record->id;
                $query->img = $path;
                $query->save();
            }
        }

        return redirect('/admin/performances/' . $id)->with('message', '新增成功!');
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
        $list = Performances::find($id);
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
        $list = Performances::find($id);
        $type = '實績';
        if ($list->type_id == 1)
            $type = '土木工程';
        elseif ($list->type_id == 2)
            $type = '環保工程';
        elseif ($list->type_id == 3)
            $type = '建築工程';
        elseif ($list->type_id == 4)
            $type = '其他';

        return view($this->edit, compact('list', 'type'));
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
        $old_record = Performances::find($id);
        $old_record->title  = $request->title;
        $old_record->content  = $request->content;
        $old_record->sort  = $request->sort;
        $old_record->location  = $request->location;
        $old_record->performances_date  = $request->performances_date;
        $old_record->funds  = $request->funds;
        if ($request->hasFile('img')) {
            FilesController::deleteUpload($old_record->imgs);
            $old_record->imgs = FilesController::imgUpload($request->file('img')[0], 'performances_img');
        }

        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                $path = FilesController::imgUpload($file, 'performances_img');
                $query = new PerformancesImgs();
                $query->performances_id = $old_record->id;
                $query->img = $path;
                $query->save();
            }
        }
        $old_record->save();
        return redirect('/admin/performances/'.$request->this_type_id)->with('message', '更新成功!');
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
        $old_record = Performances::find($id);
        $this_type_id = $old_record->type_id;
        FilesController::deleteUpload($old_record->imgs);

        $old_imgs = PerformancesImgs::where('performances_id',$id)->get();
        foreach ($old_imgs as $old_img) {
            FilesController::deleteUpload($old_img->img);
        }
        $old_record->delete();
        return redirect('/admin/performances/'.$this_type_id)->with('message','刪除成功!');
    }

    public function deleteFile(Request $request)
    {
        if($request->type == 'img'){
            $img = PerformancesImgs::find($request->id);
            $old_img = $img->img;
            FilesController::deleteUpload($old_img);
            $img->delete();
            return "success";
        }

        return "fail";
    }
}

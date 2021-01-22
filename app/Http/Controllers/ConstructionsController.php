<?php

namespace App\Http\Controllers;

use App\Constructions;
use App\ConstructionsImgs;
use Illuminate\Http\Request;

class ConstructionsController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.constructions.index';
        $this->create = 'admin.constructions.create';
        $this->edit = 'admin.constructions.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $lists = Constructions::all();
        return view($this->index, compact('lists', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
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
        $new_record = new Constructions;
        $new_record->title  = $request->title;
        $new_record->owner  = $request->owner;
        $new_record->duration  = $request->duration;
        $new_record->award_date  = $request->award_date;
        $new_record->start_date = $request->start_date;
        $new_record->complete_date = $request->complete_date;
        $new_record->price = $request->price;
        $new_record->scheduled_progress = $request->scheduled_progress;
        $new_record->actual_progress = $request->actual_progress;
        $new_record->youtube = $request->youtube;
        $new_record->sort  = $request->sort;
        $new_record->content = $request->content;
        $new_record->type_id = $id;
        $new_record->view_times = 0;
        if ($request->img) {
            $new_record->imgs = FilesController::imgCropper($request->img, 'constructions_img');
        } else {
            $new_record->imgs = '/img/404/noimg.png';
        }
        $new_record->save();
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');

            foreach ($files as $file) {
                $path = FilesController::imgZipUpload($file, 'constructions_img', 1110, 540, false);
                $query = new ConstructionsImgs();
                $query->construction_id = $new_record->id;
                $query->img = $path;
                $query->save();
            }
        }

        return redirect('/admin/constructions/' . $id)->with('message', '新增成功!');
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
        $list = Constructions::find($id);
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
        $list = Constructions::find($id);
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
        $old_record = Constructions::find($id);
        $old_record->title  = $request->title;
        $old_record->content  = $request->content;
        $old_record->sort  = $request->sort;
        $old_record->owner  = $request->owner;
        $old_record->duration  = $request->duration;
        $old_record->award_date  = $request->award_date;
        $old_record->start_date  = $request->start_date;
        $old_record->complete_date  = $request->complete_date;
        $old_record->scheduled_progress  = $request->scheduled_progress;
        $old_record->actual_progress  = $request->actual_progress;
        $old_record->youtube  = $request->youtube;
        if ($request->img) {
            if ($old_record->img != '/img/404/noimg.png') {
                FilesController::deleteUpload($old_record->imgs);
            }
            $old_record->imgs = FilesController::imgCropper($request->img, 'constructions_img');
        }

        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                $path = FilesController::imgZipUpload($file, 'constructions_img', 1110, 540, false);
                $query = new ConstructionsImgs();
                $query->construction_id = $old_record->id;
                $query->img = $path;
                $query->save();
            }
        }
        $old_record->save();
        return redirect('/admin/constructions/' . $request->this_type_id)->with('message', '更新成功!');
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
        $old_record = Constructions::find($id);
        $this_type_id = $old_record->type_id;
        FilesController::deleteUpload($old_record->imgs);

        $old_imgs = ConstructionsImgs::where('construction_id', $id)->get();
        foreach ($old_imgs as $old_img) {
            FilesController::deleteUpload($old_img->img);
        }
        $old_record->delete();
        return redirect('/admin/constructions/' . $this_type_id)->with('message', '刪除成功!');
    }

    public function deleteFile(Request $request)
    {
        if ($request->type == 'img') {
            $img = ConstructionsImgs::find($request->id);
            $old_img = $img->img;
            FilesController::deleteUpload($old_img);
            $img->delete();
            return "success";
        }

        return "fail";
    }
}

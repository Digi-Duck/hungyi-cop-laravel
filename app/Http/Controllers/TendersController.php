<?php

namespace App\Http\Controllers;

use App\Tenders;
use App\TendersImgs;
use Illuminate\Http\Request;

class TendersController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.tenders.index';
        $this->create = 'admin.tenders.create';
        $this->edit = 'admin.tenders.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = Tenders::all();
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
        //
        $new_record = new Tenders();
        $new_record->title  = $request->title;
        $new_record->tender_date  = $request->tender_date;
        $new_record->content = $request->content;
        $new_record->sort  = $request->sort;
        $new_record->view_times = 0;
        if ($request->hasFile('img')) {
            $files = $request->file('img')[0];
            $new_record->imgs = FilesController::imgUpload($files, 'tender_img');
        }
        $new_record->save();
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');

            foreach ($files as $file) {
                $path = FilesController::imgUpload($file, 'tender_img');
                $query = new TendersImgs;
                $query->tender_id = $new_record->id;
                $query->img = $path;
                $query->save();
            }
        }

        return redirect('/admin/tenders')->with('message', '新增成功!');
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
        $list = Tenders::find($id);
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
        $list = Tenders::find($id);
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
        $old_record = Tenders::find($id);
        $old_record->title  = $request->title;
        $old_record->content  = $request->content;
        $old_record->sort  = $request->sort;
        if ($request->hasFile('img')) {
            FilesController::deleteUpload($old_record->imgs);
            $old_record->imgs = FilesController::imgUpload($request->file('img')[0], 'tender_img');
        }

        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                $path = FilesController::imgUpload($file, 'tender_img');
                $query = new TendersImgs();
                $query->tender_id = $old_record->id;
                $query->img = $path;
                $query->save();
            }
        }
        $old_record->save();
        return redirect('/admin/tenders')->with('message','更新成功!');
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
        $old_record = Tenders::find($id);
        FilesController::deleteUpload($old_record->img);

        $old_imgs = TendersImgs::where('tender_id',$id)->get();
        foreach ($old_imgs as $old_img) {
            FilesController::deleteUpload($old_img->img);
        }
        $old_record->delete();
        return redirect('/admin/tenders')->with('message','刪除成功!');
    }

    public function deleteFile(Request $request)
    {
        if($request->type == 'img'){
            $img = TendersImgs::find($request->id);
            $old_img = $img->img;
            FilesController::deleteUpload($old_img);
            $img->delete();
            return "success";
        }

        return "fail";
    }
}

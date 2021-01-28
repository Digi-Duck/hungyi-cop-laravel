<?php

namespace App\Http\Controllers;

use App\AwardStories;
use App\AwardStoriesImgs;
use Illuminate\Http\Request;

class AwardStoriesController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.award_stories.index';
        $this->create = 'admin.award_stories.create';
        $this->edit = 'admin.award_stories.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = AwardStories::all();
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
        $new_record = new AwardStories();
        $new_record->title  = $request->title;
        $new_record->award_date  = $request->award_date;
        $new_record->content = $request->content;
        $new_record->sort  = $request->sort;
        if ($request->img) {
            $new_record->img = FilesController::imgCropper($request->img, 'award_img');
        } else {
            $new_record->img = '/img/404/noimg.png';
        }
        $new_record->save();
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');

            foreach ($files as $file) {
                $path = FilesController::imgZipUpload($file, 'award_img', 800, 540, false);
                $query = new AwardStoriesImgs();
                $query->award_stories_id = $new_record->id;
                $query->img = $path;
                $query->save();
            }
        }

        return redirect('/admin/award_stories')->with('message', '新增成功!');
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
        $list = AwardStories::find($id);
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
        $list = AwardStories::find($id);
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
        $old_record = AwardStories::find($id);
        $old_record->title = $request->title;
        $old_record->content = $request->content;
        $old_record->award_date = $request->award_date;
        $old_record->sort = $request->sort;
        if ($request->img) {
            if ($old_record->img != '/img/404/noimg.png') {
                FilesController::deleteUpload($old_record->img);
            }
            $old_record->img = FilesController::imgCropper($request->img, 'award_img');
        }
        if ($request->hasFile('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                $path = FilesController::imgZipUpload($file, 'award_img', 800, 540, false);
                $query = new AwardStoriesImgs();
                $query->award_stories_id = $old_record->id;
                $query->img = $path;
                $query->save();
            }
        }
        $old_record->save();
        return redirect('/admin/award_stories')->with('message', '更新成功!');
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
        $old_record = AwardStories::find($id);
        if ($old_record->img != '/img/404/noimg.png')
            FilesController::deleteUpload($old_record->img);

        $old_imgs = AwardStoriesImgs::where('award_stories', $old_record->id);
        foreach ($old_imgs as $old_img) {
            FilesController::deleteUpload($old_img->img);
            $old_img->delete();
        }

        $old_record->delete();
        return redirect('/admin/award_stories')->with('message', '刪除成功!');
    }

    public function deleteFile(Request $request)
    {
        if ($request->type == 'img') {
            $img = AwardStoriesImgs::find($request->id);
            $old_img = $img->img;
            FilesController::deleteUpload($old_img);
            $img->delete();
            return "success";
        }

        return "fail";
    }
}

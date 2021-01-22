<?php

namespace App\Http\Controllers;

use App\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    function __construct()
    {
        $this->redirect = '/admin';
        $this->index = 'admin.contactus.index';
        $this->create = 'admin.contactus.create';
        $this->edit = 'admin.contactus.edit';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = Contactus::all();
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
        if (!isset($_SESSION)) {
            session_start();
        }  //判斷session是否已啟動

        if ((!empty($_SESSION['check_word'])) && (!empty($_POST['checkword']))) {  //判斷此兩個變數是否為空

            if ($_SESSION['check_word'] == $_POST['checkword']) {

                $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值

                $new_record = new Contactus();
                $new_record->name = $request->name;
                $new_record->email = $request->email;
                $new_record->phone = $request->phone;
                $new_record->content = $request->content;
                $new_record->save();

                return redirect()->back()->with('message', 'success');

            } else {
                return redirect()->back()->with('message', 'error');
            }
        }
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
        $old_record = Contactus::find($id);
        $old_record->delete();
        return redirect('/admin/contactus')->with('message', '刪除成功!');
    }
}

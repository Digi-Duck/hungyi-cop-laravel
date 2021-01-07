<?php

namespace App\Http\Controllers;

use App\Constructions;
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
        $lists = Constructions::where('type_id', $id);
        return view($this->index, compact('lists', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Constructions  $constructions
     * @return \Illuminate\Http\Response
     */
    public function show(Constructions $constructions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Constructions  $constructions
     * @return \Illuminate\Http\Response
     */
    public function edit(Constructions $constructions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Constructions  $constructions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constructions $constructions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Constructions  $constructions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constructions $constructions)
    {
        //
    }
}

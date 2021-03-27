<?php

namespace App\Http\Controllers;

use App\BookManagement;
use Illuminate\Http\Request;

class BookManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookManagement  $bookManagement
     * @return \Illuminate\Http\Response
     */
    public function show(BookManagement $bookManagement)
    {
           return view('BookManagement_show')-> with('bookArray', BookManagement::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookManagement  $bookManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(BookManagement $bookManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookManagement  $bookManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookManagement $bookManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookManagement  $bookManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookManagement $bookManagement, $id)
    {
        BookManagement::destroy(array('id',$id));
        return redirect('BookManagement_show');
    }
}

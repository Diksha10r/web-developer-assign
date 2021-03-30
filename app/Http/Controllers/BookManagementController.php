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
        
        return view('BookManagement_showbook')-> with('bookArray', BookManagement::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BookManagement_addbook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
         $this->validate($request,[
            'bookname'=> 'required',
            'bookauthor'=> 'required'
            
        ]);

        $storebook = new BookManagement;
        $storebook->bookname=$request->input('bookname');
        $storebook->bookauthor=$request->input('bookauthor');
        
        $storebook->save();
        $request->session()->flash('msg','Data added successfully!');
        return redirect('/');
   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookManagement  $bookManagement
     * @return \Illuminate\Http\Response
     */
    public function show(BookManagement $bookManagement)
    {
           //return view('BookManagement_show')-> with('bookArray', BookManagement::all());
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
        return redirect('/');
    }
}

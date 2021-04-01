<?php

namespace App\Http\Controllers;

use App\BookManagement;
use Illuminate\Http\Request;

use App\Exports\BookExport;
use App\Exports\BooknameExport;
use App\Exports\BookauthorExport;
use Maatwebsite\Excel\Facades\Excel;


class BookManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {   
        
        return view('BookManagement_showAndAddbook')-> with('bookArray', BookManagement::all());
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
           //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookManagement  $bookManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(BookManagement $bookManagement, $id)
    {
        return view('BookManagement_editbook')-> with('bookArray', BookManagement::find($id));
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
        $this->validate($request,[
            'bookname'=> 'required',
            'bookauthor'=> 'required'
            
        ]);
        $storebook = BookManagement::find($request->id);
        $storebook->bookname=$request->input('bookname');
        $storebook->bookauthor=$request->input('bookauthor');
        
        $storebook->save();
        $request->session()->flash('msg','Data updated successfully!');
        return redirect('/');

        
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


    public function export(Request $request){

        if ($request->input('exportexcel') != null ){
           return Excel::download(new BookExport, 'allbookDetails.xlsx');
        }
   
        if ($request->input('exportallcsv') != null ){
           return Excel::download(new BookExport, 'allbookDetails.csv');
        }
        
        if ($request->input('exportbooknamescsv') != null ){

            return Excel::download(new BooknameExport, 'booknamesList.csv');
        }

        if ($request->input('exportbookauthorscsv') != null ){

            return Excel::download(new BookauthorExport, 'bookauthorsList.csv');
        }

        
        return redirect()->action('BookManagementController@index');
      }

}

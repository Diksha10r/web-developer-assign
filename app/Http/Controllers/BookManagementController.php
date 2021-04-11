<?php

namespace App\Http\Controllers;

use App\BookManagement;
use Illuminate\Http\Request;

use App\Exports\BookExport;
use App\Exports\BooknameExport;
use App\Exports\BookauthorExport;

use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDO; 
use DOMDocument;



include('C:\Users\diksha\web-developer-assignment\vendor\spatie\array-to-xml\src\ArrayToXml.php');

class BookManagementController extends Controller
{
    
    public function index()
    {   
        
        return view('BookManagement_showAndAddbook')-> with('bookArray', BookManagement::all());
        // $books = DB::select('select * from book_management');
        // return view('BookManagement_showAndAddbook',['bookArray'=>$books]);
    }

    public function create()
    {
        //
    }

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
        $request->session()->flash('message','Data added successfully!');
        return redirect('/');
   

    }

    public function show(BookManagement $bookManagement)
    {
           //
    }

    public function edit(BookManagement $bookManagement, $id)
    {
        return view('BookManagement_editbook')-> with('bookArray', BookManagement::find($id));
    }

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
        $request->session()->flash('message','Data updated successfully!');
        return redirect('/');

        
    }

    public function destroy(BookManagement $bookManagement, $id)
    {
        BookManagement::destroy(array('id',$id));
        return redirect('/');
       // DB::delete('delete from book_management where id = ?',[$id]);
       // return redirect('/');
    }


    public function export(Request $request){

   
        if ($request->input('exportallcsv') != null ){
           return Excel::download(new BookExport, 'allbookDetails.csv');
        }
        
        if ($request->input('exportbooknamescsv') != null ){

            return Excel::download(new BooknameExport, 'booknamesList.csv');
        }

        if ($request->input('exportbookauthorscsv') != null ){

            return Excel::download(new BookauthorExport, 'bookauthorsList.csv');
        }
        
        if ($request->input('exportallxlsx') != null ){
            return Excel::download(new BookExport, 'allbookDetails.xlsx');
        }
        
         if ($request->input('exportbooknamesxlsx') != null ){
            return Excel::download(new BooknameExport, 'booknamesList.xlsx');
        }
        
         if ($request->input('exportbookauthorsxlsx') != null ){
            return Excel::download(new BookauthorExport, 'bookauthorsList.xlsx');
        }

         if ($request->input('exportallxml') != null ){

            function createXML($data) 
            {    
                $title = $data['title'];
                $rowCount = count($data['books']);
                
                //create the xml document
                $xmlDoc = new DOMDocument();
                
                $root = $xmlDoc->appendChild($xmlDoc->createElement("book_info"));
                $root->appendChild($xmlDoc->createElement("title",$title));
                $root->appendChild($xmlDoc->createElement("totalRows",$rowCount));
                $tabBooks = $root->appendChild($xmlDoc->createElement('rows'));
                
                foreach($data['books'] as $book)
                {   
                    if(!empty($book))
                    {
                        $tabBook = $tabBooks->appendChild($xmlDoc->createElement('books'));
                        foreach($book as $key=>$val)
                        {    
                            $tabBook->appendChild($xmlDoc->createElement($key, $val));
                        }
                    }
                }
                
                header("Content-Type: text/plain");
                
                //make the output pretty
                $xmlDoc->formatOutput = true;
                
                //save xml file
                $file_name = str_replace(' ', '_',$title).'_'.time().'.xml';
                $xmlDoc->save("C:\Users\diksha\web-developer-assignment\XML_Book_Export_Files/" . $file_name);
                
                //return xml file name
                return $file_name;
                
            }
            $bookArray= BookManagement::all()->toArray();
            
            
            $data = array(
                'title' => 'Books Information',
                'books' => $bookArray
            );

            $display = createXML($data);
            $request->session()->flash('message',$display.' file downloaded successfully!');
          
        }

        if ($request->input('exportbooknamesxml') != null ){

            function createXML($data) 
            {    
                $title = $data['title'];
                $rowCount = count($data['booktitles']);
                
                //create the xml document
                $xmlDoc = new DOMDocument();
                
                $root = $xmlDoc->appendChild($xmlDoc->createElement("book_title"));
                $root->appendChild($xmlDoc->createElement("title",$title));
                $root->appendChild($xmlDoc->createElement("totalRows",$rowCount));
                $tabBookTitles = $root->appendChild($xmlDoc->createElement('rows'));
                
                foreach($data['booktitles'] as $bookTitle)
                {    
                    if(!empty($bookTitle))
                    {    
                        $tabBookTitle = $tabBookTitles->appendChild($xmlDoc->createElement('booknames'));
                        foreach($bookTitle as $key=>$val)
                        {    
                            $tabBookTitle->appendChild($xmlDoc->createElement($key, $val));
                        }
                    }
                }
                
                header("Content-Type: text/plain");
                
                //make the output pretty
                $xmlDoc->formatOutput = true;
                
                //save xml file
                $file_name = str_replace(' ', '_',$title).'_'.time().'.xml';
                $xmlDoc->save("C:\Users\diksha\web-developer-assignment\XML_Book_Export_Files/" . $file_name);
                
                //return xml file name
                return $file_name;
                
            }
            $bookTitleArray= BookManagement::get(['id','bookname'])->toArray();
            
            
            $data = array(
                'title' => 'Book Titles',
                'booktitles' => $bookTitleArray
            );

            $display = createXML($data);
            $request->session()->flash('message',$display.' file downloaded successfully!');
            
        }
         
        if ($request->input('exportbookauthorsxml') != null ){

            function createXML($data) 
            {   
                $title = $data['title'];
                $rowCount = count($data['bookauthors']);
                
                //create the xml document
                $xmlDoc = new DOMDocument();
                
                $root = $xmlDoc->appendChild($xmlDoc->createElement("book_author"));
                $root->appendChild($xmlDoc->createElement("title",$title));
                $root->appendChild($xmlDoc->createElement("totalRows",$rowCount));
                $tabBookAuthors = $root->appendChild($xmlDoc->createElement('rows'));
                
                foreach($data['bookauthors'] as $bookAuthor)
                {    
                    if(!empty($bookAuthor))
                    {    
                        $tabBookAuthor = $tabBookAuthors->appendChild($xmlDoc->createElement('bookauthors'));
                        foreach($bookAuthor as $key=>$val)
                        {    
                            $tabBookAuthor->appendChild($xmlDoc->createElement($key, $val));
                        }
                    }
                }
                
                header("Content-Type: text/plain");
                
                //make the output pretty
                $xmlDoc->formatOutput = true;
                
                //save xml file
                $file_name = str_replace(' ', '_',$title).'_'.time().'.xml';
                $xmlDoc->save("C:\Users\diksha\web-developer-assignment\XML_Book_Export_Files/" . $file_name);
                
                //return xml file name
                return $file_name;
                
            }

            $bookAuthorArray= BookManagement::get(['id','bookauthor'])->toArray();
            
            
            $data = array(
                'title' => 'Book Authors',
                'bookauthors' => $bookAuthorArray
            );

            $display = createXML($data);
            $request->session()->flash('message',$display.' file downloaded successfully!');
            

        }
         
        
        return redirect()->action('BookManagementController@index');
    }
      

      

}

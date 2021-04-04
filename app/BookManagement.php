<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class BookManagement extends Model
{
    public $timestamps = false;
    
    public static function getdetails(){

        $records = DB::table('book_management')->select('id','bookname','bookauthor')->get()->toArray();
   
        return $records;
      }

      public static function getbooknames(){

        $records = DB::table('book_management')->select('id','bookname')->orderBy('bookname', 'asc')->get()->toArray();
   
        return $records;
      }

      public static function getbookauthors(){

        $records = DB::table('book_management')->select('id','bookauthor')->orderBy('bookauthor', 'asc')->get()->toArray();
   
        return $records;
      }

    

}

<?php

namespace App\Exports;

use App\BookManagement;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array {
        return [
           "id","bookname","bookauthor"
        ];
      }

    public function collection()
    {   
        return collect(BookManagement::getdetails());
    }


}

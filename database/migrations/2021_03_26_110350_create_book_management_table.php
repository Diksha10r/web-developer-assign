<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookManagementTable extends Migration
{
    
    public function up()
    {
        Schema::create('book_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bookname');
            $table->string('bookauthor');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('book_management');
    }
}

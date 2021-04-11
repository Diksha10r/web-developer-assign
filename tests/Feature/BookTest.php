<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\BookManagement;
use Illuminate\Validation\ValidationException as ValidationException;
use DatabaseMigrations, DatabaseTransactions;

class BookTest extends TestCase
{   
    use RefreshDatabase; 
    
    /** @test */
    public function home_page_loads_correctly()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Book Title');
        $response->assertSee('Author');
    }

    
    /** @test */
    public function user_can_see_all_book_details()
    {
        
        $book = factory('App\BookManagement')->create();
        $response = $this->get('/'); 
        $response->assertSee($book->name);
    }

     /** @test */
    public function user_can_add_new_book_to_database()
    {
                
        $book = factory('App\BookManagement')->make();
        $this->post('/BookManagement_submit',$book->toArray());
        $this->assertEquals(1,BookManagement::all()->count());
    }

    /** @test */
    public function requires_a_book_title_in_the_form_to_add_book_details()
    {

        $book = factory('App\BookManagement')->make(['bookname' => null]);
        $this->post('/BookManagement_submit',$book->toArray())
            ->assertSessionHasErrors('bookname');
    }

    /** @test */
    public function requires_an_author_name_in_the_form_to_add_book_details()
    {

        $book = factory('App\BookManagement')->make(['bookauthor' => null]);
        $this->post('/BookManagement_submit',$book->toArray())
        ->assertSessionHasErrors('bookauthor');
    }


    /** @test */
    public function user_can_update_book_details()
    {
        $book = factory('App\BookManagement')->create();
        $book->bookname = "Updated Title";
        $book->bookauthor = "Updated Author";
 
        $this->post('BookManagement_update/'.$book->id, $book->toArray());
        $this->assertDatabaseHas('book_management',['id'=> $book->id , 'bookname' => 'Updated Title', 'bookauthor'=> 'Updated Author']);
    }

    /** @test */
    public function user_can_delete_a_book()
    {
        
        $book = factory('App\BookManagement')->create();
        $this->post('BookManagement_delete/'.$book->id); 
        $this->assertDatabaseMissing('book_management',['id'=> $book->id]);
    }
}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- in public folder -->
        <link rel="stylesheet" href="{{ URL::asset('css/stylesheet.css') }}" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <!--- in public folder -->
        <script type="text/javascript" src="{{ URL::asset('js/jsfile.js') }}"></script>
        
        
    </head>
    <body>
    
        <div class="container main-container">

            <center><div class="messagediv"><h6 class="messagetextstyle">{{session('message')}}</h6></div></center>
            <div class="container input-field-padding">
                <form action="BookManagement_submit" method="post" id="form">
                    {{ csrf_field() }}
                    <div class="d-grid gap-3 form-row">
                        <div class="p-2 col-sm-5">
                            <label class="sr-only" for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Book Title" name="bookname" required autofocus>
                        </div>
                        <div class="p-2 col-sm-5">
                            <label class="sr-only" for="author">Author</label>
                            <input type="text" class="form-control" id="author" placeholder="Enter Author Name" name="bookauthor" pattern="^[_A-z0-9]*((-|\s)*[_A-z0-9])*$" title="alphanumeric characters only" required>
                        </div>
                        <div class="p-2 col-sm-2">
                            <button class="form-control btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Add to List">ADD</button>
                            
                        </div>
                    </div>
                </form>
            </div>

            <hr />

            <div class="input-group d-flex justify-content-center top-margin">
                        <div class="form-outline">
                            <input onkeyup="search()" id="search-input" type="search" class="form-control" placeholder="Search Title or Author" />
                            <span class="fa fa-search search-icon-position"></span>
                        </div>
            </div>
            
            <div class="container table-size">
                <table  id="myTable" class="table table-hover" >
                    <colgroup>
                        <col span="1" style="width: 40%;">
                        <col span="1" style="width: 35%;">
                        <col span="1" style="width: 25%;">
                    </colgroup>

                    <thead class="thead-dark">
                        <tr>
                            <th onclick="sortTable(0);" scope="col">Book Title</th>
                            <th onclick="sortTable(1);" scope="col">Author</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $bookArray as $books)
                        <tr>
                            <td>{{$books->bookname}}</td>
                            <td>{{$books->bookauthor}}</td>
                            <td>
                                <a href="BookManagement_delete/{{$books->id}}" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete List Item" ><i class="fa fa-trash"></i></a>
                                <a href="BookManagement_editbook/{{$books->id}}" class="btn btn-warning"  title="Edit List Item"><i class="fa fa-edit"></i></a>    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
        
        <form method='post' action='/export'>
                {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-3"></div>
                
                <div class="dropdown  col-sm-2">
                    <button class="btn btn-secondary dropdown-toggle form-control" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CSV EXPORT
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <input type="submit" name="exportallcsv" class="dropdown-item btn-secondary exportbutton"  value="ENTIRE DATA">
                        <input type="submit" name="exportbooknamescsv" class="dropdown-item btn-secondary exportbutton"  value="ONLY BOOK NAMES">
                        <input type="submit" name="exportbookauthorscsv" class="dropdown-item btn-secondary exportbutton"  value="ONLY BOOK AUTHOR">
                    </div>
                </div>
                
                <div class="dropdown  col-sm-2">
                    <button class="btn btn-secondary dropdown-toggle form-control" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        EXCEL EXPORT
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                        <input type="submit" name="exportallxlsx" class="dropdown-item btn-secondary exportbutton"  value="ENTIRE DATA">
                        <input type="submit" name="exportbooknamesxlsx" class="dropdown-item btn-secondary exportbutton"  value="ONLY BOOK NAMES">
                        <input type="submit" name="exportbookauthorsxlsx" class="dropdown-item btn-secondary exportbutton"  value="ONLY BOOK AUTHOR">
                    </div>
                </div>

                <div class="dropdown  col-sm-2">
                    <button class="btn btn-secondary dropdown-toggle form-control" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        XML EXPORT
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                        <input type="submit" name="exportallxml" class="dropdown-item btn-secondary exportbutton"  value="ENTIRE DATA">
                        <input type="submit" name="exportbooknamesxml" class="dropdown-item btn-secondary exportbutton"  value="ONLY BOOK NAMES">
                        <input type="submit" name="exportbookauthorsxml" class="dropdown-item btn-secondary exportbutton"  value="ONLY BOOK AUTHOR">
                    </div>
                </div>
            </div> 
              
        </form>
    </body>
</html>

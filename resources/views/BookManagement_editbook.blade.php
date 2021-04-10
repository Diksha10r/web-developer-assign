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
             
            <div class="container main-container editPagecontainer shadow-lg p-3 mb-5 bg-white rounded">
                <center><h6 class="msgtextstyle">EDIT BOOK DETAILS</h6></center>
                <form method="post" action="{{route('BookManagement.update',[$bookArray->id])}}">
                    @csrf
                    <div class="form-group">
                        <label for="titleInput">Book Title</label>
                        <input type="text" name="bookname" class="form-control" id="titleInput" value="{{$bookArray->bookname}}" />
                    </div>
                    <div class="form-group">
                        <label for="authorInput">Author</label>
                        <input type="text" name="bookauthor" class="form-control" id="authorInput" value="{{$bookArray->bookauthor}}"/>
                    </div>   
                    <a  class="btn btn-secondary" data-dismiss="modal" href="/">Close</a>
                    <input type="submit" name="submit" class="btn btn-info"></a>               
                </form>
            </div>
    </body>
</html>

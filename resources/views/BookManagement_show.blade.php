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
       <!-- <div class="flex-center position-ref full-height">
            
        </div>-->
        <div class="container main-container">

            <div class="container input-field-padding">
                <form action="" method="GET" id="form">
                    <div class="d-grid gap-3 form-row">
                        <div class="p-2 col-sm-5">
                            <label class="sr-only" for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Book Title" name="title" required autofocus>
                        </div>
                        <div class="p-2 col-sm-5">
                            <label class="sr-only" for="author">Author</label>
                            <input type="text" class="form-control" id="author" placeholder="Enter Author Name" name="author" required>
                        </div>
                        <div class="p-2 col-sm-2">
                            <button onclick="return test();" type="submit" class="form-control btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Add to List">Add</button>
                        </div>
                    </div>
                </form>
            </div>

            <hr />

            <div class="container table-size">

                    <div class="input-group d-flex justify-content-center top-margin">
                        <div class="form-outline">
                            <input onkeyup="search()" id="search-input" type="search" class="form-control" placeholder="Search Title or Author" />
                            <span class="fa fa-search search-icon-position"></span>
                        </div>
                    </div>

                <table id="myTable" class="table table-hover">
                    <colgroup>
                        <col span="1" style="width: 40%;">
                        <col span="1" style="width: 35%;">
                        <col span="1" style="width: 25%;">
                    </colgroup>

                    <thead class="thead-dark">
                        <tr>
                            <th onclick="sortTable(0);" scope="col">Title</th>
                            <th onclick="sortTable(1);" scope="col">Author</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        <tr>
                            <td>The Coalition Years</td>
                            <td>Pranab Mukherjee</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete List Item"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit List Item"><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Two Lives</td>
                            <td>Vikram Seth</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete List Item"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit List Item"><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>India 2020: A Vision for the New Millennium</td>
                            <td>APJ Abdul Kalam</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete List Item"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit List Item"><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Obama: The Call of History</td>
                            <td>Peter Baker</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete List Item"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit List Item"><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Sridevi: Girl Woman Superstar</td>
                            <td>Satyarth Nayak</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete List Item"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit List Item"><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>My Journey</td>
                            <td>Dr. APJ Abdul Kalam</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete List Item"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit List Item"><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
      
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Search functionality - YouTube API test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

    <script>
        
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row align-items-center searchbar">
        <div class="container">
            <div class="row">
            <div class="col-12">
                <h1 class="text-center">Youtube API Search</h1>
                <form action="javascript:void(0)" method="POST" role="search" id="searchForm">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Search Youtube Videos"> 
                        <span class="input-group-btn">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Search</span>
                            </div>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
	
<div class="container-fluid d-none resultContainer">
    <div class="row">
        
    </div>
</div>

</body>
</html>
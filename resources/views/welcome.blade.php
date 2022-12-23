<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 Tags System Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        rel="stylesheet" />
    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }
        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
           <span class="navbar-text">Laravel 9 Tags</span>
        </div>
      </nav>
      <br>
    <div class="container">
       

       
        <div class="row">
            <div class="col-md-6">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                <h1>Add post</h1>
                
                <form action="{{ route('create-post') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" name="title_name" placeholder="Enter title" autocomplete="off">
                        @if ($errors->has('title_name'))
                        <span class="text-danger">{{ $errors->first('title_name') }}</span>
                        @endif
                    </div>
        
                    <div class="mb-3 mt-3">
                        <input class="form-control" type="text" data-role="tagsinput" name="tags">
                        @if ($errors->has('tags'))
                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                        @endif
                    </div>
                        <button class="btn btn-primary">Submit</button>
                    
                </form>
        
            </div>
            <div class="col-md-6">
                @foreach($posts as $key => $post)
                <h3>{{ $post->title_name }}</h3>
                <div class="mb-3">
                    <strong>Tag:</strong>
                    @foreach($post->tags as $tag)
                    <label class="label label-info">{{ $tag->name }}</label>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>

       
        
       
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
</body>
</html>
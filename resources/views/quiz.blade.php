<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question List</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container" style="margin-top:29px">
        <div class="row">
            <div class="col-md-12">
                <h2>Question List</h2>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
                <div style="margin-right: 10%; float:right">
                    <a class="btn btn-primary" href="{{url('add-question')}}">Add Question</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Type</th>
                    <th>Answer</th>
                    <th>Feedback</th>
                    <th>Action</th>


                    </tr>
                </thead>
                    <tbody>
                    @foreach ($data as $qst)
                        <tr>
                            <td>{{ $qst->id }}</td>
                            <td>{{ $qst->body }}</td>
                            <td>{{ $qst->type->name }}</td>
                            <td>{{ $qst->answer }}</td>
                            <td>{{ $qst->feedback }}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('view-question/'.$qst->id)}}">View</a>
                                <a class="btn btn-primary" href="{{url('edit-question/'.$qst->id)}}">Edit</a>
                                <a class="btn btn-danger" href="{{url('delete-question/'.$qst->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
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


<div class="card mt-4">
  <div class="card-header">
    #{{ $question->id }}
    {{ $question->body }}
  </div>
  <div class="card-body">
    <p class="card-text">Type: {{$question->type->name}}</p>
    @if ($question->type_id == 1)
    <p class="mcq card-text" style="display none">a) {{ $options->option1 }}
    b) {{ $options->option2 }}
    c) {{ $options->option3 }}
    d) {{ $options->option4 }}</p>
    @endif
    <p class="card-text">Answer: <b style="color:green">{{ $question->answer }}</b></p>
    <p class="card-text">Feedback: {{ $question->feedback }}</p>
    <a href="{{url('/')}}" class="btn btn-danger">Back</a>    

</div>
</div>
</body>
</html>


<script>
    if ($question->type_id == 1) {
        $('.mcq').show();
    }
    else {
        $('.mcq').hide();
    }

</script>
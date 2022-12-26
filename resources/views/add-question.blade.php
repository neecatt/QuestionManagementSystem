<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<div class="container" style="margin-top:29px">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Question</h2>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
                <form  action="{{url('add-question')}}" method="POST">
                    @csrf
                    <div class="md-3">
                        <label class="form-label" for="body">Question</label>
                        <input type="text" name="body" class="form-control" id="body" placeholder="Enter Question" value="{{old("body")}}">
                        @error('body')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
                    </div>
                    <!-- choose type for question -->
                    <div class="md-3">
                        <label class="form-label" for="type">Type</label>
                        <select class="type-form form-select" name="type" id="type">
                            @foreach($data_type as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option> 
                            @endforeach
                        </select>
                    </div>
                    <!-- end choose type for question -->
                   
                    <!-- MCQ -->
                      <div class="mcq md-3">
                        <label class="form-label" for="option1">Option 1</label>
                        <input type="text" name="option1" class="form-control" id="option1" placeholder="Enter Option 1" value="{{old("option1")}}">
                        @error('option1')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
                        <label class="form-label" for="option1">Option 2</label>
                        <input type="text" name="option2" class="form-control" id="option2" placeholder="Enter Option 2" value="{{old("option2")}}">
                        @error('option2')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
                        <label class="form-label" for="option1">Option 3</label>
                        <input type="text" name="option3" class="form-control" id="option3" placeholder="Enter Option 3" value="{{old("option3")}}">
                        @error('option3')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
                        <label class="form-label" for="option1">Option 4</label>
                        <input type="text" name="option4" class="form-control" id="option4" placeholder="Enter Option 4" value="{{old("option4")}}">
                        @error('option4')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
                        <label class="form-label" for="mcqanswer">Answer</label>
                        <select class="form-select" name="mcqanswer" id="mcqanswer">
                            <option value="Option1">Option 1</option>
                            <option value="Option2">Option 2</option>
                            <option value="Option3">Option 3</option>
                            <option value="Option4">Option 4</option>
                        </select>
                    </div> 
                    <!-- MCQ -->

                    <!-- True/False -->
                    <div class="true-false md-3" style="display:none">
                        <label class="form-label " for="truefalse">True/False</label>
                        <select class="form-select" name="truefalse" id="truefalse">
                            <option value="1">True</option>
                            <option value="0">False</option>
                        </select>
                    </div>
                    <!-- True/False -->   

                    <!-- Numeric -->
                    <div class="numeric md-3" style="display:none">
                        <label class="form-label" for="answer">Answer</label>
                        <input type="number" name="answer" class="form-control" id="answer" placeholder="Enter Answer" value="{{old("answer")}}">
                        @error('answer')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
                    </div>
                    <!-- Numeric -->

                    <!-- Text -->
                    <div class="text md-3" style="display:none">
                        <label class="form-label" for="textanswer">Answer</label>
                        <input type="text" name="textanswer" class="form-control" id="textanswer" placeholder="Enter Answer" value="{{old("textanswer")}}">
                        @error('textanswer')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
                    </div>
                    <!-- Text -->

                    <div class="md-3">
                        <label class="form-label" for="feedback">Feedback</label>
                        <textarea class="form-control" name='feedback' placeholder='Enter Feedback' id="feedback" value="{{old("feedback")}}"></textarea>
                        @error('feedback')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('/')}}" class="btn btn-danger">Back</a>
                  
</form>
</div>
</div>

    
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change', '.type-form', function(){
            var type_id = $(this).val();
            if (type_id == 1) {
                $('.mcq').show();
                $('.numeric').hide();
                $('.true-false').hide();
            }
            else if (type_id == 2) {
                $('.mcq').hide();
                $('.numeric').hide();
                $('.true-false').show();
            }
            else if (type_id == 3) {
                $('.mcq').hide();
                $('.true-false').hide();
                $('.numeric').show();
            }
            else {
                $('.text').show();
                $('.mcq').hide();
                $('.true-false').hide();
                $('.numeric').hide();
            }          
        });
    });
</script>
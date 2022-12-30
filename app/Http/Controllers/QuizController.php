<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Type;
use App\Models\Options;
use App\Models\TrueFalse;

class QuizController extends Controller
{
    public function index()
    {
      $data = Question::all();
      return view('quiz', compact('data'));
    }


    public function addQuestion()
    {
        $data_type = Type::all();
        return view('add-question', compact('data_type'));
    }

    

    public function saveQuestion(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'answer' => 'required_if:type,3',
            'feedback' => 'required',
            'type' => 'required',
            'option1' => 'required_if:type,1',
            'option2' => 'required_if:type,1',
            'option3' => 'required_if:type,1',
            'option4' => 'required_if:type,1',
            'textanswer' => 'required_if:type,4',
        ]);

        $question = new Question();
        $question->body = $request->body;
        $question->type_id = $request->type;
        $question->feedback = $request->feedback;
        $question->save();

        if ($request->type == 1) {
            
            $options = new Options();
            $options->question_id = $question->id;
            $options->option1 = $request->option1;
            $options->option2 = $request->option2;
            $options->option3 = $request->option3;
            $options->option4 = $request->option4;
            $option_num = $request->input('mcqanswer');
            if ($option_num == "Option1") {
                $question->answer = $request->option1;
            } else if ($option_num == "Option2") {
                $question->answer = $request->option2;
            } else if ($option_num == "Option3") {
                $question->answer = $request->option3;
            } else if ($option_num == "Option4") {
                $question->answer = $request->option4;
            }
            $question->save();
            $options->save();
        }

        if ($request->type == 2) {
            if ($request->input('truefalse') == 1) {
                $question->answer = 'True';
                $question->save();
            } else if ($request->input('truefalse') == 0) {
                $question->answer = 'False';
                $question->save();
            }

        }
        
        if ($request->type == 3) {
            $question->answer = $request->answer;
            $question->save();
        }

        if ($request->type == 4) {
            $question->answer = $request->textanswer;
            $question->save();
        } 
        return redirect('quiz')->with('success', 'Question added successfully'); 
    }

    public function editQuestion($id)
    {
        $question = Question::find($id);
        $data_type = Type::all();
        $options = Options::where('question_id', $id)->first();
        return view('edit-question', compact('question', 'data_type', 'options'));
    }

 

    

    public function updateQuestion(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'answer' => 'required_if:type,3',
            'feedback' => 'required',
            'type' => 'required',
            'option1' => 'required_if:type,1',
            'option2' => 'required_if:type,1',
            'option3' => 'required_if:type,1',
            'option4' => 'required_if:type,1',
            'textanswer' => 'required_if:type,4',
        ]);

        $question = Question::find($request->id);
        $question->body = $request->body;
        $question->type_id = $request->type;
        $question->feedback = $request->feedback;
        $question->save();


        if ($request->type == 1) {
            
            $options = new Options();
            $options->question_id = $question->id;
            $options->option1 = $request->option1;
            $options->option2 = $request->option2;
            $options->option3 = $request->option3;
            $options->option4 = $request->option4;
            $option_num = $request->input('mcqanswer');
            if ($option_num == "Option1") {
                $question->answer = $request->option1;
            } else if ($option_num == "Option2") {
                $question->answer = $request->option2;
            } else if ($option_num == "Option3") {
                $question->answer = $request->option3;
            } else if ($option_num == "Option4") {
                $question->answer = $request->option4;
            }
            $question->save();
            $options->save();
        }

        if ($request->type == 2) {
            if ($request->input('truefalse') == 1) {
                $question->answer = 'True';
                $question->save();
            } else if ($request->input('truefalse') == 0) {
                $question->answer = 'False';
                $question->save();
            }

        }
        
        if ($request->type == 3) {
            $question->answer = $request->answer;
            $question->save();
        }

        if ($request->type == 4) {
            $question->answer = $request->textanswer;
            $question->save();
        } 
        return redirect('quiz')->with('success', 'Question updated successfully');
    }

    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect('')->with('success', 'Question deleted successfully');
    }

    public function viewQuestion($id)
    {
        $question = Question::find($id);
        $options = Options::where('question_id', $id)->first();
        return view('view-question', compact('question', 'options'));
    }
}

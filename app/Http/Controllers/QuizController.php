<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
	public function allQuizz()
	{
		$quizes = Quiz::where('status', 1)->orderBy('created_at', 'desc')->get();
		return view('user.quizes.all-quizes', [
			'quizes' => $quizes
		]);
	}

	public function index()
	{
		$quizes = Quiz::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
		return view('user.quizes.my-quizes', [
			'quizes' => $quizes,
		]);
	}


    public function create() {
        return view('user.quizes.create', [
            'user' => Auth::user()
        ]);
    }

    public function store()
	{
        $user = Auth::user();
        $validated = request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'image' => 'image|required',
        ]);
        $validated['image'] = request()->file('image')->store('images');


		Quiz::create([
            'author' => $user->username,
			'title' => $validated['title'],
			'description' => $validated['description'],
			'image' => $validated['image'],
            'user_id' => $user->id,
		]);

		return redirect()->route('home');
	}

    public function edit(Quiz $quiz)
	{
		return view('user.quizes.edit', [
			'quiz' => $quiz,
			'quizes' => Quiz::all(),
		]);
	}

    public function update(Quiz $quiz, Request $request)
	{
        $validated = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'image' => 'image',
        ]);

		if (isset($validated['image']))
		{
			$quiz->update([
                'image' => $request->file('image')->store('images')
			]);
		}

		$quiz->update([
			'title' => $validated['title'],
			'description' => $validated['description'],
		]);
		return redirect()->route('home');
	}

	public function destroy(Quiz $quiz)
	{
		$quiz->delete();

		return back();
	}



	public function start(Quiz $quiz) 
	{
		return view('quiz.start', [
			'quiz' => $quiz
		]);
	}


	public function showQuestions(Quiz $quiz)
	{
		return view('quiz.question', [
			'quiz' => $quiz,
		]);
	}

	public function end(Quiz $quiz, Request $request) {
        $radio = $request->input('radio-');
        $correct = 0;
		$all = count($quiz->question);

		foreach ($radio as $id => $answer) {
            $question = Question::find($id);
            if ($question->correct == $answer) {
                $correct++;
            }
        }

        return view('quiz.end', [
            'quiz' => $quiz,
            'correct' => $correct,
            'all' => $all,
        ]);
    }

	// Admnin
	public function pending(){
		$quizes = Quiz::where('status', 0)->orderBy('created_at', 'desc')->get();
		return view('admin.pending', [
			'quizes' => $quizes
		]);
	}
	
	public function publish(Quiz $quiz) {
        $quiz->update(['status' => 1]);
    
        return redirect()->route('home');
    }
}

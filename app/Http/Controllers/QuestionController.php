<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
	public function create()
	{
		$quizes = Quiz::where('user_id', Auth::user()->id)->get();

		return view('user.questions.create', [
			'quizes' => $quizes,
		]);
		
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
            'question' => 'required',
			'position' => 'required',
			'A' => 'required',
			'B' => 'required',
			'C' => 'required',
			'D' => 'required',
            'correct' => 'required',
			'image'    => 'required|image',
			'quiz_id' => ['required'],
        ]);
		$validated['image'] = request()->file('image')->store('images');

		Question::create($validated);

		return redirect()->route('quiz');
	}

	public function show(Quiz $quiz)
	{
		return view('user.questions.show', [
			'quiz' => $quiz,
		]);
	}

	public function edit(Question $question)
	{
		$quizes = Quiz::where('user_id', Auth::user()->id)->get();

		return view('user.questions.edit', [
			'question'  => $question,
			'quizes' => $quizes,
		]);
	}

	public function update(Question $question, Request $request)
	{
		$validated = $request->validate([
            'question' => 'required',
			'position' => 'required',
			'A' => 'required',
			'B' => 'required',
			'C' => 'required',
			'D' => 'required',
            'correct' => 'required',
			'image'    => 'image',
			'quiz_id' => ['required'],
        ]);

		if (isset($validated['image']))
		{
			$question->update([
				'image' => $request->file('image')->store('images'),
			]);
		}

		$question->update([
			'question' => $validated['question'],
			'position' => $validated['position'],
			'quiz_id' => $validated['quiz_id'],
			'A' => $validated['A'],
			'B' => $validated['B'],
			'C' => $validated['C'],
			'D' => $validated['D'],
            'correct' => $validated['correct'],
		]);
		return redirect()->route('quiz.edit',  $question->quiz_id);
	}

	public function destroy(Question $question)
	{
		$question->delete();

		return back();
	}}

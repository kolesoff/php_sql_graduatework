<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'edit', 'update', 'destroy'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        $questions = Question::all();
        return view('question.index', compact('topics', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('question.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        Question::create($request->except(['_token']));
        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $topics = Topic::all();
        return view('question.edit', compact('topics', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $user = Auth::user();

        if ($question->status !== 'public' && $request->status === 'public') {
            Log::info($user->name.' опубликовал вопрос ('.$question->id.') из темы "'.$question->topic->topic.'"');
        }

        if ($question->status !== 'hidden' && $request->status === 'hidden') {
            Log::info($user->name.' скрыл вопрос ('.$question->id.') из темы "'.$question->topic->topic.'"');
        }

        if ($question->author !== $request->author || $question->question !== $request->question || $question->answer !== $request->answer) {
            Log::info($user->name.' обновил вопрос ('.$question->id.') из темы "'.$question->topic->topic.'"');
        }

        $question->update($request->except('_token'));
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $user = Auth::user(); 
        
        Log::info($user->name.' удалил вопрос ('.$question->id.') из темы "'.$question->topic->topic.'"');

        $question->delete();
        return redirect()->route('home');
    }
}

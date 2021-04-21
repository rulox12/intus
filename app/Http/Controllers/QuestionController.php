<?php

namespace App\Http\Controllers;

use App\Domain\Question\CreateOrUpdateQuestionAction;
use App\Http\Requests\StoreQuestionRequest;
use App\Models\Question;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::forIndex()->paginate();

        return view('questions.index', compact('questions'));
    }

    /**
     * @param StoreQuestionRequest $request
     * @return RedirectResponse
     */
    public function store(StoreQuestionRequest $request): RedirectResponse
    {
        $question = CreateOrUpdateQuestionAction::execute($request, new Question());

        return redirect()->route('questions.index', $question)
            ->with('success', __('Record created successfully'));
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function show()
    {
        $questions = Question::forIndex()->paginate();

        return view('questions.all', compact('questions'));
    }
}

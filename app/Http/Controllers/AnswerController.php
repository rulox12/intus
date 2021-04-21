<?php

namespace App\Http\Controllers;

use App\Domain\Answer\CreateOrUpdateAnswerAction;
use App\Http\Requests\StoreAnswerRequest;
use App\Models\Answer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::forIndex()->paginate();

        return view('questions.index', compact('answers'));
    }

    /**
     * @param StoreAnswerRequest $request
     * @return RedirectResponse
     */
    public function store(StoreAnswerRequest $request): RedirectResponse
    {
        $answer = CreateOrUpdateAnswerAction::execute($request, new Answer());

        return redirect()->route('answers.show', $answer)
            ->with('success', __('Record created successfully'));
    }

    /**
     * @param Answer $answer
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(Answer $answer)
    {
        if (!auth()->check()) {
            return redirect()->route('register');
        }

        return view('answers.show', compact('answer'));
    }
}

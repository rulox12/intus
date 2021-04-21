<?php

namespace App\Http\Controllers;

use App\Domain\Answer\CreateOrUpdateAnswerAction;
use App\Domain\Vote\CreateOrUpdateVoteAction;
use App\Http\Requests\StoreAnswerRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Vote;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VoteController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $votes = Vote::forIndex()->paginate();

        return view('votes.index', compact('votes'));
    }

    /**
     * @param Question $question
     * @return Application|Factory|View
     */
    public function create(Question $question)
    {
        return view('votes.create', compact('question'));
    }

    /**
     * @param int $questionId
     * @param int $answerId
     * @return RedirectResponse
     */
    public function store(int $questionId, int $answerId): RedirectResponse
    {
        $answer = CreateOrUpdateVoteAction::execute($questionId, $answerId);

        return redirect()->route('votes.index')
            ->with('success', __('Record created successfully'));
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Factories\FeedbackFactory;
use App\Repositories\FeedbackRepository;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    protected $feedbackFactory;

    public function __construct(
        FeedbackFactory $feedbackFactory,
        FeedbackRepository $feedbackRepository
    ) {
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackRepository = $feedbackRepository;
    }

    public function store(Request $request)
    {
        $feedback = $this->feedbackFactory->fromRequestData($request->all());

        $this->feedbackRepository->save($feedback);

        return response()->json(['success' => true]);
    }
}

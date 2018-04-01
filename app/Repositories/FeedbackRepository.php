<?php

namespace App\Repositories;

use App\Feedback;

class FeedbackRepository
{
    public function save(Feedback $feedback)
    {
        return $feedback->save();
    }
}

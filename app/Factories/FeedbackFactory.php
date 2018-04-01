<?php

namespace App\Factories;

use App\Feedback;

class FeedbackFactory
{
    private function new($data): Feedback
    {
        return new Feedback($data);
    }

    public function fromRequestData($data): Feedback
    {
        return $this->new([
            'email'         => $data['Email'] ?? null,
            'feedback'      => $data['Feedback'] ?? null,
            'score'         => $data['Score'] ?? null,
            'platform'      => $data['Platform'] ?? null,
            'appversion'    => $data['AppVersion'] ?? null,
            'deviceversion' => $data['DeviceVersion'] ?? null,
        ]);
    }
}

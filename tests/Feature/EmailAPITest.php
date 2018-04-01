<?php

namespace Tests\Feature;

use App\Feedback;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeedbackAPITest extends TestCase
{
    /**
     * @test
     */
    public function it_persists_feedback()
    {
        $feedback = factory(Feedback::class)->make();

        $data = [
            'Email'         => $feedback->email,
            'Feedback'      => $feedback->feedback,
            'Score'         => $feedback->score,
            'Platform'      => $feedback->platform,
            'AppVersion'    => $feedback->appversion,
            'DeviceVersion' => $feedback->deviceversion,
        ];

        $resp = $this->json('POST', route('feedback.store'), $data);

        $resp->assertSuccessful();
        $resp->assertJson([
            'success' => true
        ]);

        $this->assertDatabaseHas('feedback', $feedback->toArray());
    }

    /**
     * @test
     */
    public function feedback_just_requires_content()
    {
        $feedback = factory(Feedback::class)->make();

        $data = [
            'Feedback' => $feedback->feedback,
        ];

        $resp = $this->json('POST', route('feedback.store'), $data);

        $resp->assertSuccessful();
        $resp->assertJson([
            'success' => true
        ]);

        $this->assertDatabaseHas('feedback', [
            'feedback' => $feedback->feedback
        ]);
    }
}

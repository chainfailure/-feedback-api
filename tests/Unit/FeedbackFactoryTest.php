<?php

namespace Tests\Unit;

use App\Feedback;
use Tests\TestCase;
use App\Factories\FeedbackFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeedbackFactoryTest extends TestCase
{
     /**
     * @test
     */
    public function it_creates_an_instance_from_request_data()
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

        $model = (new FeedbackFactory)->fromRequestData($data);

        $this->assertEquals($model->email, $feedback->email);
        $this->assertEquals($model->feedback, $feedback->feedback);
        $this->assertEquals($model->score, $feedback->score);
        $this->assertEquals($model->platform, $feedback->platform);
        $this->assertEquals($model->appversion, $feedback->appversion);
        $this->assertEquals($model->deviceversion, $feedback->deviceversion);
    }
}

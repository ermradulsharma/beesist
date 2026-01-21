<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Notification;
use App\Models\QuoteRequests;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CoreModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_notification_can_be_created()
    {
        Notification::create([
            'email' => 'test@example.com',
            'template' => 'Welcome',
            'status' => '1'
        ]);

        $this->assertDatabaseHas('notifications', [
            'email' => 'test@example.com'
        ]);
    }

    /** @test */
    public function a_quote_request_can_be_created()
    {
        QuoteRequests::create([
            'name' => 'John Quote',
            'email' => 'quote@example.com',
            'phone' => '12345678',
            'data' => 'Some info',
            'notify_status' => 1
        ]);

        $this->assertDatabaseHas('quote_requests', [
            'email' => 'quote@example.com'
        ]);
    }
}

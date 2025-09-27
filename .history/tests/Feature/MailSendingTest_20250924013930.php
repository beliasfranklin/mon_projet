<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Models\User;
use App\Mail\MonMail;
use App\Mail\CodeMail;
use App\Mail\VerificationCodeMail;

class MailSendingTest extends TestCase
{
    use RefreshDatabase;

    public function test_mon_mail_is_sent()
    {
        Mail::fake();
        $user = User::factory()->create();

        // Suppose you have a controller or service that sends MonMail
        Mail::to($user->email)->send(new MonMail($user));

        Mail::assertSent(MonMail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    public function test_code_mail_is_sent()
    {
        Mail::fake();
        $user = User::factory()->create();
        $code = '123456';
        Mail::to($user->email)->send(new CodeMail($user, $code));

        Mail::assertSent(CodeMail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    public function test_verification_code_mail_is_sent()
    {
        Mail::fake();
        $user = User::factory()->create();
        $code = '654321';
        Mail::to($user->email)->send(new VerificationCodeMail($user, $code));

        Mail::assertSent(VerificationCodeMail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }
}

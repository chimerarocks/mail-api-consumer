<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendUserPasswordResetMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client     = new \GuzzleHttp\Client();
        $client->request('POST', 'http://mail-api-nginx/api/v1/mail', [
            'json'    => [
                'from'    => env('MAIL_FROM_ADDRESS'),
                'to'      => $this->user->email,
                'subject' => 'Password Updated',
                'body'    => 'You are receiving this email because we received a password update for your account.',
            ],
            'headers' => [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);
    }
}

<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send Email notify signatuer of the for all user every day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emailes = User::pluck('email')->toArray();
        $data=['title'=>'Hello programing','body'=>'learning PHP native'];
        foreach($emailes as $email){
            
            Mail::To($email)->send(new NotifyEmail($data));
        }
    }
}

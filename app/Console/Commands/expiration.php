<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire users every 5 minut automatically';

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
        
       $users= User::where('expired',0)->get();

       foreach($users as $user){

           $user->update(['expired'=>1]);
       }

    }
}

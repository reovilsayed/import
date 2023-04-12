<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $rand = rand(1,1000);
        $email = 'sayed'.$rand.'@mail.com';
        User::create([
            'name'=>'sayed',
            'email'=>$email,
            'password'=>'123445'
        ]);
    }
}

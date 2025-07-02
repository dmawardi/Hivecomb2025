<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {email} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user with a specified email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->option('password') ?? 'password';

        if (User::where('email', $email)->exists()) {
            $this->error("User with email {$email} already exists.");
            return 1;
        }

        $user = User::create([
            'name' => 'Admin User',
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("User created successfully!");
        $this->info("Email: {$email}");
        $this->info("Password: {$password}");

        return 0;
    }
}

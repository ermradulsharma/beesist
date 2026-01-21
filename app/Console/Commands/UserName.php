<?php

namespace App\Console\Commands;

use App\Domains\Auth\Models\User;
use Illuminate\Console\Command;
use Str;

class UserName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:username';

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
        $users = User::all();
        foreach ($users as $user) {
            $user->slug = Str::slug($user->name) . '-' . $user->id;
            $user->save();
        }
        $this->info('UUIDs generated for existing users successfully.');

        return Command::SUCCESS;
    }
}

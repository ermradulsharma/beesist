<?php

namespace App\Console\Commands;

use App\Domains\Auth\Models\User;
use Illuminate\Console\Command;
use Str;

class UserUuid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:uuid';

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
            $user->uuid = Str::uuid();
            $user->save();
        }
        $this->info('UUIDs generated for existing users successfully.');

        return Command::SUCCESS;
    }
}

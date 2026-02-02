<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\RentalApplication\Database\Seeders\ScreeningQuestionTableSeeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable, Traits\DisableForeignKeys;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();
        $this->command->info('Unguarded models.');

        $this->disableForeignKeys();
        $this->command->info('Disabled foreign keys.');

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);
        $this->command->info('Truncated logs.');

        $this->call(AuthSeeder::class);
        $this->call(ScreeningQuestionTableSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(AnnouncementSeeder::class);
        $this->call(EmailTemplateSeeder::class);

        $this->enableForeignKeys();
        Model::reguard();
    }
}

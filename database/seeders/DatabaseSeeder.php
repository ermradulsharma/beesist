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
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(ScreeningQuestionTableSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(AnnouncementSeeder::class);
        $this->call(EmailTemplateSeeder::class);

        Model::reguard();
    }
}

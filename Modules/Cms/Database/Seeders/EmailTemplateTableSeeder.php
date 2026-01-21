<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\EmailTemplate;

class EmailTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        EmailTemplate::factory(20)->create();
        // $this->call("OthersTableSeeder");
    }
}

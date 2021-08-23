<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // criando seeder com base em uma factory de seeding (classe SiteContatoFactory)
        SiteContato::factory()->count(10)->create();
    }
}

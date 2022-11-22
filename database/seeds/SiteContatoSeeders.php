<?php

use Illuminate\Database\Seeder;
use App\SiteContato;
use Illuminate\Support\Facades\DB;


class SiteContatoSeeders extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SiteContato::class,100)->create();
    }
}

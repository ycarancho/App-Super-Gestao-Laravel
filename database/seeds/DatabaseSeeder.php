<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FornecedorSeeders::class);
        $this->call(SiteContatoSeeders::class);
        $this->call(MotivoContatoSeeders::class);
    }
}

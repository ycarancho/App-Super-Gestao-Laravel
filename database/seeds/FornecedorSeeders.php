<?php

use Illuminate\Database\Seeder;
use \App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Fornecedor::class,100)->create();
    }
}

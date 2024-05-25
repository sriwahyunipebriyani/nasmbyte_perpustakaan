<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        roles::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'admin', 'client',
        ];

        foreach ($data as $value) {
            roles::insert([
                'name' => $value,
            ]);
        }
    }
}

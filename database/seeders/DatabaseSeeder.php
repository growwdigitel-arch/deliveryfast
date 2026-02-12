<?php

namespace Database\Seeders;

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

        $this->call([
            \Database\Seeders\UsersSeeder::class,
            \Modules\Acl\Database\Seeders\SeedAllPermissionsTableSeeder::class,
            // \Database\Seeders\SettingTableSeeder::class,
            \Modules\Localization\Database\Seeders\LanguagesTableSeeder::class,
            \Modules\Cargo\Database\Seeders\CargoDatabaseSeeder::class,
        ]);
        // $this->call(TranslationsTableSeeder::class);
    }
}

<?php

use Database\Seeders\UserSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class AddDefaultAdminUser extends Migration
{
    public function up()
    {
        Artisan::call('db:seed',[
            '--class' => UserSeeder::class
        ]);
    }

    public function down() {}
}

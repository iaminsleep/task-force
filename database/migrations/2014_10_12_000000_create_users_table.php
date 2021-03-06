<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('city_id');
            $table->float('rating')->default(5.0);
            $table->string('avatar')->default('noavatar.png');

            //optional (can fill in account settings)
            $table->date('birth_date')->nullable();
            $table->json('specialization')->nullable();
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('skype')->nullable();
            $table->json('notification_settings')->nullable();

            //online status
            $table->timestamp('last_seen')->nullable();

            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => UserSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

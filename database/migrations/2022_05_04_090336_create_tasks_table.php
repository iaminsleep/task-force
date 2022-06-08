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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('category_id');
            $table->integer('city_id');
            $table->integer('user_id');
            $table->string('location')->nullable();
            $table->integer('budget');
            $table->integer('performer_id')->nullable();
            $table->date('deadline');
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => TaskSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
};

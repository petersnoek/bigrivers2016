<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naamartiestband');
            $table->string('biografie');
            $table->string('persfoto1');
            $table->string('persfoto2');
            $table->string('persfoto3');
            $table->string('website');
            $table->string('youtube');
            $table->string('facebook');
            $table->string('twitter');
            $table->timestamps();
            $table->timestamp('synchronized_with_eventkit_at')->nullable();
        });

        // seed the table. should be done using different way, see: https://laravel.com/docs/5.1/seeding
        $a = new App\Artist();
        $a->naamartiestband = 'TestArtist';
        $a->website = 'http://www.google.com';
        $a->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('artists');
    }
}

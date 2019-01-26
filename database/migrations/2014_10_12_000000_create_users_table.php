<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->string('line_1')->nullable();
            $table->string('line_2')->nullable();
            $table->string('line_3')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('postcode')->nullable();
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('destinations', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');

            $table->string('city');
            $table->string('country');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('items', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->string('name');
            $table->float('price');
            $table->text('comments');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('boxes', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');

            $table->string('name');
            $table->float('price');
            $table->text('comments')->nullable();

            $table->uuid('destination_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('contents', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('box_id');
            $table->uuid('item_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('categories',function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->string('name');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('marks', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->float('value');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('eventTypes', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->string('name');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('activityTypes', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->string('name');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('events',function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->string('name');
            $table->uuid('address_id');
            $table->uuid('mark_id');
            $table->text('comments');
            $table->float('price');
            $table->uuid('event_type_id');
            $table->uuid('activity_type_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('categoryEvents', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('category_id');
            $table->uuid('event_id');
            $table->uuid('box_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('photos', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->string('name');
            $table->string('url');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('photoEvents',function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('photo_id');
            $table->uuid('event_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('genders',function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->string('name');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('users', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('gender_id');
            $table->uuid('shipping_address_id');
            $table->uuid('billing_address_id');
            $table->string('password');
            $table->string('email');
            $table->string('name');
            $table->uuid('photo_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('myBoxes', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('user_id');
            $table->uuid('box_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('notifications', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('user_id');
            $table->uuid('event_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::create('favorites', function (Blueprint $table){
            $table->uuid('id');
            $table->primary('id');

            $table->uuid('user_id');
            $table->uuid('event_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
        });


        Schema::table('contents', function (Blueprint $table){
            $table->foreign('box_id')->references('id')->on('boxes');
            $table->foreign('item_id')->references('id')->on('items');
        });

        Schema::table('events', function (Blueprint $table){
            $table->foreign('mark_id')->references('id')->on('marks');
            $table->foreign('event_type_id')->references('id')->on('eventTypes');
            $table->foreign('activity_type_id')->references('id')->on('activityTypes');
            $table->foreign('address_id')->references('id')->on('addresses');
        });

        Schema::table('categoryEvents', function (Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('photoEvents',function (Blueprint $table){
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('photo_id')->references('id')->on('photos');
        });

        Schema::table('users',function (Blueprint $table){
            $table->foreign('shipping_address_id')->references('id')->on('addresses');
            $table->foreign('billing_address_id')->references('id')->on('addresses');
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('gender_id')->references('id')->on('genders');
        });

        Schema::table('myBoxes',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('box_id')->references('id')->on('boxes');
        });

        Schema::table('notifications',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
        });

        Schema::table('favorites',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
        });

        Schema::table('boxes', function (Blueprint $table) {
            $table->foreign('destination_id')->references('id')->on('destinations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('destinations');
        Schema::dropIfExists('items');
        Schema::dropIfExists('boxes');
        Schema::dropIfExists('contents');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('marks');
        Schema::dropIfExists('eventTypes');
        Schema::dropIfExists('activityTypes');
        Schema::dropIfExists('events');
        Schema::dropIfExists('categoryEvents');
        Schema::dropIfExists('photos');
        Schema::dropIfExists('photoEvents');
        Schema::dropIfExists('myBoxes');
        Schema::dropIfExists('users');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('notifications');
    }
}
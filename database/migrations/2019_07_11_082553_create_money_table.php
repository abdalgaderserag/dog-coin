<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money', function (Blueprint $table) {
            $numbers = [
                '348104859345',
                '348104823137',
                '348104867857',
                '348104876857',
                '348104823457',
                '348104429357',
                '348104239357',
                '681123859357',
            ];
            $table->bigIncrements('id');
            $table->integer('user_id', false, true);
            $table->bigInteger('money', false, true)->default(0);
            $table->bigInteger('cents', false, true)->default(0);
            $table->string('creditCardNumber', 16)
                ->default('' . $numbers [random_int(0, 7)] . random_int(1111, 9999))
                ->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('money');
    }
}

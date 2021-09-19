<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOPDCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_p_d_cards', function (Blueprint $table) {
            $table->id();
            $table->date('date_visit')->index();
            $table->unsignedBigInteger('hn')->index();
            $table->string('patient_name');
            $table->string('gender');
            $table->date('dob');
            $table->unsignedTinyInteger('triage')->index()->default(0);
            $table->string('bp')->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('body_temperature', 5, 2)->nullable();
            $table->string('diagnosis')->nullable();
            $table->text('orders')->nullable();
            $table->text('procedures')->nullable();
            $table->text('medications')->nullable();
            $table->text('note')->nullable();
            $table->dateTime('exam_completed_at')->nullable();
            $table->dateTime('discharged_at')->nullable();
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
        Schema::dropIfExists('o_p_d_cards');
    }
}

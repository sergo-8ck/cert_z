<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); //ФИО
            $table->string('slug')->unique(); // уникальное значение
//            $table->text('description_short')->nullable();
            $table->string('doc_number'); //Номер документа
            $table->string('author'); //Кто выдал
            $table->string('applicant'); //Заявитель
            $table->string('manufacturer'); //Изготовитель
            $table->integer('product')->default(1); // Продукция или услуга
            $table->string('product_title'); //Наименование продукции или услуги
            $table->string('meets_requirements'); //Соответствует требованиям
            $table->string('base'); //Выдан на основании
            $table->date('date_debut'); // дата выдачи
            $table->date('date_fin'); // срок действия
            $table->integer('status')->default(1); // Продукция или услуга
            $table->text('description')->nullable(); // комментарий
            $table->integer('created_by')->nullable(); // кто создал
            $table->integer('modified_by')->nullable(); // кто редактировал
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
        Schema::dropIfExists('articles');
    }
}

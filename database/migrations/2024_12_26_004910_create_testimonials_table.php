<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();            // ID auto increment
            $table->text('content');  // Kolom untuk isi testimonial
            $table->string('author'); // Kolom untuk nama penulis testimonial
            $table->timestamps();     // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials'); // Jika tabel tidak ada, tidak perlu khawatir
    }
}

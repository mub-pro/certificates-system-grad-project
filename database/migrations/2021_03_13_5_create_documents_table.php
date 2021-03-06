<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_name');
            $table->string('document_description');
            $table->date('document_issue_date')->nullable();
            $table->string('pdf_file');
            $table->foreignId('degree_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('document_type_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('hashid')->nullable();
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
        Schema::dropIfExists('documents');
    }
}

<?php

use App\Models\Process;
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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->string('title_es');
            $table->string('title_en');
            $table->text('object_es')->nullable();
            $table->text('object_en')->nullable();
            $table->text('description_es')->nullable();
            $table->text('description_en')->nullable();
            $table->string('code')->nullable();
            $table->text('forma_pago_es')->nullable();
            $table->text('forma_pago_en')->nullable();
            $table->date('date_end')->nullable();
            $table->text('link')->nullable();
            $table->text('url_file')->nullable();
            $table->enum('status', [Process::BORRADOR,Process::EJECUCION,Process::FINALIZADO,Process::DESIERTO,Process::REVISION,Process::ELIMINADO])
            ->default(Process::BORRADOR);
            $table->string('slug');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('purchase_id')->nullable();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('set null');
            
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
        Schema::dropIfExists('processes');
    }
};

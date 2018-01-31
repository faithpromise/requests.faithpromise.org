<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryMethodsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('delivery_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_type');
            $table->string('delivery_method');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('zendesk_subdomain')->nullable();
            $table->string('zendesk_username')->nullable();
            $table->string('zendesk_token')->nullable();
            $table->unsignedBigInteger('zendesk_agent_id')->nullable();
            $table->string('teamwork_subdomain')->nullable();
            $table->string('teamwork_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('delivery_methods');
    }
}

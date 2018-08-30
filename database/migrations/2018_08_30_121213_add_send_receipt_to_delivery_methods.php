<?php

use App\Models\DeliveryMethod;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSendReceiptToDeliveryMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_methods', function (Blueprint $table) {
            $table->boolean('send_receipt')->default(false)->after('delivery_method');
        });

        DeliveryMethod::unguard();
        DeliveryMethod::whereIn('ticket_type', ['creative','web'])->update([
            'send_receipt' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_methods', function (Blueprint $table) {
            $table->dropColumn('send_receipt');
        });
    }
}

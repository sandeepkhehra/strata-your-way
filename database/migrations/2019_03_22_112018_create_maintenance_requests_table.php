<?php

use App\MaintenanceRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_requests', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id');
			$table->bigInteger('community_id');
			$table->string('title');
			$table->enum('type', MaintenanceRequest::TYPES)->nullable();
			$table->longText('description');
			$table->enum('status', MaintenanceRequest::STATUSES)->default('new');
			$table->string('quote')->nullable();
			$table->string('invoice')->nullable();
			$table->bigInteger('assigned')->nullable();
			$table->longText('contractors')->nullable();
			$table->string('comments')->nullable();
			$table->string('attachment')->nullable();
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
        Schema::dropIfExists('maintenance_requests');
    }
}

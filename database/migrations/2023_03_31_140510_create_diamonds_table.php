<?php

use App\Utils\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diamonds', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string(Constants::IDENTIFIER)->unique();
            $table->string(Constants::CUT)->nullable();
            $table->string(Constants::COLOR)->nullable();
            $table->text(Constants::CLARITY)->nullable();
            $table->string(Constants::CARAT_WEIGHT)->default(0);
            $table->string(Constants::CUT_QUALITY, 255)->nullable();
            $table->string(Constants::LAB)->nullable();
            $table->string(Constants::SYMMETRY, 255);
            $table->string(Constants::POLISH, 255);
            $table->text(Constants::EYE_CLEAN)->nullable();
            $table->string(Constants::CULET_SIZE, 255)->nullable();
            $table->string(Constants::CULET_CONDITION)->nullable();
            $table->string(Constants::DEPTH_PERCENT)->default(0);
            $table->string(Constants::TABLE_PERCENT)->default(0);
            $table->string(Constants::MEAS_LENGTH)->default(0);
            $table->string(Constants::MEAS_WIDTH)->default(0);
            $table->string(Constants::MEAS_DEPTH)->default(0);
            $table->string(Constants::GIRDLE_MIN)->nullable();
            $table->string(Constants::GIRDLE_MAX)->nullable();
            $table->string(Constants::FLOUR_COLOR)->nullable();
            $table->string(Constants::FLOUR_INTENSITY)->nullable();
            $table->string(Constants::FANCY_COLOR_DOMINANT_COLOR)->nullable();
            $table->string(Constants::FANCY_COLOR_SECONDARY_COLOR)->nullable();
            $table->string(Constants::FANCY_COLOR_OVERTONE)->nullable();
            $table->string(Constants::FANCY_COLOR_INTENSITY)->nullable();
            $table->string(Constants::TOTAL_SALES)->default(0);
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diamonds');
    }
};

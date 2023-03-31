<?php

namespace App\Models;

use App\Utils\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diamond extends Model
{
    use HasFactory;

    // Fields to be considered when inserting or updating data
    protected $fillable = [
        Constants::IDENTIFIER,
        Constants::CUT,
        Constants::COLOR,
        Constants::CLARITY,
        Constants::CARAT_WEIGHT,
        Constants::CUT_QUALITY,
        Constants::LAB,
        Constants::SYMMETRY,
        Constants::POLISH,
        Constants::EYE_CLEAN,
        Constants::CULET_SIZE,
        Constants::CULET_CONDITION,
        Constants::DEPTH_PERCENT,
        Constants::TABLE_PERCENT,
        Constants::MEAS_LENGTH,
        Constants::MEAS_WIDTH,
        Constants::MEAS_DEPTH,
        Constants::GIRDLE_MIN,
        Constants::GIRDLE_MAX,
        Constants::FLOUR_COLOR,
        Constants::FLOUR_INTENSITY,
        Constants::FANCY_COLOR_DOMINANT_COLOR,
        Constants::FANCY_COLOR_SECONDARY_COLOR,
        Constants::FANCY_COLOR_OVERTONE,
        Constants::FANCY_COLOR_INTENSITY,
        Constants::TOTAL_SALES
    ];
}

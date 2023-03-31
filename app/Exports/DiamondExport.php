<?php

namespace App\Exports;

use App\Models\Diamond;
use App\Utils\Constants;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiamondExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() // Overrides collection() method from FromCollection
    {
        // get all Diamond table data
        // map function iterates the database fields and returns selected fields data only
        return Diamond::all()->map(function ($diamond) {
            return [
                Constants::INDEX => $diamond->id,
                Constants::CUT => $diamond->cut,
                Constants::COLOR => $diamond->color,
                Constants::CLARITY => $diamond->clarity,
                Constants::CARAT_WEIGHT => $diamond->carat_weight,
                Constants::CUT_QUALITY => $diamond->cut_quality,
                Constants::LAB => $diamond->lab,
                Constants::SYMMETRY => $diamond->symmetry,
                Constants::POLISH => $diamond->polish,
                Constants::EYE_CLEAN => $diamond->eye_clean,
                Constants::CULET_SIZE => $diamond->culet_size,
                Constants::CULET_CONDITION => $diamond->culet_condition,
                Constants::DEPTH_PERCENT => $diamond->depth_percent,
                Constants::TABLE_PERCENT => $diamond->table_percent,
                Constants::MEAS_LENGTH => $diamond->meas_length,
                Constants::MEAS_WIDTH => $diamond->meas_width,
                Constants::MEAS_DEPTH => $diamond->meas_depth,
                Constants::GIRDLE_MIN => $diamond->girdle_min,
                Constants::GIRDLE_MAX => $diamond->girdle_max,
                Constants::FLOUR_COLOR => $diamond->flour_colour,
                Constants::FLOUR_INTENSITY => $diamond->flour_intensity,
                Constants::FANCY_COLOR_DOMINANT_COLOR => $diamond->fancy_color_dominant_color,
                Constants::FANCY_COLOR_SECONDARY_COLOR => $diamond->fancy_color_secondary_color,
                Constants::FANCY_COLOR_OVERTONE => $diamond->fancy_color_overtone,
                Constants::FANCY_COLOR_INTENSITY => $diamond->fancy_color_intensity,
                Constants::TOTAL_SALES => $diamond->total_sales,
                Constants::_PRICE => "",

            ];
        });
        ;
    }

    // List of Exported file headers
    public function headings(): array // overrides  headings() method from WithHeadings
    {
        return [
            "indentifier",
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
            Constants::TOTAL_SALES,
            Constants::_PRICE
        ];
    }
}

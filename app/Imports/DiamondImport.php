<?php

namespace App\Imports;

use App\Models\Diamond;
use App\Utils\Constants;
use Maatwebsite\Excel\Concerns\ToModel;

class DiamondImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Diamond([
            // Csv file fields list
            Constants::IDENTIFIER => $row[0],
            Constants::CUT => $row[1],
            Constants::COLOR => $row[2],
            Constants::CLARITY => $row[3],
            Constants::CARAT_WEIGHT => $row[4],
            Constants::CUT_QUALITY => $row[4],
            Constants::LAB => $row[6],
            Constants::SYMMETRY => $row[7],
            Constants::POLISH => $row[8],
            Constants::EYE_CLEAN => $row[9],
            Constants::CULET_SIZE => $row[10],
            Constants::CULET_CONDITION => $row[11],
            Constants::DEPTH_PERCENT => $row[12],
            Constants::TABLE_PERCENT => $row[13],
            Constants::MEAS_LENGTH => $row[14],
            Constants::MEAS_WIDTH => $row[15],
            Constants::MEAS_DEPTH => $row[16],
            Constants::GIRDLE_MIN => $row[17],
            Constants::GIRDLE_MAX => $row[18],
            Constants::FLOUR_COLOR => $row[19],
            Constants::FLOUR_INTENSITY => $row[20],
            Constants::FANCY_COLOR_DOMINANT_COLOR => $row[21],
            Constants::FANCY_COLOR_SECONDARY_COLOR => $row[22],
            Constants::FANCY_COLOR_OVERTONE => $row[23],
            Constants::FANCY_COLOR_INTENSITY => $row[24],
            Constants::TOTAL_SALES => $row[25]
        ]);
    }
}

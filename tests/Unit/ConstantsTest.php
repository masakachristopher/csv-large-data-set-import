<?php
use PHPUnit\Framework\TestCase;
use App\Utils\Constants;

class ConstantsTest extends TestCase {
    public function test_it_has_correct_constants() {
        $this->assertEquals('', Constants::INDEX);
        $this->assertEquals('identifier', Constants::IDENTIFIER);
        $this->assertEquals('cut', Constants::CUT);
        $this->assertEquals('color', Constants::COLOR);
        $this->assertEquals('clarity', Constants::CLARITY);
        $this->assertEquals('carat_weight', Constants::CARAT_WEIGHT);
        $this->assertEquals('cut_quality', Constants::CUT_QUALITY);
        $this->assertEquals('lab', Constants::LAB);
        $this->assertEquals('symmetry', Constants::SYMMETRY);
        $this->assertEquals('polish', Constants::POLISH);
        $this->assertEquals('eye_clean', Constants::EYE_CLEAN);
        $this->assertEquals('culet_size', Constants::CULET_SIZE);
        $this->assertEquals('culet_condition', Constants::CULET_CONDITION);
        $this->assertEquals('depth_percent', Constants::DEPTH_PERCENT);
        $this->assertEquals('table_percent', Constants::TABLE_PERCENT);
        $this->assertEquals('meas_length', Constants::MEAS_LENGTH);
        $this->assertEquals('meas_width', Constants::MEAS_WIDTH);
        $this->assertEquals('meas_depth', Constants::MEAS_DEPTH);
        $this->assertEquals('girdle_min', Constants::GIRDLE_MIN);
        $this->assertEquals('girdle_max', Constants::GIRDLE_MAX);
        $this->assertEquals('flour_colour', Constants::FLOUR_COLOR);
        $this->assertEquals('flour_intensity', Constants::FLOUR_INTENSITY);
        $this->assertEquals('fancy_color_dominant_color', Constants::FANCY_COLOR_DOMINANT_COLOR);
        $this->assertEquals('fancy_color_secondary_color', Constants::FANCY_COLOR_SECONDARY_COLOR);
        $this->assertEquals('fancy_color_overtone', Constants::FANCY_COLOR_OVERTONE);
        $this->assertEquals('fancy_color_intensity', Constants::FANCY_COLOR_INTENSITY);
        $this->assertEquals('total_sales', Constants::TOTAL_SALES);
        $this->assertEquals('_price', Constants::_PRICE);
    }
}

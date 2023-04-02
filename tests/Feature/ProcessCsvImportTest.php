<?php

namespace Tests\Feature;

use App\Jobs\ProcessCsvImport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProcessCsvImportTest extends TestCase
{
    use RefreshDatabase;


    public function test_it_imports_csv_data_into_database()
    {
        // Arrange data
        Storage::fake('local');
        $csvData = "identifier,cut,color,clarity,carat_weight,cut_quality,lab,symmetry,polish,eye_clean,culet_size,culet_condition,depth_percent,table_percent,meas_length,meas_width,meas_depth,girdle_min,girdle_max,flour_color,flour_intensity,fancy_color_dominant_color,fancy_color_secondary_color,fancy_color_overtone,fancy_color_intensity,total_sales\n";
        $csvData .= "12345,round,H,SI1,1.00,excellent,GIA,excellent,excellent,no,small,none,61.5,59,6.5,6.5,4,thin to slightly thick,thin to slightly thick,none,none,yellow,none,none,none,1000\n";
        $csvData .= "67890,round,D,VS2,1.50,very good,IGI,very good,very good,yes,none,none,60.2,59,7.3,7.3,4.4,thin to medium,thin to slightly thick,none,none,none,none,none,none,2000\n";
        Storage::put('temp/test.csv', $csvData);

        // Handling of data
        $job = new ProcessCsvImport('temp/test.csv');
        $job->handle();

        // Checking data
        $this->assertEquals(2, DB::table('diamonds')->count());
        $this->assertEquals('12345', DB::table('diamonds')->where('identifier', '12345')->value('identifier'));
        $this->assertEquals('D', DB::table('diamonds')->where('identifier', '67890')->value('color'));
        Storage::assertMissing('temp/test.csv');
    }
}

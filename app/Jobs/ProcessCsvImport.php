<?php

namespace App\Jobs;


use App\Utils\Constants;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;


class ProcessCsvImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $importedFile;

    /**
     * Create a new job instance.
     */
    public function __construct($importedFile)
    {

        $this->importedFile = $importedFile;

    }

    /**
     * Execute the job.
     */

    public function handle(){

        $delimiter = ',';
        $batchSize = 500; // Number of records to insert at a time
        $header = null;
        $data = [];

        // Start a transaction
        DB::beginTransaction();

        try {
            // Open the CSV file for reading
            $handle = fopen($this->importedFile, 'r');

            // Skip the header row using $delimiter variable
            fgetcsv($handle, 1000, $delimiter);

            // Loop through the CSV file and batch insert records
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                $data[] = [

                    // Columns
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
                ];

                // If the batch size is reached, insert the batch and reset the data array
                if (count($data) == $batchSize) {
                    DB::table('diamonds')->insert($data);
                    $data = [];
                }
            }

            // Insert any remaining records
            if (!empty($data)) {
                DB::table('diamonds')->insert($data);
            }

            // Commit the transaction
            DB::commit();

            fclose($handle); // Close file

            unlink($this->importedFile); // Delete temporary file

            // Return a success message
            return 'CSV file imported successfully in less than 20 seconds';
        } catch (\Exception $e) {
            // Rollback the transaction on any error
            DB::rollback();
            // throw $e;
            return;
        }
    }
}

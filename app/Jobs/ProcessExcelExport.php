<?php

namespace App\Jobs;

use App\Exports\DiamondExport;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;


class ProcessExcelExport implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // initialize
    protected $exportedFileName;

    /**
     * Create a new job instance.
     */
    public function __construct($exportedFileName)
    {
        //
        $this->exportedFileName = $exportedFileName;

    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        try {

            // Opens the file, sets the offset value, chunk data values, writes to the spreadsheet on specific batches, updates the offset value untils all values are read. Lastly stores the file in app storage
            // Since data does not change at all, the file is not deleted for caching purposes
            Excel::store(new DiamondExport(), $this->exportedFileName, 'local', \Maatwebsite\Excel\Excel::XLSX, ['chunk' => 500]);

        } catch (\Throwable $th) {
            throw $th;
        }


    }

}

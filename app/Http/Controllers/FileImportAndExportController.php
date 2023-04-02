<?php

namespace App\Http\Controllers;

use App\Exports\DiamondExport;
use App\Imports\DiamondImport;
use App\Jobs\ProcessCsvImport;
use App\Jobs\ProcessExcelExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileImportAndExportController extends Controller
{
    // Returns the landing or default web page
    public function index()
    {
        return view('index');
    }

    public function visualizeImportedData()
    {
        return view('diamonds'); // diamonds list view
    }

    public function importFile(Request $request)
    {
        // Accept upload only if the file is Csv type
        $validatedFileData = $request->validate(['csv-file' => 'required|mimes:csv']);

        $file = $request->file('csv-file', $validatedFileData);

        // Since laravel stores uploaded file as tmp , We generate file name using the original file name
        // and then we obtain new file name which resembles the uploaded file by the user with method called getClientOriginalName()
        $fileName = $file->getClientOriginalName();


        // Store the file in the temporary directory. We will retrieve the file when reading and saving data to the database with a background process
        $path = $file->storeAs('temp', $fileName);

        $temporaryFile = storage_path('app\temp\ ' . "{$fileName}");
        $modifiedtempFile = str_replace(' ', '', $temporaryFile);

        try {

            $response = ProcessCsvImport::dispatchSync($modifiedtempFile); // Made it asynchronous because takes less time to execute
            return redirect('')->with('status', "Csv file imported successfully");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('')->with('error', 'Something went wrong. Please try again.');
        }


    }
    //
    public function exportFile() // The method argument `$extension` is the file extension name
    {
        $fileName = 'diamonds.xlsx';
        $filePath = 'app/diamonds.xlsx'; // This path due to Export process stores the file in application storage directory

        $fileCheck = file_exists(storage_path($filePath)); // check if file exists in the storage
        if(!$fileCheck){
             dispatch(new ProcessExcelExport($fileName));
             return redirect('')->with('status', 'Excel export process added to database queue.');
        }

        // Returns the file and automatically downloads it
        return new BinaryFileResponse(storage_path($filePath), 200, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename=diamonds.xlsx'
        ]);

    }

}

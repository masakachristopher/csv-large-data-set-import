<?php

namespace App\Http\Controllers;

use App\Exports\DiamondExport;
use App\Imports\DiamondImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileImportAndExportController extends Controller
{
    // Returns the landing or default web page
    public function index()
    {
        return view('index');
    }

    public function visualizeImportedData()
    {
        return view('diamonds'); // view not yet created
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

        $temporaryfilePath = 'temp/' . $fileName;

        try {
            Excel::import(new DiamondImport, $temporaryfilePath);
            return redirect('')->with('status', 'The file has been excel/csv imported to database.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('')->with('error', 'Something went wrong. Please try again.');
        }


    }
    //
    public function exportFile($extension) // The method argument `$extension` is the file extension name
    {
        return Excel::download(new DiamondExport, 'diamonds.' . $extension);
    }
}

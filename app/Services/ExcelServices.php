<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExcelServices
{
    /**
     * Import excel file
     * Create import with artisan make
     * Example: $ php artisan make:import UsersImport --model=User
     *
     * @param object    $import
     * @param string|UploadedFile $filePath
     * @param string    $disk [null]
     * @param string    $readerType [\Maatwebsite\Excel\Excel::CSV]
     *
     * @return void
     */
    public function import(object $import, $filePath, ?string $disk = null, string $readerType = \Maatwebsite\Excel\Excel::CSV) : void
    {
        Excel::import($import, $filePath, $disk, $readerType);
    }

    /**
     * Export excel file
     * Create export with artisan make
     * Example: $ php artisan make:export UsersExport --model=User
     *
     * @param object    $export
     * @param string    $fileName
     * @param string    $writerType [null]
     * @param array     $headers
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download(object $export, string $fileName = 'exports.xls', string $writerType = null, array $headers = []) : BinaryFileResponse
    {
        return Excel::download($export, $fileName, $writerType, $headers);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use Maatwebsite\Excel\Excel;

class ExcelController extends Controller
{
    /**
     * @var Excel
     */
    private $excel;

    /**
     * ExcelController constructor.
     *
     * @param Excel $excel
     */
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    /**
     * @param Request $request
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(Request $request)
    {
        return $this->excel->download(new ExcelExport($request->all()), 'invoice.xlsx');
    }
}

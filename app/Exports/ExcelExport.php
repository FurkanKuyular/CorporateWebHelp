<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection, WithHeadings
{
    use Exportable;

    private $excelArray;

    public function __construct(array $excelArray)
    {
        $this->excelArray = $excelArray;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return new Collection([
            $this->excelArray,
        ]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
          array_keys($this->excelArray),
        ];
    }
}

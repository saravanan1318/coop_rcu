<?php

namespace App\Exports;

use App\Models\deposit;
use App\Models\Deposits;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DepositExport implements FromCollection, WithHeadings
{

    protected $depositreportdate;

    function __construct($depositreportdate)
    {
        $this->depositreportdate = $depositreportdate;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Deposit Name',
            'Deposit Date',
            'deposit Types',
            'Disbursed No. of deposit',
            'Disbursed Amount of deposit',
            'Collected No. of deposit',
            'Collected Amount of deposit'
        ];
    }
    public function collection()
    {
        return $deposits = Deposits::select('deposit_name', ']depositdate', 'deposittype_id', 'disbursedno', 'disbursedamount', 'collectedno', 'collectedamount')->where('depositdate', $this->depositreportdate)->get();
    }
}

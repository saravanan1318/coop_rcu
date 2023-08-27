<?php 
namespace App\Exports;
 
use App\Models\Loan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
 
class LoanExport implements FromCollection,WithHeadings
{

    protected $loanreportdate;

    function __construct($loanreportdate) {
            $this->loanreportdate = $loanreportdate;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */ 
    public function headings():array{
        return[
            'Date',
            'Loan Types',
            'Disbursed No. of Loan',
            'Disbursed Amount of Loan',
            'Collected No. of Loan',
            'Collected Amount of Loan' 
        ];
    } 
    public function collection()
    {
        return $loans = Loan::select('loandate','loantype_id','disbursedno','disbursedamount','collectedno','collectedamount')->where('loandate', $this->loanreportdate)->get();
    }
}
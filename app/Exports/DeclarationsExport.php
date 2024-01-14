<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class DeclarationsExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $results;
    protected $pagetitle;
    protected $institute;
    protected $date;
    protected $month;
    protected $year;

    public function __construct($data, $pagetitle, $institute, $month, $year, $date ) {
        $this->data = $data;
        //$this->results = $results;
        $this->title = $pagetitle;
        $this->institute = $institute;
        $this->date = $date;
        $this->month = $month;
        $this->year = $year;
    }

    public function view(): View
    {
        return view('report.DeclarationsCovers',
        [
            'results' => $this->data,
            'title' => $this->title,
            'institute' => $this->institute,
            'month' => $this->month,
            'year' => $this->year,
            'date' => $this->date,
            ]
    );
    }

}

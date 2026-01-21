<?php

namespace App\Exports\Backend;

use App\Models\PmaForm;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PmaExport implements FromView
{
    protected $pmaForms;

    public function __construct(array $pmaForms)
    {
        $this->pmaForms = $pmaForms;
    }

    public function view(): View
    {
        $data = PmaForm::query()->whereIn('id', $this->pmaForms)->get();

        return view('export.frontend.pmaForms', ['pma_forms' => $data]);
    }
}

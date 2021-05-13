<?php

namespace App\Exports;

use App\Audit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AuditExport implements FromCollection, WithHeadings {

    public function headings(): array {
        return [
            'id',
            'tipo de usuário',
            'id do usuário',
            'evento',
            'tipo auditável',
            'id auditável',
            'valores velhos',
            'valores novos',
            'url',
            'endereço ip',
            'navegador'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {

        return collect(Audit::all());
        //return Audit::all();
    }
}

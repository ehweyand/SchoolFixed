<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use App\Exports\AuditExport;
use Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller {


    public function show(Request $request) {

        //buscando auditorias da tabela
        //$audits = Audit::all();


        //Buscando auditorias da tabela por data
        $audits = Audit::get()->where('created_at', '>=', $request->date);

        return view('app.info_audit.index', ['audits' => $audits]);
    }


    //Exportação
    public function exportIntoExcel() {
        return Excel::download(new AuditExport, 'audits.xlsx');
    }

    public function exportIntoCSV() {
        return Excel::download(new AuditExport, 'audits.csv');
    }
}

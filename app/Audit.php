<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Audit extends Model {
    protected $table = 'audits';

    public static function getAudits() {
        $records = DB::table('audits')->select('id','event','auditable_id','url', 'ip_address')->get()->toArray();
    }
}

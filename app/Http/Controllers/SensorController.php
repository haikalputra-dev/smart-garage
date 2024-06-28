<?php

namespace App\Http\Controllers;

use App\Models\LogGarasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SensorController extends Controller
{
    function simpandata() {
        DB::table('data_sensor')->update(['id_garasi'=>1,'suhu'=>request()->nilaisuhu,'created_at' => now(),'updated_at' => now()]);
    }

    public function log()
    {
        DB::table('log_garasi')->insert(['id_garasi'=>1,'status'=>request()->status,'created_at' => now(),'updated_at' => now()]);
    }

    function getSuhu() {
        $suhu = DB::table('data_sensor')->value('suhu');
        return response()->json($suhu);
    }

    function getLog() {
        $log = DB::table('log_garasi')
        ->orderBy('created_at', 'desc') // Replace 'created_at' with the appropriate timestamp column
        ->value('status');
        return response()->json($log);
    }
}

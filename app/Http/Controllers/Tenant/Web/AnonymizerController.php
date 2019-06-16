<?php

namespace App\Http\Controllers\Tenant\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class AnonymizerController extends Controller
{
    public function anonyimze(Request $request)
    {
        $csv_file   = $request->hasFile('csvfile');
        if (!$csv_file) {
            return redirect('csv')->with([
                'message'=> 'Please validate your data!',
            ]);
        }
        $path = $request->file('csvfile')->getRealPath();

        $output = shell_exec(base_path()."/anonimizer_executer.sh ".$path);

        $file= base_path()."/lib/$output";

        $headers = array(
                  'Content-Type: application/csv',
                );
    
        return Response::download($file, 'Anonymized.csv', $headers);
    }

    public function import(){
        return view('tenant.importCSV');
    }
}

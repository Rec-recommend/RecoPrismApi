<?php

namespace App\Http\Controllers\Tenant\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $output = shell_exec("cd ".base_path()."/lib/python/anonymizer && python3 Anonymizer_excuter.py ".$path);

        $file= base_path(). "/lib/python/anonymizer/$output";

        $headers = array(
                  'Content-Type: application/pdf',
                );
    
        return Response::download($file, 'Anonymized.pdf', $headers);
    }

    public function import(){
        return view('tenant.importCSV');
    }
}

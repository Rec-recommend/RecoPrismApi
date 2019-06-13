<?php

namespace App\Http\Controllers\Tenant\Web;

use Illuminate\Http\Request;
use App\Factories\Tenant\RepositoryFactory;

class CsvController
{
    public function store(Request $request)
    {
        // dd($request);
        $repository = RepositoryFactory::make($request->model);
        $csv_file   = $request->hasFile('csvfile');
        if (!$repository || !$csv_file) {
            return redirect('csv')->with([
                'message'=> 'Please validate your data!',
            ]);
        }

        $path = $request->file('csvfile')->getRealPath();
        $array = array_map('str_getcsv', file($path));
        $filtered = array_filter(array_map('array_filter', $array));
        return ($repository->store($filtered))? 
        redirect('csv')->with(['message'=> 'Data Uploaded Successfully!','success' => true]):
        redirect('csv')->with(['message'=> 'Data does not match the required format, please check the documentation','false' => true]);
    }

    public function import(){
        return view('importCSV');
    }
}

<?php
namespace App\Traits;

trait JsonResponse
{
    public function success($message, $code =200)
    {
        return response()->json(['success'=>true,'data' => $data, 'message'=>$message], $code);
    }

    public function fail($errors=null, $code=400)
    {
        return response()->json(['success'=>false,'errors' => $errors, 'message'=>$message], $code);
    }
}

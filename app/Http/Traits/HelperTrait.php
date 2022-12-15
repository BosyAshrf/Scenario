<?php

namespace App\Http\Traits;

trait HelperTrait
{
  
    public function responseJson($status, $message, $data =null, $resource = null)
    {
        if ($resource) {
            return $resource->additional([
                'status' => $status,
                'message' => $message,
                'additional_data' => $data,
                
            ]);
        }
        else{
            $response = [
                'status' => $status,
                'message' => $message,
                'data' => $data,
            ];
            return response()->json($response);
        }

    }


}

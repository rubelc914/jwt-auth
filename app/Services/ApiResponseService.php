<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiResponseService
{
    public function success($data = null, $message = 'success', $status = 200)
    {
        return $this->jsonResponse(true,$data,$message,$status);
    }
    public function error($message = 'Error',$status = 500)
    {
        return $this->jsonResponse(false,null,$message,$status);
    }
    public function validationError($errors, $status = 422)
    {
        return $this->jsonResponse(false,null,$errors,$status);
    }

    private function jsonResponse($success,$data,$message,$status)
    {
        return response()->json([
            'success'   => $success,
            'data'      => $data,
            'message'   => $message,
            ],$status);
    }

}

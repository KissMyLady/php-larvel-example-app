<?php

namespace App\Http\Controllers\Traits;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as FoundationResponse;

trait ApiResponseTraits
{

    protected $statusCode = FoundationResponse::HTTP_OK;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respond($data, $header = [])
    {
        return Response::json($data, $this->getStatusCode(), $header);
    }

    public function message($message, $status = "success")
    {
        return $this->status($status, [
            'message' => $message
        ]);
    }

    public function internalError($message = "Internal Error!")
    {
        return $this->failed($message, FoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function ok($data, $message = 'ok', $status = "success"): \Illuminate\Http\JsonResponse
    {
        return $this->status($status, compact('data'), null, $message);
    }

    public function success($data, $status = "success", $message = '')
    {
        return $this->status($status, compact('data'), null, $message);
    }

    public function error($message, $code = 400, $status = 'error', $data = ''): \Illuminate\Http\JsonResponse{
        return $this->status($status, compact('data'), $code, $message);
    }

    public function failed($message, $code = 400, $status = 'error', $data = '')
    {
        return $this->status($status, compact('data'), $code, $message);
    }

    public function status($status, array $data, $code = null, $message = '')
    {
        if ($code) {
            $this->setStatusCode($code);
        }
        $status = [
            'status' => $status,
            'code' => $this->statusCode,
            'msg' => $message,
            'timestamp'=>time()
        ];

        $data = array_merge($status, $data);
        return $this->respond($data);
    }


    public function notFond($message = 'Not Fond!')
    {
        return $this->failed($message, Foundationresponse::HTTP_NOT_FOUND);
    }

}

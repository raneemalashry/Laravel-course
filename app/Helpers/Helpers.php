<?php

function responseJson($status, $message, $data=null)
{
    if ($status == "success") {
        $code = 200;

    } else {
        $code = 422;
    }
    return response()->json([
        'status' => $status,
        'message' => $message,
        'data' => $data
    ], $code);
}

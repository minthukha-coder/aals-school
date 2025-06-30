<?php

function sendResponse($data, $status, $message = "No message")
{
    $response = [
        'data'    => $data,
        'message' => $message,
        'status' => $status
    ];

    return response()->json($response);
}

function sendError($status,$message){
    return [
        'data' => null,
        'message' => $message,
        'status' => $status
    ];
}

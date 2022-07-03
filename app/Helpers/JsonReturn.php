<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

trait JsonReturn
{
    public function jsonSuccess($data)
    {
        return response()->json([ 'data' => $data], JsonResponse::HTTP_OK);
    }

    public function jsonCreated($data)
    {
        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function jsonBadRequest()
    {
        return response()->json(['error' => false], JsonResponse::HTTP_BAD_REQUEST);
    }

    public function jsonNotFound($data)
    {
        return response()->json($data, JsonResponse::HTTP_NOT_FOUND);
    }
}

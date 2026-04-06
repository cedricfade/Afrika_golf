<?php

namespace App\Traits;

trait HttpResponses
{
    /**
     * Retourner une réponse JSON de succès.
     *
     * @param string $message
     * @param array $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiResponse(string $message = '', array $data = [], int $statusCode = 200)
    {
        if ($statusCode >= 400) 
            return $this->errorResponse($message, $data, $statusCode);
        else
            return $this->successResponse($message, $data, $statusCode);
    }


    /**
     * Retourner une réponse JSON de succès.
     *
     * @param string $message
     * @param array $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse(string $message = '', array $data = [], int $statusCode = 200)
    {
        $response = [
            'success' => true,
            'message' => $message ?? __('Opération éffectuée avec succès'),
        ];

        if ($data) {
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * Retourner une réponse JSON d'erreur.
     *
     * @param string $message
     * @param array $errors
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse(string $message = '', array  $errors = [], int $statusCode = 500)
    {
        $response = [
            'success' => false,
            'message' => $message ?? __('Erreure système'),
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * Retourner une réponse datatable.
     *
     * @param array $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatableResponse(array $data, int $statusCode = 200)
    {
        $response = [
            'data' => $data,
        ];

        return response()->json($response, $statusCode);
    }

    /**
     * Retourner une réponse data.
     *
     * @param array $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataResponse(array $data, int $statusCode = 200)
    {
        return response()->json($data, $statusCode);
    }
}

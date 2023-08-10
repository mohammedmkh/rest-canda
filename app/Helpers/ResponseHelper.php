<?
// app/Helpers/ResponseHelper.php

namespace App\Helpers;

class ResponseHelper
{
    public static function success($data = [], $message = null, $statusCode = 200, $paginationModel = null)
    {
        $response = [
            'status' => true,
            'data' => $data,
        ];

        if ($paginationModel) {
            $response['metadata'] = self::metadata($paginationModel);
        }

        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response, $statusCode);
    }

    public static function metadata($model)
    {
        $pagination = [
            'current_page' => $model->currentPage(),
            //'first_page_url' => $model->url(1),
            'from' => $model->firstItem(),
            'last_page' => $model->lastPage(),
            // 'last_page_url' => $model->url($model->lastPage()),
            // 'links' => $model->links()->toArray()['links'],
            // 'next_page_url' => $model->nextPageUrl(),
            // 'path' => $model->path(),
            'per_page' => $model->perPage(),
            // 'prev_page_url' => $model->previousPageUrl(),
            'to' => $model->lastItem(),
            'total' => $model->total(),
        ];

        return $pagination;
    }


    public static function error($message, $status = 400, $errorData = [])
    {
        $response = [
            'status' => false,
            'message' => $message,
        ];

        if (!empty($errorData)) {
            // $messages = $validator->errors()->toArray();
            $messages = $errorData->toArray();
            foreach ($messages as $key => $row) {
                $errors['field'] = $key;
                $errors['message'] = $row[0];
                $arr[] = $errors;
            }

            $response['errors'] = $arr;
        }

        return response()->json($response, $status);
    }
}

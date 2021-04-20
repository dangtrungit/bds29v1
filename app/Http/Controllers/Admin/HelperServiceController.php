<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DeleteService;
use Illuminate\Http\Request;

class HelperServiceController extends Controller
{
    private $multi_delete_service;

    public function __construct(DeleteService $multi_delete_service)
    {
        $this->multi_delete_service = $multi_delete_service;
    }

    public function multiDelete(Request $request)
    {
        $id_list = $request->list;
        $type = $request->type;

        $this->multi_delete_service->setClass($type);
        $success = $this->multi_delete_service->multiDelete($id_list);

        if ($success) {
            return ['success' => 'Xóa thành công!'];
        } else {
            return ['error' => 'Xóa không thành công!'];
        }

    }
}
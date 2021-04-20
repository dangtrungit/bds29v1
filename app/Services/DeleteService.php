<?php

namespace App\Services;

use DB;

class DeleteService
{
    private $class = null;

    public function __construct()
    {

    }

    public function setClass($type)
    {
        switch ($type) {
            case 'bill':
                $this->class = 'App\Models\Bill';
                break;
            default:
                break;
        }
    }

    public function multiDelete(array $list_id)
    {
        if (!$this->class) {
            return false;
        }
        try {
            DB::beginTransaction();
            $this->class::whereIn('id', $list_id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
        return true;
    }
}
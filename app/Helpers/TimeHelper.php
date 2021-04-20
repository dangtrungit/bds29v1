<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class TimeHelper
{
    public static function getDateDiffFromNow(String $date)
    {
        $date = Carbon::parse($date);
        $now = Carbon::now();
        $diff_type = 'ngày';
        $diff = 0;
        $diff = $date->diffInDays($now);
        if ($diff == 0) {
            $diff = $date->diffInHours($now);
            $diff_type = 'giờ';
        };

        if ($diff == 0) {
            $diff = $date->diffInMinutes($now);
            $diff_type = 'phút';
        };
        $string = $diff . " " . $diff_type;
        return [
            'diff' => $diff,
            'type' => $diff_type,
            'string' => $string,
        ];
    }

    public static function getDateBeautyString(String $date)
    {
        $date = Carbon::parse($date);
        return __($date->format('l')) . ', ngày ' . $date->format('d/m/Y g:i A');
    }
}
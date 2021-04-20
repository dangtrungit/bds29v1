<?php
$strJsonFileContents = file_get_contents(public_path('huyen_thi/tinh_tp.json'));
$array = json_decode($strJsonFileContents, true);

DB::table('provinces')->insert($array);
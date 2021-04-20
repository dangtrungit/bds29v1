<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FilemanagerController extends Controller
{
    public function index()
    {
        return view('admin.pages.filemanager.index');
    }
}
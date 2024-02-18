<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class LogActivity extends Controller
{
    public function index(Logs $logs)
    {
        $data = [
            'logs'=> $logs->all()
        ];
        return view('log.log', $data);
    }
}
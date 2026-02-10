<?php

namespace App\Http\Controllers;

use App\Models\EmailLog;

class EmailLogController extends Controller
{
    public function index()
    {
        $logs = EmailLog::latest()->get();

        $thisMonthCount = EmailLog::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        $monthlyLimit = 5; 

        return view('email_logs.index', compact('logs', 'thisMonthCount', 'monthlyLimit'));
    }
}

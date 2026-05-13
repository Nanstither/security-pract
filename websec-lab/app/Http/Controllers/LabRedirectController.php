<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabRedirectController extends Controller
{
    /**
     * Намеренное открытое перенаправление по параметру url.
     */
    public function go(Request $request)
    {
        $url = (string) $request->query('url', '/');

        return redirect()->away($url);
    }
}

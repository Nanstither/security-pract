<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabSearchController extends Controller
{
    /**
     * Намеренно отражает q в HTML без экранирования (reflected XSS).
     */
    public function index(Request $request)
    {
        $q = (string) $request->query('q', '');

        return view('lab.search', ['q' => $q]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DraftController extends Controller
{
    public function show() {
        return view('drafts.drafts');
    }

    public function showForm($mode) {
        return view('drafts.drafts-form', ['mode' => $mode]);
    }
}

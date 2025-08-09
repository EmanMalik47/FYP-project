<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
public function showPdf($filename)
{
    $path = public_path('pdfs/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
}
}
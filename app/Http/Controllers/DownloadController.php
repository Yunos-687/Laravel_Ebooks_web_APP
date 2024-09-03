<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;


class DownloadController extends Controller
{
    //
    public function download($filename)
    {
        $path = storage_path('app/public/books/' . $filename);

        if (Storage::exists('public/books/' . $filename)) {
            return response()->download($path);
        } else {
            return abort(404, 'File not found.');
        }
    }
}

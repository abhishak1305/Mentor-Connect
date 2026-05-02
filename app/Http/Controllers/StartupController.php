<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;

class StartupController extends Controller
{
    /**
     * Display the specified startup's profile.
     */
    public function show($id)
    {
        $startup = Startup::findOrFail($id);

        return view('startups.show', compact('startup'));
    }
}

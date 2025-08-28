<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('websites.index', [
            'websites' => auth()->user()->websites()->get(),
        ]);
    }

    public function new()
    {
        return view('websites.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        auth()->user()->websites()->create([
            'name' => $request->input('name'),
            'config' => '{}',
        ]);

        return redirect()->route('website.index');
    }

    public function view($id)
    {
        $website = auth()->user()->websites()->findOrFail($id);

        return view('websites.template', [
            'website' => $website,
        ]);
    }
}

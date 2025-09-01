<?php

namespace App\Http\Controllers;

use App\Models\WebsiteConfig;
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

    public function edit($id, Request $request)
    {
        $config = WebsiteConfig::firstOrNew(['website_id' => $id])
            ->load('website');

        if ($request->isMethod('post')) {
            $request->validate([
                'hero_title' => 'string',
                'hero_subtitle' => 'string',
                'features_summary' => 'string',
                'feature1_title' => 'string',
                'feature1_description' => 'string',
                'feature2_title' => 'string',
                'feature2_description' => 'string',
                'feature3_title' => 'string',
                'feature3_description' => 'string',
                'plan1_title' => 'string',
                'plan1_price' => 'numeric',
                'plan1_features' => 'string',
                'plan2_title' => 'string',
                'plan2_price' => 'numeric',
                'plan2_features' => 'string',
                'plan3_title' => 'string',
                'plan3_price' => 'numeric',
                'plan3_features' => 'string',
                'testimonial1_author' => 'string',
                'testimonial1_text' => 'string',
                'testimonial1_image' => 'file|image|max:2048',
                'testimonial2_author' => 'string',
                'testimonial2_text' => 'string',
                'testimonial2_image' => 'file|image|max:2048',
                'testimonial3_author' => 'string',
                'testimonial3_text' => 'string',
                'testimonial3_image' => 'file|image|max:2048',
            ]);

            // todo: implement testimonials images upload
            $customization = [
                "hero" => [
                    "title" => $request->input('hero_title'),
                    "subtitle" => $request->input('hero_subtitle'),
                ],
                "features" => [
                    "summary" => $request->input('features_summary'),
                    "items" => [
                        [
                            "title" => $request->input('feature1_title'),
                            "description" => $request->input('feature1_description'),
                        ],
                        [
                            "title" => $request->input('feature2_title'),
                            "description" => $request->input('feature2_description'),
                        ],
                        [
                            "title" => $request->input('feature3_title'),
                            "description" => $request->input('feature3_description'),
                        ]
                    ],
                ],
                "pricing_plans" => [
                    [
                        "title" => $request->input('plan1_title'),
                        "price" => $request->input('plan1_price'),
                        "features" => array_map('trim', explode(",", $request->input('plan1_features'))),
                    ],
                    [
                        "title" => $request->input('plan2_title'),
                        "price" => $request->input('plan2_price'),
                        "features" => array_map('trim', explode(",", $request->input('plan2_features'))),
                    ],
                    [
                        "title" => $request->input('plan3_title'),
                        "price" => $request->input('plan3_price'),
                        "features" => array_map('trim', explode(",", $request->input('plan3_features'))),
                    ],
                ],
                "testimonials" => [
                    [
                        "author" => $request->input('testimonial1_author'),
                        "text" => $request->input('testimonial1_text'),
                        "image" => null,
                    ],
                    [
                        "author" => $request->input('testimonial2_author'),
                        "text" => $request->input('testimonial2_text'),
                        "image" => null,
                    ],
                    [
                        "author" => $request->input('testimonial3_author'),
                        "text" => $request->input('testimonial3_text'),
                        "image" => null,
                    ],
                ],
            ];

            $config->config = json_encode($customization);
            $config->save();

            return redirect()->route('website.index');
        }


        return view('websites.edit', [
            'config' => $config,
            'data' => $config->config,
        ]);
    }
}

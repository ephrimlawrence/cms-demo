<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
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
            'config' => json_decode($website->config),
        ]);
    }

    public function browseWebsite($slug){
        $website = WebsiteConfig::where('slug', $slug)->firstOrFail();

        // A​ Track page views for each client's page  - visitor IP, timestamp, user agent
        Analytics::create([
            'website_id' => $website->website_id,
            'visitor_ip' => request()->ip(),
            'timestamp' => now(),
            'user_agent' => request()->header('User-Agent'),
        ]);

        return view('websites.template', [
            'website' => $website->website,
            'config' => json_decode($website->config),
        ]);
    }

    public function edit($id, Request $request)
    {
        $config = WebsiteConfig::where('website_id', $id)->first();
        if ($config == null) {
            $config = WebsiteConfig::create([
                'website_id' => $id,
                'config' => json_encode($this->configTemplate())
            ]);
            $config = WebsiteConfig::where('website_id', $id)->first()->load('website');
        }

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
                'testimonial2_author' => 'string',
                'testimonial2_text' => 'string',
                'testimonial3_author' => 'string',
                'testimonial3_text' => 'string',
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

            $config->update(["config" => json_encode($customization)]);
            $config->website->update(['config' => json_encode($customization)]);

            return redirect()->route('website.index');
        }

        return view('websites.edit', [
            'config' => $config,
            'data' => json_decode($config->config),
        ]);
    }

    private function configTemplate()
    {
        return [
            "hero" => [
                "title" => 'Seamlessly Connect and Sync Your Data',
                "subtitle" => 'CloudSync offers a robust platform for syncing data across all your devices, ensuring your information is always up-to-date and accessible.',
            ],
            "features" => [
                "summary" => 'CloudSync provides a comprehensive suite of features designed to enhance your data management and accessibility.',
                "items" => [
                    [
                        "title" => 'Secure Data Storage',
                        "description" => "Benefit from our secure cloud infrastructure, ensuring your data is stored safely and reliably.",
                    ],
                    [
                        "title" => 'End-to-End Encryption',
                        "description" => 'Your data is protected with advanced encryption, safeguarding it from unauthorized access.',
                    ],
                    [
                        "title" => 'Real-Time Synchronization',
                        "description" => 'Experience seamless data synchronization across all your devices, keeping your information current. ',
                    ]
                ],
            ],
            "pricing_plans" => [
                [
                    "title" => 'Basic',
                    "price" => '99',
                    "features" => ['5GB Storage', 'Basic Support', 'Single Device Sync'],
                ],
                [
                    "title" => 'Pro',
                    "price" => '19.99',
                    "features" => ['100GB Storage', 'Priority Support', 'Multi-Device Sync', 'Advanced Security'],
                ],
                [
                    "title" => "Enterprise",
                    "price" => "49.99",
                    "features" => ["Unlimited Storage", "24/7 Support", "Unlimited Devices", "Advanced Security Features", "Dedicated Account Manager"]
                ]
            ],
            "testimonials" => [
                [
                    "author" => 'Sophia Bennett, Marketing Manager',
                    "text" => "CloudSync has revolutionized how I manage my data. It's reliable and easy to use.",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCklY9OYHmqfM3IBM9TIHbLqLFMYAfYBnJ5ou8QeFIUjS6DeqAq7QYCU-ArHKRVk-pp2SAfLd4qgLCw5sKdSvrZ57DvV_OjtbL3DMx1GGakb5YvzBn70Pcnkt6OlDWmEV3qYpfVh5CuDeHgNFosL3vZqsIvI0Wnc95CtqElp0TNmyyZMGdGtyyIm76zn-cSHTOF8dmNXSBFSxzvIX0KaYBeIMzCj-URXy-MLDzWwv80jDqzif3uIwoYyladAPu60Zi4BXMDt-EmVQY",
                ],
                [
                    "author" => 'Ethan Carter, Software Engineer',
                    "text" => 'The real-time sync feature is a game-changer. I can access my files from anywhere.',
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAGXJ1PkU6Y_pPrKywHmgccheOQm7Rt349A9D_ZHo-fuj-R_rv0mq-2zlxcU8bjlW_-FSyG2Li1dVBvMjjESyA-BlLcmZr3ZP0DAeot2SVYFgpcSZ1jsMCKm2S1Hx4Ky7uv_KRCCTNFfLnAQdJOYCN9GGBipd60GYT9H2SShcYYIonPnZ27cBaK5Cq1attTCSblA5xs8Hs3tfKruNN-1EXxCrcLYZRbx7Q4_bGahx-c2WttnGDZYZeTh2LtqaXZvpdKYWFzUds5EAc",
                ],
                [
                    "author" => 'Olivia Hayes, Freelance Designer',
                    "text" => "I feel confident knowing my data is secure with CloudSync's encryption",
                    "image" => "https://lh3.googleusercontent.com/aida-public/AB6AXuDUboH42soVc2tsIF5iAC5-29P0c_rF37aYIZTe1GWCCrA4FGT5YGpWtBiYfJRrKU-C34zJ4IxH29UUSYFAK3GdWxLPGqHIoIIBsfSjjOUZfdzQA5B9qf1tRf0rCfY-YyRZ08-aj3sYlCHqnAStYoVr3wODKB_8VwtHExaXqxcAAjpjnqioXzukXSrTp8zMcTLLNKsiZc3f_aTzIrKvatHccPJPbQLdnPH4ss84c2-yOZ-XeVjCaEyLrDmXh9OqQNCP5f5ItQBLPNk",
                ],
            ],
        ];
    }
}

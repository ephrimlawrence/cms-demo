<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteConfig extends Model
{
    protected $table = "website_configs";

    protected $fillable = [
        'website_id',
        'config',
        'revisions',
    ];

    protected $casts = [
        'revisions' => 'array',
    ];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}

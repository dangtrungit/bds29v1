<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoManager extends Model
{
    protected $table = "seo_manager";

    protected $fillable = [
        "link",
        "description",
        "canonical",
        "title",
        "url",
        "keywords",
        "og_title",
        "og_description",
        "og_type",
        "og_image",
        "og_site_name",
        "og_url",
        "tw_title",
        "tw_type",
        "tw_card",
        "tw_description",
        "tw_image",
        "tw_site_name",
        "tw_url",
        "ld_json",
    ];
}
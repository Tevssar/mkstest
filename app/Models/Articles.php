<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleTags;

class Articles extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(ArticleTags::class, 'article_tag');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','used_apps', 'img','slug', 'category_id'];

    public function category(): BelongsTo{
        return $this->belongsTo(category::class);
    }

    public static function generateSlug($title){
        return Str::slug($title,'-');
    }
}

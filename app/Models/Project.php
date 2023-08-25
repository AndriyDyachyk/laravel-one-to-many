<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Model\Category;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','used_apps', 'img','slug', 'category_id'];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public static function generateSlug($title){
        return Str::slug($title,'-');
    }
}

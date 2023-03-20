<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [ "title", "picture", "content" ,"price","qte"];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }


    
}

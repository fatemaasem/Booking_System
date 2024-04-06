<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Book extends Model
{
    use HasFactory;
    protected $fillable=['name','description','image','category_id'];
    public function member(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

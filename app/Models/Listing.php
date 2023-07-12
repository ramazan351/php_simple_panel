<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    public function scopeFilter($query, array $filters)
    {
      // dd($filters);
        $query->when($filters['tag'] ?? false, function ($query, $search) {
            return $query->where('tags', 'like', '%' . $search . '%');
        });
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
     protected $fillable = ['title', 'company', 'website', 'location', 'email', 'tags', 'description'];
    public function scopeFilter($query, array $filters)
    {
      // dd($filters);
        $query->when($filters['tag'] ?? false, function ($query, $search) {
            return $query->where('tags', 'like', '%' . $search . '%');
        });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('tags', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('company', 'like', '%' . $search . '%')
            ->orWhere('tags', 'like', '%' . $search . '%');
        });
    }

}

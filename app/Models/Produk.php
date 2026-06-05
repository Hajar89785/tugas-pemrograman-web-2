<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


#[Fillable(['category_id', 'name', 'brand', 'unit', 'specification', 'status'])]

class Produk extends Model
{
    use HasFactory, SoftDeletes;
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    #[Scope]
    protected function scopeFilter(Builder $query, array $filters): void
    {

        $query
            ->when($filters['keyword'] ?? false, function ($query, $keyword){
            return $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->when($filters['category_id'] ?? false, function ($query, $category){
            return $query->where('category_id', $category);
            });

    }
}

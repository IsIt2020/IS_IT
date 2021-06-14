<?php

namespace App\Models\Traits;

trait WhereLike
{
    // 部分一致検索
    public function scopeWhereLike($query, string $column, string $keyword)
    {
        return $query->where($column, 'like', '%' . addcslashes($keyword, '%_\\') . '%');
    }

    // 前方一致検索
    public function scopeWhereLikeForward($query, string $column, string $keyword)
    {
        return $query->where($column, 'like', addcslashes($keyword, '%_\\') . '%');
    }
}
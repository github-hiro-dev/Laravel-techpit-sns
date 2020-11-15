<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user ? (bool)$this->likes->where('id', $user->id)->count() : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    public function tags(): BelongsToMany
    {
        // belongsToManyメソッドは通常第二引数に中間テーブル名を書くが、
        // 中間テーブルの名前が二つのモデル名の単数形をアルファベット順に結合した名前であれば、省略可能。
        // なので、likesメソッドのbelongsToManyは第二引数あり。
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}

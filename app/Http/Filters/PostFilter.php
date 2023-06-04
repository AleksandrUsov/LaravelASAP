<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const USER_ID = 'user_id';
    public const CATEGORY_ID = 'category_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'], //На будущее
            self::USER_ID => [$this, 'userId'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function userId(Builder $builder, $value): void
    {
        $builder->where('user_id', $value);
    }

    public function categoryId(Builder $builder, $value): void
    {
        $builder->where('category_id', $value);
    }
}

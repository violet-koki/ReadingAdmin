<?php

declare(strict_types=1);

namespace App\Consts;

enum Gender: int
{
    case Male   = 1;
    case Female = 2;

    /** 
     * 名前を取得
     * 
     * @return string
     */
    public function description(): string
    {
        return match ($this) {
            self::Male   => '男性',
            self::Female => '女性',
        };
    }
}

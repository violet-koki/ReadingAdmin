<?php

namespace App\Command\User;

use App\Command\Base\Command;

// ユーザコマンドクラス
class UserCommand extends Command
{
    protected const MODEL_TYPE = 'App\Models\User';

    /**
     * ユーザ情報を削除
     *
     * @param int $userId
     * @return void 
     */
    public function softDelete(int $userId): void
    {
        $this::MODEL_TYPE::find($userId)->delete();
    }
}

<?php

namespace App\Services\User;

use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserQuery
{
    /**
     * ユーザ取得
     *
     * @param array $searchParams
     * @return User
     */
    public function fetchOne(array $searchParams): User
    {
        $user = $this->find($searchParams);
        if (!$user) {
            throw new NotFoundHttpException();
        }
        return $user;
    }

    /**
     * ユーザ絞り込み
     *
     * @param array $searchParams
     * @return null|User
     */
    public function find(array $searchParams): null|User
    {
        return User::query()->where($searchParams)->first();
    }
}


<?php
namespace App\Services\User;

use App\Models\User;
use App\Command\User\UserCommand;


class UserService
{
    private $userCommand;
    /**
     * コンストラクタ
     */
    public function __construct(UserCommand $userCommand)
    {
        $this->userCommand = $userCommand;
    }

    /**
     * ユーザ情報を登録
     *
     * @param array $data
     * @return void
     */
    public function userRegister(array $data): void
    {
        $user = User::create(...[
            'user_id' => $data['user_id'],
            'nick_name' => $data['nick_name'],
            'name' => $data['name'],
            'mail' => $data['mail'],
            'password' => $data['password'],
        ]);
        $this->userCommand->save($user);
    }
}
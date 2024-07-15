<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Services\User\UserService;
use Illuminate\Http\Response;

class UserRegisterController extends Controller
{
    private $userService;
    /**
     * コンストラクタ
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * ユーザ登録
     */
    public function userRegister(UserRegisterRequest $request): Response
    {
        $this->userService->userRegister($request->validated());
        return response('', 204);
    }
}

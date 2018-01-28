<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * 条件にマッチするユーザリスト取得
     *
     * @param srting|null $email
     * @return \Illuminate\Support\Collection
     */
    public function getUserList(?string $email)
    {
        return $this->userRepository->list($email);
    }
}
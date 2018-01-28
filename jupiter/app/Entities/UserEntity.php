<?php

namespace App\Entities;

use App\Models\User;

class UserEntity {
    private $record;

    /**
     * コンストラクタ
     * @param User $record
     */
    public function __construct(User $record)
    {
        $this->record = $record;
    }

    /**
     * @return User
     */
    public function getRecord()
    {
        return $this->record;
    }
}

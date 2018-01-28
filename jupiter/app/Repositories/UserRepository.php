<?php

namespace App\Repositories;

use App\Models\User;
use App\Entities\UserEntity;
use Illuminate\Support\Collection;

class UserRepository {

    public function find(int $id)
    {
        $record = User::find($id);

        if (is_null($record)) {
            return null;
        }

        return new UserEntity($record);
    }

    /**
     * @inheritDoc
     */
    public function list(?string $email): Collection
    {
        if (is_null($email)) {
            $email = '';
        }

        $data = collect(User::where('email', 'LIKE', "%{$email}%")->get())
            ->map(function (User $record) {
                return new UserEntity($record);
            });

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function persist(UserEntity $userEntity): UserEntity
    {
        $record = $userEntity->getRecord();
        $record->save();

        return $userEntity;
    }

    /**
     * @inheritDoc
     */
    public function new(array $record): UserEntity
    {
        return new UserEntity((new User())->forceFill($record));
    }
}

<?php

namespace Database\Seeds;

use Silver\Database\Query as Seed;

class DefaultSeed
{
    /**
     * run
     *
     * @return void
     */
    public static function run()
    {
        Seed::insert(
            'users',
            [
                'username' => 'admin',
                'password' => md5('admin'),
                'salt' => 'ht4h4',
                'email' => 'admin@admin.local',
                'active' => 1,
            ]
        )->execute();
    }
}

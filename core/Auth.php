<?php

namespace Core;


use App\Models\User;

class Auth
{
    public static function user()
    {
        if (is_null($_SESSION['user'])) {
            return null;
        }

        $user = (new User())->find($_SESSION['user']);

        return $user ?: null;
    }

    public static function login($user)
    {
        if (!$user && !($user instanceof User)) {
            throw new \Exception("argument of login method must be instead of " . User::class);
        }

        $_SESSION['user'] = $user->id;

    }

    public static function loginUsingId(int $id)
    {
        $user = (new User())->find($id);
        static::login($user);
    }

    public static function attempt($email , $password): bool
    {
        $user = (new User())->where( 'email' ,$email)->first();
        if (!$user || !password_verify($password , $user->password)){
            return false;
        }
        return true;
    }

}
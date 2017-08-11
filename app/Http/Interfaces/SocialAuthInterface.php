<?php

namespace App\Http\Interfaces;

interface SocialAuthInterface
{
    public function getSelectProvider($provider, $userProvider, $checkProvider);
    public function saveUser($userProvider);
    public function saveProvider($provider, $userProvider, $userGetReal);
}

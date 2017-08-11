<?php

namespace App\Http\Eloquents;

use App\Http\Interfaces\SocialAuthInterface;

use App\User;

use App\Provider;

class SocialAutheloquent implements SocialAuthInterface
{
    public function getSelectProvider($provider, $userProvider, $checkProvider)
    {

        if (!$checkProvider) {
            // New User

            // check if exist by the email
            $userGetReal = User::where('email', $userProvider->getEmail())->first();

            if (!$userGetReal) {

                $userGetReal = $this->saveUser($userProvider);
            }

            $newProvider = $this->saveProvider($provider, $userProvider, $userGetReal);

        } else {
            // login User
            $userGetReal = User::find($checkProvider->user_id);
        }

        // logi and redirect
        return $userGetReal;
    }

    public function saveUser($userProvider)
    {

        $userGetReal = new User();
        $userGetReal->name = $userProvider->getName();
        $userGetReal->email = $userProvider->getEmail();
        $userGetReal->password = $userProvider->token;
        $userGetReal->save();

        return $userGetReal;
    }

    public function saveProvider($provider, $userProvider, $userGetReal)
    {
        $newProvider = new Provider();
        $newProvider->provider_id = $userProvider->getId();
        $newProvider->provider = $provider;
        $newProvider->user_id= $userGetReal->id;
        $newProvider->save();

        return $newProvider;

    }

}

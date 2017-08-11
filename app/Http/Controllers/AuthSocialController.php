<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Interfaces\SocialAuthInterface as SocialAuth;

use Socialite;

use App\Provider;

use App\User;

class AuthSocialController extends Controller
{
    /**
    * Redirect the user to the $provider [Facebook, Twitter, Githup] authentication page.
    *
    * @return Response
    */
   public function redirectToProvider($provider)
   {
       return Socialite::driver($provider)->redirect();
   }

   /**
    * Obtain the user information from $provider [Facebook, Twitter, Githup].
    *
    * @return Response
    */
   public function handleProviderCallback(SocialAuth $socialAuth, $provider)
   {
       $user = Socialite::driver($provider)->user();

       /*
           // All Providers
           $user->getId();
           $user->getNickname();
           $user->getName();
           $user->getEmail();
           $user->getAvatar();
       */

       $selectProvider = Provider::where('provider_id', $user->getId())->first();

       $userLogin = $socialAuth->getSelectProvider($provider, $user, $selectProvider);
       auth()->login($userLogin);
      return redirect('/home');
   }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\SocialAccount;
use App\User;
use Illuminate\Support\Facades\DB;
//use Laravel\Socialite\Facades\Socialite;
use Socialite;

class SocialController extends Controller
{
    public function loginUrl($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function loginCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $user = null;

        DB::transaction(function () use ($socialUser, $provider, &$user) {
            $socialAccount = SocialAccount::firstOrNew(
                ['social_id' => $socialUser->getId(), 'social_provider' => $provider],
                ['social_name' => $socialUser->getName()]
            );

            if (!($user = $socialAccount->user)) {
                $user = User::create([
                    'email' => $socialUser->getEmail(),
                    'name' => $socialUser->getName(),
                ]);
                $socialAccount->fill(['user_id' => $user->id])->save();
            }
        });
        auth()->login($user);
        return redirect()->to('/home');
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\SocialAccount;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function loginUrl()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function loginCallback()
    {
        $GithubUser = Socialite::driver('Github')->stateless()->user();
        $user = null;
        DB::transaction(function () use ($GithubUser, &$user) {
            $socialAccount = SocialAccount::firstOrNew(
                ['social_id' => $GithubUser->getId(), 'social_provider' => 'Github'],
                ['social_name' => $GithubUser->getName()]
            );

            if (!($user = $socialAccount->user)) {
                $user = User::create([
                    'email' => $GithubUser->getEmail(),
                    'name' => $GithubUser->getName(),
                ]);
                $socialAccount->fill(['user_id' => $user->id])->save();
            }
        });

        return Response::json([
            'user' => new UserResource($user),
            'Github_user' => $GithubUser,
        ]);
    }
}

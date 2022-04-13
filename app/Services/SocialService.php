<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialContract;

class SocialService implements Social
{

    public function authUser(SocialContract $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if ($user) {
            if ($socialUser->getName())
                $user->name = $socialUser->getName();
            if ($socialUser->getAvatar())
                $user->avatar = $socialUser->getAvatar();
            if ($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account.index');
            }
            throw new Exception("Wasn't auth user, we can try latter");
        } else {
            $userId = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'image'=> $socialUser->getAvatar(),
                'password' => encrypt('qwerty123')
            ]);
            if ($userId) {
                Auth::login($userId);
                return route('account.index');
            }
            throw new Exception("Wasn't add user, we can try latter");
            return route('register');
        }
        return route('register');
    }
}

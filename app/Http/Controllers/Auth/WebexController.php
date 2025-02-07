<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
//use App\Models\UserSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class WebexController extends Controller 
{
    public function login() 
    {
        return Socialite::driver('webex')->scopes($this->getScopes(env('WEBEX_REDIRECT_URI')))->redirect();
    }

    public function callback(Request $request)
    {
        $webex = json_decode(json_encode(Socialite::driver('webex')->stateless(true)->user()));

        if(empty($webex->user->orgId)) {
            return print_r($webex);

            Log::notice("Webex user organization not found: " . json_encode($webex));

            return abort(404);
        }

        $id = ['person_id' => $webex->id];
        $user = User::where($id)->first();
        $payload = [
            'org_id' => $webex->user->orgId,
            'name' => $webex->user->displayName,
            'email' => $webex->email
        ];

        if(!$user) {
            $user = User::create(array_merge($id, $payload));
        }

        else {
            $user->update($payload);
        }

        if(Auth::loginUsingId($user->id)) {
            $request->session()->put([
                'person' => $webex->user,
                'scopes' => $webex->approvedScopes,
                'token' => $webex->accessTokenResponseBody,
            ]);

            return Redirect::route('dashboard');
        }

        else {
            Log::notice("Failed to loginUsingId: " . json_encode($user));

            return abort(404);
        }
    }

    private function getScopes($uri)
    {
        $urlQueryParams = explode('&', parse_url($uri, PHP_URL_QUERY));
        $scopes = [];

        foreach($urlQueryParams as $param) {
            $data = explode('=', $param);

            if(count($data) <> 2) continue;

            if($data[0] == 'scope') {
                $scopes = explode(' ', urldecode($data[1]));
            }
        }

        return $scopes;
    }
}
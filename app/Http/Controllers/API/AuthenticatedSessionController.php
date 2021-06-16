<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Profile;
use App\Models\User_Interests_Categories;
use App\Models\Profile_Statistics;
use App\Models\Category;
use App\Models\Currency_Points;
use App\Models\Challenge;
use App\Models\Challenge_Progression;
use App\Models\Profile_Picture;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return session()->all();
    }

   /* public function getAuthenticatedSessionData(){
        
    }*/

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return session()->all();
    }

    public function retrieveSessionData(){
        return Auth::user()->id;
    }

    public function retrieveProfilePicture(){
        $userid = Auth::user()->id;
        $user = User::find($userid);

        $profile_pictures = Profile_Picture::get();
        

        $userprofilepictureurl = "";
        foreach($profile_pictures as $profile_picture) {
            if($profile_picture->user_id == $user->id && $profile_picture->active == True){
                $userprofilepictureurl = $profile_picture->url;
            }
        }

        return ['url'=> $userprofilepictureurl];
    }
}

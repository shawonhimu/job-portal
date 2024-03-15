<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Candidate;
use Exception;
use Illuminate\Http\Request;

class WebPageController extends Controller
{

    //==============   Web Page Controller contains basically all views and relational data   ==============//

    //===== All pages views  =====//

    public function homePage()
    {
        return view('website.pages.Index');
    }

    public function aboutPage()
    {
        return view('website.pages.AboutPage');
    }

    public function blogPage()
    {
        return view('website.pages.BlogPage');
    }

    public function contactPage()
    {
        return view('website.pages.ContactPage');
    }

    public function jobPage()
    {
        return view('website.pages.JobPage');
    }

    public function loginPage()
    {
        return view('website.pages.LoginPage');
    }

    public function registrationPage()
    {
        return view('website.pages.RegistrationPage');
    }

    public function otpVerifyPage()
    {
        return view('website.pages.RegisOTPVerifyPage');
    }

    //============== After Login  ==============//

    public function activityPage()
    {
        return view('website.pages.ActivityPage');
    }

    public function profilePage()
    {
        return view('website.pages.ProfilePage');
    }

    public function editProfilePage()
    {
        return view('website.pages.EditProfilePage');
    }

    public function registPhotoPage()
    {
        return view('website.pages.RegisPhotoPage');
    }

    public function settingPage()
    {
        return view('website.pages.SettingPage');
    }

    // Candiadte photo retrive

    public function getCandidateOnlyPhoto(Request $request)
    {
        try {
            // from token
            $email = $request->header('email');
            $candidate_id = $request->header('id');
            //Get details
            $profilePhoto = Candidate::where('email', '=', $email)->where('id', '=', $candidate_id)->get()->value('img');
            return ResponseHelper::Out('success', $profilePhoto, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

}

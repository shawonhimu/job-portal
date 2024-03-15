<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Mail\OTPMail;
use App\Models\Candidate;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CandidateController extends Controller
{

    //==============  Candidate Registration with OTP validation ===================//

    public function CandidateRegistration(Request $request)
    {
        try {

            $userEmail = $request->input('email');
            $OTP = rand(100000, 999999);
            $details = [ 'code' => $OTP ];
            Mail::to($userEmail)->send(new OTPMail($details));

            Candidate::create([
                'first_name' => $request->input('firstName'),
                'last_name' => $request->input('lastName'),
                'email' => $userEmail,
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
                'otp' => $OTP,
             ]);

            return ResponseHelper::Out('success', 'A 6 digit OTP has sent to your email. Please verify OTP.', 200)->cookie('usermail', $userEmail, 60 * 60 * 6);
        } catch (Exception $e) {
            return $e;
            // return ResponseHelper::Out('fail', 'Something went wrong, please try again ', 200);
        }
    }

    //==============  Candidate Login  ===================//

    public function CandidateLogin(Request $request)
    {
        $count = Candidate::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->select('id')->first();
        if (null != $count) {
            // return $count;
            $token = JWTToken::CreateToken($request->input('email'), $count->id);
            // return $token;
            return ResponseHelper::Out('success', 'Login success', 200)->cookie('token', $token, 60 * 24 * 60);

        } else {
            return ResponseHelper::Out('fail', 'Login failed ! Wrong email or password', 201);
        }
    }

    //==============  Candidate Logout  ===================//

    public function CandidateLogout()
    {
        return redirect('candidate-login')->cookie('token', null, -1);
    }

    //==============  Send OTP to reset password   ===================//

    public function sendOTPcode(Request $request)
    {
        $email = $request->input('email');
        $randOTP = rand(100000, 999999);
        $countCandidate = Candidate::where('email', '=', $email)->count();
        if (1 == $countCandidate) {
            //Send OTP to Candidate mail
            $details = [ 'code' => $randOTP ];
            Mail::to($email)->send(new OTPMail($details));
            //insert OTP to database 'otp' field
            Candidate::where('email', '=', $email)->update([ 'otp' => $randOTP ]);

            return ResponseHelper::Out('success', 'Your OTP has sent successfully, Please check your email', 200);

        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to send otp',
             ]);
        }

    }

    //==============  Verify OTP to registration or reset password  ===================//

    public function verifyOTP(Request $request)
    {
        $email = $request->cookie('usermail');
        $otp = $request->input('otp');
        $verification = Candidate::where('email', $email)->where('otp', $otp)->first();
        // return $verification;
        if ($verification) {
            Candidate::where('email', $email)->where('otp', $otp)->update([ 'otp' => '0' ]);
            $token = JWTToken::CreateToken($email, $verification->id);
            return ResponseHelper::Out('success', 'OTP verification success', 200)->cookie('token', $token, 60 * 24 * 60)->cookie('usermail', null, -1);
        } else {
            return ResponseHelper::Out('fail', 'Something went wrong !', 200);
        }

    }

    //==============  Candidate Reset Password  ===================//

    public function ResetPassword(Request $request)
    {

        $id = $request->header('id');
        $email = $request->header('email');
        $newPassword = $request->input('password');
        try {
            Candidate::where('email', '=', $email)->update([ "password" => $newPassword ]);
            return ResponseHelper::Out('success', 'Password reset successfully !', 200);

        } catch (\Exception $e) {
            return ResponseHelper::Out('fail', 'Fail to reset password', 200);
        }
    }

    //============= Upload candidate image  =================//

    public function uploadRegisPhoto(Request $request)
    {
        $candidate_id = $request->header('id');
        $email = $request->header('email');

        //catch input file image
        $image = $request->file('img');
        // time for image rename
        $localTime = Carbon::now();
        $t = $localTime->timestamp;
        $filename = $image->getClientOriginalName();
        //rename image
        $imgName = "{$candidate_id}-{$t}-{$filename}";
        //upload image
        $image->move(public_path("uploads"), $imgName);

        //url path for database
        $img_url = "uploads/{$imgName}";

        try {
            // Candidate::where('id', '=', $candidate_id)->where('email', '=', $email)->update([ "img" => $img_url ]);
            $candidateUpdate = Candidate::findOrFail($candidate_id);
            $candidateUpdate->img = $img_url;
            $candidateUpdate->save();
            return ResponseHelper::Out('success', 'You profile picture uploaded successfully !', 200);

        } catch (\Exception $e) {
            // return $e;
            return ResponseHelper::Out('fail', 'Fail to reset password', 200);
        }
    }

}

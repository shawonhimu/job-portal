<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Mail\OTPMail;
use App\Models\Company;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{

    //==============  Company Registration with OTP validation ===================//

    public function CompanyRegistration(Request $request)
    {
        try {

            $companyEmail = $request->input('companyEmail');
            $OTP = rand(100000, 999999);
            $details = [ 'code' => $OTP ];
            Mail::to($companyEmail)->send(new OTPMail($details));

            Company::create([
                'company_name' => $request->input('companyName'),
                'company_type' => $request->input('companyType'),
                'company_details' => $request->input('companyDetails'),
                'establish_date' => $request->input('establishDate'),
                // 'company_logo' => $request->input('companyLogo'),
                'company_phone' => $request->input('companyPhone'),
                'company_email' => $request->input('companyEmail'),
                'company_TIN_no' => $request->input('companyTINno'),
                'company_fax_no' => $request->input('companyFaxNo'),
                'company_password' => $request->input('companyPassword'),
                'otp' => $OTP,
             ]);

            return ResponseHelper::Out('success', 'A 6 digit OTP has sent to your email. Please verify OTP.', 200)->cookie('companyEmail', $companyEmail, 60 * 60 * 6);
        } catch (Exception $e) {
            // return $e;
            return ResponseHelper::Out('fail', $e, 201);
            // return ResponseHelper::Out('fail', 'Something went wrong, please try again ', 201);
        }
    }

    //==============  Company Login  ===================//

    public function CompanyLogin(Request $request)
    {
        $count = Company::where('company_email', '=', $request->input('email'))
            ->where('company_password', '=', $request->input('password'))
            ->select('id')->first();
        if (null != $count) {
            // return $count;
            $token = JWTToken::CreateCompanyToken($request->input('email'), $count->id);
            // return $token;
            return ResponseHelper::Out('success', 'Login success', 200)->cookie('cmptoken', $token, 3600 * 24 * 7);

        } else {
            return ResponseHelper::Out('fail', 'Login failed', 201);
        }
    }

    //==============  Company Logout  ===================//

    public function CompanyLogout()
    {
        return redirect('company-login')->cookie('cmptoken', null, -1);
    }

    //==============  Send OTP to reset password   ===================//

    public function sendOTPcode(Request $request)
    {
        $email = $request->input('email');
        $randOTP = rand(100000, 999999);
        $countCompany = Company::where('email', '=', $email)->count();
        if (1 == $countCompany) {
            //Send OTP to Company mail
            $details = [ 'code' => $randOTP ];
            Mail::to($email)->send(new OTPMail($details));
            //insert OTP to database 'otp' field
            Company::where('email', '=', $email)->update([ 'otp' => $randOTP ])->cookie('companyEmail', $email, 60 * 60 * 6);
            // companyEmail in cookies for resend OTP if user don't receive otp
            return ResponseHelper::Out('success', 'Your OTP has sent successfully, Please check your email', 200);

        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to send otp',
             ]);
        }

    }

    //==============  Re-Send OTP to reset password   ===================//

    public function resendOTPcode(Request $request)
    {
        $email = $request->input('companyEmail');
        $randOTP = rand(100000, 999999);
        $countCompany = Company::where('email', '=', $email)->count();
        if (1 == $countCompany) {
            //Send OTP to Company mail
            $details = [ 'code' => $randOTP ];
            Mail::to($email)->send(new OTPMail($details));
            //insert OTP to database 'otp' field
            Company::where('email', '=', $email)->update([ 'otp' => $randOTP ]);
            // companyEmail in cookies for resend OTP if user don't receive otp
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
        try {
            $email = $request->cookie('companyEmail');
            $otp = $request->input('otp');
            $verification = Company::where('company_email', $email)->where('otp', $otp)->select('id')->first();
            // return $verification;
            if ($verification) {
                Company::where('company_email', $email)->where('otp', $otp)->update([ 'otp' => '0' ]);
                $token = JWTToken::CreateCompanyToken($email, $verification->id);
                return ResponseHelper::Out('success', 'OTP verification success', 200)->cookie('cmptoken', $token, 60 * 60 * 24 * 7)->cookie('companyEmail', null, -1); // companyEmail in cookies for resend OTP if user don't receive otp
            } else {
                // return ResponseHelper::Out('fail', 'Something went wrong !', 201);
                return ResponseHelper::Out('fail', 'Something went wrong !', 201);
            }
        } catch (\Exception $e) {
            return $e;
        }

    }

    //==============  Company Reset Password  ===================//

    public function ResetPassword(Request $request)
    {

        $id = $request->header('id');
        $email = $request->header('email');
        $newPassword = $request->input('password');
        try {
            Company::where('email', '=', $email)->update([ "password" => $newPassword ]);
            return ResponseHelper::Out('success', 'Password reset successfully !', 200);

        } catch (\Exception $e) {
            return ResponseHelper::Out('fail', 'Fail to reset password', 200);
        }
    }

    //============= Upload candidate image  =================//

    public function uploadCompanyRegisPhoto(Request $request)
    {
        $company_id = $request->header('com_id');
        $company_email = $request->header('com_email');

        //catch input file image
        $image = $request->file('img');
        // time for image rename
        $localTime = Carbon::now();
        $t = $localTime->timestamp;
        $filename = $image->getClientOriginalName();
        //rename image
        $imgName = "{$company_id}-{$t}-{$filename}";
        //upload image
        $image->move(public_path("uploads"), $imgName);

        //url path for database
        $img_url = "uploads/{$imgName}";

        try {
            // Candidate::where('id', '=', $company_id)->where('email', '=', $email)->update([ "img" => $img_url ]);
            $companyUpdate = Company::findOrFail($company_id);
            $companyUpdate->company_logo = $img_url;
            $companyUpdate->save();
            return ResponseHelper::Out('success', 'You profile picture uploaded successfully !', 200);

        } catch (\Exception $e) {
            // return $e;
            return ResponseHelper::Out('fail', 'Fail to reset password', 201);
        }
    }

}

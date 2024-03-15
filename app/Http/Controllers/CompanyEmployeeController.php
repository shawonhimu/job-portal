<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Models\Company;
use App\Models\CompanyEmployee;
use Exception;
use Illuminate\Http\Request;

class CompanyEmployeeController extends Controller
{

    //==============  Retrieve all profile data ===================//

    public function index(Request $request)
    {
        try {
            $company_id = $request->header('id');
            $data = CompanyEmployee::where('company_id', '=', $company_id)->get();
            return ResponseHelper::Out('success', $data, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Form To add  profile data ===================//

    public function create()
    {
        return view('dashboard.pages.company.AddEmployeePage');
    }

    //==============  Company Employee Registration  ===================//

    public function store(Request $request)
    {
        try {

            $companyMail = $request->header('com_email');
            $companyID = $request->header('com_id');
            $count = Company::where('id', $companyID)->where('company_email', $companyMail)->first();

            if (null != $count) {
                $data = CompanyEmployee::create([
                    'first_name' => $request->input('firstName'),
                    'last_name' => $request->input('lastName'),
                    'designation' => $request->input('designation'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    // 'img' => $request->input('img'),
                    'password' => $request->input('password'),
                    'company_id' => $companyID,
                 ]);
                // $details = [ 'code' => $data ];
                // Mail::to($request->input('email'))->send(new OTPMail($details));
                return redirect('new-employee')->with('success', 'Success !');
            }
        } catch (Exception $e) {
            return $e;
            // return ResponseHelper::Out('fail', 'Something went wrong, please try again ', 200);
        }
    }

    //==========  Employee  Login Page View   ================//

    public function employeeLoginPage(Request $request)
    {
        return view('dashboard.components.company-pages.EmployeeLogin');
    }

    //==========  Employee Login   ================//

    public function employeeLogin(Request $request)
    {
        $count = CompanyEmployee::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->select('id', 'company_id')->first();
        if (null != $count) {
            // return $count;
            $token = JWTToken::CreateCompanyEmployeeToken($request->input('email'), $count->id, $count->company_id);
            // return $token;
            return redirect('employee-home')->cookie('emptoken', $token, 60 * 24 * 60);

        } else {
            return redirect()->back()->with('error', 'Failed to login');
        }
    }

    //==========  Employee Login   ================//

    public function employeeLogout(Request $request)
    {
        return redirect('employee-login')->cookie('emptoken', null, -1);
    }

    //==============  Get form data to edit profile details ===================//

    public function edit(Request $request, string $id)
    {
        try {
            $company_id = $request->header('com_id');
            $data = CompanyEmployee::where('company_id', '=', $company_id)->where('id', '=', $id)->first();
            return view('dashboard.pages.company.EditEmployeePage', [ 'data' => $data ]);
        } catch (Exception $e) {
            return $e;
            // return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Edit or update profile details ===================//

    public function update(Request $request)
    {
        try {
            // from login cookie

            $company_id = $request->header('com_id');

            //from input form data

            $id = $request->input('id');

            //Update

            $data = CompanyEmployee::where('id', $id)->where('company_id', $company_id)->update(
                [
                    'first_name' => $request->input('firstName'),
                    'last_name' => $request->input('lastName'),
                    'designation' => $request->input('designation'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'img' => $request->input('img'),
                    'password' => $request->input('password'),
                    'company_id' => $company_id,
                 ]);
            return ResponseHelper::Out('success', $data, 200);

        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Delete or destroy profile details ===================//

    public function destroy(Request $request, string $id)
    {
        try {
            $company_id = $request->header('com_id');
            CompanyEmployee::where('id', '=', $id)->where('company_id', '=', $company_id)->delete();
            return ResponseHelper::Out('success', 'Your profile details has deleted successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

}

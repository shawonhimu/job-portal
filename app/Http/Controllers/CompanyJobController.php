<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CompanyEmployee;
use App\Models\CompanyJob;
use Exception;
use Illuminate\Http\Request;

class CompanyJobController extends Controller
{

    //==============  As job will be posted by employe. So EmployeeHomepage here ===================//

    public function employeeHome()
    {
        return view('dashboard.pages.job.EmployHomePage');
    }

    //==============  Retrieve all profile data ===================//

    public function index(Request $request)
    {
        try {
            $company_id = $request->header('com_id');
            $data = CompanyJob::where('company_id', '=', $company_id)->get();
            return view('dashboard.pages.job.JobListPage', [ 'data' => $data ]);
            // return $data;
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Form To add  profile data ===================//

    public function create()
    {
        return view('dashboard.pages.job.AddJobPage');
    }

    //==============  Company Post a Job  ===================//

    public function store(Request $request)
    {
        try {

            $employeeEmail = $request->header('emp_email');
            $employeeID = $request->header('emp_id');
            $companyID = $request->header('com_id');
            $count = CompanyEmployee::where('company_id', $companyID)->where('email', $employeeEmail)->select('id')->first();

            // return [ $employeeID, $employeeEmail, $companyID ];

            if (null != $count) {
                CompanyJob::create([
                    'job_title' => $request->input('jobTitle'),
                    'job_description' => $request->input('jobDescription'),
                    'benefits' => $request->input('jobBenefits'),
                    'required_skills' => $request->input('requiredSkills'),
                    'application_deadline' => $request->input('applicationDeadline'),
                    'salary' => $request->input('salary'),
                    'company_id' => $companyID,
                    'employee_id' => $employeeID,
                 ]);
                return redirect()->back()->with('success', 'Job published successfully !');

            } else {
                return redirect()->back()->with('error', 'Job published failed !');
            }
        } catch (Exception $e) {
            return $e;
            // return redirect()->back()->with('error', "Job published failed !");
        }
    }

    //==========   Get single profile details to view action   ================//

    public function show(string $id)
    {
        //
    }

    //==============  Get form data to edit profile details ===================//

    public function edit(Request $request, string $id)
    {
        try {
            $employeeID = $request->header('emp_id');
            $companyID = $request->header('com_id');
            $data = CompanyJob::where('company_id', '=', $companyID)->where('employee_id', '=', $employeeID)->where('id', '=', $id)->first();
            return view('dashboard.pages.job.EditJobPage', [ 'data' => $data ]);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Edit or update profile details ===================//

    public function update(Request $request)
    {
        try {
            $employeeEmail = $request->header('emp_email');
            $employeeID = $request->header('emp_id');
            $companyID = $request->header('com_id');
            $count = CompanyEmployee::where('company_id', $companyID)->where('email', $employeeEmail)->select('id')->first();

            // return [ $employeeID, $employeeEmail, $companyID ];

            if (null != $count) {
                CompanyJob::where('id', $request->input('id'))->update([
                    'job_title' => $request->input('jobTitle'),
                    'job_description' => $request->input('jobDescription'),
                    'benefits' => $request->input('jobBenefits'),
                    'required_skills' => $request->input('requiredSkills'),
                    'application_deadline' => $request->input('applicationDeadline'),
                    'salary' => $request->input('salary'),
                    'company_id' => $companyID,
                    'employee_id' => $employeeID,
                 ]);
                return redirect()->back()->with('success', 'Job published successfully !');

            } else {
                return redirect()->back()->with('error', 'Job published failed !');
            }
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Delete or destroy profile details ===================//

    public function destroy(Request $request, string $id)
    {
        try {
            $company_id = $request->header('id');
            CompanyJob::where('id', '=', $id)->where('company_id', '=', $company_id)->delete();
            return ResponseHelper::Out('success', 'Your profile details has deleted successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

}

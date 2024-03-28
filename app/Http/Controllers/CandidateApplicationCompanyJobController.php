<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CandidateCompanyJob;
use App\Models\CandidateProfile;
use App\Models\CompanyCandidateSalary;
use Exception;
use Illuminate\Http\Request;

class CandidateApplicationCompanyJobController extends Controller
{

    //==============  Retrieve all profile data ===================//

    public function index(Request $request)
    {
        try {
            $candidate_id = $request->header('id');
            $data = CandidateProfile::where('candidate_id', '=', $candidate_id)->with('CompanyJob')->get();
            return ResponseHelper::Out('success', $data, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Form To add  profile data ===================//

    public function create()
    {
        return view('ProfileDetailForm');
    }

    //==============  Form To add  profile data ===================//

    public function numberOfAppliedJob(Request $request)
    {
        $candidate_id = $request->header('id');
        $count = CompanyCandidateSalary::where('candidate_id', $candidate_id)->count();
        return view('website.pages.ActivityPage', [ 'numOfAppliedJobs' => $count ]);
    }

    //==============  To Create or add profile details ===================//

    public function store(Request $request)
    {
        try {
            // from login cookie

            $candidate_id = $request->header('id');
            if (!$candidate_id) {
                return redirect('candidate-login');
            } else {

                //from input form data
                $companyJobID = $request->input('jobID');
                $currentSalary = $request->input('currentSalary');
                $expectedSalary = $request->input('expectedSalary');

                $data = CompanyCandidateSalary::updateOrCreate(
                    [
                        'candidate_id' => $candidate_id,
                        'company_job_id' => $companyJobID,
                     ],
                    [
                        'candidate_id' => $candidate_id,
                        'company_job_id' => $companyJobID,
                        'current_salary' => $currentSalary,
                        'expected_salary' => $expectedSalary,
                     ]);
                return redirect()->back()->with('success', 'Job appication successfully');
            }

        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
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
            $candidate_id = $request->header('candidate_id');
            $data = CandidateProfile::where('candidate_id', '=', $candidate_id)->where('id', '=', $id)->first();
            return ResponseHelper::Out('success', $data, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Edit or update profile details ===================//

    public function update(Request $request)
    {
        //
    }

    //==============  Delete or destroy profile details ===================//

    public function destroy(Request $request, string $id)
    {
        try {
            $candidate_id = $request->header('candidate_id');
            CandidateCompanyJob::where('id', '=', $id)->where('candidate_id', '=', $candidate_id)->delete();
            return ResponseHelper::Out('success', 'Your profile details has deleted successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

}

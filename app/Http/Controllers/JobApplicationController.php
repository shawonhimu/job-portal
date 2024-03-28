<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Candidate;
use App\Models\CompanyCandidateSalary;
use App\Models\CompanyJob;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function appliedCandidateListForHR(Request $request)
    {
        $candidate_id = $request->header('id');
        // $data = CompanyJob::where('id', '11')->with('company:id,company_name')->with('candidate:id,email,first_name,last_name,img')->get();
        // $data = Candidate::with('profile')->with('education')->get();
        $data = Candidate::with('company_job:id,job_title')->with('profile')->with('education')->select('id', 'first_name', 'last_name', 'email')->get();
        return ResponseHelper::Out('success', $data, 200);
    }

    //==================   Candidate Applied Job List  =================//

    public function candidateAppliedJobList(Request $request)
    {
        $candidate_id = $request->header('id');
        $data = CompanyCandidateSalary::where('candidate_id', $candidate_id)->with('candidate:id,first_name,last_name')->with('company_job')->with('company_job.company:id,company_name')->paginate('2');
        return view('website.pages.AppliedJobPage', [ 'data' => $data ]);
        // return $data;
    }

    //================     Candidate Applied Job Details  =================//
    public function candidateAppliedJobDetails(Request $request, $id)
    {
        $candidate_id = $request->header('id');
        $data = CompanyJob::where('id', $id)->with('company:id,company_name')->get();
        return view('website.pages.JobDetailsPage', [ 'data' => $data ]);
        // return $data;
    }

    public function candidateExpectedSalary(Request $request)
    {
        $candidate_id = $request->header('id');
        // $data = Candidate::where('id', 10)->with('company_job:id,job_title')->select('id', 'first_name', 'last_name', 'email')->get();
        $data = CompanyCandidateSalary::with('candidate:id,first_name,last_name,email')->with('company_job:id,job_title')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
}

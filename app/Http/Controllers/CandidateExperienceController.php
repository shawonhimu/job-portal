<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CandidateExperience;
use Exception;
use Illuminate\Http\Request;

class CandidateExperienceController extends Controller
{
    //==============  Retrieve all profile data ===================//

    public function index(Request $request)
    {
        try {
            $candidate_id = $request->header('id');
            $candidateExpData = CandidateExperience::where('candidate_id', '=', $candidate_id)->get();

            return ResponseHelper::Out('success', $candidateExpData, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Form To add  profile data ===================//

    public function create()
    {
        return view('ProfileDetailForm');
    }

    //==============  To Create or add profile details ===================//

    public function store(Request $request)
    {
        try {
            // from login cookie

            $candidate_id = $request->header('id');

            //from input form data

            $designation = $request->input('designation');
            $company_name = $request->input('company_name');
            $joining_date = $request->input('joining_date');
            $departure_date = $request->input('departure_date');

            $ExpData = CandidateExperience::create(
                [
                    'designation' => $designation,
                    'company_name' => $company_name,
                    'joining_date' => $joining_date,
                    'departure_date' => $departure_date,
                    'candidate_id' => $candidate_id,
                 ]);
            return ResponseHelper::Out('success', $ExpData, 200);

        } catch (Exception $e) {
            return $e;
            // return ResponseHelper::Out('fail', "Error ! Something went wrong", 201);
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
            $candidate_id = $request->header('id');
            $candidateExpData = CandidateExperience::where('candidate_id', '=', $candidate_id)->where('id', '=', $id)->first();
            return ResponseHelper::Out('success', $candidateExpData, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Edit or update profile details ===================//

    public function update(Request $request)
    {
        try {
            // from login cookie

            $candidate_id = $request->header('id');

            //from input form data

            $id = $request->input('id');
            $designation = $request->input('designation');
            $company_name = $request->input('company_name');
            $joining_date = $request->input('joining_date');
            $departure_date = $request->input('departure_date');

            //Update

            $ExpData = CandidateExperience::where('id', $id)->where('candidate_id', $candidate_id)->update(
                [
                    'designation' => $designation,
                    'company_name' => $company_name,
                    'joining_date' => $joining_date,
                    'departure_date' => $departure_date,
                    'candidate_id' => $candidate_id,
                 ]);
            return ResponseHelper::Out('success', $ExpData, 200);

        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 201);
        }
    }

    //==============  Delete or destroy profile details ===================//

    public function destroy(Request $request, string $id)
    {
        try {
            $candidate_id = $request->header('id');
            CandidateExperience::where('id', '=', $id)->where('candidate_id', '=', $candidate_id)->delete();
            return ResponseHelper::Out('success', 'Your profile details has deleted successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 201);
        }
    }
}

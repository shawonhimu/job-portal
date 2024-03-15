<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CandidateProfile;
use Exception;
use Illuminate\Http\Request;

class CandidateProfileController extends Controller
{
    //==============  Retrieve all profile data ===================//

    public function index(Request $request)
    {
        try {
            // from token
            $email = $request->header('email');
            $candidate_id = $request->header('id');
            //Get details
            $CandiProfileData = CandidateProfile::where('email', '=', $email)->where('candidate_id', '=', $candidate_id)->with('candidate')->first();
            return ResponseHelper::Out('success', $CandiProfileData, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 201);
        }
    }

    //==============  Form To add  profile data ===================//

    public function create()
    {
        return view('ProfileDetailForm');
    }

    //==============  Create or update profile details ===================//

    public function store(Request $request)
    {
        try {
            // from login cookie

            $email = $request->header('email');
            $candidate_id = $request->header('id');

            //from input form data

            $fullname = $request->input('fullname');
            $father_name = $request->input('father_name');
            $mother_name = $request->input('mother_name');
            $date_of_birth = $request->input('date_of_birth');
            $NID = $request->input('NID');
            $birth_registration_id = $request->input('birth_registration_id');
            $passport_no = $request->input('passport_no');
            $phone = $request->input('phone');
            $linked_in = $request->input('linked_in');
            $github = $request->input('github');
            $social_media1 = $request->input('social_media1');
            $website = $request->input('website');
            $present_address = $request->input('present_address');
            $permanent_address = $request->input('permanent_address');
            CandidateProfile::updateOrCreate([
                'email' => $email,
                'candidate_id' => $candidate_id,
             ],
                [
                    'fullname' => $fullname,
                    'father_name' => $father_name,
                    'mother_name' => $mother_name,
                    'date_of_birth' => $date_of_birth,
                    'NID' => $NID,
                    'birth_registration_id' => $birth_registration_id,
                    'passport_no' => $passport_no,
                    'phone' => $phone,
                    'email' => $email,
                    'linked_in' => $linked_in,
                    'github' => $github,
                    'social_media1' => $social_media1,
                    'website' => $website,
                    'present_address' => $present_address,
                    'permanent_address' => $permanent_address,

                    'candidate_id' => $candidate_id,
                 ]);
            return ResponseHelper::Out('success', 'Profile data has updated successfully', 200);

        } catch (Exception $e) {
            // return $e;
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 201);
        }
    }

    //==============  Get single profile details ===================//

    public function show(Request $request)
    {
        try {
            // from token
            $email = $request->header('email');
            $candidate_id = $request->header('id');
            //Get details
            $CandiProfileData = CandidateProfile::where('email', '=', $email)->where('candidate_id', '=', $candidate_id)->first();
            return ResponseHelper::Out('success', $CandiProfileData, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 201);
        }
    }

    //==============  Get form data to edit profile details ===================//

    public function edit(string $id)
    {
        //
    }

    //==============  Edit or update profile details ===================//

    public function update(Request $request)
    {
        //
    }

    //==============  Delete or destroy profile details ===================//

    public function destroy(Request $request)
    {
        try {
            $email = $request->header('email');
            $candidate_id = $request->header('candidate_id');
            CandidateProfile::where('email', '=', $email)->where('candidate_id', '=', $candidate_id)->delete();
            return ResponseHelper::Out('success', 'Your profile details has deleted successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 201);
        }
    }
}

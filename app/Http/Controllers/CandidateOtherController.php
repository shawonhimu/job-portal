<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CandidateOther;
use Exception;
use Illuminate\Http\Request;

class CandidateOtherController extends Controller
{

    //==============  Retrieve all profile data ===================//

    public function index(Request $request)
    {
        try {
            $candidate_id = $request->header('id');
            $data = CandidateOther::where('candidate_id', '=', $candidate_id)->get();
            return ResponseHelper::Out('success', $data, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Form To add  profile data ===================//

    public function create()
    {
        // return view('ProfileDetailForm');
    }

    //==============  To Create or add profile details ===================//

    public function store(Request $request)
    {
        try {
            // from login cookie

            $candidate_id = $request->header('id');

            //from input form data

            $skills = $request->input('skills');

            $data = CandidateOther::updateOrCreate(
                [
                    'candidate_id' => $candidate_id,
                 ],
                [
                    'skills' => $skills,
                    'candidate_id' => $candidate_id,
                 ]);
            return ResponseHelper::Out('success', $data, 200);

        } catch (Exception $e) {
            // return $e;
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 201);
        }
    }

    //==========   Get single profile details to view action   ================//

    public function show(string $id)
    {
        //
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

    public function destroy(Request $request, string $id)
    {
        try {
            $candidate_id = $request->header('candidate_id');
            CandidateOther::where('id', '=', $id)->where('candidate_id', '=', $candidate_id)->delete();
            return ResponseHelper::Out('success', 'Your profile details has deleted successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

}

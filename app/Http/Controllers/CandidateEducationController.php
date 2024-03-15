<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CandidateEducation;
use Exception;
use Illuminate\Http\Request;

class CandidateEducationController extends Controller
{
    //==============  Retrieve all profile data ===================//

    public function index(Request $request)
    {
        try {
            $candidate_id = $request->header('id');
            $candidateEduData = CandidateEducation::where('candidate_id', '=', $candidate_id)->get();
            return ResponseHelper::Out('success', $candidateEduData, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Form To add  profile data ===================//

    public function create()
    {
        return view('EducationForm');
    }

    //==============  To Create or add profile details ===================//

    public function store(Request $request)
    {
        try {
            // from login cookie

            $candidate_id = $request->header('id');

            //from input form data

            $degree_name = $request->input('degree_name');
            $institute_name = $request->input('institute_name');
            $subject_group = $request->input('subject_group');
            $board = $request->input('board');
            $passing_year = $request->input('passing_year');
            $result = $request->input('result');
            $eduData = CandidateEducation::create(
                [
                    'degree_name' => $degree_name,
                    'institute_name' => $institute_name,
                    'subject_group' => $subject_group,
                    'board' => $board,
                    'passing_year' => $passing_year,
                    'result' => $result,
                    'candidate_id' => $candidate_id,
                 ]);
            return ResponseHelper::Out('success', $eduData, 200);

        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==========   Get single profile details to view only   ================//

    public function show(string $id)
    {
        //
    }

    //==============  Get form data to edit profile details ===================//

    public function edit(Request $request, string $id)
    {
        try {
            $candidate_id = $request->header('id');
            $candidateEduData = CandidateEducation::where('candidate_id', '=', $candidate_id)->where('id', '=', $id)->first();
            return ResponseHelper::Out('success', $candidateEduData, 200);
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
            $degree_name = $request->input('degree_name');
            $institute_name = $request->input('institute_name');
            $subject_group = $request->input('subject_group');
            $board = $request->input('board');
            $passing_year = $request->input('passing_year');
            $result = $request->input('result');

            //Update

            $eduData = CandidateEducation::where('id', $id)->where('candidate_id', $candidate_id)->update(
                [
                    'degree_name' => $degree_name,
                    'institute_name' => $institute_name,
                    'subject_group' => $subject_group,
                    'board' => $board,
                    'passing_year' => $passing_year,
                    'result' => $result,
                 ]);
            return ResponseHelper::Out('success', $eduData, 200);

        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Delete or destroy profile details ===================//

    public function destroy(Request $request, string $id)
    {
        try {
            $candidate_id = $request->header('id');
            $data = CandidateEducation::where('id', '=', $id)->where('candidate_id', '=', $candidate_id)->delete();
            return ResponseHelper::Out('success', $data, 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CandidateTraining;
use Exception;
use Illuminate\Http\Request;

class CandidateTrainingController extends Controller
{

    //==============  Retrieve all profile data ===================//

    public function index(Request $request)
    {
        try {
            $candidate_id = $request->header('id');
            $candidateTrainData = CandidateTraining::where('candidate_id', '=', $candidate_id)->get();
            return ResponseHelper::Out('success', $candidateTrainData, 200);
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

            $training_name = $request->input('training_name');
            $institute_name = $request->input('institute_name');
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            $TrainData = CandidateTraining::create(
                [
                    'training_name' => $training_name,
                    'institute_name' => $institute_name,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'candidate_id' => $candidate_id,
                 ]);
            return ResponseHelper::Out('success', $TrainData, 200);

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
            $candidate_id = $request->header('id');
            $candidateTrainData = CandidateTraining::where('candidate_id', '=', $candidate_id)->where('id', '=', $id)->first();
            return ResponseHelper::Out('success', $candidateTrainData, 200);
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
            $training_name = $request->input('training_name');
            $institute_name = $request->input('institute_name');
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            //Update

            $TrainData = CandidateTraining::where('id', $id)->where('candidate_id', $candidate_id)->update(
                [
                    'training_name' => $training_name,
                    'institute_name' => $institute_name,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'candidate_id' => $candidate_id,
                 ]);
            return ResponseHelper::Out('success', $TrainData, 200);

        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }

    //==============  Delete or destroy profile details ===================//

    public function destroy(Request $request, string $id)
    {
        try {
            $candidate_id = $request->header('id');
            CandidateTraining::where('id', '=', $id)->where('candidate_id', '=', $candidate_id)->delete();
            return ResponseHelper::Out('success', 'Your profile details has deleted successfully', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', "Error ! Something went wrong", 200);
        }
    }
}

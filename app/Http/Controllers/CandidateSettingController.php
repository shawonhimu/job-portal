<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CandidateSettingController extends Controller
{

    //============   Get registration info   =============//

    public function index(Request $request)
    {
        try {
            $candidate_id = $request->header('id');
            $email = $request->header('email');

            $data = Candidate::where([ 'email' => $email, 'id' => $candidate_id ])->select('first_name', 'last_name', 'email', 'mobile', 'img')->get();
            return ResponseHelper::Out('success', $data, 200);

        } catch (\Throwable $e) {

            return ResponseHelper::Out('fail', 'Error! Something went wrong', 201);
        }

    }

    //============   Update settins photo =============//

    public function updateProfilePicture(Request $request)
    {
        $candidate_id = $request->header('id');
        $email = $request->header('email');

        //catch input file image
        $image = $request->file('img');
        // time for image rename
        $localTime = Carbon::now();
        $t = $localTime->timestamp;
        $filename = $image->getClientOriginalName();
        //rename image
        $imgName = "{$candidate_id}-{$t}-{$filename}";

        //url path for database
        $img_url = "uploads/{$imgName}";

        $countCandidate = Candidate::where([ 'email' => $email, 'id' => $candidate_id ])->count();

        //get candidate old picture
        $file_path = Candidate::where([ 'email' => $email, 'id' => $candidate_id ])->get()->value('img');

        if (!$countCandidate) {
            // return $e;
            return ResponseHelper::Out('fail', 'Fail to update details', 201);

        } else {
            //delete old photo

            File::delete($file_path);
            //upload photo
            $image->move(public_path("uploads"), $imgName);
            $candidateUpdate = Candidate::findOrFail($candidate_id);
            $candidateUpdate->img = $img_url;
            $candidateUpdate->save();
            return ResponseHelper::Out('success', 'Your profile picture updated successfully', 200);
        }
    }

    //============   Update settins photo =============//

    public function updateProfileDetails(Request $request)
    {
        try {
            $candidateUpdate = Candidate::findOrFail($request->header('id'));
            $candidateUpdate->first_name = $request->input('first_name');
            $candidateUpdate->last_name = $request->input('last_name');
            $candidateUpdate->mobile = $request->input('mobile');
            $candidateUpdate->save();
            return ResponseHelper::Out('success', 'Your profile updated successfully', 200);

        } catch (\Throwable $e) {
            return $e;
            // return ResponseHelper::Out('fail', 'Fail to update details', 201);
        }

    }

    //============   Update settins Password =============//

    public function updateProfilePassword(Request $request)
    {
        $candidate_id = $request->header('id');
        $currentPassword = $request->input('currentPassword');
        $newPassword = $request->input('newPassword');
        $count = Candidate::where([ 'id' => $candidate_id, 'password' => $currentPassword ])->count();
        if (!$count) {
            return ResponseHelper::Out('fail', 'Wrong password, try again', 201);
        } else {
            $candidateUpdate = Candidate::findOrFail($candidate_id);
            $candidateUpdate->password = $newPassword;
            $candidateUpdate->save();
            return ResponseHelper::Out('success', 'Your password updated successfully', 200);
        }
    }

}

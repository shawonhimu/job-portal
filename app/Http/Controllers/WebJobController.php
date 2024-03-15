<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyJob;
use App\Models\JobCategory;

class WebJobController extends Controller
{
    public function getJobList()
    {
        return Company::with('job')->get();
    }
    // Job Category List names
    public function getCategoryList()
    {
        return JobCategory::select('id', 'job_cat_name')->get();
    }

    public function getAllCategoryJob()
    {
        return CompanyJob::latest()->limit(6)->get();
    }

    public function getJobByCategoryID($id)
    {
        return CompanyJob::latest()->where('job_category_id', $id)->limit(6)->get();
    }

    public function getAllCategoryJobForPage()
    {
        return CompanyJob::latest()->paginate(2);
    }

    public function getJobByCategoryIDForPage($id)
    {
        return CompanyJob::latest()->where('job_category_id', $id)->paginate(2);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyPageViewController extends Controller
{

/**------------------------------------------------------------------------
 *                  Company Before Login Pages Views
 * ------------------------------------------------------------------------
 */

    public function loginPage()
    {
        return view('website.pages.CompanyLoginPage');
    }

    public function registrationPage()
    {
        return view('website.pages.CompanyRegistrationPage');
    }

    public function verifyOtpPage()
    {
        return view('website.pages.CompanyOtpPage');
    }

    public function logoPage()
    {
        return view('website.pages.CompanyLogoPage');
    }

/**------------------------------------------------------------------------
 *                  Company Dashboard Pages Views
 * ------------------------------------------------------------------------
 */

    public function homePage()
    {
        return view('dashboard.pages.company.HomePage');
    }

    public function addJobPage()
    {
        return view('dashboard.pages.company.AddJobPage');
    }

    public function editJobPage()
    {
        return view('dashboard.pages.company.AddJobPage');
    }

    public function jobListPage(Request $request)
    {

        return view('dashboard.pages.company.JobListPage');
    }

}

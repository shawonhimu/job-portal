<!--            Profile Area       -->
<section class="myAccount">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="myAccountProfile myProfileCard">
                    <div>
                        <div class="text-center">
                            <h4>Your Applied Job Details</h4>
                            <hr />
                        </div>
                        <div>
                            <h2 class="h3">Job Title : {{ $data[0]->job_title }}</h2>
                            <h6>Company Name : {{ $data[0]->company->company_name }}</h6>
                            <h6>Application Deadline : {{ $data[0]->application_deadline }}</h6>
                            <span class="btn category-btn">Job Salary : {{ $data[0]->salary }}</span>
                            <hr />
                            <div>
                                <h4>Job Description :</h4>
                                <p>
                                    {{ $data[0]->job_description }}
                                </p>
                            </div>
                            <div>
                                <h4 class="mt-3">Job Benefits :</h4>
                                <p>
                                    {{ $data[0]->benefits }}
                                </p>
                            </div>
                            <div>
                                <h4 class="mt-3">Job required skills :</h4>
                                <p>
                                    @php
                                        $skills = explode(',', $data[0]->required_skills);

                                        foreach ($skills as $skill) {
                                            echo "<span class='mx-1 my-2 btn tags'>$skill</span>";
                                        }

                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

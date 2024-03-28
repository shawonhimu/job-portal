<!--            Profile Area       -->
<section class="myAccount">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="text-center">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="mt-3">Your profile has complete 75%</h4>
                    <h4 class="mt-3">Update Your Profile Now</h4>
                    <div>
                        <a class="btn myBtn" href="{{ url('/activity') }}">Activity</a>
                        <a class="btn category-btn" href="{{ url('/profile') }}">Profile</a>
                        <a class="btn category-btn" href="{{ url('/edit-profile') }}">Edit Profile</a>
                        <a class="btn category-btn" href="{{ url('/applied-job') }}">Applied Jobs</a>
                        <a class="btn category-btn" href="{{ url('/setting') }}">Settings</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2"></div>
        </div>
        <div class="row mt-md-5 mt-3">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <div class="myProfileCard">
                    <div class="text-center">
                        <h4>Applied Jobs = {{ $numOfAppliedJobs }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="myProfileCard">
                    <div class="text-center">
                        <h4>Saved Jobs = 2</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>

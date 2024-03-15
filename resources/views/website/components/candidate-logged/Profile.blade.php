<!--            Profile Area       -->
<section class="myAccount">
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="myAccountProfile myProfileCard">
                    <div class="d-flex justify-content-between bg-blood mb-3">
                        <div>
                            <h3>Profile</h3>
                        </div>
                        <div>
                            <a class="btn btn-dark" href="{{ url('/edit-profile') }}"><i class="fas fa-pen"></i></a>
                        </div>
                    </div>
                    <div class="profileImg">
                        <div class="singleUserDetails my-4">

                            <div id="personalDetails">
                                {{-- Personal details from JS --}}
                            </div>
                            <div class="proCardTitle">
                                <h5>Education History :</h5>
                            </div>
                            <div class="singleCardDtails">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Degree Name</th>
                                            <th>Institute</th>
                                            <th>Subject/Group</th>
                                            <th>Board</th>
                                            <th>Passing Year</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody id="educationDetails">
                                        {{-- Education Details --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="proCardTitle">
                                <h5>Job Experience :</h5>
                            </div>
                            <div class="singleCardDtails">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Designation</th>
                                            <th>Company Name</th>
                                            <th>Joining Date</th>
                                            <th>Departure Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="jobExperiences">
                                        {{-- Job Experiences --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="proCardTitle">
                                <h5>Professional Training :</h5>
                            </div>
                            <div class="singleCardDtails">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Training Name</th>
                                            <th>Institute Name</th>
                                            <th>Stated Date</th>
                                            <th>Departure Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="trainingDetails">
                                        {{-- Professional training --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row text-center mt-3 mt-sm-3">
                            <div class="col-lg-6 col-md-6">
                                <a href="{{ url('edit-profile') }}" class="btn btn-secondary px-5">Edit Profile</a>
                            </div>
                            <div class="col-lg-6 col-md-6 mt-3 mt-sm-3 mt-md-0">
                                <a href="{{ url('setting') }}" type="submit" class="btn btn-dark px-5">Settings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</section>


@section('script')
    <script>
        async function Profile() {
            $("#personalDetails").empty();
            let res = await axios.get('profile-details')
                .then(response => {
                    let details = response.data.data
                    // console.log(details)
                    let personalDetails = `<div class="cardName">
                                                <h5><span class="title-mark">Name</span> : ${details.fullname}</h5>
                                            </div>
                                            <div class="d-lg-flex justify-content-between">
                                                <div class="singleCardDtails pt-5">
                                                    <div>
                                                        <span class="title-mark">Father's name</span>
                                                        : <span> ${details.father_name} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Mother's name</span>
                                                        : <span> ${details.mother_name} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Date of Birth</span>
                                                        : <span> ${details.date_of_birth} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">NID</span>
                                                        : <span> ${details.NID} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Birth registration id </span>
                                                        : <span> ${details.birth_registration_id} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Passport no</span>
                                                        : <span> ${details.passport_no} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Phone</span>
                                                        : <span> ${details.phone} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Email</span>
                                                        : <span> ${details.email} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Linked in</span>
                                                        : <span> ${details.linked_in} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Github</span>
                                                        : <span> ${details.github} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Social media one</span>
                                                        : <span> ${details.social_media1} </span>
                                                    </div>
                                                    <div>
                                                        <span class="title-mark">Website</span>
                                                        : <span> ${details.website} </span>
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-3 mb-lg-0">
                                                    <img src="${details.candidate['img']}" alt="" id="upProfileImg" />
                                                </div>
                                            </div>
                                            <div class="proCardTitle">
                                                <h5>Present Address :</h5>
                                            </div>
                                            <div class="singleCardDtails">
                                                ${details.present_address}
                                            </div>
                                            <div class="proCardTitle">
                                                <h5>Permanent Address :</h5>
                                            </div>
                                            <div class="singleCardDtails">
                                                ${details.permanent_address}
                                            </div>`
                    $("#personalDetails").append(personalDetails);
                })
                .catch(error => {
                    console.log(error);
                });

        }

        async function ProfileEducation() {
            // $("#personalDetails").empty();
            let eduData = await axios.get('education-details');
            // console.log(eduData);
            eduData.data['data'].forEach((item, i) => {
                let activeClass = ''
                if (i === 0) {
                    activeClass = ' active '
                }
                let educationDetails = `<tr>
                                            <td>${item['degree_name']}</td>
                                            <td>${item['institute_name']}</td>
                                            <td>${item['subject_group']}</td>
                                            <td>${item['board']}</td>
                                            <td>${item['passing_year']}</td>
                                            <td>${item['result']}</td>
                                        </tr>`
                $("#educationDetails").append(educationDetails)
            })
        }


        async function JobExperience() {
            // $("#personalDetails").empty();
            let experiences = await axios.get('experience-details');
            console.log(experiences.data['data'].length);
            if (experiences.data['data'].length == 0) {
                $("#jobExperiences").append("<td><h5>No experiences found</h5></td>")
            } else {
                experiences.data['data'].forEach((item, i) => {
                    let activeClass = ''
                    if (i === 0) {
                        activeClass = ' active '
                    }
                    let jobExperiences = `<tr>
                                            <td>${item['designation']}</td>
                                            <td>${item['company_name']}</td>
                                            <td>${item['joining_date']}</td>
                                            <td>${item['departure_date']}</td>
                                        </tr>`

                    $("#jobExperiences").append(jobExperiences)
                })
            }
        }

        async function ProfileTraining() {
            // $("#personalDetails").empty();
            let trainings = await axios.get('training-details');
            // console.log(trainings.data['data'].length);
            if (trainings.data['data'].length == 0) {
                $("#trainingDetails").append("<td><h5>No professional training found</h5></td>")
            } else {
                trainings.data['data'].forEach((item, i) => {
                    let activeClass = ''
                    if (i === 0) {
                        activeClass = ' active '
                    }
                    let trainingDetails = `<tr>
                                            <td>${item['training_name']}</td>
                                            <td>${item['institute_name']}</td>
                                            <td>${item['start_date']}</td>
                                            <td>${item['end_date']}</td>
                                        </tr>`

                    $("#trainingDetails").append(trainingDetails)
                })
            }
        }


        (async () => {
            showLoader();
            await Profile();
            await ProfileEducation();
            await JobExperience();
            await ProfileTraining();
            await hideLoader();
            /** For delete */
        })();
    </script>
@endsection

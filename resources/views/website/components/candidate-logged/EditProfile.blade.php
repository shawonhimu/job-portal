<!--            Profile Area       -->

<section class="myAccount">
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="myAccountProfile myProfileCard">
                    <div class="d-flex justify-content-between bg-blood mb-3">
                        <div>
                            <h3>Profile - Personal Details</h3>
                        </div>
                        <div>
                            <a href="{{ url('profile') }}" class="btn btn-outline-dark"><i
                                    class="fas fa-eye me-3"></i>Profile</a>
                        </div>
                    </div>
                    <div class="profileImg">
                        <div class="singleUserDetails my-4">
                            <div class="cardName">
                                <div>
                                    <span class="title-mark">Name</span>
                                    : <input type="text" name="" id="editFullname"
                                        placeholder="Enter your name" class="px-3" value="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="singleCardDtails pt-5">
                                    <div class="mt-2">
                                        <span class="title-mark">Father's name</span>
                                        : <input type="text" name="" id="editFatherName"
                                            placeholder="Enter your father's name" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Mother's name</span>
                                        : <input type="text" name="" id="editMotherName"
                                            placeholder="Enter your mother's name" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Date of Birth</span>
                                        : <input type="text" name="" id="editBirthDate"
                                            placeholder="Enter your date of birth" class="px-3" value="" />
                                    </div>

                                    <div class="mt-2">
                                        <span class="title-mark">NID No</span>
                                        : <input type="text" name="" id="editNID"
                                            placeholder="Enter your NID no" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Birth Certificate No</span>
                                        : <input type="text" name="" id="editBirthCertificate"
                                            placeholder="Enter birth cerficate no" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Passport No</span>
                                        : <input type="text" name="" id="editPassport"
                                            placeholder="Enter passport no" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Phone Number</span>
                                        : <input type="text" name="" id="editPhone"
                                            placeholder="Enter your phone" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Email </span>
                                        : <input type="text" name="" id="editEmail"
                                            placeholder="Enter your email" class="px-3" value="" readonly
                                            disabled />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Linkedin </span>
                                        : <input type="text" name="" id="editLinkedin"
                                            placeholder="Enter your linked in" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Github </span>
                                        : <input type="text" name="" id="editGithub"
                                            placeholder="Enter your github" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Website </span>
                                        : <input type="text" name="" id="editWebsite"
                                            placeholder="Enter your website" class="px-3" value="" />
                                    </div>
                                </div>
                                <div>
                                    <!-- <div class="profileImg">
                                        <img src="./images/shawon-himu.png" alt="" id="upProfileImg" />
                                        <label for="uploadIMG">
                                            <i class="fas fa-camera"></i>
                                        </label>
                                        <input type="file" name="" class="uploadIMG" id="uploadIMG" onchange=" previewImage('uploadIMG','upProfileImg')" />
                                    </div> -->
                                </div>
                            </div>
                            <div class="proCardTitle mt-3">
                                <h5>Present Address :</h5>
                            </div>
                            <div class="singleCardDtails">
                                <textarea class="p-2" name="" id="editPresentAddr" cols="100%" rows="2"></textarea>
                            </div>
                            <div class="proCardTitle mt-3">
                                <h5>Permanent Address :</h5>
                            </div>
                            <div class="singleCardDtails">
                                <textarea class="p-2" name="" id="editPermanentAddr" cols="100%" rows="2"></textarea>
                            </div>
                            <div class="row text-center my-3 my-sm-3">
                                <div class="col-lg-6 col-md-6">
                                    <button onclick="updateProfileDetails()" class="btn btn-success px-5">Save
                                        Details</button>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-3 mt-sm-3 mt-md-0">
                                    <button type="submit" class="btn btn-dark px-5">Close</button>
                                </div>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showEducationDetails">
                                        {{-- Education Details from response --}}
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#addEducationModal">Add New Education</button>
                                </div>
                            </div>
                            <div class="proCardTitle mt-3">
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showExperienceDetails">

                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#addExperienceModal">Add New Experience</button>
                                </div>
                            </div>
                            <div class="proCardTitle mt-3">
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showTrainingDetails">
                                        {{-- Training from response --}}
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#addTrainingModal">Add New Training</button>
                                </div>
                            </div>
                            <div class="proCardTitle mt-3">
                                <h5>Your Skills ( Separate with comma) :</h5>
                            </div>
                            <div class="singleCardDtails">
                                <div>
                                    <textarea class="p-2" name="" id="editSkills" cols="100%" rows="2"> </textarea>
                                </div>

                                <button onclick="updateProSkills()" class="btn btn-success">Save Skills</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>


</section>

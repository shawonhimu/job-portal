<section class="myAccount">
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="myAccountProfile myProfileCard">
                    <div class="d-flex justify-content-between bg-blood mb-3">
                        <div>
                            <h3>Account Settings</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div>
                            <div class="profileImg">
                                <img src="./img/user.png" alt="" id="previewSettImg" />
                                <label for="uploadSettingIMG">
                                    <i class="fas fa-camera"></i>
                                </label>
                                <input type="file" name="" class="uploadIMG" id="uploadSettingIMG"
                                    onchange=" previewImage('uploadSettingIMG','previewSettImg')" />
                            </div>
                        </div>
                        <div>
                            <button onclick="updateSettingsPhoto()" class="btn btn-success"><i
                                    class="fas fa-check-square me-3"></i>Save Picture</button>
                        </div>
                    </div>
                    <div class="profileImg">
                        <div class="singleUserDetails my-4">
                            <div class="cardName">
                                <div>
                                    <span class="title-mark">Account Details</span>
                                    <!-- : <input type="text" name="" id="" placeholder="Enter your name" class="px-3" value="Md. Shawanuzzaman" readonly /> -->
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="singleCardDtails pt-5">
                                    <div class="mt-2">
                                        <span class="title-mark">First Name</span>
                                        : <input type="text" name="" id="settFirstName"
                                            placeholder="Enter your first name" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Last Name</span>
                                        : <input type="text" name="" id="settLastName"
                                            placeholder="Enter your last name" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Mobile</span>
                                        : <input type="text" name="" id="settMobile"
                                            placeholder="Enter your last name" class="px-3" value="" />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Email</span>
                                        : <input disabled type="email" name="" id="settEmail" readonly
                                            class="px-3" value="" required />
                                    </div>

                                    <div class="mt-2">
                                        <hr />
                                        <button onclick="updateSettingDetails()" class="btn btn-success">Save
                                            Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profileImg text-start">
                        <div class="singleCardDtails pt-4">
                            <div class="cardName">
                                <div>
                                    <span class="title-mark">Change Password</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="singleCardDtails pt-5 ps-4">

                                    <div class="mt-2">
                                        <span class="title-mark">Current Password</span>
                                        : <input type="password" name="" id="settOldPassword"
                                            placeholder="Enter current password" class="px-3" value=""
                                            required />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">New Password</span>
                                        : <input type="password" name="" id="settNewPassword"
                                            placeholder="Enter new password" class="px-3" value="" required />
                                    </div>
                                    <div class="mt-2">
                                        <span class="title-mark">Confirm Password</span>
                                        : <input type="password" name="" id="settConNewPassword"
                                            placeholder="Confirm new password" class="px-3" value="" required />
                                    </div>
                                    <div class="mt-2">
                                        <hr />
                                        <button onclick="updateSettingPassword()" class="btn btn-success">Save
                                            Password</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</section>

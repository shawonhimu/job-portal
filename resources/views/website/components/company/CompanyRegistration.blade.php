<section class="personalBG" id="home">
    <div class="overlayDefault">
        <div class="container">
            <div class="personalBanner">
                <div class="row alignItems">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="w-100">
                            <div class="regisCard my-lg-5 mb-2">
                                <div class="loginLogo">
                                    <img src="./img/logo.svg" alt="" srcset="" />
                                </div>
                                <div class="personalDetails px-lg-4">
                                    <div class="jobTtlResgisArea">
                                        {{-- <h3 class="jobTitleResgis">Job Pulse</h3> --}}
                                        <span>Find your job now</span>
                                        <h3>Create Account as Company</h3>
                                    </div>
                                </div>
                                <div>
                                    <form onsubmit="return false;">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control regis-inpt" required
                                                id="companyName" placeholder="Enter company name" />
                                            <label for="companyName">Enter company name</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control regis-inpt" required
                                                id="companyType" placeholder="Enter company type" />
                                            <label for="companyType">Enter company type</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input type="date" class="form-control regis-inpt" required
                                                id="establishDate" placeholder="Enter company establish date" />
                                            <label for="establishDate">Enter company establish date</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input type="email" class="form-control regis-inpt" required
                                                id="companyEmail" placeholder="Enter company email" />
                                            <label for="companyEmail">Enter company email</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input type="phone" class="form-control regis-inpt" required
                                                id="companyPhone" placeholder="Enter company phone" />
                                            <label for="companyPhone">Enter company phone</label>
                                        </div>


                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control regis-inpt" required
                                                id="companyTINno" placeholder="Enter company TIN no" />
                                            <label for="companyTINno">Enter company TIN no</label>
                                        </div>


                                        <div class="form-floating my-3">
                                            <input type="number" class="form-control regis-inpt" required
                                                id="companyFax" placeholder="Enter company fax no" />
                                            <label for="companyFax">Enter company fax no</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <textarea class="form-control" placeholder="Enter company details here" id="companyDetails" style="height: 100px"></textarea>
                                            <label for="companyDetails">Company details</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input type="password" class="form-control regis-inpt"
                                                id="companyRegisPassword" required placeholder="Password" />
                                            <label for="companyRegisPassword">Enter A Password</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" class="form-control regis-inpt"
                                                id="companyRegisConPassword" required placeholder="Password" />
                                            <label for="companyRegisConPassword">Comfirm Password</label>
                                        </div>

                                        <input onclick="companyRegistration()" class="form-control btn myBtn my-3"
                                            type="submit" value="Registration Now" />
                                    </form>
                                </div>

                                <div class="formExt">
                                    <div class="text-dark my-2">Already have account ?</div>
                                    <a class="btn myBtn" href="{{ url('company-login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    async function companyRegistration() {
        let companyName = document.getElementById('companyName').value;
        let companyType = document.getElementById('companyType').value;
        let companyEmail = document.getElementById('companyEmail').value;
        let companyPhone = document.getElementById('companyPhone').value;
        let companyTINno = document.getElementById('companyTINno').value;
        let companyFax = document.getElementById('companyFax').value;
        let establishDate = document.getElementById('establishDate').value;
        let companyDetails = document.getElementById('companyDetails').value;
        let companyRegisPassword = document.getElementById('companyRegisPassword').value;
        let companyRegisConPassword = document.getElementById('companyRegisConPassword').value;
        if (companyName.length === 0) {
            errorToast('Company name is required ! ')
        } else if (companyType.length === 0) {
            errorToast('Company type is required ! ')
        } else if (companyEmail.length === 0) {
            errorToast('Email is required ! ')
        } else if (companyPhone.length === 0) {
            errorToast('Phone is required ! ')
        } else if (companyTINno.length === 0) {
            errorToast('TIN no is required ! ')
        } else if (companyFax.length === 0) {
            errorToast('Fax no is required ! ')
        } else if (establishDate.length === 0) {
            errorToast('Establish date is required ! ')
        } else if (companyDetails.length === 0) {
            errorToast('Company details date is required ! ')
        } else if (companyRegisPassword.length === 0) {
            errorToast('Password is required ! ')
        } else if (companyRegisConPassword.length === 0) {
            errorToast('Please confirm your password ')
        } else {
            if (companyRegisConPassword != companyRegisPassword) {
                errorToast("Password doesn't match, try again ")
            } else {
                showLoader();
                let res = await axios.post("/company-registration", {
                    'companyName': companyName,
                    'companyType': companyType,
                    'companyDetails': companyDetails,
                    'establishDate': establishDate,
                    'companyEmail': companyEmail,
                    'companyPhone': companyPhone,
                    'companyTINno': companyTINno,
                    'companyFaxNo': companyFax,
                    'companyPassword': companyRegisPassword,
                });
                if (res.status === 200) {
                    successToast(res.data.data)
                    // console.log(res.data);
                    // sessionStorage.setItem('email', email);
                    window.location.href = "/company-otp";
                    await hideLoader();
                } else {

                    // console.log(res.data.data);
                    // errorToast(res.data.data)
                    hideLoader();
                }
            }
        }

    }
</script>

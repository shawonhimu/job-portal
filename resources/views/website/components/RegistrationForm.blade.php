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
                                        <h3>Create Account as Candidate</h3>
                                    </div>
                                </div>
                                <div id="">
                                    <form onsubmit="return false;">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control regis-inpt" required
                                                id="candiRegisFirstName" placeholder="Enter Your Firstname" />
                                            <label for="candiRegisFirstName">Enter Your Firstname</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control regis-inpt" required
                                                id="candiRegisLastName" placeholder="Enter Your Lastname" />
                                            <label for="candiRegisLastName">Enter Your Lastname</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input type="email" class="form-control regis-inpt" required
                                                id="candiRegisEmail" placeholder="Enter Your email" />
                                            <label for="candiRegisEmail">Enter Your Email</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input type="phone" class="form-control regis-inpt" required
                                                id="candiRegisPhone" placeholder="Enter Your phone" />
                                            <label for="candiRegisPhone">Enter Your Phone</label>
                                        </div>

                                        <div class="form-floating my-3">
                                            <input type="password" class="form-control regis-inpt"
                                                id="candiRegisPassword" required placeholder="Password" />
                                            <label for="candiRegisPassword">Enter A Password</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" class="form-control regis-inpt"
                                                id="candiRegisConPassword" required placeholder="Password" />
                                            <label for="candiRegisConPassword">Comfirm Password</label>
                                        </div>

                                        <input onclick="candidateRegistration()" class="form-control btn myBtn my-3"
                                            type="submit" value="Registration Now" />
                                    </form>
                                </div>

                                <div class="formExt">
                                    <div class="text-dark my-2">Already have account ?</div>
                                    <a class="btn myBtn" href="{{ url('candidate-login') }}">Login</a>
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
    async function candidateRegistration() {
        let candiRegisFirstName = document.getElementById('candiRegisFirstName').value;
        let candiRegisLastName = document.getElementById('candiRegisLastName').value;
        let candiRegisEmail = document.getElementById('candiRegisEmail').value;
        let candiRegisPhone = document.getElementById('candiRegisPhone').value;
        let candiRegisPassword = document.getElementById('candiRegisPassword').value;
        let candiRegisConPassword = document.getElementById('candiRegisConPassword').value;
        if (candiRegisFirstName.length === 0) {
            errorToast('Firstname is required ! ')
        } else if (candiRegisLastName.length === 0) {
            errorToast('Lastname is required ! ')
        } else if (candiRegisEmail.length === 0) {
            errorToast('Email is required ! ')
        } else if (candiRegisPhone.length === 0) {
            errorToast('Phone is required ! ')
        } else if (candiRegisPassword.length === 0) {
            errorToast('Password is required ! ')
        } else if (candiRegisConPassword.length === 0) {
            errorToast('Please confirm your password ')
        } else {
            if (candiRegisConPassword != candiRegisPassword) {
                errorToast("Password doesn't match, try again ")
            } else {
                showLoader();
                let res = await axios.post("/candidate-registration", {
                    'firstName': candiRegisFirstName,
                    'lastName': candiRegisLastName,
                    'email': candiRegisEmail,
                    'mobile': candiRegisPhone,
                    'password': candiRegisPassword,
                });
                if (res.status === 200) {
                    successToast(res.data.data)
                    // console.log(res.data.data)
                    // sessionStorage.setItem('email', email);
                    window.location.href = "/verification-otp";
                    await hideLoader();
                } else {
                    errorToast(res.data.data)
                    hideLoader();
                }
            }
        }

    }
</script>

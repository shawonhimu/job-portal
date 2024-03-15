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
                                        <h2>Verify your OTP now</h2>
                                        <hr />
                                        <h6>We have sent a six digit OTP to your email. Please check your email and
                                            verify</h6>
                                    </div>
                                </div>
                                <div id="">
                                    <form onsubmit="return false;">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control regis-inpt" required
                                                id="companyRegisOTP" placeholder="Enter 6 digits otp" />
                                            <label for="companyRegisOTP">Enter 6 digits otp</label>
                                        </div>

                                        <input onclick="companyOTPVerify()" class="form-control btn myBtn my-3"
                                            type="submit" value="Verify OTP Now" />
                                    </form>
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
    async function companyOTPVerify() {
        let companyRegisOTP = document.getElementById('companyRegisOTP').value;
        if (companyRegisOTP.length === 0) {
            errorToast('OTP verification is required ! ')
        } else {
            showLoader();
            let res = await axios.post("/company-verify-otp", {
                'otp': companyRegisOTP,
            });
            if (res.status === 200) {
                successToast(res.data.data)
                // console.log(res.data.data)
                // sessionStorage.setItem('email', email);
                window.location.href = "/company-logo";
                await hideLoader();
            } else {
                errorToast(res.data.data)
                // console.log(res.data.data)
                hideLoader();
            }
        }

    }
</script>

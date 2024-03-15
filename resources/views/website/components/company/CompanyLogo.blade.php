<section class="personalBG" id="home">
    <div class="overlayTop">
        <div class="container">
            <div class="personalBanner">
                <div class="row alignItems">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="w-100">
                            <div class="loginCard my-lg-5 mb-2">
                                <div class="loginLogo">
                                    <img src="./img/logo.svg" alt="" srcset="" />
                                </div>
                                <div class="personalDetails px-lg-4">
                                    <div class="badhanTtlResgisArea">
                                        <h3 class="my-3">Update Company Logo</h3>
                                    </div>
                                </div>
                                <div id="">
                                    <form onsubmit="return false;" class="" id="">
                                        <div class="uploadRegImg">
                                            <label for="uploadCompanyLogoIMG">
                                                <img src="{{ asset('img/placeholder.jpg') }}" alt=""
                                                    id="previewCompanyLogoImg" />
                                            </label>
                                            <label for="uploadCompanyLogoIMG">
                                                <i class="fas fa-camera"></i>
                                            </label>
                                            <input type="file" name="uploadCandidateImg" class="uploadIMG"
                                                id="uploadCompanyLogoIMG"
                                                onchange="previewImage('uploadCompanyLogoIMG','previewCompanyLogoImg')"
                                                value="" />
                                            <div class="text-dark my-2">Upload Your Company Logo</div>
                                        </div>

                                        <input onclick="companyRegistrationPhoto()" class="btn myBtn my-3"
                                            type="submit" value="Save photo and next" />
                                        <a href="{{ url('activity') }}" class="btn btn-warning my-3 ms-3" type="submit"
                                            value="Next">Skip</a>
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
    async function companyRegistrationPhoto() {
        let uploadCompanyLogoIMG = document.getElementById('uploadCompanyLogoIMG').files[0];
        if (uploadCompanyLogoIMG == null) {
            errorToast('Photo upload is required to save ! ')
        } else {
            console.log(uploadCompanyLogoIMG);
            let formData = new FormData();
            formData.append('img', uploadCompanyLogoIMG);

            //
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/company-logo", formData, config);
            if (res.status === 200) {
                // console.log(res.data);
                successToast(res.data.data)
                // console.log(res.data.data)
                // sessionStorage.setItem('email', email);
                window.location.href = "/company-home";
                hideLoader();
            } else {
                errorToast(res.data.data)
                hideLoader();
            }

        }

    }
</script>

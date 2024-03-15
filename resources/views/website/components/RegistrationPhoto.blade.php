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
                                        <h3 class="my-3">Update Your Account</h3>
                                    </div>
                                </div>
                                <div id="">
                                    <form onsubmit="return false;" class="" id="">
                                        <div class="uploadRegImg">
                                            <label for="uploadCandidateIMG">
                                                <img src="{{ asset('images/user.png') }}" alt=""
                                                    id="previewCandidateImg" />
                                            </label>
                                            <label for="uploadCandidateIMG">
                                                <i class="fas fa-camera"></i>
                                            </label>
                                            <input type="file" name="uploadCandidateImg" class="uploadIMG"
                                                id="uploadCandidateIMG"
                                                onchange="previewImage('uploadCandidateIMG','previewCandidateImg')"
                                                value="" />
                                            <div class="text-dark my-2">Upload Your Picture</div>
                                        </div>

                                        <input onclick="candidateRegistrationPhoto()" class="btn myBtn my-3"
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
    async function candidateRegistrationPhoto() {
        let uploadCandidateIMG = document.getElementById('uploadCandidateIMG').files[0];
        if (uploadCandidateIMG == null) {
            errorToast('Photo upload is required to save ! ')
        } else {
            console.log(uploadCandidateIMG);
            let formData = new FormData();
            formData.append('img', uploadCandidateIMG);

            //
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            showLoader();
            let res = await axios.post("/regis-photo", formData, config);
            if (res.status === 200) {
                console.log(res.data);
                successToast(res.data.data)
                // console.log(res.data.data)
                // sessionStorage.setItem('email', email);
                window.location.href = "/activity";
                hideLoader();
            } else {
                errorToast(res.data.data)
                hideLoader();
            }

        }

    }
</script>

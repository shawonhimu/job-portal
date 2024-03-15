<!--            Login Area       -->
<section class="personalBG" id="home">
    <div class="overlayDeep">
        <div class="container">
            <div class="personalBanner">
                <div class="row alignItems mobileColReverse">
                    <div class="col-lg-6">
                        <div class="personalDetails px-lg-4 mb-3 mb-lg-0">
                            <div class="badhanTitleArea pcViewOnly">
                                <h1 class="badhanTitle">Badhon</h1>
                                <span>A Blood Donars Hub, BSMRSTU</span>
                            </div>
                            <hr />
                            <h2 class="display-md-6 text-uppercase lspaceing-1">Donate Blood, Save Life</h2>
                            <h6 class="text-justify lspaceing-2">If you save a life, You might save the humanity</h6>
                            <!--
          <h5 class="text-uppercase my-4">"Today you donate blood, tomorrow you may need blood. So, Don't be late to help someone. Let's work for humanity"</h5>		 -->

                            <hr />
                            <p>Do you want to donate or collect blood for yourself or your relative ? Then please create
                                an account and login. You will find our donar's profile as well as you will be our pride
                                donar for future. So be fast to work for humanity.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="w-100">
                            <div class="loginCard my-lg-5 my-3">
                                <div class="loginLogo">
                                    <img src="./img/logo.svg" alt="" srcset="" />
                                </div>

                                <div class="personalDetails px-lg-4 mobileViewOnly">
                                    <div class="badhanTtlResgisArea">
                                        <h1 class="badhanTitleResgis">Badhon</h1>
                                        <span>A Blood Donars Hub, BSMRSTU</span>
                                    </div>
                                </div>

                                <div id="adminForm">
                                    <form class="" id="loginForm" onsubmit="return false;">
                                        {{-- @csrf --}}
                                        <div class="input-group flex-nowrap mt-3">
                                            <span class="input-group-text" id="addon-wrapping"><i
                                                    class="fas fa-envelope"></i></span>
                                            <input type="email" class="form-control lgn-inpt" required
                                                placeholder="Enter Your Email" id="loginEmail" />
                                        </div>
                                        <div class="input-group flex-nowrap mt-2 mt-lg-3">
                                            <span class="input-group-text" id="addon-wrapping"><i
                                                    class="fas fa-eye"></i></span>
                                            <input type="password" class="form-control lgn-inpt" required
                                                placeholder="Enter Your Password" id="loginPassword" />
                                        </div>
                                        <input class="form-control btn myBtn my-3" type="submit" value="Login"
                                            onclick="Login()" />
                                    </form>
                                </div>

                                <div class="formExt">
                                    <div class="text-dark my-2">Do you forget password ?</div>
                                    <a class="btn btn-secondary" href="">Reset Password</a>
                                    <div class="text-dark my-2">Don't have a account ?</div>
                                    <a class="btn myBtn" href="{{ url('registration') }}">Create New Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    async function Login(e) {
        let email = document.getElementById('loginEmail').value;
        let password = document.getElementById('loginPassword').value;
        if (email.length === 0) {
            errorToast('Email is required ! ')
        } else if (password.length === 0) {
            errorToast('Password is required ! ')
        } else {
            showLoader();
            let res = await axios.post("/candidate-login", {
                'email': email,
                'password': password
            });
            if (res.status === 200) {
                successToast(res.data.data)
                // console.log(res.data.data)
                // sessionStorage.setItem('email', email);
                window.location.href = "/activity";
                await hideLoader();
            } else {
                errorToast(res.data.data)
                hideLoader();
            }
        }

    }
</script>

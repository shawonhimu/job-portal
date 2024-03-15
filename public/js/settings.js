//==========  Show profile details  ============//

async function showSettingDetails() {
    let previewSettImg = document.getElementById("previewSettImg");
    let settFirstName = document.getElementById("settFirstName");
    let settLastName = document.getElementById("settLastName");
    let settMobile = document.getElementById("settMobile");
    let settEmail = document.getElementById("settEmail");

    showLoader();
    let res = await axios.post("/setting-details");
    if (res.status === 200) {
        previewSettImg.src = res.data.data[0].img;
        settFirstName.value = res.data.data[0].first_name;
        settLastName.value = res.data.data[0].last_name;
        settMobile.value = res.data.data[0].mobile;
        settEmail.value = res.data.data[0].email;
        // console.log(res.data.data[0].img);
        hideLoader();
    } else {
        errorToast(res.data.data);
        hideLoader();
    }
}

//==========  Update Setting general data like mobile names  ======//

async function updateSettingDetails() {
    let settFirstName = document.getElementById("settFirstName").value;
    let settLastName = document.getElementById("settLastName").value;
    let settMobile = document.getElementById("settMobile").value;

    showLoader();
    let res = await axios.post("/update-setting-details", {
        first_name: settFirstName,
        last_name: settLastName,
        mobile: settMobile,
    });
    if (res.status === 200) {
        successToast(res.data.data);
        // console.log(res.data.data[0].img);
        hideLoader();
    } else {
        errorToast(res.data.data);
        hideLoader();
    }
}

//========  Update profile pictures   =============//
async function updateSettingsPhoto() {
    let uploadSettingIMG = document.getElementById("uploadSettingIMG").files[0];
    if (uploadSettingIMG == null) {
        errorToast("Photo upload is required to save ! ");
    } else {
        // console.log(uploadSettingIMG);
        let formData = new FormData();
        formData.append("img", uploadSettingIMG);

        //
        const config = {
            headers: {
                "content-type": "multipart/form-data",
            },
        };

        showLoader();
        let res = await axios.post("/update-profile-photo", formData, config);
        if (res.status === 200) {
            console.log(res.data);
            successToast(res.data.data);
            // console.log(res.data.data)
            hideLoader();
        } else {
            errorToast(res.data.data);
            hideLoader();
        }
    }
}

//==========  Update Setting password  ======//

async function updateSettingPassword() {
    let settOldPassword = document.getElementById("settOldPassword");
    let settNewPassword = document.getElementById("settNewPassword");
    let settConNewPassword = document.getElementById("settConNewPassword");
    if (settOldPassword.value.length == 0) {
        errorToast("Current password is required");
    } else if (settNewPassword.value.length == 0) {
        errorToast("New password is required");
    } else if (settConNewPassword.value.length == 0) {
        errorToast("Confirm password is required");
    } else if (settConNewPassword.value != settNewPassword.value) {
        errorToast("Password is not matched");
    } else {
        showLoader();
        let res = await axios.post("/update-candidate-password", {
            currentPassword: settOldPassword.value,
            newPassword: settNewPassword.value,
        });
        if (res.status === 200) {
            successToast(res.data.data);
            settOldPassword.value = "";
            settNewPassword.value = "";
            settConNewPassword.value = "";
            // console.log(res.data.data[0].img);
            hideLoader();
        } else {
            errorToast(res.data.data);

            settOldPassword.value = "";
            settNewPassword.value = "";
            settConNewPassword.value = "";
            hideLoader();
        }
    }
}

(async () => {
    await showSettingDetails();
})();

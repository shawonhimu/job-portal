async function profileDetailsToEdit() {
    // $("#personalDetails").empty();
    let editProDetails = await axios.get("edit-details");
    // console.log(editProDetails.data["data"]);
    let editVal = editProDetails.data["data"];
    if (editVal == null) {
    } else {
        //set if any value
        $("#editFullname").val(editVal.fullname);
        $("#editFatherName").val(editVal.father_name);
        $("#editMotherName").val(editVal.mother_name);
        $("#editBirthDate").val(editVal.date_of_birth);
        $("#editNID").val(editVal.NID);
        $("#editBirthCertificate").val(editVal.birth_registration_id);
        $("#editPassport").val(editVal.passport_no);
        $("#editPhone").val(editVal.phone);
        $("#editEmail").val(editVal.email);
        $("#editLinkedin").val(editVal.linked_in);
        $("#editGithub").val(editVal.github);
        $("#editSocialMedia").val(editVal.social_media1);
        $("#editWebsite").val(editVal.website);
        $("#editPresentAddr").val(editVal.present_address);
        $("#editPermanentAddr").val(editVal.permanent_address);
    }
}

async function updateProfileDetails() {
    //set if any value
    let editFullname = $("#editFullname").val();
    let editFatherName = $("#editFatherName").val();
    let editMotherName = $("#editMotherName").val();
    let editBirthDate = $("#editBirthDate").val();
    let editNID = $("#editNID").val();
    let editBirthCertificate = $("#editBirthCertificate").val();
    let editPassport = $("#editPassport").val();
    let editPhone = $("#editPhone").val();
    let editEmail = $("#editEmail").val();
    let editLinkedin = $("#editLinkedin").val();
    let editGithub = $("#editGithub").val();
    let editSocialMedia = $("#editSocialMedia").val();
    let editWebsite = $("#editWebsite").val();
    let editPresentAddr = $("#editPresentAddr").val();
    let editPermanentAddr = $("#editPermanentAddr").val();
    if (editFullname.length === 0) {
        errorToast("Your name is required ! ");
    } else if (editFatherName.length === 0) {
        errorToast("Father name is required ! ");
    } else if (editMotherName.length === 0) {
        errorToast("Mother name is required ! ");
    } else if (editBirthDate.length === 0) {
        errorToast("Date of birth is required ! ");
    } else if (editNID.length === 0) {
        errorToast("NID no is required ! ");
    } else if (editPhone.length === 0) {
        errorToast("Result is required ! ");
    } else if (editPresentAddr.length === 0) {
        errorToast("Present address is required ! ");
    } else if (editPermanentAddr.length === 0) {
        errorToast("Permanent address is required ! ");
    } else {
        //update

        showLoader();
        let editProDetails = await axios.post("profile-details", {
            fullname: editFullname,
            father_name: editFatherName,
            mother_name: editMotherName,
            date_of_birth: editBirthDate,
            NID: editNID,
            birth_registration_id: editBirthCertificate,
            passport_no: editPassport,
            phone: editPhone,
            email: editEmail,
            linked_in: editLinkedin,
            github: editGithub,
            social_media1: editSocialMedia,
            website: editWebsite,
            present_address: editPresentAddr,
            permanent_address: editPermanentAddr,
        });
        if (editProDetails.status === 200) {
            successToast("Profile details updated successfully");
            await hideLoader();
        } else {
            errorToast(editProDetails.data.data);
            hideLoader();
        }
    }
}

async function showProSkills() {
    let skillDetails = await axios.get("skill-details");
    //set if any value
    // console.log(skillDetails.data.data);
    if (skillDetails.data.data.length == 0) {
    } else {
        $("#editSkills").val(skillDetails.data.data[0].skills);
    }
}

async function updateProSkills() {
    //set if any value
    let editSkills = $("#editSkills");

    //update
    showLoader();
    let editProDetails = await axios.post("skill", {
        skills: editSkills.val(),
    });
    if (editProDetails.status === 200) {
        successToast("Your skills updated successfully");
        await hideLoader();
    } else {
        errorToast("Error to update, try again");
        hideLoader();
    }
}

(async () => {
    showLoader();
    await profileDetailsToEdit();
    await showProSkills();
    hideLoader();
    /** For delete */
})();

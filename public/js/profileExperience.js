// For add Experience

async function addExperienceDetails() {
    //set if any value
    let addDesignation = $("#addDesignation").val();
    let addCompanyName = $("#addCompanyName").val();
    let addStartDate = $("#addStartDate").val();
    let addDepartureDate = $("#addDepartureDate").val();
    if (addDesignation.length === 0) {
        errorToast("Designation name is required ! ");
    } else if (addCompanyName.length === 0) {
        errorToast("Institue/Comapny name is required ! ");
    } else if (addStartDate.length === 0) {
        errorToast("Date is required ! ");
    } else if (addDepartureDate.length === 0) {
        errorToast("Date is required ! ");
    } else {
        //update
        showLoader();

        let editProDetails = await axios.post("add-experience", {
            designation: addDesignation,
            company_name: addCompanyName,
            joining_date: addStartDate,
            departure_date: addDepartureDate,
        });
        if (editProDetails.status === 200) {
            $("#addDesignation").val("");
            $("#addCompanyName").val("");
            $("#addStartDate").val("");
            $("#addDepartureDate").val("");
            $("#addExperiID").val("");
            successToast("Your Experience updated successfully");
            await hideLoader();
            $("#addExperienceModal").modal("hide");
            await showEditExperienceDetails();
            await myWorkingFn();
        } else {
            errorToast("Error to update, try again");
            hideLoader();
            await showEditExperienceDetails();
            await myWorkingFn();
        }
    }
}

//Show Experiction details in edit form as form data

async function showSingleEditExperienceDetails() {
    let editExperiid = document.getElementById("editExperiID");
    // console.log(editExperiid);
    // update
    showLoader();
    let deleteExperiItem = await axios
        .get("edit-experience/" + editExperiid.value)
        .then((res) => {
            // console.log(res.data.data);

            if (res.status == 200) {
                $("#editDesignation").val(res.data.data.designation);
                $("#editCompanyName").val(res.data.data.company_name);
                $("#editStartDate").val(res.data.data.joining_date);
                $("#editDepartureDate").val(res.data.data.departure_date);
                $("#editExperiID").val(res.data.data.id);
                hideLoader();
            }
        })
        .catch((err) => {
            // console.log(deleteExperiItem + err);
            errorToast("Error to delete, try again");
            hideLoader();
            $("#editExperienceModal").modal("hide");

            // showEditExperienceDetails();
        });
}

// for edit Experience

async function editExperienceDetails() {
    //set if any value
    let editDesignation = $("#editDesignation").val();
    let editCompanyName = $("#editCompanyName").val();
    let editStartDate = $("#editStartDate").val();
    let editDepartureDate = $("#editDepartureDate").val();
    let editExperiID = $("#editExperiID").val();
    if (editDesignation.length === 0) {
        errorToast("Degree name is required ! ");
    } else if (editCompanyName.length === 0) {
        errorToast("Institue name is required ! ");
    } else if (editStartDate.length === 0) {
        errorToast("Group or subject name is required ! ");
    } else if (editDepartureDate.length === 0) {
        errorToast("Board name is required ! ");
    } else {
        //update
        showLoader();

        let editProDetails = await axios.post("edit-experience", {
            designation: editDesignation,
            company_name: editCompanyName,
            joining_date: editStartDate,
            departure_date: editDepartureDate,
            id: editExperiID,
        });
        if (editProDetails.status === 200) {
            $("#editDesignation").val("");
            $("#editCompanyName").val("");
            $("#editStartDate").val("");
            $("#editDepartureDate").val("");
            $("#editExperiID").val("");
            successToast("Your Experience updated successfully");
            await hideLoader();
            $("#editExperienceModal").modal("hide");
            await showEditExperienceDetails();
            await myWorkingFn();
        } else {
            errorToast("Error to update, try again");
            await hideLoader();

            await showEditExperienceDetails();
            await myWorkingFn();
        }
    }
}

//For other

async function showEditExperienceDetails() {
    $("#showExperienceDetails").empty();
    let ExperiData = await axios.get("experience-details");
    // console.log(ExperiData);
    ExperiData.data["data"].forEach((item, i) => {
        let activeClass = "";
        if (i === 0) {
            activeClass = " active ";
        }
        let ExperienceDetails = `<tr>
                                <td>${item["designation"]}</td>
                                <td>${item["company_name"]}</td>
                                <td>${item["joining_date"]}</td>
                                <td>${item["departure_date"]}</td>
                                <td>
                                    <button data-id="${item["id"]}" class="btn btn-outline-success editExperiBtn mb-2" data-bs-toggle="modal"
                                    data-bs-target="#editExperienceModal">Edit</button>
                                    <button data-id="${item["id"]}" class="btn btn-outline-danger deleteExperiBtn mb-2" data-bs-toggle="modal"
                                data-bs-target="#deleteExperienceModal">Delete</button>
                                </td>
                            </tr>`;
        $("#showExperienceDetails").append(ExperienceDetails);
    });
}

async function deleteExperienceDetails() {
    let delExperiid = $("#deleteExperiID").val();
    // console.log(delExperiid);
    // update
    showLoader();

    let deleteExperiItem = await axios.get("delete-experience/" + delExperiid);

    // console.log(res);
    if (deleteExperiItem.status == 200) {
        $("#deleteExperiID").val("");
        successToast("Your selected item deleted successfully");
        hideLoader();
        $("#deleteExperienceModal").modal("hide");
        await showEditExperienceDetails();
        await myWorkingFn();
    } else {
        errorToast("Error to delete, try again");
        hideLoader();
        $("#deleteExperienceModal").modal("hide");

        await showEditExperienceDetails();
        await myWorkingFn();
    }
}

async function myWorkingFn() {
    let allDeleteExperiBtns = document.querySelectorAll(".deleteExperiBtn");
    // console.log(allDeleteExperiBtns);
    allDeleteExperiBtns.forEach((element) => {
        element.addEventListener("click", function () {
            const dataId = $(this).data("id");
            // console.log(dataId);
            $("#deleteExperiID").val(dataId);
        });
    });
    /*
     * For edit
     */
    let allEditExperiBtns = document.querySelectorAll(".editExperiBtn");
    // console.log(allDeleteExperiBtns);
    allEditExperiBtns.forEach((element) => {
        element.addEventListener("click", function () {
            const dataId = $(this).data("id");
            // console.log(dataId);
            $("#editExperiID").val(dataId);
            showSingleEditExperienceDetails();
        });
    });
}

(async () => {
    await showEditExperienceDetails();
    await myWorkingFn();

    // hideLoader();
    /** For delete */
})();

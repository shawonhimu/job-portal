// For add education

async function addEducationDetails() {
    //set if any value
    let addDegreeName = $("#addDegreeName").val();
    let addInstituteName = $("#addInstituteName").val();
    let addSubjectName = $("#addSubjectName").val();
    let addBoardName = $("#addBoardName").val();
    let addPassingYear = $("#addPassingYear").val();
    let addResult = $("#addResult").val();
    if (addDegreeName.length === 0) {
        errorToast("Degree name is required ! ");
    } else if (addInstituteName.length === 0) {
        errorToast("Institue name is required ! ");
    } else if (addSubjectName.length === 0) {
        errorToast("Group or subject name is required ! ");
    } else if (addBoardName.length === 0) {
        errorToast("Board name is required ! ");
    } else if (addPassingYear.length === 0) {
        errorToast("Passing year name is required ! ");
    } else if (addResult.length === 0) {
        errorToast("Result is required ! ");
    } else {
        //update
        showLoader();
        let editProDetails = await axios.post("add-education", {
            degree_name: addDegreeName,
            institute_name: addInstituteName,
            subject_group: addSubjectName,
            board: addBoardName,
            passing_year: addPassingYear,
            result: addResult,
        });
        if (editProDetails.status === 200) {
            successToast("Your education updated successfully");
            await hideLoader();
            $("#addEducationModal").modal("hide");
            await showEditEducationDetails();
            await myEducationEditDelFun();
        } else {
            errorToast("Error to update, try again");
            hideLoader();
        }
    }
}
//Show eduction details in edit form as form data

async function showSingleEditEducationDetails() {
    let editEduid = document.getElementById("editEduID").value;
    console.log(editEduid);
    // update
    showLoader();
    let editEduItem = await axios.get("edit-education/" + editEduid);

    console.log(editEduItem);
    if (editEduItem.status == 200) {
        $("#editDegreeName").val(editEduItem.data.data.degree_name);
        $("#editInstituteName").val(editEduItem.data.data.institute_name);
        $("#editSubjectName").val(editEduItem.data.data.subject_group);
        $("#editBoardName").val(editEduItem.data.data.board);
        $("#editPassingYear").val(editEduItem.data.data.passing_year);
        $("#editResult").val(editEduItem.data.data.result);
        hideLoader();
    } else {
        console.log(editEduItem);
        errorToast("Error to delete, try again");
        hideLoader();
        $("#deleteEducationModal").modal("hide");
        await showEditEducationDetails();
        await myEducationEditDelFun();
    }
}

// for edit education

async function editEducationDetails() {
    //set if any value
    let editDegreeName = $("#editDegreeName").val();
    let editInstituteName = $("#editInstituteName").val();
    let editSubjectName = $("#editSubjectName").val();
    let editBoardName = $("#editBoardName").val();
    let editPassingYear = $("#editPassingYear").val();
    let editResult = $("#editResult").val();
    let editEduID = $("#editEduID").val();
    if (editDegreeName.length === 0) {
        errorToast("Degree name is required ! ");
    } else if (editInstituteName.length === 0) {
        errorToast("Institue name is required ! ");
    } else if (editSubjectName.length === 0) {
        errorToast("Group or subject name is required ! ");
    } else if (editBoardName.length === 0) {
        errorToast("Board name is required ! ");
    } else if (editPassingYear.length === 0) {
        errorToast("Passing year name is required ! ");
    } else if (editResult.length === 0) {
        errorToast("Result is required ! ");
    } else {
        //update
        showLoader();
        let editProDetails = await axios.post("edit-education", {
            degree_name: editDegreeName,
            institute_name: editInstituteName,
            subject_group: editSubjectName,
            board: editBoardName,
            passing_year: editPassingYear,
            result: editResult,
            id: editEduID,
        });
        if (editProDetails.status === 200) {
            successToast("Your education updated successfully");
            await hideLoader();
            $("#editEducationModal").modal("hide");
            await showEditEducationDetails();
            await myEducationEditDelFun();
        } else {
            errorToast("Error to update, try again");
            hideLoader();
        }
    }
}

//For other

async function showEditEducationDetails() {
    $("#showEducationDetails").empty();
    let eduData = await axios.get("education-details");
    // console.log(eduData);
    eduData.data["data"].forEach((item, i) => {
        let activeClass = "";
        if (i === 0) {
            activeClass = " active ";
        }
        let educationDetails = `<tr>
                                <td>${item["degree_name"]}</td>
                                <td>${item["institute_name"]}</td>
                                <td>${item["subject_group"]}</td>
                                <td>${item["board"]}</td>
                                <td>${item["passing_year"]}</td>
                                <td>${item["result"]}</td>
                                <td>
                                    <button data-id="${item["id"]}" class="btn btn-outline-success editEduBtn mb-2" data-bs-toggle="modal"
                                    data-bs-target="#editEducationModal">Edit</button>
                                    <button data-id="${item["id"]}" class="btn btn-outline-danger deleteEduBtn mb-2" data-bs-toggle="modal"
                                data-bs-target="#deleteEducationModal">Delete</button>
                                </td>
                            </tr>`;
        $("#showEducationDetails").append(educationDetails);
    });
}

async function deleteEducationDetails() {
    let delEduid = document.getElementById("deleteEduID");
    console.log(delEduid.value);
    // update
    showLoader();
    let deleteEduItem = await axios.get("delete-education/" + delEduid.value);

    console.log(deleteEduItem);
    if (deleteEduItem.status == 200 && deleteEduItem.data.data == 1) {
        successToast("Your selected item deleted successfully");
        hideLoader();
        $("#deleteEducationModal").modal("hide");
        await showEditEducationDetails();
        await myEducationEditDelFun();
    } else {
        errorToast("Error to delete, try again");
        hideLoader();
        $("#deleteEducationModal").modal("hide");

        await showEditEducationDetails();
        await myEducationEditDelFun();
    }
}

async function myEducationEditDelFun() {
    let allDeleteEduBtns = document.querySelectorAll(".deleteEduBtn");
    // console.log(allDeleteEduBtns);
    allDeleteEduBtns.forEach((element) => {
        element.addEventListener("click", function () {
            const dataId = $(this).data("id");
            // console.log(dataId);
            $("#deleteEduID").val(dataId);
        });
    });
    /*
     * For edit
     */
    let allEditEduBtns = document.querySelectorAll(".editEduBtn");
    // console.log(allDeleteEduBtns);
    allEditEduBtns.forEach((element) => {
        element.addEventListener("click", function () {
            const dataId = $(this).data("id");
            console.log(dataId);
            $("#editEduID").val(dataId);
            showSingleEditEducationDetails();
        });
    });
}

//for delete it will not work for as async

// async function deleteEduBtn() {
//     // var id = $('.deleteEduBtn').data("id");

//     // $(document).ready(function () {
//     // $(".deleteEduBtn").click(function () {
//     var id = $(this).data("id");
//     $("#deleteEduID").val(id);
//     console.log(id);
//     // });
//     // });
// }

//finally delete it's working for as async

(async () => {
    showLoader();
    await profileDetailsToEdit();
    await showProSkills();
    await showEditEducationDetails();
    await myEducationEditDelFun();
    hideLoader();
    /** For delete */
})();

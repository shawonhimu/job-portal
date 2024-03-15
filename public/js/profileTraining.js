// For add Training

async function addTrainingDetails() {
    //set if any value
    let addTrainingName = $("#addTrainingName").val();
    let addTrainingInstituteName = $("#addTrainingInstituteName").val();
    let addJoinDate = $("#addJoinDate").val();
    let addEndDate = $("#addEndDate").val();
    if (addTrainingName.length === 0) {
        errorToast("TrainingName name is required ! ");
    } else if (addTrainingInstituteName.length === 0) {
        errorToast("Institue/Comapny name is required ! ");
    } else if (addJoinDate.length === 0) {
        errorToast("Date is required ! ");
    } else if (addEndDate.length === 0) {
        errorToast("Date is required ! ");
    } else {
        //update
        showLoader();
        let editProDetails = await axios.post("add-training", {
            training_name: addTrainingName,
            institute_name: addTrainingInstituteName,
            start_date: addJoinDate,
            end_date: addEndDate,
        });
        if (editProDetails.status === 200) {
            successToast("Your Training updated successfully");
            await hideLoader();
            $("#addTrainingModal").modal("hide");
            await showEditTrainingDetails();
            await myTrainingEdtDltFn();
        } else {
            errorToast("Error to update, try again");
            hideLoader();
        }
    }
}

//Show Trainction details in edit form as form data

async function showSingleEditTrainingDetails() {
    let editTrainid = document.getElementById("editTrainID").value;
    // console.log(editTrainid);
    // update
    showLoader();
    let showSinTrainItem = await axios.get("edit-training/" + editTrainid);
    // console.log(res.data.data);

    if (showSinTrainItem.status == 200) {
        $("#editTrainingName").val(showSinTrainItem.data.data.training_name);
        $("#editTrainingInstituteName").val(
            showSinTrainItem.data.data.institute_name
        );
        $("#editJoinDate").val(showSinTrainItem.data.data.start_date);
        $("#editEndDate").val(showSinTrainItem.data.data.end_date);
        hideLoader();
    } else {
        // console.log(showSinTrainItem + err);
        errorToast("Error to delete, try again");
        hideLoader();
        $("#editTrainingModal").modal("hide");

        await showEditTrainingDetails();
        await myTrainingEdtDltFn();
    }
}

// for edit Training

async function editTrainingDetails() {
    //set if any value
    let editTrainingName = $("#editTrainingName").val();
    let editTrainingInstituteName = $("#editTrainingInstituteName").val();
    let editJoinDate = $("#editJoinDate").val();
    let editEndDate = $("#editEndDate").val();
    let editTrainID = $("#editTrainID").val();
    if (editTrainingName.length === 0) {
        errorToast("Degree name is required ! ");
    } else if (editTrainingInstituteName.length === 0) {
        errorToast("Institue name is required ! ");
    } else if (editJoinDate.length === 0) {
        errorToast("Group or subject name is required ! ");
    } else if (editEndDate.length === 0) {
        errorToast("Board name is required ! ");
    } else {
        //update
        showLoader();
        let editProDetails = await axios.post("edit-training", {
            training_name: editTrainingName,
            institute_name: editTrainingInstituteName,
            start_date: editJoinDate,
            end_date: editEndDate,
            id: editTrainID,
        });
        if (editProDetails.status === 200) {
            successToast("Your Training updated successfully");
            await hideLoader();
            $("#editTrainingModal").modal("hide");
            await showEditTrainingDetails();
            await myTrainingEdtDltFn();
        } else {
            errorToast("Error to update, try again");
            hideLoader();
        }
    }
}

//For other

async function showEditTrainingDetails() {
    $("#showTrainingDetails").empty();
    let TrainData = await axios.get("training-details");
    // console.log(TrainData);
    TrainData.data["data"].forEach((item, i) => {
        let activeClass = "";
        if (i === 0) {
            activeClass = " active ";
        }
        let TrainingDetails = `<tr>
                                <td>${item["training_name"]}</td>
                                <td>${item["institute_name"]}</td>
                                <td>${item["start_date"]}</td>
                                <td>${item["end_date"]}</td>
                                <td>
                                    <button data-id="${item["id"]}" class="btn btn-outline-success editTrainBtn mb-2" data-bs-toggle="modal"
                                    data-bs-target="#editTrainingModal">Edit</button>
                                    <button data-id="${item["id"]}" class="btn btn-outline-danger deleteTrainBtn mb-2" data-bs-toggle="modal"
                                data-bs-target="#deleteTrainingModal">Delete</button>
                                </td>
                            </tr>`;
        $("#showTrainingDetails").append(TrainingDetails);
    });
}

async function deleteTrainingDetails() {
    let delTrainid = document.getElementById("deleteTrainID").value;
    // console.log(delTrainid);
    // update
    showLoader();
    const delTrainDetails = await axios.get("delete-training/" + delTrainid);

    // console.log(res);
    if (delTrainDetails.status == 200) {
        successToast("Your selected item deleted successfully");
        hideLoader();
        $("#deleteTrainingModal").modal("hide");
        await showEditTrainingDetails();
        await myTrainingEdtDltFn();
    } else {
        errorToast("Error to delete, try again");
        hideLoader();
        $("#deleteTrainingModal").modal("hide");

        await showEditTrainingDetails();
        await myTrainingEdtDltFn();
    }
}

async function myTrainingEdtDltFn() {
    let allDeleteTrainBtns = document.querySelectorAll(".deleteTrainBtn");
    // console.log(allDeleteTrainBtns);
    allDeleteTrainBtns.forEach((element) => {
        element.addEventListener("click", function () {
            const delConTrainID = $(this).data("id");
            // console.log(dataId);
            $("#deleteTrainID").val(delConTrainID);
        });
    });
    /*
     * For edit
     */
    let allEditTrainBtns = document.querySelectorAll(".editTrainBtn");
    // console.log(allEditTrainBtns);
    allEditTrainBtns.forEach((element) => {
        element.addEventListener("click", function () {
            const dataId = $(this).data("id");
            // console.log(dataId);
            $("#editTrainID").val(dataId);
            showSingleEditTrainingDetails();
        });
    });
}

(async () => {
    await showEditTrainingDetails();
    await myTrainingEdtDltFn();
})();

{{-- edit Education details modal --}}
<div class="modal fade" id="editEducationModal" tabindex="-1" aria-labelledby="editEducationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editEducationModalLabel">edit your education details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="mb-2">
                        <label for="editDegreeName" class="col-form-label">Degree Name:</label>
                        <input type="text" class="form-control" placeholder="S.S.C/H.S.C/B.Sc" id="editDegreeName">
                    </div>
                    <div class="mb-2">
                        <label for="editInstituteName" class="col-form-label">Institute Name:</label>
                        <input type="text" class="form-control" id="editInstituteName">
                    </div>
                    <div class="mb-2">
                        <label for="editSubjectName" class="col-form-label">Subject/Group:</label>
                        <input type="text" class="form-control" id="editSubjectName">
                    </div>
                    <div class="mb-2">
                        <label for="editBoardName" class="col-form-label">Board/University Location:</label>
                        <input type="text" class="form-control" id="editBoardName">
                    </div>
                    <div class="mb-2">
                        <label for="editPassingYear" class="col-form-label">Passing Year:</label>
                        <input type="text" class="form-control" id="editPassingYear">
                    </div>
                    <div class="mb-2">
                        <label for="editResult" class="col-form-label">Result:</label>
                        <input type="text" class="form-control" placeholder="GPA-5" id="editResult">
                    </div>

                    <input type="hidden" name="" id="editEduID" value="">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="editEducationDetails()">Save</button>
            </div>
        </div>
    </div>
</div>

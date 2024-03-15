{{-- Add Education details modal --}}
<div class="modal fade" id="addEducationModal" tabindex="-1" aria-labelledby="addEducationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addEducationModalLabel">Add your education details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="mb-2">
                        <label for="addDegreeName" class="col-form-label">Degree Name:</label>
                        <input type="text" class="form-control" placeholder="S.S.C/H.S.C/B.Sc" id="addDegreeName">
                    </div>
                    <div class="mb-2">
                        <label for="addInstituteName" class="col-form-label">Institute Name:</label>
                        <input type="text" class="form-control" id="addInstituteName">
                    </div>
                    <div class="mb-2">
                        <label for="addSubjectName" class="col-form-label">Subject/Group:</label>
                        <input type="text" class="form-control" id="addSubjectName">
                    </div>
                    <div class="mb-2">
                        <label for="addBoardName" class="col-form-label">Board/University Location:</label>
                        <input type="text" class="form-control" id="addBoardName">
                    </div>
                    <div class="mb-2">
                        <label for="addPassingYear" class="col-form-label">Passing Year:</label>
                        <input type="text" class="form-control" id="addPassingYear">
                    </div>
                    <div class="mb-2">
                        <label for="addResult" class="col-form-label">Result:</label>
                        <input type="text" class="form-control" placeholder="GPA-5" id="addResult">
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addEducationDetails()">Save</button>
            </div>
        </div>
    </div>
</div>

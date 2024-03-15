{{-- edit Training details modal --}}
<div class="modal fade" id="editTrainingModal" tabindex="-1" aria-labelledby="editTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="editTrainingModalLabel">Edit your Training details</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="mb-2">
                        <label for="editTrainingName" class="col-form-label">Training Name:</label>
                        <input type="text" class="form-control" placeholder="Enter TrainingName"
                            id="editTrainingName">
                    </div>
                    <div class="mb-2">
                        <label for="editTrainingInstituteName" class="col-form-label">Institute Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Institute Name"
                            id="editTrainingInstituteName">
                    </div>
                    <div class="mb-2">
                        <label for="editJoinDate" class="col-form-label">Joining Date:</label>
                        <input type="date" class="form-control" id="editJoinDate">
                    </div>
                    <div class="mb-2">
                        <label for="editEndDate" class="col-form-label">End Date:</label>
                        <input type="date" class="form-control" id="editEndDate">
                    </div>

                    <input type="hidden" name="" id="editTrainID" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="editTrainingDetails()">Save</button>
            </div>
        </div>
    </div>
</div>

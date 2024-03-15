{{-- Add Training details modal --}}
<div class="modal fade" id="addTrainingModal" tabindex="-1" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTrainingModalLabel">Add your Training details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="mb-2">
                        <label for="addTrainingName" class="col-form-label">Training Name:</label>
                        <input type="text" class="form-control" placeholder="Enter TrainingName"
                            id="addTrainingName">
                    </div>
                    <div class="mb-2">
                        <label for="addTrainingInstituteName" class="col-form-label">Institute Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Institute Name"
                            id="addTrainingInstituteName">
                    </div>
                    <div class="mb-2">
                        <label for="addJoinDate" class="col-form-label">Joining Date:</label>
                        <input type="date" class="form-control" id="addJoinDate">
                    </div>
                    <div class="mb-2">
                        <label for="addEndDate" class="col-form-label">End Date:</label>
                        <input type="date" class="form-control" id="addEndDate">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addTrainingDetails()">Save</button>
            </div>
        </div>
    </div>
</div>

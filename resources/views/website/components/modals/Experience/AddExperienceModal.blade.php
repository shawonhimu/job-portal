{{-- Add Experience details modal --}}
<div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addExperienceModalLabel">Add your experience details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="mb-2">
                        <label for="addDesignation" class="col-form-label">Designation:</label>
                        <input type="text" class="form-control" placeholder="Enter Designation" id="addDesignation">
                    </div>
                    <div class="mb-2">
                        <label for="addCompanyName" class="col-form-label">Company Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Company Name" id="addCompanyName">
                    </div>
                    <div class="mb-2">
                        <label for="addStartDate" class="col-form-label">Joining Date:</label>
                        <input type="date" class="form-control" id="addStartDate">
                    </div>
                    <div class="mb-2">
                        <label for="addDepartureDate" class="col-form-label">Departure Date:</label>
                        <input type="date" class="form-control" id="addDepartureDate">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addExperienceDetails()">Save</button>
            </div>
        </div>
    </div>
</div>

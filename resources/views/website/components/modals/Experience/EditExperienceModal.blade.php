{{-- edit Experience details modal --}}
<div class="modal fade" id="editExperienceModal" tabindex="-1" aria-labelledby="editExperienceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="editExperienceModalLabel">Edit your experience details</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="mb-2">
                        <label for="editDesignation" class="col-form-label">Designation:</label>
                        <input type="text" class="form-control" placeholder="Enter Designation" id="editDesignation">
                    </div>
                    <div class="mb-2">
                        <label for="editCompanyName" class="col-form-label">Company Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Company Name"
                            id="editCompanyName">
                    </div>
                    <div class="mb-2">
                        <label for="editStartDate" class="col-form-label">Joining Date:</label>
                        <input type="date" class="form-control" id="editStartDate">
                    </div>
                    <div class="mb-2">
                        <label for="editDepartureDate" class="col-form-label">Departure Date:</label>
                        <input type="date" class="form-control" id="editDepartureDate">
                    </div>


                    <input type="hidden" name="" id="editExperiID" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="editExperienceDetails()">Save</button>
            </div>
        </div>
    </div>
</div>

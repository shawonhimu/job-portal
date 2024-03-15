{{-- Cards --}}

<div class="adminContents">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="/new-job" method="POST" class="mb-4">
                    @csrf
                    <div class="mt-3 newCard p-4">
                        <h5>Post new job</h5>
                        <hr>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title </label>
                            <input type="text" name="jobTitle" class="form-control" id="jobTitle"
                                placeholder="Enter name" required>
                        </div>

                        <div class="mb-3">
                            <label for="jobDescription" class="form-label">Job Description </label>
                            <textarea name="jobDescription" class="form-control" id="jobDescription" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="jobBenefits" class="form-label">Job Benefits </label>
                            <textarea name="jobBenefits" class="form-control" id="jobBenefits" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="requiredSkills" class="form-label">Required Skills (Separate with comma)</label>
                            <textarea name="requiredSkills" class="form-control" id="requiredSkills" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="applicationDeadline" class="form-label">Application Deadline </label>
                            <input type="date" name="applicationDeadline" class="form-control"
                                id="applicationDeadline" required>
                        </div>

                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary </label>
                            <input type="number" name="salary" class="form-control" id="salary"
                                placeholder="Enter salary" required>
                        </div>

                        <button class=" btn btn-success" type="submit">Post Now</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

</div>


@if (session('success'))
    <script>
        swal("Success !", "{{ session('success') }}", "success", {
            button: false,
            // button: "OK",
            timer: 2000,
        })
    </script>
@elseif (session('error'))
    <script>
        swal("Error !", "{{ session('error') }}", "error", {
            button: false,
            // button: "OK",
            timer: 3000,
        })
    </script>
@else
    <div></div>
@endif

{{-- Cards --}}

<div class="adminContents">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="/edit-job" method="POST" class="mb-4">
                    @csrf
                    <div class="mt-3 newCard p-4">
                        <h5>Edit this job</h5>
                        <hr>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title </label>
                            <input type="text" name="jobTitle" class="form-control" id="jobTitle"
                                placeholder="Enter name" required value="{{ $data->job_title }}">
                        </div>

                        <div class="mb-3">
                            <label for="jobDescription" class="form-label">Job Description </label>
                            <textarea name="jobDescription" class="form-control" id="jobDescription" rows="3" required>{{ $data->job_description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="jobBenefits" class="form-label">Job Benefits </label>
                            <textarea name="jobBenefits" class="form-control" id="jobBenefits" rows="3" required>{{ $data->benefits }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="requiredSkills" class="form-label">Required Skills (Separate with comma)</label>
                            <textarea name="requiredSkills" class="form-control" id="requiredSkills" rows="3" required>{{ $data->required_skills }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="applicationDeadline" class="form-label">Application Deadline </label>
                            <input type="date" name="applicationDeadline" class="form-control"
                                id="applicationDeadline" required value="{{ $data->application_deadline }}">
                        </div>

                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary </label>
                            <input type="number" name="salary" class="form-control" id="salary"
                                placeholder="Enter salary" required value="{{ $data->salary }}">
                        </div>
                        <input type="hidden" name="id" value="{{ $data->id }}">

                        <button class=" btn btn-success" type="submit">Edit Now</button>
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

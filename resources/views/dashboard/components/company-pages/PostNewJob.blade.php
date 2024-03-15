{{-- Cards --}}

<div class="adminContents">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="/driver" method="POST" class="mb-4">
                    @csrf
                    <div class="mt-3 newCard p-4">
                        <h5>Add new driver</h5>
                        <hr>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title </label>
                            <input type="text" name="name" class="form-control" id="jobTitle"
                                placeholder="Enter name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phoneID" class="form-label">Required Phone </label>
                            <input type="number" name="phone" class="form-control" id="phoneID"
                                placeholder="Enter phone number" required>
                        </div>
                        <div class="mb-3">
                            <label for="detailsID" class="form-label">Address </label>
                            <textarea name="address" class="form-control" id="detailsID" rows="3" required></textarea>
                        </div>

                        <button class=" btn btn-success" type="submit">Add Now</button>
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

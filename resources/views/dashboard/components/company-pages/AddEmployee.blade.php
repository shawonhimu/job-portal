{{-- Cards --}}

<div class="adminContents">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="/new-employee" method="POST" class="mb-4">
                    @csrf
                    <div class="mt-3 newCard p-4">
                        <h5>Add new employee</h5>
                        <hr>
                        <div class="mb-3">
                            <label for="empfirstname" class="form-label">Employee Firstname </label>
                            <input type="text" name="firstName" class="form-control" id="empfirstname"
                                placeholder="Enter Firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="emplastname" class="form-label">Employee Lastname </label>
                            <input type="text" name="lastName" class="form-control" id="emplastname"
                                placeholder="Enter Lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="empDesignation" class="form-label">Employee Designation </label>
                            <input type="text" name="designation" class="form-control" id="empDesignation"
                                placeholder="Enter Firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Employee email </label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter Firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Employee phone </label>
                            <input type="number" name="phone" class="form-control" id="phone"
                                placeholder="Enter Firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="empAddress" class="form-label">Address </label>
                            <textarea name="address" class="form-control" id="empAddress" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <div class=" d-flex justify-content-between">
                                <div>
                                    <label for="empPassword" class="form-label mt-3">Employee password </label>
                                </div>
                                <div>
                                    <input type="button" class="btn btn-secondary my-2" onclick="generatePass()"
                                        value="Generate Password" />
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control" id="empPassword"
                                placeholder="Enter password or generate" required value="">
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

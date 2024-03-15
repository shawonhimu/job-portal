{{-- Contents --}}

<div class="adminContents">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex">
                    <div class="my-3 me-3">
                        <a class="btn btn-primary" href="{{ url('new-job') }}">

                            <i class="fas fa-plus"></i>
                            <span> Post New Job </span>
                        </a>
                    </div>

                </div>

                <hr>
                <h5>All Driver List</h5>
                <hr>
                <table id="example" data-order='[[ 0, "desc" ]]' class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data != null)

                            @foreach ($data as $job)
                                <tr>
                                    <td>{{ $job->job_title }}</td>
                                    <td>{{ $job->job_description }}</td>
                                    <td>{{ $job->application_deadline }}</td>

                                    <td>
                                        <a class=" btn btn-outline-success"
                                            href="{{ url('edit-driver/' . $job->id) }}">Edit</a>
                                        <a class=" btn btn-outline-danger"
                                            href="{{ url('delete-driver/' . $job->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div> No Data</div>

                        @endif

                    </tbody>
                </table>
            </div>
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


@section('scripts')
    <script src="js/dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable("#example", {
            scrollX: true,
            scrollCollapse: true,
            scrollY: "50vh",
        });
    </script>
@endsection

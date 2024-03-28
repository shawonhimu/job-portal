<!--            Profile Area       -->
<section class="myAccount">
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="myAccountProfile myProfileCard">
                    <div>
                        <div class="text-center">
                            <h4>Your All Applied Jobs</h4>
                            <hr />
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Company Name</th>
                                    <th>Expected Salary</th>
                                    <th>Applying Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $aJobData)
                                    @foreach ($aJobData['company_job'] as $single)
                                        <tr>
                                            <td>{{ $single->job_title }}</td>
                                            <td>{{ $single->company->company_name }}</td>
                                            <td>{{ $aJobData->expected_salary }}</td>
                                            <td>{{ $aJobData->created_at }}</td>
                                            <td>
                                                <a href="{{ url('applied-job-details/' . $aJobData->company_job_id) }}"
                                                    class="btn btn-outline-secondary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                            {{-- {{ $data->links() }} --}}
                        </table>
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</section>

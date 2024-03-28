@extends('website.layout.app')

@section('title', 'Job Pulse || About Page')

@section('style')

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js') }}"></script>

@endsection

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')
    @include('website.components.JobPageTopBanner')

    @include('website.components.AllJobs')

    {{-- Footer --}}
    @include('website.components.Footer')

    @if (session('success'))
        <script>
            swal("Success !", "{{ session('success') }}", "success", {
                button: false,
                button: "OK",
                // timer: 2000,
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
@endsection

@section('script')
    <script>
        async function showAllCategory() {

            let allCategories = await axios.get("job-category-list");
            //set if any value
            // console.log(allCategories.data);
            if (allCategories.data.length == 0) {

            } else {
                allCategories["data"].forEach((item, i) => {
                    let catBtn =
                        `<button class="btn category-btn homeCatBTN mx-1" data-id=${item["id"]} >${ item["job_cat_name"] }</button>`

                    $("#jobCategoryList").append(catBtn);
                });

            };
        }


        async function showJobByCategoryID(id) {
            $("#homeJobList").empty();
            $("#jobPagination").empty();
            showLoader();
            let allJobCatData = await axios.get('job-list-by-category/' + id);
            // console.log(homeAllJobData.data)
            if (allJobCatData.data.data.length == 0) {
                hideLoader();
                $("#homeJobList").append("<h6>No data found</h6>");
            } else {
                // applyNowBtnAction();
                allJobCatData.data.data.forEach((item, i) => {
                    let homeJobList = `<div class="companyCard my-3">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="text-start p-3">
                                            <h3>${item["job_title"]}</h3>
                                            <p>${item["job_description"]}</p>
                                            <div class="mt-3" id="homeSkills">
                                                <div class="py-2 h5 ">Required Skills :</div>
                                                <button class="tags btn m-1">${item["required_skills"].split(',').join('</button><button class="tags btn m-1">')}  </button>
                                            </div>
                                            <div class="mt-3" id="homeSkills">
                                                <div>
                                                    <button class="me-3 btn btn-outline-danger"><i class="fas fa-heart"></i> Save </button>
                                                    <a class="p-2 btn btn-outline-secondary rounded" href="#"><i class="fas fa-eye"></i> Job Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <form method="POST" action="{{ url('job-application') }}" class="d-flex salary-apply me-lg-4 me-md-4 me-0">
   @csrf
                                            <div class="mt-lg-4 mt-md-2 mt-2">
                                                <div>
                                                    <div class="p-2 markBtn rounded">${item["salary"]} $</div>
                                                    <input type="hidden" name="currentSalary" value="${item["salary"]}" required />
                                                    <input type="hidden" name="jobID" value="${item['id']}" required />
                                                </div>
                                                <div class="p-3">
                                                    <input class="p-2 markBtn rounded" placeholder="Enter Expected Salary" name="expectedSalary" value="" required />
                                                </div>
                                                <div class="p-3">
                                                    <button data-id="${item['id']}" class="btn myBtn applyNowBtn">Apply Now</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                       
                                `
                    $("#homeJobList").append(homeJobList);
                    hideLoader();
                });
                allJobCatData.data.links.forEach((item, i) => {
                    // console.log(item);
                    let paginationDiv =
                        `<button class="btn myBtn my-3 mx-1" onclick="handlePageButtonByCat(${id},${item["label"]})">${item["label"]}</button>`;
                    $('#jobPagination').append(paginationDiv);
                });

                applyNowBtnAction();
            }

        }

        async function showAllHomeCategoryJobs() {
            $("#homeJobList").empty();
            $("#jobPagination").empty();
            showLoader();
            let homeAllJobData = await axios.get('joblist-all');
            // console.log(homeAllJobData);
            if (homeAllJobData.status == 200) {

                homeAllJobData.data.data.forEach((item, i) => {
                    let homeJobList = `<div class="companyCard my-3">
                <div class="row">
                    <div class="col-md-9">
                        <div class="text-start p-3">
                            <h3>${item["job_title"]}</h3>
                            <p>${item["job_description"]}</p>
                            <div class="mt-3" id="homeSkills">
                                <div class="py-2 h5 ">Required Skills :</div>
                                <button class="tags btn m-1">${item["required_skills"].split(', ').join('</button><button class="tags btn m-1">')}  </button>
                            </div>
                            <div class="mt-3" id="homeSkills">
                                <div>
                                    <button class="me-3 btn btn-outline-danger"><i class="fas fa-heart"></i> Save </button>
                                    <a class="p-2 btn btn-outline-secondary rounded" href="#"><i class="fas fa-eye"></i> Job Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <form method="POST" action="{{ url('job-application') }}" class="d-flex salary-apply me-lg-4 me-md-4 me-0">
                            @csrf
                            <div class="mt-lg-4 mt-md-2 mt-2">
                                <div>
                                    <div class="p-2 markBtn rounded">${item["salary"]} $</div>
                                    <input type="hidden" name="currentSalary" value="${item["salary"]}" required />
                                    <input type="hidden" name="jobID" value="${item['id']}" required />
                                </div>
                                <div class="p-3">
                                    <input class="p-2 markBtn rounded" placeholder="Enter Expected Salary" name="expectedSalary" value="" required />
                                </div>
                                <div class="p-3">
                                    <button data-id="${item['id']}" class="btn myBtn applyNowBtn">Apply Now</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>                       
                `
                    $("#homeJobList").append(homeJobList);
                    hideLoader();
                });

                homeAllJobData.data.links.forEach((item, i) => {
                    // console.log(item);
                    let paginationDiv =
                        `<button class="btn myBtn my-3 mx-1" onclick="handleAllCatPageButtonClick(${item["label"]})">${item["label"]}</button>`;
                    $('#jobPagination').append(paginationDiv);
                });

                applyNowBtnAction();
            }
        }

        // Function to handle pagination button click
        async function handleAllCatPageButtonClick(pageNum) {
            showLoader();
            $("#homeJobList").empty();
            // currentPage++;
            const newData = await await axios.get('joblist-all?page=' + pageNum);
            // Update UI with newData
            newData.data.data.forEach((item, i) => {
                let homeJobList = `<div class="companyCard my-3">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="text-start p-3">
                                <h3>${item["job_title"]}</h3>
                                <p>${item["job_description"]}</p>
                                <div class="mt-3" id="homeSkills">
                                    <div class="py-2 h5 ">Required Skills :</div>
                                    <button class="tags btn m-1">${item["required_skills"].split(',').join('</button><button class="tags btn m-1">')}  </button>
                                </div>
                                <div class="mt-3" id="homeSkills">
                                    <div>
                                        <button class="me-3 btn btn-outline-danger"><i class="fas fa-heart"></i> Save </button>
                                        <a class="p-2 btn btn-outline-secondary rounded" href="#"><i class="fas fa-eye"></i> Job Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <form method="POST" action="{{ url('job-application') }}" class="d-flex salary-apply me-lg-4 me-md-4 me-0">
                                @csrf
                                <div class="mt-lg-4 mt-md-2 mt-2">
                                    <div>
                                        <div class="p-2 markBtn rounded">${item["salary"]} $</div>
                                        <input type="hidden" name="currentSalary" value="${item["salary"]}" required />
                                        <input type="hidden" name="jobID" value="${item['id']}" required />
                                    </div>
                                    <div class="p-3">
                                        <input class="p-2 markBtn rounded" placeholder="Enter Expected Salary" name="expectedSalary" value="" required />
                                    </div>
                                    <div class="p-3">
                                        <button data-id="${item['id']}" class="btn myBtn applyNowBtn">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>                       
                `
                $("#homeJobList").append(homeJobList);
                hideLoader();
                applyNowBtnAction();
            });
        }

        // Function to handle pagination button click
        async function handlePageButtonByCat(id, pageNum) {
            showLoader();
            $("#homeJobList").empty();
            // currentPage++;
            const newData = await await axios.get('job-list-by-category/' + id + '?page=' + pageNum);
            // Update UI with newData
            newData.data.data.forEach((item, i) => {
                let homeJobList = `<div class="companyCard my-3">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="text-start p-3">
                                <h3>${item["job_title"]}</h3>
                                <p>${item["job_description"]}</p>
                                <div class="mt-3" id="homeSkills">
                                    <div class="py-2 h5 ">Required Skills :</div>
                                    <button class="tags btn m-1">${item["required_skills"].split(',').join('</button><button class="tags btn m-1">')}  </button>
                                </div>
                                <div class="mt-3" id="homeSkills">
                                    <div>
                                        <button class="me-3 btn btn-outline-danger"><i class="fas fa-heart"></i> Save </button>
                                        <a class="p-2 btn btn-outline-secondary rounded" href="#"><i class="fas fa-eye"></i> Job Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <form method="POST" action="{{ url('job-application') }}" class="d-flex salary-apply me-lg-4 me-md-4 me-0">
                                @csrf
                                <div class="mt-lg-4 mt-md-2 mt-2">
                                    <div>
                                        <div class="p-2 markBtn rounded">${item["salary"]} $</div>
                                        <input type="hidden" name="currentSalary" value="${item["salary"]}" required />
                                        <input type="hidden" name="jobID" value="${item['id']}" required />
                                    </div>
                                    <div class="p-3">
                                        <input class="p-2 markBtn rounded" placeholder="Enter Expected Salary" name="expectedSalary" value="" required />
                                    </div>
                                    <div class="p-3">
                                        <button data-id="${item['id']}" class="btn myBtn applyNowBtn">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                       
                `
                $("#homeJobList").append(homeJobList);
                hideLoader();
                applyNowBtnAction();
            });
        }

        async function categoryClickBtns() {
            $('.homeCatBTN').click(function() {
                var id = $(this).data("id");
                // $("#deleteEduID").val(id);
                if (id == 0) {
                    $('.homeCatBTN').removeClass('myBtn');
                    $('.homeCatBTN').addClass('category-btn');
                    $(this).addClass('myBtn');
                    $(this).removeClass('category-btn');
                    showAllHomeCategoryJobs();

                } else {
                    $('.homeCatBTN').removeClass('myBtn');
                    $('.homeCatBTN').addClass('category-btn');
                    $(this).addClass('myBtn');
                    $(this).removeClass('category-btn');
                    showJobByCategoryID(id);
                }
                // console.log(id);
            });
        }

        async function applyNowBtnAction() {
            $('.applyNowBtn').click(function() {
                var jobId = $(this).data("id");
                // $("#deleteEduID").val(id);

                console.log(jobId);
            });
        }

        (async () => {
            showLoader();
            await showAllCategory();
            await categoryClickBtns();
            await showAllHomeCategoryJobs();
            await hideLoader();
            // await applyNowBtnAction();
            /** For delete */
        })();
    </script>
@endsection

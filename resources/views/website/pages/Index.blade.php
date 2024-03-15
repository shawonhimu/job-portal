@extends('website.layout.app')

@section('title', 'Job Pulse || Home Page')

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')
    @include('website.components.HomeBanner')
    <section class="mainPersonsSection mt-lg-0" id="mainPersons">
        <div>
            <div class="container">
                <div class="personalBanner pb-lg-3 py-2">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="text-center text-uppercase align-items-center">
                                <h2 class="mt-lg-5 my-2">Top Companies</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('website.components.TopCompany')
    @include('website.components.HomeJobs')

    @include('website.components.Blogs')

    {{-- Footer --}}
    @include('website.components.Footer')


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
            showLoader();
            let homeAllJobData = await axios.get('joblist-by-category/' + id);
            // console.log(homeAllJobData.data)
            if (homeAllJobData.data.length == 0) {
                hideLoader();
                $("#homeJobList").append("<h6>No data found</h6>");
            } else {
                homeAllJobData.data.forEach((item, i) => {
                    let homeJobList = `<div class="companyCard my-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-start p-3">
                                            <h3>${item["job_title"]}</h3>
                                            <p>${item["job_description"]}</p>
                                            <div class="mt-3" id="homeSkills">
                                                <h6 class="pb-3">Required Skills</h6>
                                                <span class="tags">${item["required_skills"].split(',').join('<span class="d-inline p-2 bg-light mx-2 w-4"></span>')}  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex salary-apply me-lg-4 me-md-4 me-0">
                                            <div class="mt-lg-4 mt-md-2 mt-2">
                                                <div class="p-3">
                                                    <a class="p-2 btn btn-secondary rounded" href="#">Job Details</a>
                                                </div>
                                                <div>
                                                    <div class="p-2 markBtn rounded">$ 1000</div>
                                                </div>
                                                <div class="p-3">
                                                    <a class="btn myBtn" href="#">Apply Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                                `
                    $("#homeJobList").append(homeJobList);
                    hideLoader();
                })
            }

        }

        async function showAllHomeCategoryJobs() {
            $("#homeJobList").empty();
            showLoader();
            let homeAllJobData = await axios.get('joblist-all-category');
            homeAllJobData.data.forEach((item, i) => {
                let homeJobList = `<div class="companyCard my-3">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="text-start p-3">
                                            <h3>${item["job_title"]}</h3>
                                            <p>${item["job_description"]}</p>
                                            <div class="mt-3" id="homeSkills">
                                                <h6 class="pb-3">Required Skills</h6>
                                                <span class="tags">${item["required_skills"].split(',').join('<span class="d-inline p-2 bg-light mx-2 w-4"></span>')}  </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex salary-apply me-lg-4 me-md-4 me-0">
                                            <div class="mt-lg-4 mt-md-2 mt-2">
                                                <div class="p-3">
                                                    <a class="p-2 btn btn-secondary rounded" href="#">Job Details</a>
                                                </div>
                                                <div>
                                                    <div class="p-2 markBtn rounded">$ 1000</div>
                                                </div>
                                                <div class="p-3">
                                                    <a class="btn myBtn" href="#">Apply Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                                `
                $("#homeJobList").append(homeJobList);
                hideLoader();
            })

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
                console.log(id);
            });
        }



        (async () => {
            showLoader();
            await showAllCategory();
            await categoryClickBtns();
            await showAllHomeCategoryJobs();
            await hideLoader();
            /** For delete */
        })();
    </script>
@endsection

<div class="adminSidebar" id="adminSidebar">
    <div class="adminSidebarOptions">
        <div class="adminLogo">
            <div class="text-center text-white my-3">
                <a class="logoLink" href="#"><img src="{{ asset('img/user.png') }}" alt="" /></a>
                <div class="sideTitle">
                    <h6>Shawon Himu</h6>
                    <h6>Owner</h6>
                    <h6>M.S. Trading</h6>
                    <hr />
                </div>
            </div>
        </div>
        <ul class="navSidebar">
            <li class="navSbarItem">
                <a class="navSbarLink  {{ 'employee-home' == request()->path() ? 'active' : '' }}"
                    href="{{ url('/employee-home') }}">
                    <i class="fas fa-th-large"></i>
                    <span class="sideTitle">Home</span>
                </a>
            </li>
            <li class="navSbarItem">
                {{-- @php
                    use Illuminate\Support\Str;
                    $isProduct = Str::startsWith(request()->path(), 'edit-product/');
                    $isTransaction = Str::startsWith(request()->path(), 'transaction-details/');

                @endphp --}}
                <a class="navSbarLink  {{ 'employee-job' == request()->path() || 'employee-job' == request()->path() ? 'active' : '' }}"
                    href="{{ url('employee-job') }}">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="sideTitle">Jobs</span>
                </a>
            </li>

            <li class="navSbarItem">
                <a class="navSbarLink {{ 'employee-plugins' == request()->path() || 'new-location' == request()->path() ? 'active' : '' }}"
                    href="{{ url('employee-plugins') }}">
                    <i class="fas fa-map-marked-alt"></i>
                    <span class="sideTitle">Plugins</span>
                </a>
            </li>


            <li class="navSbarItem">
                <a class="navSbarLink" href="#">
                    <i class="fas fa-cog"></i>
                    <span class="sideTitle">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>

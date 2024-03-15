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
                <a class="navSbarLink  {{ 'company-home' == request()->path() ? 'active' : '' }}"
                    href="{{ url('/company-home') }}">
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
                <a class="navSbarLink  {{ 'company-job' == request()->path() || 'company-job' == request()->path() ? 'active' : '' }}"
                    href="{{ url('company-job') }}">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="sideTitle">Jobs</span>
                </a>
            </li>
            <li class="navSbarItem">
                <a class="navSbarLink {{ 'company-employee' == request()->path() || 'new-driver' == request()->path() ? 'active' : '' }}"
                    href="{{ url('company-employee') }}">
                    <i class="fas fa-user-alt"></i>
                    <span class="sideTitle">Employees</span>
                </a>
            </li>

            <li class="navSbarItem">
                <a class="navSbarLink {{ 'company-plugins' == request()->path() || 'new-location' == request()->path() ? 'active' : '' }}"
                    href="{{ url('company-plugins') }}">
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

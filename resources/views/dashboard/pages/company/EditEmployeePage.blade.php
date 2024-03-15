@extends('dashboard.layout.app')

@section('content')
    <div class="mainAdmin">
        {{-- Side navbar --}}
        @include('dashboard.components.company-pages.Sidebar')
        {{-- Contents --}}
        <div class="adminContentBar" id="adminContentBar">
            {{-- Top navbar --}}
            @include('dashboard.components.company-pages.Navbar')
            {{-- Cards --}}

            @include('dashboard.components.company-pages.EditEmployee')
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
    @endif
    <script>
        function generatePass() {
            let pass = '';
            let str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' +
                'abcdefghijklmnopqrstuvwxyz0123456789@#$';

            for (let i = 1; i <= 8; i++) {
                let char = Math.floor(Math.random() *
                    str.length + 1);

                pass += str.charAt(char)
            }
            document.getElementById('empPassword').value = pass;
            // return pass;
        }

        // console.log(generatePass());
    </script>
@endsection

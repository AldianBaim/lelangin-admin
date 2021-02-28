<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lelangin admin - Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/app.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/auth.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/iconly/bold.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/choices.js/choices.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-icons/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        .bg-main {
            background-color: rgb(226, 245, 239)
        }
    </style>
    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/vendors/perfect-scrollbar/perfect-scrollbar.css"> --}}
    {{-- <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.svg" type="image/x-icon"> --}}
    @livewireStyles
</head>

<body class="bg-main">
    <div id="app">
        @include('sweetalert::alert')
        @include('layouts.sidebar')

        <div id="main">
            @yield('content')
        </div>
        
    </div>
    {{-- <script src="{{ asset('assets') }}/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script> --}}
    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendors/apexcharts/apexcharts.js"></script>
    <script src="{{ asset('assets') }}/js/pages/dashboard.js"></script>
    <script src="{{ asset('assets') }}/js/main.js"></script>
    <script src="{{ asset('assets') }}/vendors/choices.js/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        window.addEventListener('swal',function(e){
            Swal.fire(e.detail);
        });

        function previewImage() {
            document.getElementById("img-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("img-source").files[0]);
        
            oFReader.onload = function(oFREvent) {
            document.getElementById("img-preview").src = oFREvent.target.result;
            };
        };
    </script>
    @livewireScripts
</body>

</html>
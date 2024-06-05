<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('images/cocokost5.ico') }}" rel="icon" type="image/x-icon">


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('assets/js/charts-pie.js') }}" defer></script>
    <style>
        .error {
            font-size: 0.875em;
            display: none;
        }
        .backcok{
            background: url('jojo.png');
        }
    </style>
</head>

<body class="backcok">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    @include('admin.sidebar')
    @include('admin.header')    
    @yield('content')
    </div>
    </div>
</body>
<script>
    function toggleSpan(element) {
        const spans = document.querySelectorAll('li span');
        spans.forEach(span => span.classList.add('hidden'));
        const span = element.querySelector('span');
        span.classList.toggle('hidden');
    }
</script>

<script>
   document.getElementById('carSelect').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var imgSrc = selectedOption.value ? selectedOption.getAttribute('data-img-src') : '';
    document.getElementById('carImage').src = imgSrc;
});

// Set initial image to empty if no default option is selected
document.getElementById('carImage').src = '';


</script>
</html>
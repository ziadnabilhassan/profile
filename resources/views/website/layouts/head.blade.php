<title>@yield('title', 'Senet')</title>
<!-- favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('logo/favicon.png') }}">



    <!-- CSS LIBRARY -->






      <script>
        if (localStorage.getItem('theme') === 'light' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: light)').matches)) {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>



    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        darkBg: '#05070a',
                        cardBg: '#0b0f19',
                        cardBorder: '#162032',
                        cyanAccent: '#00f0ff',
                        blueAccent: '#0077ff',
                        textMuted: '#94a3b8'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Swiper CDN (hero slider) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.2.10/swiper-bundle.min.css">

    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Styling & Animations -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}?v=2">
    <link rel="stylesheet" href="{{ asset('website/assets/css/support.css') }}">

 @if (app()->getLocale() == 'ar')
	    <link rel="stylesheet" href="{{ asset('website/assets/css/rtl.css')}}">
 @endif
    @yield('css')

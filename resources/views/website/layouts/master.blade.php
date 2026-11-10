<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Author" content="Web Solla">
    <meta name="author" content="websolla.com">
    <meta name="keywords" content="{{ $Setting->keywords }}">
    <meta name="description" content="{{ $Setting->description }}">

    @include('website.layouts.head')

    <!-- ✅ دعم RTL CSS -->
    @if(app()->getLocale() == 'ar')
        <style>
            body {
                direction: rtl;
                text-align: right;
            }

            /* إصلاح مشاكل شائعة */
            .text-start { text-align: right !important; }
            .text-end { text-align: left !important; }

            .ms-auto { margin-left: 0 !important; margin-right: auto !important; }
            .me-auto { margin-right: 0 !important; margin-left: auto !important; }

            /* قلب الأيقونات لو محتاج */
            .flip-rtl {
                transform: scaleX(-1);
            }
        </style>
    @endif
</head>

<body  class="homepage3-body">

    @include('website.layouts.nav')
    @yield('content')
    @include('website.layouts.footer')

    @include('website.layouts.footer-scripts')

    <script>
        $(document).ready(function() {
            var url = window.location.href;
            url = url.split('?', 1)[0];

            $('.nav li').filter(function() {
                return $(this).find('a').attr('href') == url;
            }).addClass('active');
        });

        // ✅ تحسين active link (handles trailing slash)
        $(document).ready(function() {
            var current = window.location.pathname.replace(/\/$/, "");

            $('.nav a').each(function() {
                var link = $(this).attr('href');
                if (!link) return;

                link = link.replace(window.location.origin, '').replace(/\/$/, "");

                if (link === current) {
                    $(this).closest('li').addClass('active');
                }
            });
        });
    </script>

</body>
</html>

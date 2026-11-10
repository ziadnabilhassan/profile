@extends('website.layouts.master')
@section('title')
{{ __('main.site') }} | {{ __('main.honor') }}
@endsection
@section('css')
@endsection
@section('content')



<!-- =====================================================
     HERO
===================================================== -->
<section class="relative pt-48 pb-28 sm:pt-56 sm:pb-32 bg-[#05070a] overflow-hidden border-b border-white/[0.1]">
    <div class="absolute inset-0 bg-cover bg-center opacity-90 pointer-events-none scale-105" style="background-image: url('{{ asset('website/assets/images/bread.png') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-[#05070a]/10 via-[#05070a]/40 to-[#05070a]/90 pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[400px] bg-amber-500/[0.12] rounded-full blur-[180px] pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
        <nav class="flex items-center gap-3 text-base font-bold text-slate-100 uppercase tracking-widest">
            <a href="{{route('home')}}" class="hover:text-cyan-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-house text-sm text-cyan-400"></i><span>{{ __('main.home') }}</span></a>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <a href="{{ route('about') }}" class="hover:text-cyan-400 transition-colors">{{ __('main.about') }}</a>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <span class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.honor') }}</span>
        </nav>
    </div>
</section>
<section class="bg-[#070a12] ap-bg-dark border-b border-white/[0.06] sticky top-[96px] z-40 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="sp-tabs">
            <a href="{{ route('about') }}" class="sp-tab ">{{ __('main.company_profile') }}</a>
            <a href="{{ route('company-culture') }}" class="sp-tab">{{ __('main.company_culture') }}</a>
            <a href="{{ route('honor') }}" class="sp-tab active">{{ __('main.honor') }}</a>
            <a href="{{ route('oem') }}" class="sp-tab">{{ __('main.oem') }}</a>
            <a href="{{ route('privacy') }}" class="sp-tab">{{ __('main.privacy_policy') }}</a>
            <a href="{{ route('investor') }}" class="sp-tab">{{ __('main.investor') }}</a>
        </div>
    </div>
</section>


<!-- =====================================================
     FILTER BAR
===================================================== -->
<section class="py-10 bg-[#070a12] ap-bg-dark border-b border-white/[0.06] sticky top-[76px] z-40 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="ap-filter-bar" id="filterBar">
            <button class="ap-filter-btn active" data-filter="all">All</button>
            @foreach ($certificatetypes as $certificatetype)


            <button class="ap-filter-btn" data-filter="certificate-{{ $certificatetype->id }}">{{ $certificatetype->name }}</button>
          @endforeach
        </div>
    </div>
</section>

<!-- =====================================================
     AWARDS GRID
===================================================== -->
<section class="py-5 ap-bg-dark bg-[#070a12] relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-amber-500/[0.03] rounded-full blur-[180px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-cyan-500/[0.03] rounded-full blur-[160px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="text-center mb-14">
            <div class="ap-section-badge mx-auto"><i class="fa-solid fa-trophy"></i> Awards & Recognition</div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="awardsGrid">
            @foreach ($certificates as $certificate)


            <!-- Award 1 — ISO 9001 -->
            <div class="ap-award-card ap-fade-up ap-fade-up-1" data-category="certificate-{{ $certificate->typecertificate_id }}">
                <div class="ap-award-img-wrap">
                    <a href="{{ asset($certificate->image) }}" data-fancybox="{{ $certificate->id }}" data-caption="{{ $certificate->name }}">
                        <img src="{{ asset($certificate->image) }}" alt="ISO 9001:2015">
                        <div class="ap-award-overlay">
                            <div class="ap-award-zoom-btn"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                        </div>
                    </a>
                </div>
                <div class="ap-award-body">
                    <div class="ap-award-name">{{ $certificate->name }}</div>
                </div>
            </div>
                @endforeach


        </div>

        <!-- No Results Message -->
        <div id="noResults" class="hidden text-center py-16 text-slate-500 ap-text-muted">
            <i class="fa-solid fa-filter text-4xl mb-4 opacity-30"></i>
            <p class="text-lg font-semibold">{{ __('main.not available') }}.</p>
        </div>

    </div>
</section>



@endsection
@section('js')
@section('js')
<script>
    /* ---------- Filter (من غير أي مكتبة) ---------- */
    (function () {
        var btns  = document.querySelectorAll('.ap-filter-btn');
        var cards = document.querySelectorAll('#awardsGrid .ap-award-card');
        var noRes = document.getElementById('noResults');

        btns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                btns.forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');

                var filter  = btn.dataset.filter;
                var visible = 0;

                cards.forEach(function (card) {
                    var cats = (card.dataset.category || '').split(' ');
                    var show = filter === 'all' || cats.indexOf(filter) !== -1;
                    card.style.display = show ? '' : 'none';
                    if (show) visible++;
                });

                noRes.classList.toggle('hidden', visible > 0);
            });
        });
    })();

    /* ---------- Fancybox ---------- */
    window.addEventListener('load', function () {
        if (typeof Fancybox === 'undefined') {
            console.warn('Fancybox مش متحمّل في الـ layout');
            return;
        }
        Fancybox.bind('[data-fancybox]', {
            Toolbar: { display: { left: [], middle: [], right: ['close'] } }
        });
    });
</script>
@endsection
@endsection

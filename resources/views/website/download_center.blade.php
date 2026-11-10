@extends('website.layouts.master')
@section('title')
{{ __('main.site') }} | {{ __('main.download center') }}
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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
        <nav class="flex items-center gap-3 text-base font-bold text-slate-100 uppercase tracking-widest">
            <a href="{{route('home')}}" class="hover:text-cyan-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-house text-sm text-cyan-400"></i><span>{{ __('main.home') }}</span></a>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <span>{{ __('main.support') }}</span>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <span class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.download center') }}</span>
        </nav>
    </div>
</section>
<div class="border-b border-white/10 bg-[#070a10] sticky top-[96px] z-40">
    <div class="max-w-7xl mx-auto px-6">
        <div id="page-tabs" class="flex items-center justify-start md:justify-center gap-8 md:gap-16 overflow-x-auto whitespace-nowrap [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            <a href="{{route('download-center')}}" aria-current="page" class="relative shrink-0 py-5 text-cyan-400 font-bold text-[15px] border-b-2 border-cyan-400 transition-colors">
               {{ __('main.download center') }}
            </a>
            <a href="{{route('services')}}" class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
              {{ __('main.services') }}
            </a>
            <a href="{{route('faq')}}" class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
                {{ __('main.faq') }}
            </a>
        </div>
    </div>
</div>

<!-- =====================================================
     DOWNLOAD CENTER
===================================================== -->

<section class="py-16 ap-bg-dark bg-[#070a12] relative overflow-hidden">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-500/[0.04] rounded-full blur-[180px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Filters -->
        <div class="space-y-5 mb-12">
            <div class="flex flex-wrap items-center gap-3">
                <span class="sp-filter-label">{{ __('main.category type') }}:</span>
                <div class="flex flex-wrap gap-2" id="filesFilter">
                    <button type="button" class="ap-filter-btn active" data-set-product="*">{{ __('main.all') }}</button>
                    @foreach ($downloadtypes as $downloadtype)
                        <button type="button" class="ap-filter-btn" data-set-product="{{ $downloadtype->id }}">{{ $downloadtype->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Documents -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="filesGrid">
            @foreach ($downloads as $download)
                <div class="sp-doc" data-product="{{ $download->downloadtype_id }}" data-type="brochure">
                    <div class="sp-doc-cover">
                        <img src="{{ asset($download->image) }}" class="sp-doc-img" alt="{{ $download->name }}" loading="lazy">
                    </div>
                    <h3 class="sp-doc-title">{{ $download->name }}</h3>

                    @if ($download->file)
                        <a href="{{ asset($download->file) }}" class="sp-doc-link" download="{{ basename($download->file) }}">
                            <span>{{ __('main.download') }}</span>
                            <i class="fa-solid fa-download"></i>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Empty state -->
        <div id="noFiles" class="hidden text-center py-16 text-slate-500 ap-text-muted">
            <i class="fa-solid fa-folder-open text-4xl mb-4 opacity-30"></i>
            <p class="text-lg font-semibold">{{ __('main.not available') }}.</p>
        </div>

    </div>
</section>






@endsection
@section('js')
<script>
    (function () {
        var btns  = document.querySelectorAll('#filesFilter [data-set-product]');
        var cards = document.querySelectorAll('#filesGrid .sp-doc');
        var empty = document.getElementById('noFiles');
        if (!btns.length) return;

        function applyFilter(value) {
            var visible = 0;

            cards.forEach(function (card) {
                var show = value === '*' || card.dataset.product === value;
                card.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            empty.classList.toggle('hidden', visible > 0);
        }

        btns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                btns.forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');
                applyFilter(btn.dataset.setProduct);
            });
        });
    })();
</script>
@endsection

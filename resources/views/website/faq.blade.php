@extends('website.layouts.master')
@section('title')
    {{ __('main.site') }} | {{ __('main.faq') }}
@endsection
@section('css')
@endsection
@section('content')
    <!-- =====================================================
             HERO
        ===================================================== -->
    <section class="relative pt-48 pb-28 sm:pt-56 sm:pb-32 bg-[#05070a] overflow-hidden border-b border-white/[0.1]">
        <div class="absolute inset-0 bg-cover bg-center opacity-90 pointer-events-none scale-105"
            style="background-image: url('{{ asset('website/assets/images/bread.png') }}');"></div>
        <div
            class="absolute inset-0 bg-gradient-to-b from-[#05070a]/10 via-[#05070a]/40 to-[#05070a]/90 pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
            <nav class="flex items-center gap-3 text-base font-bold text-slate-100 uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors flex items-center gap-2"><i
                        class="fa-solid fa-house text-sm text-cyan-400"></i><span>{{ __('main.home') }}</span></a>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <span>{{ __('main.support') }}</span>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <span
                    class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.faq') }}</span>
            </nav>
        </div>
    </section>
    <div class="border-b border-white/10 bg-[#070a10] sticky top-[96px] z-40">
        <div class="max-w-7xl mx-auto px-6">
            <div id="page-tabs"
                class="flex items-center justify-start md:justify-center gap-8 md:gap-16 overflow-x-auto whitespace-nowrap [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">

                <a href="{{ route('download-center') }}"
                    class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
                    {{ __('main.download center') }}
                </a>

                <a href="{{ route('services') }}"
                    class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
                    {{ __('main.services') }}
                </a>

                <a href="{{ route('faq') }}"aria-current="page"
                    class="relative shrink-0 py-5 text-cyan-400 font-bold text-[15px] border-b-2 border-cyan-400 transition-colors">
                    {{ __('main.faq') }}
                </a>

            </div>
        </div>
    </div>

    <!-- =====================================================
             FAQ LIST (static HTML)
        ===================================================== -->
    <section class="py-20 ap-bg-dark bg-[#070a12] relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-500/[0.04] rounded-full blur-[180px] pointer-events-none">
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="space-y-4">
                @foreach ($faqs as $faq)
                    <details class="sp-faq">
                        <summary>
                            <span>{{ $faq->name }}</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </summary>
                        <div class="sp-faq-body">{!! $faq->description !!}</div>
                    </details>
                @endforeach

            </div>

        </div>
    </section>
@endsection
@section('js')
@endsection

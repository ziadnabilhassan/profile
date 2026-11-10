@extends('website.layouts.master')
@section('title')
    {{ __('main.site') }} | {{ __('main.company_culture') }}
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
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[400px] bg-blue-600/[0.15] rounded-full blur-[180px] pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
            <nav class="flex items-center gap-3 text-base font-bold text-slate-100 uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-house text-sm text-cyan-400"></i><span>{{ __('main.home') }}</span>
                </a>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <a href="{{ route('company-culture') }}"
                    class="hover:text-cyan-400 transition-colors">{{ __('main.about') }}</a>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <span
                    class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.company_culture') }}</span>
            </nav>
        </div>
    </section>
    <section class="bg-[#070a12] ap-bg-dark border-b border-white/[0.06] sticky top-[96px] z-40 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="sp-tabs">
                <a href="{{ route('about') }}" class="sp-tab ">{{ __('main.company_profile') }}</a>
                <a href="{{ route('company-culture') }}" class="sp-tab active">{{ __('main.company_culture') }}</a>
                <a href="{{ route('honor') }}" class="sp-tab">{{ __('main.honor') }}</a>
                <a href="{{ route('oem') }}" class="sp-tab">{{ __('main.oem') }}</a>
                <a href="{{ route('privacy') }}" class="sp-tab">{{ __('main.privacy_policy') }}</a>
                <a href="{{ route('investor') }}" class="sp-tab">{{ __('main.investor') }}</a>
            </div>
        </div>
    </section>

    <!-- =====================================================
             OUR CORE VALUES
        ===================================================== -->
    <section class="py-20 relative overflow-hidden bg-[#070a12] ap-bg-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            @foreach ($Pages as $page)
                <!-- Our Vision -->
                <div class="relative rounded-3xl overflow-hidden h-[260px] md:h-[320px] border border-white/[0.07] group">
                    <img src="{{ asset($page->image) }}" alt="Our Vision"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/60 via-blue-500/40 to-cyan-400/30"></div>
                    <div
                        class="relative z-10 h-full flex flex-col items-center justify-center text-center px-6 md:px-16 space-y-5">
                        <div class="flex items-center gap-3 text-white">
                            <i class="fa-solid fa-eye text-2xl md:text-3xl"></i>
                            <h3 class="text-2xl md:text-4xl font-bold">{{ $page->title }}</h3>
                        </div>
                        <div class="text-white text-sm md:text-lg leading-relaxed max-w-4xl">{!! $page->text !!}</div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
@section('js')
@endsection

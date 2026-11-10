@extends('website.layouts.master')
@section('title')
    {{ __('main.site') }} | {{ __('main.services') }}
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
                    class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.service') }}</span>
            </nav>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight uppercase drop-shadow-lg pt-2">
                {{ __('main.service') }}
            </h1>
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

            <a href="{{ route('services') }}" aria-current="page"
                class="relative shrink-0 py-5 text-cyan-400 font-bold text-[15px] border-b-2 border-cyan-400 transition-colors">
                {{ __('main.services') }}
            </a>

            <a href="{{ route('faq') }}"
                class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
                {{ __('main.faq') }}
            </a>

        </div>
    </div>
</div>

    <!-- =====================================================
         DOMESTIC / OVERSEAS SERVICES
    ===================================================== -->
    <section class="py-5 pb-24 ap-bg-dark bg-[#070a12] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div class="ap-value-card !p-0 flex flex-col">
                        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}"
                            class="w-full h-64 object-cover">
                       <a href="{{ Helper::link('service.details', $service->id, $service->title) }}"> <div class="p-8">
                            <h3 class="ap-value-title !text-2xl">{{ $service->title }}</h3>
                            <div class="ap-value-desc">{!! Helper::limit($service->text, 100) !!}</div>
                        </div></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =====================================================
         WARRANTY SERVICE / ONLINE SUPPORT
    ===================================================== -->
    <section class="py-24 ap-bg-darker bg-[#05070a] relative overflow-hidden border-t border-white/[0.06]">
        <div
            class="absolute top-1/2 right-0 w-[400px] h-[500px] bg-blue-500/[0.04] rounded-full blur-[160px] pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-14">
                <div class="space-y-5">
                    <h2 class="ap-section-title ap-text-heading !mb-0">{{ $oneservice->title }}</h2>

                    <div class="text-base leading-relaxed text-slate-400 ap-text-muted">{!! $oneservice->text !!}.</div>
                </div>
                <img src="{{ asset($oneservice->image) }}"
                    alt="{{ $oneservice->title }}" class="w-full h-72 object-cover rounded-2xl border border-white/[0.07]">
            </div>


        </div>
    </section>
@endsection
@section('js')
@endsection

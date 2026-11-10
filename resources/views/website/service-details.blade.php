@extends('website.layouts.master')
@section('title')
    {{ __('main.site') }} | {{ $service->title }}
@endsection
@section('css')
@endsection
@section('content')

   <!--===== HERO AREA STARTS =======-->
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
                <span>{{ __('main.service') }}</span>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <span
                    class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ $service->title }}</span>
            </nav>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight uppercase drop-shadow-lg pt-2">
                {{$service->title}}
            </h1>
        </div>
    </section>
<!--===== HERO AREA ENDS =======-->

<!--===== APARTMENT AREA STARTS =======-->
<section class="py-24 ap-bg-darker bg-[#05070a] relative overflow-hidden border-t border-white/[0.06]">
        <div
            class="absolute top-1/2 right-0 w-[400px] h-[500px] bg-blue-500/[0.04] rounded-full blur-[160px] pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-14">
                <div class="space-y-5">
                    <h2 class="ap-section-title ap-text-heading !mb-0">{{ $service->title }}</h2>

                    <div class="text-base leading-relaxed text-slate-400 ap-text-muted">{!! $service->text !!}.</div>
                </div>
                <img src="{{ asset($service->image) }}"
                    alt="{{ $service->title }}" class="w-full h-72 object-cover rounded-2xl border border-white/[0.07]">
            </div>


        </div>
    </section>
<!--===== APARTMENT AREA ENDS =======-->
@endsection

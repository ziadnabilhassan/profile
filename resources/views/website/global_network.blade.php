@extends('website.layouts.master')
@section('title')
{{ __('main.site') }} | {{ __('main.global_offices') }}
@endsection
@section('css')
@endsection
@section('content')



<!-- =====================================================
     HERO SECTION
===================================================== -->
<section class="relative pt-48 pb-28 sm:pt-56 sm:pb-32 bg-[#05070a] overflow-hidden border-b border-white/[0.1]">
    <!-- Breadcrumb Background Image - High Opacity & Brightness -->
    <div class="absolute inset-0 bg-cover bg-center opacity-90 pointer-events-none scale-105 transition-transform duration-1000" style="background-image: url('{{ asset('website/assets/images/bread.png') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-[#05070a]/10 via-[#05070a]/30 to-[#05070a]/80 pointer-events-none"></div>

    <!-- Soft Ambient Cyber Glow -->
    <div class="absolute top-1/2 left-1/3 -translate-y-1/2 w-[800px] h-[350px] bg-cyan-500/[0.20] rounded-full blur-[160px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
        <!-- Breadcrumb Links -->
        <nav class="flex items-center gap-3 text-base sm:text-lg font-bold text-[#f1f5f9] uppercase tracking-widest">
            <a href="{{route('home')}}" class="hover:text-cyan-400 transition-colors flex items-center gap-2">
                <i class="fa-solid fa-house text-sm text-cyan-400"></i>
                <span>{{ __('main.home') }}</span>
            </a>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <span class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.contact us') }}</span>
        </nav>
    </div>
</section>
<!-- =====================================================
     CONTACT TABS
===================================================== -->
<div class="border-b border-white/10 bg-[#070a10] sticky top-[96px] z-40">
    <div class="max-w-7xl mx-auto px-6">
        <div id="page-tabs" class="flex items-center justify-start md:justify-center gap-8 md:gap-16 overflow-x-auto whitespace-nowrap [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            <a href="{{route('contacts')}}" aria-current="page" class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
               {{__('main.Headquarters') }}
            </a>
            <a href="{{route('global-network')}}" aria-current="page" class="relative shrink-0 py-5 text-cyan-400 font-bold text-[15px] border-b-2 border-cyan-400 transition-colors">
                {{ __('main.global_offices') }}
            </a>
            <a href="{{route('message')}}" class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
               {{ __('main.Leave a Message') }}
            </a>
        </div>
    </div>
</div>

<!-- =====================================================
     GLOBAL OFFICES CONTENT
===================================================== -->
<section class="relative py-20 sm:py-24 bg-[#05070a] overflow-hidden">

    <!-- Ambient Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                w-[700px] h-[300px] bg-cyan-500/[0.035]
                rounded-full blur-[140px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">

        <!-- Section Title -->
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ __('main.global_offices') }}
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 lg:gap-10">

            <!-- =================================================
                 VIETNAM OFFICE
            ================================================== -->
            @foreach ($locations as $location)


            <div class="group relative border border-white/[0.12]
                        bg-[#0a0e15] rounded-2xl overflow-hidden
                        transition-all duration-500
                        hover:border-voltera-cyan/30
                        hover:shadow-[0_15px_50px_rgba(0,240,255,0.05)]">

                <!-- Top Line -->
                <div class="absolute top-0 left-0 right-0 h-[2px]
                            bg-gradient-to-r from-transparent
                            via-voltera-cyan/70 to-transparent
                            opacity-0 group-hover:opacity-100
                            transition-opacity duration-500"></div>

                <div class="p-7 sm:p-9 lg:p-10">

                    <!-- Header with Flag & Country -->
                    <div class="flex items-center gap-5 mb-6">
                        <!-- Flag Image -->
                        <div class="shrink-0 w-16 h-16 rounded-full overflow-hidden border border-white/10 shadow-md">
                            <img src="{{ asset($location->image) }}" alt="Vietnam Flag" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white tracking-tight">
                                {{ $location->name }}
                            </h3>

                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="mb-6 h-px bg-white/[0.12] relative">
                        <div class="absolute left-0 top-0 h-px w-20 bg-voltera-cyan"></div>
                    </div>

                    <!-- Office Details -->
                    <div class="space-y-4">

                        <!-- Telephone -->
                        <div class="flex items-start gap-4">
                            <div class="shrink-0 w-6 pt-0.5 text-voltera-cyan">
                                <i class="fa-solid fa-phone text-base"></i>
                            </div>
                            <div class="text-sm sm:text-base">
                                <span class="text-white font-medium">{{ __('main.phone') }}:</span>
                                <a href="tel:+{{ $location->phone }}" class="text-slate-400 ml-1 hover:text-voltera-cyan transition-colors">
                                  {{ $location->phone }}
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-4">
                            <div class="shrink-0 w-6 pt-0.5 text-voltera-cyan">
                                <i class="fa-regular fa-envelope text-base"></i>
                            </div>
                            <div class="text-sm sm:text-base">
                                <span class="text-white font-medium">{{ __('main.email') }}:</span>
                                <a href="mailto:{{ $location->email }}" class="text-slate-400 ml-1 hover:text-voltera-cyan transition-colors">
                                    {{ $location->email }}
                                </a>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="flex items-start gap-4">
                            <div class="shrink-0 w-6 pt-0.5 text-voltera-cyan">
                                <i class="fa-solid fa-location-dot text-base"></i>
                            </div>
                            <div class="text-sm sm:text-base">
                                <span class="text-white font-medium">{{ __('main.address') }}:</span>
                                <span class="text-slate-400 ml-1">
                                    {{ $location->address }}
                                </span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
             @endforeach

        </div>

    </div>

</section>

@endsection
@section('js')
@endsection

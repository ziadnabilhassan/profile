@extends('website.layouts.master')
@section('title')
{{ __('main.site') }} | {{ __('main.contact us') }}
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
            <a href="{{route('contacts')}}" aria-current="page" class="relative shrink-0 py-5 text-cyan-400 font-bold text-[15px] border-b-2 border-cyan-400 transition-colors">
               {{__('main.Headquarters') }}
            </a>
            <a href="{{route('global-network')}}" class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
                {{ __('main.global_offices') }}
            </a>
            <a href="{{route('message')}}" class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
               {{ __('main.Leave a Message') }}
            </a>
        </div>
    </div>
</div>
<!-- =====================================================
     HEADQUARTERS CONTENT
===================================================== -->
<section class="py-24 sm:py-28 relative bg-[#05070a] overflow-hidden">

    <!-- Ambient Background -->
    <div class="absolute top-20 left-1/2 -translate-x-1/2 w-[700px] h-[250px] bg-cyan-500/[0.06] rounded-full blur-[130px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">

        <!-- =================================================
             SECTION TITLE
        ================================================== -->
        <div class="text-center mb-14 sm:mb-16 ap-fade-up">

            <h2 class="ap-section-title">
              {{ __('main.address') }}
            </h2>

            <div class="h-1 w-20 bg-gradient-to-r from-voltera-cyan to-voltera-blue mx-auto rounded-full mt-6"></div>

        </div>


        <!-- =================================================
             MAIN HEADQUARTERS CARD
        ================================================== -->
        <div class="relative rounded-2xl border border-white/[0.12] bg-[#0a0e15] overflow-hidden shadow-2xl ap-fade-up-1">

            <!-- Top Cyan Line -->
            <div class="absolute top-0 left-0 right-0 h-[2px] bg-gradient-to-r from-transparent via-voltera-cyan to-transparent"></div>


            <div class="p-7 sm:p-10 lg:p-12">

                <!-- =================================================
                     COMPANY NAME
                ================================================== -->
                <div class="text-center mb-10 sm:mb-12">

                    <h3 class="text-2xl sm:text-3xl lg:text-[38px] font-medium text-voltera-cyan tracking-tight leading-tight">
                       {{ __('main.site') }}
                    </h3>

                </div>


                <!-- =================================================
                     TWO COLUMNS
                ================================================== -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14">


                    <!-- =================================================
                         LEFT COLUMN
                    ================================================= -->
                    <div>

                        <!-- Email -->
                        <div class="flex items-start gap-4 mb-6">

                            <div class="shrink-0 w-9 h-9 flex items-center justify-center text-voltera-cyan">
                                <i class="fa-regular fa-envelope text-xl"></i>
                            </div>

                            <div class="pt-1">

                                <span class="text-white font-medium">
                                    {{ __('main.email') }}:
                                </span>

                                <a
                                    href="mailto:{{ $Contact->email }}"
                                    class="text-slate-400 hover:text-voltera-cyan transition-colors ml-1">

                                  {{ $Contact->email }}

                                </a>

                            </div>

                        </div>


                        <!-- Phone -->
                        <div class="flex items-start gap-4 mb-6">

                            <div class="shrink-0 w-9 h-9 flex items-center justify-center text-voltera-cyan">
                                <i class="fa-solid fa-phone-volume text-xl"></i>
                            </div>

                            <div class="pt-1">

                                <span class="text-white font-medium">
                                    {{ __('main.phone') }}:
                                </span>

                                <a
                                    href="tel:+{{ $Contact->phone1 }}"
                                    class="text-slate-400 hover:text-voltera-cyan transition-colors ml-1">

                                  {{ $Contact->phone1 }}

                                </a>

                                <a
                                    href="{{ route('contacts') }}"
                                    class="inline-flex ml-3 text-voltera-cyan font-bold hover:text-white transition-colors">

                                   {{ __('main.contact us') }}

                                </a>

                            </div>

                        </div>


                        <!-- Headquarters -->
                        <div class="flex items-start gap-4">

                            <div class="shrink-0 w-9 h-9 flex items-center justify-center text-voltera-cyan">
                                <i class="fa-solid fa-location-dot text-xl"></i>
                            </div>

                            <div class="pt-1">

                                <span class="text-white font-medium">
                                    {{ __('main.headquarters') }}:
                                </span>

                                <span class="text-slate-400 ml-1 leading-7">

                                  {{ $Contact->address }}
                                </span>

                            </div>

                        </div>


                        <!-- =================================================
                             MAP
                        ================================================== -->
                        <div class="mt-8 rounded-xl overflow-hidden border border-white/[0.1] bg-[#070a10]">

                            <div class="relative h-[250px] sm:h-[300px] group">

                                <img
                                    src="{{ asset('website/assets/images/map.png') }}"
                                    alt="Voltera Headquarters Location"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                                <!-- Map Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-[#05070a]/80 via-transparent to-transparent"></div>

                                <!-- Location Label -->
                                <div class="absolute bottom-4 left-4 right-4">

                                    <div class="flex items-center justify-between gap-4">



                                        <a
                                            href="https://maps.google.com"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="shrink-0 w-11 h-11 rounded-full bg-black/60 backdrop-blur-md border border-white/20 flex items-center justify-center text-white hover:bg-voltera-cyan hover:text-black hover:border-voltera-cyan transition-all">

                                            <i class="fa-solid fa-location-arrow"></i>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         RIGHT COLUMN
                    ================================================== -->
                    <div>

                        <!-- R&D / Manufacturing Header -->
                        <div class="flex items-start gap-4 mb-6">

                            <div class="shrink-0 w-9 h-9 flex items-center justify-center text-voltera-cyan">

                                <i class="fa-solid fa-building text-xl"></i>

                            </div>

                            <div class="pt-1">

                                <h4 class="text-white font-semibold text-lg">
                                   {{ __('main.location') }}
                                </h4>

                            </div>

                        </div>


                        <!-- Manufacturing Information -->
                        <div class="pl-0 sm:pl-[52px]">

                            <div class="space-y-5">
                                @foreach ($locations as $location)


                                <!-- Location 01 -->
                                <div>

                                    <p class="text-slate-300 leading-7 text-sm sm:text-base">

                                       {{ $location->name }}

                                    </p>

                                </div>
                                 @endforeach



                            </div>



                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- =====================================================
     SALES & HR DEPARTMENTS
===================================================== -->
<section class="relative py-20 sm:py-24 bg-[#05070a] overflow-hidden">

    <!-- Ambient Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                w-[700px] h-[300px] bg-cyan-500/[0.035]
                rounded-full blur-[140px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 lg:gap-10">


            @foreach ($supports as $support)


            <div class="group relative border border-white/[0.12]
                        bg-[#0a0e15] rounded-xl overflow-hidden
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

                    <!-- Title -->
                    <h3 class="text-2xl sm:text-3xl font-medium
                               text-white tracking-tight">

                        {{ $support->Contact }}
                    </h3>

                    <!-- Divider -->
                    <div class="mt-8 mb-8 h-px bg-white/[0.12] relative">

                        <div class="absolute left-0 top-0 h-px w-20
                                    bg-voltera-cyan"></div>

                    </div>


                    <!-- Contact -->
                    <div class="space-y-5">


                        <!-- Contact Person -->
                        <div class="flex items-start gap-4">

                            <div class="shrink-0 w-6 pt-0.5
                                        text-voltera-cyan">

                                <i class="fa-regular fa-user text-lg"></i>

                            </div>

                            <div class="text-sm sm:text-base">

                                <span class="text-white font-medium">
                                    {{ __('main.contact') }}:
                                </span>

                                <span class="text-slate-400 ml-1">
                                  {{ $support->name }}
                                </span>

                            </div>

                        </div>


                        <!-- Telephone -->
                        <div class="flex items-start gap-4">

                            <div class="shrink-0 w-6 pt-0.5
                                        text-voltera-cyan">

                                <i class="fa-solid fa-phone-volume text-lg"></i>

                            </div>

                            <div class="text-sm sm:text-base">

                                <span class="text-white font-medium">
                                    {{ __('main.phone') }}:
                                </span>

                                <a
                                    href="tel:+8675526615555"
                                    class="text-slate-400 ml-1
                                           hover:text-voltera-cyan
                                           transition-colors">

                                    +{{ $support->phone }}

                                </a>

                            </div>

                        </div>


                        <!-- Email -->
                        <div class="flex items-start gap-4">

                            <div class="shrink-0 w-6 pt-0.5
                                        text-voltera-cyan">

                                <i class="fa-regular fa-envelope text-lg"></i>

                            </div>

                            <div class="text-sm sm:text-base">

                                <span class="text-white font-medium">
                                    {{ __('main.email') }}:
                                </span>

                                <a
                                    href="mailto:sales@voltera.com"
                                    class="text-slate-400 ml-1
                                           hover:text-voltera-cyan
                                           transition-colors">

                                    {{ $support->email }}

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            @endforeach




        </div>

    </div>

</section>


<!--===== CONTACT AREA ENDS =======-->
@endsection

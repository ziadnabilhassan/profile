@extends('website.layouts.master')
@section('title')
{{ __('main.site') }} | {{ __('main.Leave a Message') }}
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
            <a href="{{route('contacts')}}" class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors" >
               {{__('main.Headquarters') }}
            </a>
            <a href="{{route('global-network')}}" class="relative shrink-0 py-5 text-slate-400 hover:text-white font-semibold text-[15px] border-b-2 border-transparent hover:border-white/20 transition-colors">
                {{ __('main.global_offices') }}
            </a>
            <a href="{{route('message')}}" aria-current="page" class="relative shrink-0 py-5 text-cyan-400 font-bold text-[15px] border-b-2 border-cyan-400 transition-colors">
               {{ __('main.Leave a Message') }}
            </a>
        </div>
    </div>
</div>


<!-- Contact / Quote Section -->
<section id="contact" class="py-28 bg-[#030508] relative border-t border-cardBorder">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-[2px] bg-cyanAccent"></div>
                    <span class="text-xs font-bold tracking-widest text-cyanAccent uppercase">{{ __('main.get in touch') }}</span>
                </div>
                <h2 class="text-3xl sm:text-5xl font-black tracking-tight text-white leading-tight">
                   {{ __('main.contact us now') }}
                </h2>

                <div class="space-y-4 pt-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-cyanAccent/10 border border-cyanAccent/20 flex items-center justify-center text-cyanAccent">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 block">{{ __('main.call us') }}</span>
                            <span class="text-white font-semibold">+{{ $Contact->phone1 }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-cyanAccent/10 border border-cyanAccent/20 flex items-center justify-center text-cyanAccent">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 block">{{ __('main.email') }}</span>
                            <span class="text-white font-semibold">{{ $Contact->email }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-cyanAccent/10 border border-cyanAccent/20 flex items-center justify-center text-cyanAccent">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 block">{{ __('main.location') }}</span>
                            <span class="text-white font-semibold">{{ $Contact->address }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 bg-cardBg rounded-3xl p-8 sm:p-10 border border-cardBorder shadow-2xl relative">
                 <form id="send-message"method="POST" novalidate>
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="ap-form-label" for="oem-name">{{ __('main.full name') }} *</label>
                        <input class="ap-form-input" type="text" id="oem-name" name="name" placeholder="{{ __('main.full name') }}" required>
                    </div>
                    <div>
                        <label class="ap-form-label" for="oem-company">{{ __('main.company_profile') }} *</label>
                        <input class="ap-form-input" type="text" id="oem-company" name="subject" placeholder="{{ __('main.company_profile') }}..." required>
                    </div>
                    <div>
                        <label class="ap-form-label" for="oem-country">{{ __('main.phone') }} *</label>
                        <input class="ap-form-input" type="tel" id="oem-country" name="phone" placeholder="0122222222" required>
                    </div>
                    <div>
                        <label class="ap-form-label" for="oem-email">{{ __('main.email') }} *</label>
                        <input class="ap-form-input" type="email" name="email" id="oem-email" placeholder="john@company.com" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="ap-form-label" for="oem-message">{{ __('main.message') }} *</label>
                        <textarea class="ap-form-input" name="message" id="oem-message" rows="5" placeholder="{{ __('main.message') }}..." required></textarea>
                    </div>
                </div>
                <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <button type="submit" class="ap-submit-btn whitespace-nowrap">
                        <i class="fa-solid fa-paper-plane"></i> {{ __('main.send message') }}
                    </button>
                </div>

            </form>


            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
@endsection

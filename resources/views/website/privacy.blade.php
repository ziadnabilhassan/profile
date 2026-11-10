@extends('website.layouts.master')
@section('title')
    {{ __('main.site') }} | {{ __('main.privacy_policy') }}
@endsection
@section('css')
@endsection
@section('content')

<!-- =====================================================
     HERO
===================================================== -->
<section class="relative pt-48 pb-24 sm:pt-56 sm:pb-28 bg-[#05070a] overflow-hidden border-b border-white/[0.1]">
    <div class="absolute inset-0 bg-cover bg-center opacity-70 pointer-events-none" style="background-image: url('{{ asset('website/assets/images/bread.png') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-[#05070a]/30 via-[#05070a]/60 to-[#05070a] pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
        <nav class="flex items-center gap-3 text-base font-bold text-slate-100 uppercase tracking-widest">
            <a href="{{route('home')}}" class="hover:text-cyan-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-house text-sm text-cyan-400"></i><span>{{ __('main.home') }}</span></a>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <a href="{{ route('about') }}" class="hover:text-cyan-400 transition-colors">{{ __('main.about') }}</a>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <span class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.privacy_policy') }}</span>
        </nav>
    </div>
</section>

<section class="bg-[#070a12] ap-bg-dark border-b border-white/[0.06] sticky top-[96px] z-40 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="sp-tabs">
            <a href="{{ route('about') }}" class="sp-tab ">{{ __('main.company_profile') }}</a>
            <a href="{{ route('company-culture') }}" class="sp-tab">{{ __('main.company_culture') }}</a>
            <a href="{{ route('honor') }}" class="sp-tab">{{ __('main.honor') }}</a>
            <a href="{{ route('oem') }}" class="sp-tab">{{ __('main.oem') }}</a>
            <a href="{{ route('privacy') }}" class="sp-tab active">{{ __('main.privacy_policy') }}</a>
            <a href="{{ route('investor') }}" class="sp-tab">{{ __('main.investor') }}</a>
        </div>
    </div>
</section>

<!-- =====================================================
     MAIN CONTENT
===================================================== -->
<section class="py-20 ap-bg-dark bg-[#070a12] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10 items-start">


     <div class="lg:col-span-1 space-y-0">
           <div class="p-6 rounded-2xl bg-cyan-500/[0.05] border border-cyan-500/20 mb-10">
                    <img src="{{ asset($privacy->image) }}" alt="Privacy Policy" class="w-100 h-100">
                </div>
     </div>
            <!-- Content -->
            <div class="lg:col-span-3 space-y-0">

                <!-- Intro box -->


                <!-- Section 1 -->
                <div class="ap-privacy-section" id="info-we-collect">
                    <h2><i class="fa-solid fa-database"></i> {{ $privacy->title }}</h2>
                    <div>{!!  $privacy->text !!}</div>

                </div>



            </div>
        </div>
    </div>
</section>



@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Active sidebar link on scroll
        const navLinks = document.querySelectorAll('.ap-privacy-nav-link');
        const sections = document.querySelectorAll('.ap-privacy-section');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    navLinks.forEach(l => l.classList.remove('active'));
                    const active = document.querySelector(`.ap-privacy-nav-link[data-section="${entry.target.id}"]`);
                    if (active) active.classList.add('active');
                }
            });
        }, {
            rootMargin: '-30% 0px -60% 0px'
        });

        sections.forEach(s => observer.observe(s));

        // Smooth scroll on sidebar click
        navLinks.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const target = document.getElementById(link.dataset.section);
                if (target) target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });
    });
</script>
@endsection

@extends('website.layouts.master')
@section('title')
{{ __('main.site') }} | {{ __('main.investor') }}
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
    <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-[800px] h-[400px] bg-indigo-600/[0.14] rounded-full blur-[180px] pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
        <nav class="flex items-center gap-3 text-base font-bold text-slate-100 uppercase tracking-widest">
            <a href="{{route('home')}}" class="hover:text-cyan-400 transition-colors flex items-center gap-2"><i class="fa-solid fa-house text-sm text-cyan-400"></i><span>{{ __('main.home') }}</span></a>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <a href="{{ route('about') }}" class="hover:text-cyan-400 transition-colors">{{ __('main.about') }}</a>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <span class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.investor') }}</span>
        </nav>
    </div>
</section>
<section class="bg-[#070a12] ap-bg-dark border-b border-white/[0.06] sticky top-[96px] z-40 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="sp-tabs">
            <a href="{{ route('about') }}" class="sp-tab ">{{ __('main.company_profile') }}</a>
            <a href="{{ route('company-culture') }}" class="sp-tab">{{ __('main.company_culture') }}</a>
            <a href="{{ route('honor') }}" class="sp-tab ">{{ __('main.honor') }}</a>
            <a href="{{ route('oem') }}" class="sp-tab">{{ __('main.oem') }}</a>
            <a href="{{ route('privacy') }}" class="sp-tab">{{ __('main.privacy_policy') }}</a>
            <a href="{{ route('investor') }}" class="sp-tab active">{{ __('main.investor') }}</a>
        </div>
    </div>
</section>

<!-- =====================================================
     ANNUAL REPORTS ARCHIVE
===================================================== -->
<section class="py-24 ap-bg-dark bg-[#070a12] relative overflow-hidden border-t border-white/[0.06]">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-cyan-500/[0.05] rounded-full blur-[160px] pointer-events-none"></div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <div class="ap-section-badge mx-auto"><i class="fa-solid fa-file-pdf"></i> {{ __('main.reports') }}</div>
        </div>

        <div class="space-y-3">
            @foreach ($reports as $report)
                <div class="ap-report-card ap-fade-up">
                    <div class="ap-report-icon"><i class="fa-solid fa-file-pdf"></i></div>
                    <div class="flex-1 min-w-0">
                        <div class="ap-report-title">{{ $report->name }}</div>
                        <div class="ap-report-meta">{!! $report->description !!}</div>
                    </div>
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <span class="hidden sm:block text-xs text-slate-600 ap-text-muted">{{ $report->title }}</span>

                        @if ($report->file)
                            <a href="{{ asset($report->file) }}" download="{{ basename($report->file) }}" class="ap-download-btn">
                                <i class="fa-solid fa-arrow-down"></i> <span class="hidden sm:inline">{{ __('main.download') }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Counters
        const counters = document.querySelectorAll('[data-countup]');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseFloat(el.dataset.countup);
                    let start = 0;
                    const duration = 1800;
                    const step = (timestamp) => {
                        if (!start) start = timestamp;
                        const progress = Math.min((timestamp - start) / duration, 1);
                        el.textContent = Math.floor(progress * target);
                        if (progress < 1) requestAnimationFrame(step);
                        else el.textContent = target;
                    };
                    requestAnimationFrame(step);
                    observer.unobserve(el);
                }
            });
        }, {
            threshold: 0.3
        });
        counters.forEach(c => observer.observe(c));

        // IR Form
        document.getElementById('irForm').addEventListener('submit', function(e) {
            e.preventDefault();
            document.getElementById('ir-success').classList.remove('hidden');
            this.querySelectorAll('.ap-form-input').forEach(el => el.value = '');
            setTimeout(() => document.getElementById('ir-success').classList.add('hidden'), 5000);
        });
    });
</script>

@endsection

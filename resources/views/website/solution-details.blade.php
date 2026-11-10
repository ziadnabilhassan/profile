@extends('website.layouts.master')
@section('title')
    {{ __('main.site') }} | {{ $solutionitem->name }}
@endsection
@section('css')
@endsection
@section('content')
    <!-- =====================================================
                         BREADCRUMB BANNER
                    ===================================================== -->
    <section class="relative pt-48 pb-28 sm:pt-56 sm:pb-32 bg-[#05070a] overflow-hidden border-b border-white/[0.1]">
        <!-- Breadcrumb Background Image -->
        <div class="absolute inset-0 bg-cover bg-center opacity-90 pointer-events-none scale-105 transition-transform duration-1000"
            style="background-image: url('{{ asset('website/assets/images/bread.png') }}');"></div>
        <div
            class="absolute inset-0 bg-gradient-to-b from-[#05070a]/10 via-[#05070a]/30 to-[#05070a]/80 pointer-events-none">
        </div>

        <!-- Soft Ambient Cyber Glow -->
        <div
            class="absolute top-1/2 left-1/3 -translate-y-1/2 w-[800px] h-[350px] bg-cyan-500/[0.20] rounded-full blur-[160px] pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
            <!-- Breadcrumb Links -->
            <nav class="flex items-center gap-3 text-base sm:text-lg font-bold text-slate-100 uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-house text-sm text-cyan-400"></i>
                    <span>{{ __('main.home') }}</span>
                </a>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <a href="solutions.php" class="hover:text-cyan-400 transition-colors">{{ __('main.solutions') }}</a>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <span
                    class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ $solutionitem->name }}</span>
            </nav>
        </div>
    </section>

    <!-- =====================================================
                         MAIN SOLUTION SHOWCASE SECTION (Single Wide Image Layout)
                    ===================================================== -->
    <section class="py-16 bg-[#070a12] relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-12">

            <!-- Category Badge -->
            <div class="text-center">
                <div
                    class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-extrabold uppercase tracking-widest">
                    <i class="fa-solid fa-layer-group"></i> {{ $solutionitem->solution->name }}
                </div>
            </div>

            <!-- Solution Title (Centered) -->
            <div class="text-center space-y-4">
                <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                    {{ $solutionitem->name }}
                </h1>
                <div class="h-1 w-24 bg-gradient-to-r from-transparent via-cyan-500 to-transparent mx-auto rounded-full">
                </div>
            </div>

            <!-- Single Wide Banner Image Box -->
            <div
                class="relative h-[320px] sm:h-[500px] rounded-3xl bg-[#0b0f19] border border-white/[0.08] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.7)] p-4 sm:p-6 group">
                <div
                    class="absolute inset-0 bg-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                </div>
                <img src="{{ asset($solutionitem->image) }}" alt="Enterprise Solution Showcase"
                    class="w-full h-full object-cover rounded-[20px] shadow-lg">
            </div>

            <!-- Description Section -->
            <div class="space-y-6 pt-4">
                <div
                    class="text-slate-600 dark:text-slate-300 text-base rounded-3xl bg-[#0b0f19] border border-white/[0.08] p-8 sm:p-10 space-y-6 relative overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                    <!-- Decorative ambient glow -->
                    <div
                        class="absolute -top-12 -right-12 w-40 h-40 bg-cyan-500/10 rounded-full blur-2xl pointer-events-none">
                    </div>

                    {!! $solutionitem->description !!}
                </div>
            </div>
        </div>
    </section>
@endsection

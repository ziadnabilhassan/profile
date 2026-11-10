@extends('website.layouts.master')
@section('title')
    {{ __('main.site') }} | {{ __('main.solutions') }}
@endsection
@section('css')
@endsection
@section('content')
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
                <span>{{ __('main.solutions') }}</span>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <span
                    class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ $solution->name }}</span>
            </nav>
        </div>
    </section>

    <!-- =====================================================
                     SOLUTIONS TABS
                ===================================================== -->
    <section class="bg-[#070a12] ap-bg-dark border-b border-white/[0.06] sticky top-[96px] z-40 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="sp-tabs">
                @foreach ($solutions as $navsolution)
                    <a href="{{ Helper::link('solution', $navsolution->id, $navsolution->name) }}"
                        class="sp-tab">{{ $navsolution->name }} </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =====================================================
                     SOLUTIONS LIST
                ===================================================== -->

    <section class="py-20 ap-bg-dark bg-[#070a12] relative overflow-hidden">

        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-500/[0.04] rounded-full blur-[180px] pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-24">

            @forelse ($solution->solutionitems  as $index => $solutionitem)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">

                    {{-- Text --}}
                    <div class="space-y-6 {{ $index % 2 == 0 ? 'lg:order-1' : 'lg:order-2' }}">

                        <h2 class="text-3xl md:text-4xl font-medium text-white ap-text-heading leading-tight">
                            {{ $solutionitem->name }}
                        </h2>

                        <p class="text-base md:text-lg leading-loose text-slate-400 ap-text-muted">
                            {!! Helper::limit($solutionitem->description, 200) !!}
                        </p>

                        <a href="{{ Helper::link('solutionitem', $solutionitem->id, $solutionitem->name) }}"
                            class="ap-submit-btn !rounded-full">

                            {{ __('main.read more') }}
                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                    {{-- Image --}}
                    <div class="{{ $index % 2 == 0 ? 'lg:order-2' : 'lg:order-1' }}">

                        <img src="{{ asset($solutionitem->image) }}" alt="{{ $solutionitem->name }}"
                            class="w-full aspect-[4/3] object-cover rounded-[2.5rem] border border-white/[0.07]"
                            loading="lazy">

                    </div>

                </div>

            @empty

                <p class="text-center text-slate-400">
                    {{ __('main.not available') }}
                </p>
            @endforelse

        </div>

    </section>
@endsection
@section('js')
@endsection

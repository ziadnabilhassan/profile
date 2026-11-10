@extends('website.layouts.master')

@section('title')
    {{ __('main.site') }} | {{ __('main.company_profile') }}
@endsection

{{-- =====================================================
     CSS
===================================================== --}}
@section('css')
    <style>
        /* ===== Milestones Timeline ===== */
        #vmMilestones .vm-arrow {
            width: 48px;
            height: 48px;
            border-radius: 9999px;
            border: 1px solid rgba(255, 255, 255, .12);
            background: rgba(255, 255, 255, .03);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: .3s;
            cursor: pointer;
        }

        #vmMilestones .vm-arrow:hover {
            border-color: #22d3ee;
            color: #22d3ee;
            background: rgba(34, 211, 238, .08);
        }

        /* Panels */
        #vmMilestones .vm-panel {
            display: none;
        }

        #vmMilestones .vm-panel.active {
            display: flex;
            animation: vmFade .35s ease;
        }

        @keyframes vmFade {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #vmMilestones .vm-year-big {
            font-size: clamp(3.5rem, 9vw, 7rem);
            line-height: 1;
            font-weight: 300;
            color: #22d3ee;
            letter-spacing: -.02em;
            text-shadow: 0 0 40px rgba(34, 211, 238, .25);
        }

        /* Track */
        #vmMilestones .vm-track {
            position: relative;
            display: grid;
        }

        #vmMilestones .vm-track::before {
            content: "";
            position: absolute;
            top: 9px;
            left: 0;
            right: 0;
            height: 1px;
            background: rgba(255, 255, 255, .1);
        }

        #vmMilestones .vm-item {
            position: relative;
            background: none;
            border: 0;
            padding: 0;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px;
            color: rgba(255, 255, 255, .45);
            font-weight: 600;
            font-size: 1.05rem;
            transition: .3s;
        }

        #vmMilestones .vm-item:hover {
            color: #fff;
        }

        #vmMilestones .vm-item.active {
            color: #22d3ee;
            font-size: 1.4rem;
        }

        /* Dot */
        #vmMilestones .vm-dot {
            width: 19px;
            height: 19px;
            border-radius: 9999px;
            background: #070a12;
            border: 1px solid rgba(34, 211, 238, .35);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .3s;
            position: relative;
            z-index: 1;
        }

        #vmMilestones .vm-dot::after {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: rgba(34, 211, 238, .35);
            transition: .3s;
        }

        #vmMilestones .vm-item.active .vm-dot {
            border-color: #22d3ee;
            box-shadow: 0 0 0 5px rgba(34, 211, 238, .15), 0 0 18px rgba(34, 211, 238, .5);
        }

        #vmMilestones .vm-item.active .vm-dot::after {
            background: #22d3ee;
        }
    </style>
@endsection

{{-- =====================================================
     CONTENT
===================================================== --}}
@section('content')

    {{-- ========== HERO ========== --}}
    <section class="relative pt-48 pb-28 sm:pt-56 sm:pb-32 bg-[#05070a] overflow-hidden border-b border-white/[0.1]">
        <div class="absolute inset-0 bg-cover bg-center opacity-90 pointer-events-none scale-105"
            style="background-image: url('{{ asset('website/assets/images/bread.png') }}');"></div>
        <div
            class="absolute inset-0 bg-gradient-to-b from-[#05070a]/10 via-[#05070a]/40 to-[#05070a]/90 pointer-events-none">
        </div>
        <div
            class="absolute top-1/2 left-1/3 -translate-y-1/2 w-[800px] h-[350px] bg-cyan-500/[0.18] rounded-full blur-[160px] pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
            <nav class="flex items-center gap-3 text-base font-bold text-slate-100 uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-house text-sm text-cyan-400"></i><span>{{ __('main.home') }}</span>
                </a>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <a href="{{ route('about') }}" class="hover:text-cyan-400 transition-colors">{{ __('main.about') }}</a>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <span
                    class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.company_profile') }}</span>
            </nav>
        </div>
    </section>

    {{-- ========== TABS ========== --}}
    <section class="bg-[#070a12] ap-bg-dark border-b border-white/[0.06] sticky top-[96px] z-40 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="sp-tabs">
                <a href="{{ route('about') }}" class="sp-tab active">{{ __('main.company_profile') }}</a>
                <a href="{{ route('company-culture') }}" class="sp-tab">{{ __('main.company_culture') }}</a>
                <a href="{{ route('honor') }}" class="sp-tab">{{ __('main.honor') }}</a>
                <a href="{{ route('oem') }}" class="sp-tab">{{ __('main.oem') }}</a>
                <a href="{{ route('privacy') }}" class="sp-tab">{{ __('main.privacy_policy') }}</a>
                <a href="{{ route('investor') }}" class="sp-tab">{{ __('main.investor') }}</a>
            </div>
        </div>
    </section>

    {{-- ========== WHO WE ARE ========== --}}
    <section class="py-24 ap-bg-dark bg-[#070a12] relative overflow-hidden">
        <div
            class="absolute top-1/2 right-0 w-[500px] h-[500px] bg-cyan-600/[0.04] rounded-full blur-[180px] pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

                {{-- Left: text + stats --}}
                <div class="space-y-6 ap-fade-up">
                    <h2 class="text-4xl sm:text-5xl font-black text-white leading-tight">{{ __('main.company_profile') }}
                    </h2>
                    <div class="text-lg text-white font-semibold">{{ $about->title }}</div>

                    <div class="text-slate-300 text-base leading-relaxed max-w-lg">
                        {!! $about->text !!}
                    </div>

                    @if ($count->count())
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-8 gap-x-4 pt-6">
                            @foreach ($count as $c)
                                <div class="space-y-1">
                                    <div class="text-sm text-slate-400 font-medium">{{ $c->name }}</div>
                                    <div class="text-3xl font-black text-white">
                                        <span data-countup="{{ $c->count }}">0</span>
                                        @if ($c->suffix)
                                            <span class="text-2xl font-bold text-cyan-400">{{ $c->suffix }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Right: image + video --}}
                <div class="relative ap-fade-up ap-fade-up-2 group h-full flex items-center justify-end">
                    <div
                        class="relative rounded-2xl overflow-hidden border border-white/[0.05] shadow-[0_20px_50px_rgba(0,0,0,0.5)] w-full lg:w-[95%] h-[400px] sm:h-[500px]">
                        <img src="{{ asset($about->image) }}" alt="{{ $about->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors duration-500">
                        </div>

                        @if ($about->video)
                            <a data-fancybox href="{{ $about->video }}"
                                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-20 h-20 bg-cyan-500/80 hover:bg-cyan-400 backdrop-blur-md rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 cursor-pointer shadow-[0_0_30px_rgba(0,240,255,0.4)]">
                                <i class="fa-solid fa-play text-2xl text-slate-950 ml-1"></i>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ========== TIMELINE ========== --}}
    @if ($journey->count())
        <section class="py-24 ap-bg-dark bg-[#070a12] relative overflow-hidden" id="vmMilestones">

            <div
                class="absolute top-0 left-0 w-[400px] h-[400px] bg-cyan-500/[0.03] rounded-full blur-[160px] pointer-events-none">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

                <div class="mb-16 space-y-4">
                    <div class="ap-section-badge"><i class="fa-solid fa-route"></i> {{ __('main.journey') }}</div>
                    <h2 class="ap-section-title ap-text-heading">{{ __('main.timeline') }}</h2>
                </div>

                {{-- Active milestone --}}
                <div class="flex items-center gap-4 lg:gap-10 mb-20">
                    <button type="button" class="vm-arrow" id="vmPrev" aria-label="Previous">
                        <i class="fa-solid fa-arrow-left text-xs"></i>
                    </button>

                    <div class="flex-1">
                        @foreach ($journey as $step)
                            <div
                                class="vm-panel {{ $loop->first ? 'active' : '' }} flex-col md:flex-row md:items-center gap-6 md:gap-14">
                                <div class="vm-year-big md:min-w-[300px] md:text-center">{{ $step->date }}</div>
                                <div class="space-y-3">
                                    <h3 class="text-xl md:text-2xl font-bold text-white">{{ $step->title }}</h3>
                                    <div class="text-sm md:text-base leading-relaxed text-white/60 max-w-2xl">
                                        {!! $step->text !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="vm-arrow" id="vmNext" aria-label="Next">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                </div>

                {{-- Track --}}
                <div class="overflow-x-auto pb-4">
                    <div class="vm-track"
                        style="grid-template-columns: repeat({{ $journey->count() }}, 1fr); min-width: {{ $journey->count() * 100 }}px;">
                        @foreach ($journey as $step)
                            <button type="button" class="vm-item {{ $loop->first ? 'active' : '' }}">
                                <span class="vm-dot"></span><span>{{ $step->date }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif

    {{-- ========== CERTIFICATES ========== --}}
    @if ($certificates->count())
        <section
            class="py-20 ap-bg-darker bg-[#05070a] border-t ap-border-subtle border-white/[0.06] relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 mb-12">
                    <div>
                        <div class="ap-section-badge mb-3"><i class="fa-solid fa-certificate"></i>
                            {{ __('main.certificate') }}</div>
                        <h2 class="ap-section-title ap-text-heading">{{ __('main.certificates') }}</h2>
                    </div>
                    <div class="flex gap-3 flex-shrink-0">
                        <button id="certPrev" type="button" aria-label="Previous"
                            class="w-12 h-12 flex items-center justify-center rounded-full border border-white/15 bg-white/[0.03] text-slate-300 hover:bg-cyan-500 hover:border-cyan-500 hover:text-slate-950 transition-all duration-300 cursor-pointer">
                            <i class="fa-solid fa-chevron-left text-sm"></i>
                        </button>
                        <button id="certNext" type="button" aria-label="Next"
                            class="w-12 h-12 flex items-center justify-center rounded-full border border-white/15 bg-white/[0.03] text-slate-300 hover:bg-cyan-500 hover:border-cyan-500 hover:text-slate-950 transition-all duration-300 cursor-pointer">
                            <i class="fa-solid fa-chevron-right text-sm"></i>
                        </button>
                    </div>
                </div>

                <div class="swiper certsSwiper overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($certificates as $cert)
                            <div class="swiper-slide h-auto">
                                <a href="{{ asset($cert->image) }}" data-fancybox="certs-strip"
                                    data-caption="{{ $cert->title }}"
                                    class="group flex flex-col items-center justify-center gap-7 p-8 rounded-3xl bg-[#0b0f19] border border-white/[0.07] hover:border-cyan-500/40 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_rgba(0,240,255,0.12)] cursor-pointer h-full min-h-[280px]">
                                    <img src="{{ asset($cert->image) }}" alt="{{ $cert->title }}"
                                        class="w-28 h-28 sm:w-36 sm:h-36 object-contain opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all duration-500">
                                    <span
                                        class="text-base font-bold text-slate-300 group-hover:text-cyan-400 transition-colors text-center leading-snug">{{ $cert->title }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif

    {{-- ========== MAP ========== --}}
    <section class="relative overflow-hidden bg-[#070a12] ap-bg-dark border-t ap-border-subtle border-white/[0.06]">
        <img src="{{ asset('website/assets/images/map.png') }}" alt="{{ $about->title }} Global Map"
            class="w-full h-auto block">
    </section>

@endsection

{{-- =====================================================
     JS  (كل جزء مستقل: لو واحد وقع الباقي يكمل)
===================================================== --}}
@section('js')
    <script>
        /* ---------- 1) Milestones timeline (من غير أي مكتبة) ---------- */
        (function() {
            var root = document.getElementById('vmMilestones');
            if (!root) return;

            var items = root.querySelectorAll('.vm-item');
            var panels = root.querySelectorAll('.vm-panel');
            var prev = document.getElementById('vmPrev');
            var next = document.getElementById('vmNext');
            var current = 0;

            function show(index) {
                current = (index + items.length) % items.length;

                items.forEach(function(el, i) {
                    el.classList.toggle('active', i === current);
                });
                panels.forEach(function(el, i) {
                    el.classList.toggle('active', i === current);
                });

                items[current].scrollIntoView({
                    behavior: 'smooth',
                    inline: 'center',
                    block: 'nearest'
                });
            }

            items.forEach(function(item, i) {
                item.addEventListener('click', function() {
                    show(i);
                });
            });
            prev.addEventListener('click', function() {
                show(current - 1);
            });
            next.addEventListener('click', function() {
                show(current + 1);
            });
        })();

        /* ---------- 2) Counters ---------- */
        (function() {
            var counters = document.querySelectorAll('[data-countup]');
            if (!counters.length) return;

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (!entry.isIntersecting) return;

                    var el = entry.target;
                    var target = parseFloat(el.dataset.countup) || 0;
                    var isDecimal = target % 1 !== 0;
                    var start = null;

                    function step(ts) {
                        if (!start) start = ts;
                        var p = Math.min((ts - start) / 1800, 1);
                        el.textContent = isDecimal ? (p * target).toFixed(1) : Math.floor(p * target);
                        if (p < 1) requestAnimationFrame(step);
                        else el.textContent = isDecimal ? target.toFixed(1) : target;
                    }

                    requestAnimationFrame(step);
                    observer.unobserve(el);
                });
            }, {
                threshold: 0.3
            });

            counters.forEach(function(c) {
                observer.observe(c);
            });
        })();

        /* ---------- 3) Fancybox + Swiper (بعد ما كل المكتبات تتحمّل) ---------- */
        window.addEventListener('load', function() {

            // Fancybox
            if (typeof Fancybox !== 'undefined') {
                Fancybox.bind('[data-fancybox]', {
                    Toolbar: {
                        display: {
                            left: [],
                            middle: [],
                            right: ['close']
                        }
                    }
                });
            } else {
                console.warn('Fancybox مش متحمّل في الـ layout');
            }

            // Swiper
            if (typeof Swiper === 'undefined') {
                console.warn('Swiper مش متحمّل في الـ layout');
                return;
            }

            if (document.querySelector('.certsSwiper')) {
                new Swiper('.certsSwiper', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    watchOverflow: true,
                    navigation: {
                        nextEl: '#certNext',
                        prevEl: '#certPrev'
                    },
                    breakpoints: {
                        480: {
                            slidesPerView: 2,
                            spaceBetween: 20
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 24
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 28
                        }
                    }
                });
            }
        });
    </script>
@endsection

@extends('website.layouts.master')
@section('title')
    {{ __('main.site') }} | {{ __('main.oem') }}
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
        <div
            class="absolute top-1/2 right-0 w-[700px] h-[400px] bg-blue-600/[0.12] rounded-full blur-[180px] pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
            <nav class="flex items-center gap-3 text-base font-bold text-slate-100 uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition-colors flex items-center gap-2"><i
                        class="fa-solid fa-house text-sm text-cyan-400"></i><span>{{ __('main.home') }}</span></a>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <a href="{{ route('about') }}" class="hover:text-cyan-400 transition-colors">{{ __('main.about') }}</a>
                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
                <span
                    class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.oem') }}</span>
            </nav>
        </div>
    </section>
    <section class="bg-[#070a12] ap-bg-dark border-b border-white/[0.06] sticky top-[96px] z-40 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="sp-tabs">
                <a href="{{ route('about') }}" class="sp-tab ">{{ __('main.company_profile') }}</a>
                <a href="{{ route('company-culture') }}" class="sp-tab">{{ __('main.company_culture') }}</a>
                <a href="{{ route('honor') }}" class="sp-tab">{{ __('main.honor') }}</a>
                <a href="{{ route('oem') }}" class="sp-tab active">{{ __('main.oem') }}</a>
                <a href="{{ route('privacy') }}" class="sp-tab">{{ __('main.privacy_policy') }}</a>
                <a href="{{ route('investor') }}" class="sp-tab">{{ __('main.investor') }}</a>
            </div>
        </div>
    </section>


    <!-- =====================================================
         WHY OEM WITH VOLTERA
    ===================================================== -->
    <section class="py-24 ap-bg-dark bg-[#070a12] relative overflow-hidden">
        <div
            class="absolute top-0 left-0 w-[500px] h-[500px] bg-cyan-500/[0.04] rounded-full blur-[180px] pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-14">
                <div class="ap-section-badge mx-auto"><i class="fa-solid fa-handshake"></i> {{ __('main.why choose us') }}
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach ($qualities as $qualitie)
                    <div class="ap-value-card ap-fade-up group">
                        <img src="{{ asset($qualitie->image) }}" alt="{{ $qualitie->title }}"
                            class="w-full h-40 object-cover rounded-xl mb-5">
                        <div class="ap-value-title">{{ $qualitie->title }}</div>
                        <div class="ap-value-desc">{!! $qualitie->text !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- =====================================================
         OEM CAPABILITIES
    ===================================================== -->
    <section class="py-24 ap-bg-dark bg-[#070a12] relative overflow-hidden border-t border-white/[0.06]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

                <div class="space-y-6 ap-fade-up">
                    <div class="ap-section-badge"><i class="fa-solid fa-gears"></i> {{ __('main.oem') }}</div>
                    <h2 class="ap-section-title ap-text-heading">{{ $onequalitie->title }}</h2>
                    <div class="text-slate-300 ap-text-body text-base leading-relaxed">{!! $onequalitie->text !!}</div>

                </div>

                <div class="space-y-4 ap-fade-up ap-fade-up-2">
                    <div class="relative rounded-2xl overflow-hidden border border-white/[0.07] h-64 group">
                        <img src="{{ asset($onequalitie->image) }}" alt="{{ $onequalitie->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#05070a]/80 to-transparent"></div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- =====================================================
         OUR PRODUCT RANGE FOR OEM
    ===================================================== -->
    <section class="py-24 ap-bg-darker bg-[#05070a] relative overflow-hidden border-t border-white/[0.06]">
        <div
            class="absolute top-1/2 right-0 w-[400px] h-[500px] bg-blue-500/[0.04] rounded-full blur-[160px] pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-14">
                <div class="ap-section-badge mx-auto"><i class="fa-solid fa-boxes-stacked"></i> {{ __('main.product') }}
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-5">

                @foreach ($products as $product)
                    <div
                        class="group relative rounded-2xl bg-[#0b0f19] border border-white/[0.07] hover:border-cyan-500/40 overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_16px_40px_rgba(0,240,255,0.1)] ap-fade-up">
                        <div class="relative h-44 bg-[#070a12] overflow-hidden">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-contain p-3 group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <a href="{{ Helper::link('product.details', $product->id, $product->name) }}">
                            <div class="p-4 border-t border-white/[0.05]">
                                <div class="font-bold text-sm text-white group-hover:text-cyan-400 transition-colors mb-1">
                                    {{ $product->title }}</div>
                                <div class="text-xs text-slate-500">{{ $product->category?->title }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    @php

        $cardH = 250; // ارتفاع الكارت px
        $pitch = 270; // المسافة بين بداية كارت وبداية اللي بعده px
        $padTop = 24; // مسافة من فوق px

        $all = $locations->values();
        $rows = (int) ceil($all->count() / 2); // عدد الصفوف (كارت يمين + كارت شمال)
        $mapH = max(600, $padTop * 2 + $rows * $pitch); // ارتفاع الخريطة بيكبر مع العدد

        // ---------- حساب مكان كل كارت ودبوس ----------
        $items = [];
        foreach ($all as $i => $loc) {
            $side = $i % 2 === 0 ? 'left' : 'right'; // بالتناوب شمال / يمين
            $row = intdiv($i, 2);
            $top = $padTop + $row * $pitch; // px
            $cy = (($top + $cardH / 2) / $mapH) * 100; // مركز الكارت %

            // انحراف ثابت (مش عشوائي) عشان الدبابيس متبقاش في خط واحد
            $jx = ($loc->id * 53) % 13; // 0..12
            $jy = (($loc->id * 37) % 9) - 4; // -4..4

            $items[] = [
                'loc' => $loc,
                'side' => $side,
                'top' => $top,
                'ax' => $side === 'left' ? 23 : 77, // نقطة بداية الخط من الكارت
                'ay' => $cy,
                // لو عندك أعمدة pin_x / pin_y في الجدول هتتستخدم، غير كده بيتحسب تلقائي
                'px' => $loc->pin_x ?? ($side === 'left' ? 32 + $jx : 68 - $jx),
                'py' => $loc->pin_y ?? min(95, max(5, $cy + $jy)),
            ];
        }
    @endphp

    @if ($all->count())
        <section class="py-24 ap-bg-dark bg-[#070a12] relative overflow-hidden border-t border-white/[0.06]">
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-500/[0.04] rounded-full blur-[180px] pointer-events-none">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

                <div class="mb-14">
                    <h2 class="ap-section-title ap-text-heading">{{ __('main.factory_location') }}</h2>
                </div>

                {{-- ========== Desktop: map + floating cards ========== --}}
                <div class="hidden lg:block relative w-full rounded-3xl overflow-hidden border border-white/[0.07] bg-[#0b0f19]"
                    style="height: {{ $mapH }}px;">
                    <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=1800&q=80"
                        alt="{{ __('main.factory_location') }}"
                        class="absolute inset-0 w-full h-full object-cover opacity-25 grayscale">

                    {{-- Lines --}}
                    <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 100 100"
                        preserveAspectRatio="none">
                        @foreach ($items as $it)
                            <line x1="{{ round($it['ax'], 2) }}" y1="{{ round($it['ay'], 2) }}"
                                x2="{{ round($it['px'], 2) }}" y2="{{ round($it['py'], 2) }}" stroke="#22d3ee"
                                stroke-opacity="0.6" stroke-width="1" vector-effect="non-scaling-stroke" />
                        @endforeach
                    </svg>

                    {{-- Pins --}}
                    @foreach ($items as $it)
                        <div class="absolute -translate-x-1/2 -translate-y-1/2 flex items-center gap-2"
                            style="left: {{ round($it['px'], 2) }}%; top: {{ round($it['py'], 2) }}%;">
                            <span class="relative flex w-4 h-4">
                                <span class="absolute inset-0 rounded-full bg-cyan-400/50 animate-ping"></span>
                                <span
                                    class="relative w-4 h-4 rounded-full bg-cyan-400 border-2 border-[#070a12] shadow-[0_0_14px_rgba(34,211,238,0.8)]"></span>
                            </span>
                            <span
                                class="text-xs font-semibold text-slate-300 whitespace-nowrap">{{ \Illuminate\Support\Str::limit($it['loc']->address ?: $it['loc']->name, 18) }}</span>
                        </div>
                    @endforeach

                    {{-- Cards --}}
                    @foreach ($items as $it)
                        @php $loc = $it['loc']; @endphp
                        <div class="absolute w-[21%] p-3 rounded-3xl bg-[#0b0f19]/90 backdrop-blur border border-white/[0.08] hover:border-cyan-500/40 transition-all duration-300 overflow-hidden"
                            style="left: {{ $it['side'] === 'left' ? 2 : 77 }}%; top: {{ $it['top'] }}px; height: {{ $cardH }}px;">
                            <img src="{{ asset($loc->image) }}" alt="{{ $loc->name }}"
                                class="w-full h-32 object-cover rounded-2xl">
                            <div class="pt-3 text-center space-y-1">
                                <div class="font-bold text-sm text-white leading-snug line-clamp-2">{{ $loc->name }}
                                </div>
                                @if ($loc->address)
                                    <div class="text-xs text-slate-400 line-clamp-1"><i
                                            class="fa-solid fa-location-dot text-cyan-400 me-1"></i>{{ $loc->address }}
                                    </div>
                                @endif
                                @if ($loc->phone)
                                    <a href="tel:{{ $loc->phone }}"
                                        class="block text-xs text-slate-400 hover:text-cyan-400 transition-colors"
                                        dir="ltr"><i
                                            class="fa-solid fa-phone text-cyan-400 me-1"></i>{{ $loc->phone }}</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- ========== Mobile / Tablet: cards grid ========== --}}
                <div class="lg:hidden grid grid-cols-1 sm:grid-cols-2 gap-5">
                    @foreach ($all as $loc)
                        <div class="p-3 rounded-3xl bg-[#0b0f19] border border-white/[0.08]">
                            <img src="{{ asset($loc->image) }}" alt="{{ $loc->name }}"
                                class="w-full h-48 object-cover rounded-2xl">
                            <div class="pt-4 pb-2 px-1 space-y-2 text-center">
                                <div class="font-bold text-sm text-white leading-snug">{{ $loc->name }}</div>
                                @if ($loc->address)
                                    <div class="text-xs text-slate-400"><i
                                            class="fa-solid fa-location-dot text-cyan-400 me-1"></i>{{ $loc->address }}
                                    </div>
                                @endif
                                @if ($loc->phone)
                                    <a href="tel:{{ $loc->phone }}"
                                        class="block text-xs text-slate-400 hover:text-cyan-400 transition-colors"
                                        dir="ltr"><i
                                            class="fa-solid fa-phone text-cyan-400 me-1"></i>{{ $loc->phone }}</a>
                                @endif
                                @if ($loc->email)
                                    <a href="mailto:{{ $loc->email }}"
                                        class="block text-xs text-slate-400 hover:text-cyan-400 transition-colors break-all"><i
                                            class="fa-solid fa-envelope text-cyan-400 me-1"></i>{{ $loc->email }}</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    <!-- =====================================================
         OEM CONTACT FORM
    ===================================================== -->
    <section class="py-24 ap-bg-darker bg-[#05070a] relative overflow-hidden border-t border-white/[0.06]">
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-cyan-500/[0.06] rounded-full blur-[160px] pointer-events-none">
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-10">
                <div class="ap-section-badge mx-auto"><i class="fa-solid fa-envelope"></i> {{ __('main.get in touch') }}
                </div>
                <h2 class="ap-section-title ap-text-heading mt-3">{{ __('main.contact us now') }}</h2>

            </div>

            <div class="p-8 rounded-3xl bg-[#0b0f19] border border-white/[0.08] shadow-[0_30px_80px_rgba(0,0,0,0.5)]">
                <form id="send-message"method="POST" novalidate>
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="ap-form-label" for="oem-name">{{ __('main.full name') }} *</label>
                            <input class="ap-form-input" type="text" id="oem-name" name="name"
                                placeholder="{{ __('main.full name') }}" required>
                        </div>
                        <div>
                            <label class="ap-form-label" for="oem-company">{{ __('main.company_profile') }} *</label>
                            <input class="ap-form-input" type="text" id="oem-company" name="subject"
                                placeholder="{{ __('main.company_profile') }}..." required>
                        </div>
                        <div>
                            <label class="ap-form-label" for="oem-country">{{ __('main.phone') }} *</label>
                            <input class="ap-form-input" type="tel" id="oem-country" name="phone"
                                placeholder="0122222222" required>
                        </div>
                        <div>
                            <label class="ap-form-label" for="oem-email">{{ __('main.email') }} *</label>
                            <input class="ap-form-input" type="email" name="email" id="oem-email"
                                placeholder="john@company.com" required>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="ap-form-label" for="oem-message">{{ __('main.message') }} *</label>
                            <textarea class="ap-form-input" name="message" id="oem-message" rows="5"
                                placeholder="{{ __('main.message') }}..." required></textarea>
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
    </section>
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Fancybox.bind('[data-fancybox]', {});

            document.getElementById('oemForm').addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('oem-success').classList.remove('hidden');
                this.querySelectorAll('.ap-form-input').forEach(el => el.value = '');
                setTimeout(() => document.getElementById('oem-success').classList.add('hidden'), 5000);
            });
        });
    </script>
@endsection

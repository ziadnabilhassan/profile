<body class="bg-darkBg text-slate-100 antialiased selection:bg-cyanAccent selection:text-black">


    <!-- =====================================================
     VOLTERA PREMIUM NAVBAR
===================================================== -->

    <header id="site-header"
        class="!p-0 fixed inset-x-0 top-0 z-[9999] h-[72px] min-[901px]:h-[88px]
           bg-gradient-to-b from-black/55 to-transparent transition-all duration-300
           [--c:#ffffff] [--a:#0284c7] [--p:#ffffff] [--lf:none]
           dark:[--a:#00f0ff] dark:[--p:#070a0f]
           hover:bg-none hover:bg-white/95 hover:backdrop-blur-xl hover:[--c:#0f172a] hover:[--lf:invert(1)_hue-rotate(180deg)_brightness(.2)_contrast(1.3)]
           [&.scrolled]:bg-none [&.scrolled]:bg-white/95 [&.scrolled]:backdrop-blur-xl [&.scrolled]:[--c:#0f172a] [&.scrolled]:[--lf:invert(1)_hue-rotate(180deg)_brightness(.2)_contrast(1.3)] [&.scrolled]:shadow-[0_1px_0_rgba(0,0,0,.08)]
           dark:hover:bg-[#070a0f]/95 dark:hover:[--c:#ffffff] dark:hover:[--lf:none]
           dark:[&.scrolled]:bg-[#070a0f]/95 dark:[&.scrolled]:[--c:#ffffff] dark:[&.scrolled]:[--lf:none] dark:[&.scrolled]:shadow-[0_1px_0_rgba(255,255,255,.08)]">

        <!-- Page scroll progress -->
        <div id="scroll-progress"
            class="absolute top-0 left-0 h-0.5 w-0 z-10 bg-gradient-to-r from-[#00f0ff] to-[#0077ff] shadow-[0_0_10px_rgba(0,240,255,.5)] transition-[width] duration-100">
        </div>

        <div class="w-full h-full px-5 min-[901px]:px-14 flex items-center gap-6">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="shrink-0 flex items-center">
                <img src="{{ asset('website/assets/images/logo.png') }}" alt="VOLTERA"
                    class="block w-[140px] min-[901px]:w-[175px] h-auto max-h-[55px] object-contain transition-[filter] duration-300 [filter:var(--lf)]">
            </a>

            <!-- Desktop Nav -->
            <nav id="desktop-nav"
                class="hidden min-[901px]:flex flex-1 justify-center items-stretch h-full gap-2 xl:gap-8">

                <!-- Home -->
                <div class="group/i flex items-stretch">
                    <a href="{{ route('home') }}"
                        class="relative flex items-center px-3.5 text-[17px] font-medium text-[color:var(--a)]">{{ __('main.home') }}</a>
                </div>

                <!-- Products (mega menu بالصور) -->
                <div class="group/i flex items-stretch">
                    <a href="{{ route('products') }}"
                        class="relative flex items-center gap-1.5 px-3.5 text-[17px] font-medium text-[color:var(--c)] group-hover/i:text-[color:var(--a)] transition-colors after:content-[''] after:absolute after:inset-x-3.5 after:bottom-5 after:h-0.5 after:bg-[color:var(--a)] after:scale-x-0 group-hover/i:after:scale-x-100 after:transition-transform">
                        <span>{{ __('main.products') }}</span>
                        <i
                            class="fa-solid fa-chevron-down text-[10px] group-hover/i:rotate-180 transition-transform"></i>
                    </a>
                    <div
                        class="absolute inset-x-0 top-full bg-[color:var(--p)] border-t border-[#0000001a] dark:border-[#ffffff14] shadow-[0_30px_60px_rgba(0,0,0,.25)] invisible opacity-0 translate-y-2 group-hover/i:visible group-hover/i:opacity-100 group-hover/i:translate-y-0 transition-all duration-300">
                        <div class="max-w-[1380px] mx-auto px-14 py-8 grid grid-cols-5 gap-4">
                            @foreach ($categories as $category)
                                <a href="{{ Helper::link('category', $category->id, $category->title) }}"
                                    class="group/c block rounded-2xl border border-[#00000014] dark:border-[#ffffff14] p-2.5 text-center hover:border-[color:var(--a)] hover:-translate-y-1 transition-all duration-300">
                                    <div class="h-[105px] rounded-lg overflow-hidden mb-2.5"><img
                                            src="{{ asset($category->image) }}" alt="{{ $category->title }}"
                                            class="w-full h-full object-cover group-hover/c:scale-110 transition-transform duration-500">
                                    </div>
                                    <h4
                                        class="text-[13px] font-bold text-[color:var(--c)] group-hover/c:text-[color:var(--a)] transition-colors">
                                        {{ $category->title }}</h4>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Solutions -->
                <div class="group/i flex items-stretch">
                    <a href="#"
                        class="relative flex items-center gap-1.5 px-3.5 text-[17px] font-medium text-[color:var(--c)] group-hover/i:text-[color:var(--a)] transition-colors after:content-[''] after:absolute after:inset-x-3.5 after:bottom-5 after:h-0.5 after:bg-[color:var(--a)] after:scale-x-0 group-hover/i:after:scale-x-100 after:transition-transform">
                        <span>{{ __('main.solutions') }}</span>
                        <i
                            class="fa-solid fa-chevron-down text-[10px] group-hover/i:rotate-180 transition-transform"></i>
                    </a>
                    <div
                        class="absolute inset-x-0 top-full bg-[color:var(--p)] border-t border-[#0000001a] dark:border-[#ffffff14] shadow-[0_30px_60px_rgba(0,0,0,.25)] invisible opacity-0 translate-y-2 group-hover/i:visible group-hover/i:opacity-100 group-hover/i:translate-y-0 transition-all duration-300">
                        <div class="max-w-[1380px] mx-auto px-14 py-8 flex flex-wrap justify-center gap-x-14 gap-y-2">
                            @foreach ($solutions as $solution)
                                <a href="{{ Helper::link('solution', $solution->id, $solution->name) }}"
                                    class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ $solution->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- About -->
                <div class="group/i flex items-stretch">
                    <a href="{{ route('company-profile') }}"
                        class="relative flex items-center gap-1.5 px-3.5 text-[17px] font-medium text-[color:var(--c)] group-hover/i:text-[color:var(--a)] transition-colors after:content-[''] after:absolute after:inset-x-3.5 after:bottom-5 after:h-0.5 after:bg-[color:var(--a)] after:scale-x-0 group-hover/i:after:scale-x-100 after:transition-transform">
                        <span>{{ __('main.about') }}</span>
                        <i
                            class="fa-solid fa-chevron-down text-[10px] group-hover/i:rotate-180 transition-transform"></i>
                    </a>
                    <div
                        class="absolute inset-x-0 top-full bg-[color:var(--p)] border-t border-[#0000001a] dark:border-[#ffffff14] shadow-[0_30px_60px_rgba(0,0,0,.25)] invisible opacity-0 translate-y-2 group-hover/i:visible group-hover/i:opacity-100 group-hover/i:translate-y-0 transition-all duration-300">
                        <div class="max-w-[1380px] mx-auto px-14 py-8 flex flex-wrap justify-center gap-x-14 gap-y-2">
                            <a href="{{ route('company-profile') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.company_profile') }}</a>
                            <a href="{{ route('company-culture') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.company_culture') }}</a>
                            <a href="{{ route('honor') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.honor') }}</a>
                            <a href="{{ route('oem') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.oem') }}</a>
                            <a href="{{ route('privacy') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.privacy_policy') }}</a>
                            <a href="{{ route('investor') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.investor') }}</a>
                        </div>
                    </div>
                </div>

                <!-- Support -->
                <div class="group/i flex items-stretch">
                    <a href="{{ route('download-center') }}"
                        class="relative flex items-center gap-1.5 px-3.5 text-[17px] font-medium text-[color:var(--c)] group-hover/i:text-[color:var(--a)] transition-colors after:content-[''] after:absolute after:inset-x-3.5 after:bottom-5 after:h-0.5 after:bg-[color:var(--a)] after:scale-x-0 group-hover/i:after:scale-x-100 after:transition-transform">
                        <span>{{ __('main.support') }}</span>
                        <i
                            class="fa-solid fa-chevron-down text-[10px] group-hover/i:rotate-180 transition-transform"></i>
                    </a>
                    <div
                        class="absolute inset-x-0 top-full bg-[color:var(--p)] border-t border-[#0000001a] dark:border-[#ffffff14] shadow-[0_30px_60px_rgba(0,0,0,.25)] invisible opacity-0 translate-y-2 group-hover/i:visible group-hover/i:opacity-100 group-hover/i:translate-y-0 transition-all duration-300">
                        <div class="max-w-[1380px] mx-auto px-14 py-8 flex flex-wrap justify-center gap-x-14 gap-y-2">
                            <a href="{{ route('download-center') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.download_center') }}</a>
                            <a href="{{ route('services') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.services') }}</a>
                            <a href="{{ route('faq') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.faq') }}</a>
                        </div>
                    </div>
                </div>

                <!-- Contact Us -->
                <div class="group/i flex items-stretch">
                    <a href="{{ route('contacts') }}"
                        class="relative flex items-center gap-1.5 px-3.5 text-[17px] font-medium text-[color:var(--c)] group-hover/i:text-[color:var(--a)] transition-colors after:content-[''] after:absolute after:inset-x-3.5 after:bottom-5 after:h-0.5 after:bg-[color:var(--a)] after:scale-x-0 group-hover/i:after:scale-x-100 after:transition-transform">
                        <span>{{ __('main.contact_us') }}</span>
                        <i
                            class="fa-solid fa-chevron-down text-[10px] group-hover/i:rotate-180 transition-transform"></i>
                    </a>
                    <div
                        class="absolute inset-x-0 top-full bg-[color:var(--p)] border-t border-[#0000001a] dark:border-[#ffffff14] shadow-[0_30px_60px_rgba(0,0,0,.25)] invisible opacity-0 translate-y-2 group-hover/i:visible group-hover/i:opacity-100 group-hover/i:translate-y-0 transition-all duration-300">
                        <div class="max-w-[1380px] mx-auto px-14 py-8 flex flex-wrap justify-center gap-x-14 gap-y-2">
                            <a href="{{ route('contacts') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.Headquarters') }}</a>
                            <a href="{{ route('global-network') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.global_offices') }}</a>
                            <a href="{{ route('message') }}"
                                class="py-2 text-[15px] font-medium text-[color:var(--c)] hover:text-[color:var(--a)] hover:-translate-y-0.5 transition-all">{{ __('main.leave_a_message') }}</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Actions (ديسكتوب) -->
            <div class="hidden min-[901px]:flex items-center gap-4 shrink-0">
                <button type="button" id="theme-toggle-btn" class="theme-toggle-btn" aria-label="Toggle Theme">
                    <i class="fa-solid fa-sun icon-sun"></i>
                    <i class="fa-solid fa-moon icon-moon"></i>
                </button>
                @if (app()->getLocale() == 'en')
                    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="nav-cta flex-1 justify-center">
                        <span>En</span>

                    </a>
                @else
                    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="nav-cta flex-1 justify-center">
                        <span>Ar</span>

                    </a>
                @endif
                <a href="{{ route('message') }}" class="nav-cta">
                    <span>{{ __('main.get in touch') }}</span>
                    <span class="cta-arrow">↗</span>
                </a>
            </div>

            <!-- Mobile burger -->
            <button id="mobile-menu-btn" type="button" aria-label="Toggle Menu" aria-expanded="false"
                class="min-[901px]:hidden ml-auto w-11 h-11 flex flex-col items-center justify-center gap-[7px]
                   [&.open>span:nth-child(1)]:translate-y-[4.5px] [&.open>span:nth-child(1)]:rotate-45
                   [&.open>span:nth-child(2)]:-translate-y-[4.5px] [&.open>span:nth-child(2)]:-rotate-45">
                <span class="block w-[26px] h-0.5 bg-[color:var(--c)] transition-transform duration-300"></span>
                <span class="block w-[26px] h-0.5 bg-[color:var(--c)] transition-transform duration-300"></span>
            </button>
        </div>

        <!-- Mobile menu (ديناميك: routes + ترجمة + لوب) -->
        @php
            $mLink =
                'block py-2.5 ps-4 text-[#475569] dark:text-[#94a3b8] hover:text-[#0284c7] dark:hover:text-[#00f0ff]';
            $mSummary =
                'flex items-center justify-between py-4 text-lg font-semibold text-[#0f172a] dark:text-[#ffffff] cursor-pointer list-none [&::-webkit-details-marker]:hidden';
            $mBorder = 'border-b border-[#0000001a] dark:border-[#ffffff14]';
        @endphp

        <div id="mobile-menu"
            class="min-[901px]:hidden absolute inset-x-0 top-full h-[calc(100vh-72px)] overflow-y-auto px-5 pb-10
               bg-white dark:bg-[#070a0f] invisible opacity-0 transition-all duration-300
               [&.open]:visible [&.open]:opacity-100">

            <!-- Home -->
            <a href="{{ route('home') }}"
                class="block py-4 text-lg font-semibold text-[#0284c7] dark:text-[#00f0ff] {{ $mBorder }}">{{ __('main.home') }}</a>

            <!-- Products -->
            <details class="group/m {{ $mBorder }}">
                <summary class="{{ $mSummary }}">{{ __('main.products') }} <i
                        class="fa-solid fa-chevron-down text-xs group-open/m:rotate-180 transition-transform"></i>
                </summary>
                <a href="{{ route('products') }}" class="{{ $mLink }}">{{ __('main.all_products') }}</a>
                @foreach ($categories as $category)
                    <a href="{{ Helper::link('category', $category->id, $category->title) }}"
                        class="{{ $mLink }}">{{ $category->title }}</a>
                @endforeach
            </details>

            <!-- Solutions -->
            <details class="group/m {{ $mBorder }}">
                <summary class="{{ $mSummary }}">{{ __('main.solutions') }} <i
                        class="fa-solid fa-chevron-down text-xs group-open/m:rotate-180 transition-transform"></i>
                </summary>
                @foreach ($solutions as $solution)
                    <a href="{{ Helper::link('solution', $solution->id, $solution->name) }}"
                        class="{{ $mLink }}">{{ $solution->name }}</a>
                @endforeach
            </details>

            <!-- About -->
            <details class="group/m {{ $mBorder }}">
                <summary class="{{ $mSummary }}">{{ __('main.about') }} <i
                        class="fa-solid fa-chevron-down text-xs group-open/m:rotate-180 transition-transform"></i>
                </summary>
                <a href="{{ route('company-profile') }}"
                    class="{{ $mLink }}">{{ __('main.company_profile') }}</a>
                <a href="{{ route('company-culture') }}"
                    class="{{ $mLink }}">{{ __('main.company_culture') }}</a>
                <a href="{{ route('honor') }}" class="{{ $mLink }}">{{ __('main.honor') }}</a>
                <a href="{{ route('oem') }}" class="{{ $mLink }}">{{ __('main.oem') }}</a>
                <a href="{{ route('privacy') }}" class="{{ $mLink }}">{{ __('main.privacy_policy') }}</a>
                <a href="{{ route('investor') }}" class="{{ $mLink }}">{{ __('main.investor') }}</a>
            </details>

            <!-- Support -->
            <details class="group/m {{ $mBorder }}">
                <summary class="{{ $mSummary }}">{{ __('main.support') }} <i
                        class="fa-solid fa-chevron-down text-xs group-open/m:rotate-180 transition-transform"></i>
                </summary>
                <a href="{{ route('download-center') }}"
                    class="{{ $mLink }}">{{ __('main.download_center') }}</a>
                <a href="{{ route('services') }}" class="{{ $mLink }}">{{ __('main.services') }}</a>
                <a href="{{ route('faq') }}" class="{{ $mLink }}">{{ __('main.faq') }}</a>
            </details>

            <!-- Contact -->
            <details class="group/m {{ $mBorder }}">
                <summary class="{{ $mSummary }}">{{ __('main.contact_us') }} <i
                        class="fa-solid fa-chevron-down text-xs group-open/m:rotate-180 transition-transform"></i>
                </summary>
                <a href="{{ route('contacts') }}" class="{{ $mLink }}">{{ __('main.Headquarters') }}</a>
                <a href="{{ route('global-network') }}"
                    class="{{ $mLink }}">{{ __('main.global_offices') }}</a>
                <a href="{{ route('message') }}"
                    class="{{ $mLink }}">{{ __('main.leave_a_message') }}</a>
            </details>

            <!-- Mobile footer -->
            <div class="flex items-center gap-3 mt-6">
                <button type="button" class="theme-toggle-btn shrink-0" aria-label="Toggle Theme">
                    <i class="fa-solid fa-sun icon-sun"></i>
                    <i class="fa-solid fa-moon icon-moon"></i>
                </button>
                @if (app()->getLocale() == 'en')
                    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"
                        class="nav-cta flex-1 justify-center">
                        <span>En</span>

                    </a>
                @else
                    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                        class="nav-cta flex-1 justify-center">
                        <span>Ar</span>

                    </a>
                @endif
                <a href="{{ route('message') }}" class="nav-cta flex-1 justify-center">
                    <span>{{ __('main.get in touch') }}</span>
                    <span class="cta-arrow">↗</span>
                </a>
            </div>
        </div>
    </header>

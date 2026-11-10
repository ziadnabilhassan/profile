<footer class="bg-[#141618] border-t border-[#162032] py-16 text-[#94a3b8] text-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-10 mb-16">

            <!-- Col 1: Brand + Newsletter -->
            <div class="col-span-2 md:col-span-4 lg:col-span-2 space-y-6">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <!-- Logo Image -->
                    <div class="h-10 flex items-center">
                        <img src="{{ asset('website/assets/images/logo.png') }}" alt="VOLTERA Logo"
                            class="h-full w-auto object-contain">
                    </div>
                </a>

                <p class="text-[#94a3b8] text-sm max-w-sm leading-relaxed">
                    {{ __('main.footer_description') }}
                </p>

                <div class="flex items-center gap-4">
                    <a href="{{ $Contact->linkedin }}"
                        class="w-10 h-10 rounded-xl bg-[#0b0f19] border border-[#162032] flex items-center justify-center text-[#cbd5e1] hover:text-[#00f0ff] hover:border-[#00f0ff]/50 transition-all"><i
                            class="fa-brands fa-linkedin-in"></i></a>
                    <a href="{{ $Contact->twitter }}"
                        class="w-10 h-10 rounded-xl bg-[#0b0f19] border border-[#162032] flex items-center justify-center text-[#cbd5e1] hover:text-[#00f0ff] hover:border-[#00f0ff]/50 transition-all"><i
                            class="fa-brands fa-twitter"></i></a>
                    <a href="{{ $Contact->youtube }}"
                        class="w-10 h-10 rounded-xl bg-[#0b0f19] border border-[#162032] flex items-center justify-center text-[#cbd5e1] hover:text-[#00f0ff] hover:border-[#00f0ff]/50 transition-all"><i
                            class="fa-brands fa-youtube"></i></a>
                    <a href="{{ $Contact->instagram }}"
                        class="w-10 h-10 rounded-xl bg-[#0b0f19] border border-[#162032] flex items-center justify-center text-[#cbd5e1] hover:text-[#00f0ff] hover:border-[#00f0ff]/50 transition-all"><i
                            class="fa-brands fa-instagram"></i></a>
                </div>

                <!-- Newsletter -->
                <div class="max-w-sm">
                    <h4 class="text-[#ffffff] font-bold text-base mb-3 tracking-wide">{{ __('main.newsletter') }}</h4>
                    <p class="text-xs text-[#94a3b8] mb-4">{{ __('main.newsletter_text') }}</p>
                    <form id="subscribtion" class="space-y-3">
                        @csrf
                        <div class="relative">
                            <input type="email" name="email" required placeholder="{{ __('main.your_email') }}"
                                class="w-full bg-[#0b0f19] border border-[#162032] rounded-xl ps-4 pe-16 py-3 text-xs text-[#ffffff] placeholder-slate-600 focus:outline-none focus:border-[#00f0ff] transition-colors">
                            <button type="submit"
                                class="absolute end-1.5 top-1.5 bottom-1.5 px-4 bg-gradient-to-r from-[#00f0ff] to-[#0077ff] text-black font-bold rounded-lg text-xs hover:opacity-90 transition-opacity">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Col 2: About -->
            <div>
                <h4 class="text-[#ffffff] font-bold text-base mb-6 tracking-wide">{{ __('main.about') }}</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('company-profile') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.company_profile') }}</a></li>
                    <li><a href="{{ route('company-culture') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.company_culture') }}</a></li>
                    <li><a href="{{ route('honor') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.honor') }}</a></li>
                    <li><a href="{{ route('oem') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.oem') }}</a></li>
                    <li><a href="{{ route('privacy') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.privacy_policy') }}</a></li>
                    <li><a href="{{ route('investor') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.investor') }}</a></li>
                </ul>
            </div>

            <!-- Col 3: Solutions (ديناميك) -->
            <div>
                <h4 class="text-[#ffffff] font-bold text-base mb-6 tracking-wide">{{ __('main.solutions') }}</h4>
                <ul class="space-y-3">
                    @foreach ($solutions as $solution)
                        <li><a href="{{ Helper::link('solution', $solution->id, $solution->name) }}"
                                class="hover:text-[#00f0ff] transition-colors">{{ $solution->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Col 4: Contact -->
            <div>
                <h4 class="text-[#ffffff] font-bold text-base mb-6 tracking-wide">{{ __('main.contact_us') }}</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('contacts') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.Headquarters') }}</a></li>
                    <li><a href="{{ route('global-network') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.global_offices') }}</a></li>
                    <li><a href="{{ route('message') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.leave_a_message') }}</a></li>
                </ul>
            </div>

            <!-- Col 5: Support -->
            <div>
                <h4 class="text-[#ffffff] font-bold text-base mb-6 tracking-wide">{{ __('main.support') }}</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('download-center') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.download_center') }}</a></li>
                    <li><a href="{{ route('services') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.services') }}</a></li>
                    <li><a href="{{ route('faq') }}"
                            class="hover:text-[#00f0ff] transition-colors">{{ __('main.faq') }}</a></li>
                </ul>
            </div>

        </div>

        <!-- Bottom Copyright -->
        <div
            class="pt-8 border-t border-[#162032] flex flex-col items-center justify-center text-sm text-[#64748b] text-center">
            <p>
                &copy; {{ date('Y') }} VOLTERA. {{ __('main.rights_reserved') }}
            </p>
            <p class="mt-2">
                {{ __('main.created_by') }}
                <a href="https://websolla.com" target="_blank" rel="noopener noreferrer"
                    class="text-[#94a3b8] hover:text-[#ffffff] transition-colors duration-300">
                    WebSolla
                </a>
            </p>
        </div>

    </div>
</footer>

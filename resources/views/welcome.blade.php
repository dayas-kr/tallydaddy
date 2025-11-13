<x-base-layout title="Tally Daddy">
    <div class="min-h-screen bg-white dark:bg-neutral-950">
        <!-- Header -->
        <header class="border-b border-neutral-200 dark:border-neutral-800" x-data="{ mobileMenuOpen: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 bg-neutral-900 dark:bg-neutral-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white dark:text-neutral-900" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-xl font-semibold text-neutral-900 dark:text-neutral-100">TallyDaddy</span>
                    </div>

                    <!-- Desktop Navigation -->
                    @if (Route::has('login'))
                        <nav class="hidden md:flex items-center gap-3">
                            @auth
                                <x-ui.button href="{{ url('/dashboard') }}" variant="outline">Dashboard</x-ui.button>
                            @else
                                <x-ui.button href="{{ route('login') }}" variant="outline">Log in</x-ui.button>
                                @if (Route::has('register'))
                                    <x-ui.button href="{{ route('register') }}">Register</x-ui.button>
                                @endif
                            @endauth
                        </nav>
                    @endif

                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="md:hidden p-2 text-neutral-600 dark:text-neutral-400">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="md:hidden py-4 border-t border-neutral-200 dark:border-neutral-800">
                    @if (Route::has('login'))
                        <nav class="flex flex-col gap-2">
                            @auth
                                <x-ui.button href="{{ url('/dashboard') }}" variant="outline"
                                    class="w-full">Dashboard</x-ui.button>
                            @else
                                <x-ui.button href="{{ route('login') }}" variant="outline" class="w-full">Log
                                    in</x-ui.button>
                                @if (Route::has('register'))
                                    <x-ui.button href="{{ route('register') }}" class="w-full">Get Started</x-ui.button>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">
                <div class="text-center max-w-3xl mx-auto">
                    <h1
                        class="text-5xl sm:text-6xl lg:text-7xl font-bold text-neutral-900 dark:text-neutral-100 tracking-tight mb-6">
                        Manage Your Work
                    </h1>
                    <p class="text-xl text-neutral-600 dark:text-neutral-400 mb-10 leading-relaxed">
                        Simple, powerful work and finance management for contractors, freelancers, and service
                        professionals.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <x-ui.button href="#" size="large" radius="large">
                            Get Started Free
                        </x-ui.button>
                        <x-ui.button href="#features" variant="outline" size="large" radius="large">
                            See Features
                        </x-ui.button>
                    </div>
                </div>

                <!-- Dashboard Preview -->
                <div class="mt-20 relative max-w-5xl mx-auto">
                    <div
                        class="bg-white dark:bg-neutral-900 rounded-xl shadow-2xl border border-neutral-200 dark:border-neutral-800 overflow-hidden">
                        <!-- Browser Chrome -->
                        <div
                            class="bg-neutral-100 dark:bg-neutral-800 px-4 py-3 flex items-center gap-2 border-b border-neutral-200 dark:border-neutral-700">
                            <div class="flex gap-1.5">
                                <div class="w-3 h-3 rounded-full bg-(--muted-foreground)/50"></div>
                                <div class="w-3 h-3 rounded-full bg-(--muted-foreground)/50"></div>
                                <div class="w-3 h-3 rounded-full bg-(--muted-foreground)/50"></div>
                            </div>
                        </div>
                        <!-- Dashboard Content -->
                        <div class="p-8">
                            <!-- Stats Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                                <div class="bg-(--card) rounded-lg p-5 border border-(--border)">
                                    <div class="text-sm text-neutral-600 dark:text-neutral-400 mb-1">Active Works</div>
                                    <div class="text-3xl font-bold text-neutral-900 dark:text-neutral-100">24</div>
                                </div>
                                <div class="bg-(--card) rounded-lg p-5 border border-(--border)">
                                    <div class="text-sm text-neutral-600 dark:text-neutral-400 mb-1">Revenue</div>
                                    <div class="text-3xl font-bold text-neutral-900 dark:text-neutral-100">₹8.5L</div>
                                </div>
                                <div class="bg-(--card) rounded-lg p-5 border border-(--border)">
                                    <div class="text-sm text-neutral-600 dark:text-neutral-400 mb-1">This Month</div>
                                    <div class="text-3xl font-bold text-neutral-900 dark:text-neutral-100">₹2.1L</div>
                                </div>
                            </div>
                            <!-- Work Items -->
                            <div class="space-y-3">
                                <div
                                    class="flex items-center justify-between p-4 bg-neutral-50 dark:bg-neutral-800 rounded-lg border border-neutral-200 dark:border-neutral-700">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-(--muted-foreground)/20 rounded-lg"></div>
                                        <div>
                                            <div class="font-medium text-neutral-900 dark:text-neutral-100">Office
                                                Renovation</div>
                                            <div class="text-sm text-neutral-500 dark:text-neutral-400">Due in 5 days
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-neutral-900 dark:text-neutral-100 font-semibold">₹45,000</div>
                                </div>
                                <div
                                    class="flex items-center justify-between p-4 bg-neutral-50 dark:bg-neutral-800 rounded-lg border border-neutral-200 dark:border-neutral-700">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-(--muted-foreground)/20 rounded-lg"></div>
                                        <div>
                                            <div class="font-medium text-neutral-900 dark:text-neutral-100">AC Repair
                                                Service</div>
                                            <div class="text-sm text-neutral-500 dark:text-neutral-400">In Progress
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-neutral-900 dark:text-neutral-100 font-semibold">₹8,500</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-24 bg-neutral-50 dark:bg-neutral-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-neutral-900 dark:text-neutral-100 mb-3">Everything You Need</h2>
                    <p class="text-lg text-neutral-600 dark:text-neutral-400">Simple tools to manage your work
                        efficiently</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Feature 1 -->
                    <div
                        class="bg-white dark:bg-neutral-800 rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                        <div
                            class="w-12 h-12 bg-neutral-900 dark:bg-neutral-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white dark:text-neutral-900" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 mb-2">Work Management
                        </h3>
                        <p class="text-neutral-600 dark:text-neutral-400">Track contracts, services, and repairs with
                            real-time updates.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div
                        class="bg-white dark:bg-neutral-800 rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                        <div
                            class="w-12 h-12 bg-neutral-900 dark:bg-neutral-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white dark:text-neutral-900" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 mb-2">Expense Tracking
                        </h3>
                        <p class="text-neutral-600 dark:text-neutral-400">Categorize expenses and attach receipts
                            effortlessly.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div
                        class="bg-white dark:bg-neutral-800 rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                        <div
                            class="w-12 h-12 bg-neutral-900 dark:bg-neutral-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white dark:text-neutral-900" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 mb-2">Payment Tracking
                        </h3>
                        <p class="text-neutral-600 dark:text-neutral-400">Record advances and calculate balances
                            automatically.</p>
                    </div>

                    <!-- Feature 4 -->
                    <div
                        class="bg-white dark:bg-neutral-800 rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                        <div
                            class="w-12 h-12 bg-neutral-900 dark:bg-neutral-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white dark:text-neutral-900" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 mb-2">Reports</h3>
                        <p class="text-neutral-600 dark:text-neutral-400">Generate financial reports with visual
                            charts.</p>
                    </div>

                    <!-- Feature 5 -->
                    <div
                        class="bg-white dark:bg-neutral-800 rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                        <div
                            class="w-12 h-12 bg-neutral-900 dark:bg-neutral-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white dark:text-neutral-900" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 mb-2">Client Management
                        </h3>
                        <p class="text-neutral-600 dark:text-neutral-400">Maintain detailed client records and project
                            history.</p>
                    </div>

                    <!-- Feature 6 -->
                    <div
                        class="bg-white dark:bg-neutral-800 rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                        <div
                            class="w-12 h-12 bg-neutral-900 dark:bg-neutral-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white dark:text-neutral-900" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-neutral-900 dark:text-neutral-100 mb-2">Progress Tracking
                        </h3>
                        <p class="text-neutral-600 dark:text-neutral-400">Monitor work status with updates and photo
                            attachments.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold text-neutral-900 dark:text-neutral-100 mb-4">
                    Ready to Get Started?
                </h2>
                <p class="text-lg text-neutral-600 dark:text-neutral-400 mb-8">
                    Start managing your work efficiently today.
                </p>
                <x-ui.button href="#" size="large" radius="large">
                    Create Free Account
                </x-ui.button>
                <p class="text-sm text-neutral-500 dark:text-neutral-500 mt-4">No credit card required</p>
            </div>
        </section>

        <!-- Footer -->
        <footer class="border-t border-neutral-200 dark:border-neutral-800 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 bg-neutral-900 dark:bg-neutral-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white dark:text-neutral-900" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-lg font-semibold text-neutral-900 dark:text-neutral-100">TallyDaddy</span>
                    </div>
                    <div class="text-neutral-600 dark:text-neutral-400 text-sm">
                        © {{ date('Y') }} TallyDaddy. All rights reserved.
                    </div>
                    <x-ui.theme-toggle />
                </div>
            </div>
        </footer>
    </div>
</x-base-layout>

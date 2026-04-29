<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bloom Space') }} — Understand How You Learn</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance
    </head>
    <body class="font-sans antialiased bg-white text-zinc-900">
        <flux:navbar class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <flux:brand href="/" wire:navigate>
                <span class="text-xl font-bold text-emerald-600">Bloom Space</span>
            </flux:brand>

            <flux:navbar.item href="#about" wire:navigate>About</flux:navbar.item>
            <flux:navbar.item href="#assessments" wire:navigate>Assessments</flux:navbar.item>
            <flux:navbar.item href="#how-it-works" wire:navigate>How It Works</flux:navbar.item>
            <flux:navbar.item href="#institutions" wire:navigate>For Schools</flux:navbar.item>

            <flux:spacer />

            @auth
                <flux:button href="{{ url('/dashboard') }}" wire:navigate variant="ghost">Dashboard</flux:button>
            @else
                @if (Route::has('login'))
                    <flux:button href="{{ route('login') }}" wire:navigate variant="ghost">Log in</flux:button>
                @endif
                @if (Route::has('register'))
                    <flux:button href="{{ route('register') }}" wire:navigate variant="primary">Get Started</flux:button>
                @endif
            @endauth
        </flux:navbar>

        <main>
            {{-- Hero --}}
            <section class="bg-gradient-to-br from-emerald-50 to-teal-50 py-20 sm:py-28">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <flux:badge color="emerald" class="mb-4">Empowering Students to Learn Better</flux:badge>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-zinc-900 mb-6">
                        Understand How You Learn.<br />
                        <span class="text-emerald-600">Unlock Your Potential.</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-zinc-600 max-w-2xl mx-auto mb-10">
                        Bloom Space helps students discover their learning preferences, identify study challenges, and access personalised tools for academic improvement.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        @guest
                            @if (Route::has('register'))
                                <flux:button href="{{ route('register') }}" wire:navigate  variant="primary">Start Your Assessment</flux:button>
                            @endif
                        @endguest
                        <flux:button href="#assessments"  variant="ghost">Learn More</flux:button>
                    </div>
                </div>
            </section>

            {{-- About --}}
            <section id="about" class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-14">
                        <flux:heading level="2" class="text-3xl font-bold mb-4">About Bloom Space</flux:heading>
                        <p class="text-zinc-600 max-w-2xl mx-auto text-lg">
                            Bloom Space is an independent digital platform designed to help students understand how they learn, identify challenges in their study habits, and access tools for improvement.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <flux:card class="text-center">
                            <div class="text-4xl mb-4">&#x1F50D;</div>
                            <flux:heading level="3" class="text-lg font-semibold mb-2">Discover</flux:heading>
                            <p class="text-zinc-600 text-sm">Learn your unique learning preferences through scientifically designed assessments.</p>
                        </flux:card>
                        <flux:card class="text-center">
                            <div class="text-4xl mb-4">&#x1F4CA;</div>
                            <flux:heading level="3" class="text-lg font-semibold mb-2">Understand</flux:heading>
                            <p class="text-zinc-600 text-sm">Get personalised insights into your study habits, strengths, and challenge areas.</p>
                        </flux:card>
                        <flux:card class="text-center">
                            <div class="text-4xl mb-4">&#x1F680;</div>
                            <flux:heading level="3" class="text-lg font-semibold mb-2">Improve</flux:heading>
                            <p class="text-zinc-600 text-sm">Access resources, recommendations, and consultations to accelerate your growth.</p>
                        </flux:card>
                    </div>
                </div>
            </section>

            {{-- Assessments --}}
            <section id="assessments" class="py-20 bg-zinc-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-14">
                        <flux:heading level="2" class="text-3xl font-bold mb-4">Our Assessments</flux:heading>
                        <p class="text-zinc-600 max-w-2xl mx-auto text-lg">
                            Two scientifically designed assessments to help you understand your learning and study patterns.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {{-- SLPQ Card --}}
                        <flux:card class="border border-emerald-200 bg-white">
                            <flux:badge color="emerald">Learning Preferences</flux:badge>
                            <flux:heading level="3" class="text-2xl font-bold mt-3 mb-2">Student Learning Preferences Questionnaire (SLPQ)</flux:heading>
                            <p class="text-zinc-600 mb-6">Discover whether you are a Visual, Auditory, Read/Write, or Kinesthetic learner — and how to leverage your dominant style.</p>
                            <flux:heading level="4" class="text-sm font-semibold text-zinc-500 uppercase tracking-wider mb-3">Four Learning Scales</flux:heading>
                            <ul class="space-y-2 text-sm text-zinc-700">
                                <li class="flex items-center gap-2">
                                    <flux:badge color="blue" size="sm">Visual</flux:badge>
                                    Learn through diagrams, charts, and visual organisation
                                </li>
                                <li class="flex items-center gap-2">
                                    <flux:badge color="purple" size="sm">Auditory</flux:badge>
                                    Learn through listening and discussion
                                </li>
                                <li class="flex items-center gap-2">
                                    <flux:badge color="orange" size="sm">Read/Write</flux:badge>
                                    Learn through reading and written notes
                                </li>
                                <li class="flex items-center gap-2">
                                    <flux:badge color="rose" size="sm">Kinesthetic</flux:badge>
                                    Learn by doing practical, hands-on activities
                                </li>
                            </ul>
                        </flux:card>

                        {{-- SCA Card --}}
                        <flux:card class="border border-teal-200 bg-white">
                            <flux:badge color="teal">Study Consistency</flux:badge>
                            <flux:heading level="3" class="text-2xl font-bold mt-3 mb-2">Study Consistency Assessment (SCA)</flux:heading>
                            <p class="text-zinc-600 mb-6">Identify your biggest study challenges — from procrastination to focus issues — and get practical strategies to overcome them.</p>
                            <flux:heading level="4" class="text-sm font-semibold text-zinc-500 uppercase tracking-wider mb-3">Five Consistency Scales</flux:heading>
                            <ul class="space-y-2 text-sm text-zinc-700">
                                <li class="flex items-center gap-2">
                                    <flux:badge color="blue" size="sm">Study Structure</flux:badge>
                                    Planning and maintaining a study routine
                                </li>
                                <li class="flex items-center gap-2">
                                    <flux:badge color="red" size="sm">Procrastination</flux:badge>
                                    Delaying and avoiding study sessions
                                </li>
                                <li class="flex items-center gap-2">
                                    <flux:badge color="amber" size="sm">Emotional Load</flux:badge>
                                    Anxiety and stress around studying
                                </li>
                                <li class="flex items-center gap-2">
                                    <flux:badge color="green" size="sm">Focus & Attention</flux:badge>
                                    Concentration and distraction management
                                </li>
                                <li class="flex items-center gap-2">
                                    <flux:badge color="violet" size="sm">Self-Regulation</flux:badge>
                                    Tracking progress and adjusting methods
                                </li>
                            </ul>
                        </flux:card>
                    </div>
                </div>
            </section>

            {{-- How It Works --}}
            <section id="how-it-works" class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-14">
                        <flux:heading level="2" class="text-3xl font-bold mb-4">How It Works</flux:heading>
                        <p class="text-zinc-600 max-w-2xl mx-auto text-lg">
                            Four simple steps to unlock your learning potential.
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="text-center">
                            <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl font-bold mx-auto mb-4">1</div>
                            <flux:heading level="3" class="font-semibold mb-2">Register</flux:heading>
                            <p class="text-zinc-600 text-sm">Create your free account with just your name and email. Verify your email to get started.</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl font-bold mx-auto mb-4">2</div>
                            <flux:heading level="3" class="font-semibold mb-2">Take Assessment</flux:heading>
                            <p class="text-zinc-600 text-sm">Choose SLPQ or SCA and complete the questionnaire at your own pace with auto-save.</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl font-bold mx-auto mb-4">3</div>
                            <flux:heading level="3" class="font-semibold mb-2">Get Results</flux:heading>
                            <p class="text-zinc-600 text-sm">Receive your personalised report with scores, interpretations, and practical recommendations.</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl font-bold mx-auto mb-4">4</div>
                            <flux:heading level="3" class="font-semibold mb-2">Improve</flux:heading>
                            <p class="text-zinc-600 text-sm">Access the Learning Hub for resources, or book a consultation for personalised guidance.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- For Institutions --}}
            <section id="institutions" class="py-20 bg-emerald-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="max-w-3xl mx-auto text-center">
                        <flux:badge color="emerald" class="mb-4">For Schools & Institutions</flux:badge>
                        <flux:heading level="2" class="text-3xl font-bold mb-4">Bring Bloom Space to Your School</flux:heading>
                        <p class="text-zinc-600 text-lg mb-6">
                            Schools and institutions can partner with Bloom Space to provide assessments for their students at scale. Get aggregated analytics, custom branding, and flexible pricing plans.
                        </p>
                        <flux:callout class="text-left mb-8">
                            <flux:callout.heading>Institution Benefits</flux:callout.heading>
                            <flux:callout.text>
                                <ul class="list-disc list-inside space-y-1 text-sm">
                                    <li>Bulk student account creation and management</li>
                                    <li>View individual and aggregated student results</li>
                                    <li>Custom school branding on student dashboards</li>
                                    <li>Flexible pricing — per-student, flat, or package plans</li>
                                    <li>Export data as CSV for your records</li>
                                </ul>
                            </flux:callout.text>
                        </flux:callout>
                        <flux:button href="mailto:contact@bloomspace.mw"  variant="primary">Contact Us for Institutional Access</flux:button>
                    </div>
                </div>
            </section>
        </main>

        {{-- Footer --}}
        <footer class="bg-zinc-900 text-zinc-400 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <span class="text-xl font-bold text-white">Bloom Space</span>
                        <p class="mt-3 text-sm">Helping students understand how they learn and improve how they study.</p>
                    </div>
                    <div>
                        <flux:heading level="4" class="font-semibold text-white mb-3">Quick Links</flux:heading>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#about" class="hover:text-white">About</a></li>
                            <li><a href="#assessments" class="hover:text-white">Assessments</a></li>
                            <li><a href="#how-it-works" class="hover:text-white">How It Works</a></li>
                            <li><a href="#institutions" class="hover:text-white">For Schools</a></li>
                        </ul>
                    </div>
                    <div>
                        <flux:heading level="4" class="font-semibold text-white mb-3">Contact</flux:heading>
                        <p class="text-sm">Email: contact@bloomspace.mw</p>
                    </div>
                </div>
                <flux:separator class="my-8" />
                <p class="text-center text-sm text-zinc-500">&copy; {{ date('Y') }} Bloom Space. All rights reserved.</p>
            </div>
        </footer>

        @fluxScripts
    </body>
</html>

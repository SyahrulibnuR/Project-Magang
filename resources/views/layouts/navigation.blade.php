
<nav x-data="{ open: false, profileOpen: false }"
     class="sticky top-0 z-50 border-b border-slate-200 bg-white shadow-sm">

    <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">

        <div class="flex h-[76px] items-center justify-between">

            <!-- BRAND -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-violet-700 to-indigo-900 text-lg font-extrabold text-white shadow-md">
                    SM
                </div>

                <div>
                    <h1 class="text-base font-extrabold tracking-wide text-slate-900">
                        SUARA MERDEKA
                    </h1>
                    <p class="text-[10px] font-semibold tracking-[2px] text-violet-700">
                        CUSTOMER CARE
                    </p>
                </div>

            </a>

            <!-- DESKTOP MENU -->
            @auth
                <div class="hidden items-center gap-2 md:flex">

                    <a href="{{ route('dashboard') }}"
                       class="rounded-xl px-5 py-3 text-sm font-semibold transition
                       {{ request()->routeIs('dashboard')
                           ? 'bg-violet-50 text-violet-800'
                           : 'text-slate-500 hover:bg-slate-50 hover:text-violet-700' }}">

                        Dashboard
                    </a>

                    <a href="{{ url('/pengaduan/create') }}"
                       class="rounded-xl px-5 py-3 text-sm font-semibold text-slate-500 transition hover:bg-slate-50 hover:text-violet-700">

                        Buat Pengaduan
                    </a>

                    <a href="{{ url('/pengaduan') }}"
                       class="rounded-xl px-5 py-3 text-sm font-semibold text-slate-500 transition hover:bg-slate-50 hover:text-violet-700">

                        Riwayat
                    </a>

                </div>
            @endauth

            <!-- RIGHT PROFILE -->
            <div class="hidden items-center gap-4 md:flex">

                @auth
                    <div class="h-9 w-px bg-slate-200"></div>

                    <div class="relative">

                        <button
                            type="button"
                            @click="profileOpen = !profileOpen"
                            class="flex items-center gap-3 rounded-xl px-3 py-2 transition hover:bg-slate-50">

                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-violet-100 font-bold text-violet-800">
                                {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                            </div>

                            <div class="text-left">
                                <p class="text-sm font-bold text-slate-800">
                                    {{ auth()->user()->name ?? 'Pengguna' }}
                                </p>
                                <p class="text-xs text-slate-500">
                                    Akun Pelanggan
                                </p>
                            </div>

                            <svg class="h-4 w-4 text-slate-400 transition"
                                 :class="{ 'rotate-180': profileOpen }"
                                 fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>

                        </button>

                        <!-- PROFILE DROPDOWN -->
                        <div
                            x-show="profileOpen"
                            x-transition
                            @click.outside="profileOpen = false"
                            class="absolute right-0 mt-3 w-56 overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-xl"
                            style="display: none;">

                            <div class="border-b border-slate-100 px-5 py-4">
                                <p class="text-sm font-bold text-slate-800">
                                    {{ auth()->user()->name ?? 'Pengguna' }}
                                </p>
                                <p class="mt-1 break-all text-xs text-slate-500">
                                    {{ auth()->user()->email ?? '' }}
                                </p>
                            </div>

                            <div class="p-2">

                                <a href="{{ route('profile.edit') }}"
                                   class="block rounded-xl px-4 py-3 text-sm text-slate-600 transition hover:bg-violet-50 hover:text-violet-800">
                                    Pengaturan Profil
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit"
                                            class="w-full rounded-xl px-4 py-3 text-left text-sm font-medium text-red-600 transition hover:bg-red-50">
                                        Keluar dari Akun
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                @else

                    <a href="{{ route('login') }}"
                       class="rounded-xl px-5 py-2.5 text-sm font-semibold text-violet-700 hover:bg-violet-50">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="rounded-xl bg-violet-700 px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:bg-violet-800">
                        Daftar
                    </a>

                @endauth

            </div>

            <!-- MOBILE BUTTON -->
            <button
                @click="open = !open"
                class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-slate-700 transition hover:bg-violet-50 md:hidden">

                <svg x-show="!open" class="h-6 w-6"
                     fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>

                <svg x-show="open" class="h-6 w-6"
                     fill="none" stroke="currentColor"
                     viewBox="0 0 24 24"
                     style="display:none;">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>

            </button>

        </div>

        <!-- MOBILE MENU -->
        <div x-show="open"
             x-transition
             class="border-t border-slate-100 py-4 md:hidden"
             style="display:none;">

            @auth

                <div class="mb-4 flex items-center gap-3 rounded-xl bg-violet-50 p-4">

                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-violet-200 font-bold text-violet-800">
                        {{ strtoupper(substr(auth()->user()->name ?? 'P', 0, 1)) }}
                    </div>

                    <div>
                        <p class="font-bold text-slate-800">
                            {{ auth()->user()->name ?? 'Pengguna' }}
                        </p>
                        <p class="text-xs text-slate-500">
                            Akun Pelanggan
                        </p>
                    </div>

                </div>

                <div class="space-y-2">

                    <a href="{{ route('dashboard') }}"
                       class="block rounded-xl px-4 py-3 text-sm font-semibold
                       {{ request()->routeIs('dashboard')
                           ? 'bg-violet-100 text-violet-800'
                           : 'text-slate-600 hover:bg-slate-50' }}">
                        Dashboard
                    </a>

                    <a href="{{ url('/pengaduan/create') }}"
                       class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                        Buat Pengaduan
                    </a>

                    <a href="{{ url('/pengaduan') }}"
                       class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                        Riwayat Pengaduan
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="block rounded-xl px-4 py-3 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                        Pengaturan Profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full rounded-xl px-4 py-3 text-left text-sm font-semibold text-red-600 hover:bg-red-50">
                            Keluar
                        </button>
                    </form>

                </div>

            @else

                <div class="flex gap-3">
                    <a href="{{ route('login') }}"
                       class="flex-1 rounded-xl border border-violet-200 py-3 text-center text-sm font-semibold text-violet-700">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="flex-1 rounded-xl bg-violet-700 py-3 text-center text-sm font-semibold text-white">
                        Daftar
                    </a>
                </div>

            @endauth

        </div>

    </div>
</nav>

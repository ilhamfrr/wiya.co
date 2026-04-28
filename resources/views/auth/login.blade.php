<x-guest-layout>
    <div class="space-y-4">
        <h2 class="text-4xl font-black text-brand-dark tracking-tighter uppercase">Welcome Back.</h2>
        <p class="text-brand-dark/40 text-[10px] font-bold uppercase tracking-[0.2em]">Enter your credentials to access your archives.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-8">
        @csrf

        <!-- Email Address -->
        <div class="space-y-3">
            <label for="email" class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                   class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-3">
            <div class="flex justify-between items-center">
                <label for="password" class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-[9px] font-bold text-brand-dark/40 hover:text-brand-accent uppercase tracking-widest transition-colors">
                        Forgot?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password" 
                   class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded-lg border-brand-dark/10 text-brand-dark shadow-sm focus:ring-brand-accent/20">
            <label for="remember_me" class="ms-3 text-[10px] font-bold text-brand-dark/40 uppercase tracking-widest cursor-pointer">Stay Authenticated</label>
        </div>

        <div class="pt-4 space-y-6">
            <button type="submit" class="w-full bg-brand-dark text-white font-black py-5 rounded-2xl shadow-2xl hover:bg-black transition-all active:scale-[0.98] uppercase tracking-[0.3em] text-xs">
                Log In
            </button>
            
            <p class="text-center text-[10px] font-bold text-brand-dark/40 uppercase tracking-widest">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-brand-dark font-black hover:text-brand-accent transition-colors">Register Now</a>
            </p>
        </div>
    </form>
</x-guest-layout>

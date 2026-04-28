<x-guest-layout>
    <div class="space-y-4">
        <h2 class="text-4xl font-black text-brand-dark tracking-tighter uppercase">Create Account.</h2>
        <p class="text-brand-dark/40 text-[10px] font-bold uppercase tracking-[0.2em]">Join the archives and start your journey.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="space-y-3">
            <label for="name" class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                   class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="space-y-3">
            <label for="email" class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                   class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-3">
            <label for="password" class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" 
                   class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-3">
            <label for="password_confirmation" class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                   class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-6 space-y-6">
            <button type="submit" class="w-full bg-brand-dark text-white font-black py-5 rounded-2xl shadow-2xl hover:bg-black transition-all active:scale-[0.98] uppercase tracking-[0.3em] text-xs">
                Register Account
            </button>
            
            <p class="text-center text-[10px] font-bold text-brand-dark/40 uppercase tracking-widest">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-brand-dark font-black hover:text-brand-accent transition-colors">Sign In</a>
            </p>
        </div>
    </form>
</x-guest-layout>

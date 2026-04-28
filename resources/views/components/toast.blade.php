<div
    x-data="{ 
        show: false, 
        message: '',
        type: 'success',
        init() {
            @if(session('success'))
                this.showToast('{{ session('success') }}', 'success');
            @endif
            
            window.addEventListener('toast', (event) => {
                this.showToast(event.detail.message, event.detail.type || 'success');
            });
        },
        showToast(msg, type) {
            this.message = msg;
            this.type = type;
            this.show = true;
            setTimeout(() => this.show = false, 3000);
        }
    }"
    x-show="show"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 transform translate-y-[-40px] scale-95"
    x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 transform translate-y-[-40px] scale-95"
    class="fixed top-10 right-10 z-[9999] min-w-[320px]"
    style="display: none;"
>
    <div 
        :class="{
            'bg-brand-dark text-white border-white/10 shadow-black/40': type === 'success',
            'bg-rose-900 text-white border-rose-500/20 shadow-rose-900/40': type === 'error',
            'bg-brand-accent text-white border-white/20 shadow-brand-accent/40': type === 'warning'
        }"
        class="flex items-center gap-6 px-8 py-5 rounded-[2rem] border shadow-2xl backdrop-blur-xl"
    >
        <!-- Icon -->
        <div class="flex-shrink-0 w-10 h-10 bg-white/10 rounded-2xl flex items-center justify-center">
            <template x-if="type === 'success'">
                <svg class="w-6 h-6 text-brand-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
            </template>
            <template x-if="type === 'error'">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </template>
        </div>

        <!-- Content -->
        <div class="flex-1">
            <p class="text-[11px] font-black uppercase tracking-[0.2em]" x-text="message"></p>
        </div>

        <!-- Close Button -->
        <button @click="show = false" class="text-white/40 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>

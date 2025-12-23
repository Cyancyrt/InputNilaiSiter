{{-- resources/views/components/pagination.blade.php --}}
@props(['paginator'])

@if ($paginator->hasPages())
    <div class="mt-10 flex justify-center">
        <div class="glass-card p-2 rounded-2xl flex items-center gap-1">
            @if ($paginator->onFirstPage())
                <span class="p-2 text-slate-600"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg></span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="p-2 text-blue-400 hover:bg-white/10 rounded-xl transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg></a>
            @endif

            <div class="px-4 py-1 text-xs font-bold text-slate-300 border-x border-slate-700 uppercase">
                Hal {{ $paginator->currentPage() }} <span class="text-slate-500 mx-1">/</span> {{ $paginator->lastPage() }}
            </div>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="p-2 text-blue-400 hover:bg-white/10 rounded-xl transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></a>
            @else
                <span class="p-2 text-slate-600"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></span>
            @endif
        </div>
    </div>
@endif
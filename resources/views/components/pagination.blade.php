@if ($paginator->hasPages())
    <div id="Pagination" class="flex items-center justify-center gap-[14px] mt-10">
        @if ($paginator->onFirstPage())
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#0E0140]">
                &laquo;
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span
                    class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-[#0E0140] font-semibold">
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page"
                            class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold bg-[#7521FF] cursor-default shadow-[0_10px_20px_0_#7521FF66]">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#0E0140]">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="w-[38px] h-[38px] flex shrink-0 rounded-full justify-center items-center text-white font-semibold hover:bg-[#7521FF] transition-all duration-300 bg-[#0E0140]">
                &raquo;
            </a>
        @else
        @endif
    </div>
@endif

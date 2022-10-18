@if ($paginator->hasPages())
    <ul class="pager clearfix">
       
        @if ($paginator->onFirstPage())
            <li class="disabled page-item"><span>← Previous</span></li>
        @else
            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled page-item"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active page-item"><span>{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled page-item"><span>Next →</span></li>
        @endif
    </ul>
@endif 
<style>
    .pager{
        list-style: none;
        margin:30px 0 10px 0;
    }
    .page-item{
        float: left;
    }
    .my-active.page-item span{
        z-index: 3;
        color: #fff !important  ;
        background-color: #00ACD6 !important;
        border-color: #00ACD6 !important;
        border-radius: 50%;
        padding: 6px 12px;
    }
    .page-item a{
        z-index: 3;
        color: #00ACD6 !important;
        background-color: #fff;
        border: 1px solid #00ACD6 ;
        border-radius: 50%;
        padding: 6px 12px !important;
        
    }
    .page-item:first-child a{
        border-radius: 20px !important;
    }
    .page-item:last-child a{
        border-radius: 20px !important;   
    }
    .pager li{
        padding: 3px;
    }
    .disabled.page-item span{
        color: #212529 !important;
        opacity: 0.5 !important;
        border: 1px solid #212529;
        padding:6px 12px;
        border-radius: 20px;
    }
</style>
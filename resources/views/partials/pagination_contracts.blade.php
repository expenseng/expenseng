<div class="table-footer pagination1 d-flex align-items-center pagination1">
    <span class="text-muted">{{ $payments->firstItem() }} - {{ $payments->lastItem() }} of {{ $payments->total() }} results</span>
    @php
    $links = $payments->links();
    $pattern = $replacement = array();
    $pattern[] = '/'.$payments->currentPage().'\?page=/';
    $replacement[] = '';
    $customLinks = preg_replace($pattern, $replacement, $links);
    echo $customLinks;
    @endphp
</div>
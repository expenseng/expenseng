<div class="table-footer pagination1 d-flex align-items-center pagination1">
    <span class="text-muted">{{ $payments->firstItem() }} - {{ $payments->lastItem() }} of {{ $payments->total() }} results</span>
    {{ $payments->links() }} 
</div>
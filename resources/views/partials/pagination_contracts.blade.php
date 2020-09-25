<div class="table-footer pagination1 d-flex align-items-center pagination1">
    <span class="text-muted">{{ $payment->firstItem() }} - {{ $payment->lastItem() }} of {{ $payment->total() }} results</span>
    {{ $payment->links() }} 
</div>
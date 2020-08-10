<div class="table-footer pagination1 d-flex align-items-center pagination1">
    <span class="text-muted">{{ $contracts->firstItem() }} - {{ $contracts->lastItem() }} of {{ $contracts->total() }} results</span>
    {{ $contracts->links() }} 
</div>
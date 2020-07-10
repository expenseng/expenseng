<div class="table-footer d-flex align-items-center pagination1">
    <span>{{ $data->firstItem() }} - {{ $data->lastItem() }} of {{ $data->total() }} results</span>
    {{ $data->links() }}
</div>
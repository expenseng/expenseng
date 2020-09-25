<div class="d-flex justify-content-between table-footer w-100">
    <span>{{ $data->firstItem() }} - {{ $data->lastItem() }} of {{ $data->total() }} results</span>
    {{ $data->links() }}
</div>
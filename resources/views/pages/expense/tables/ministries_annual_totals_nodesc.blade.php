@if(count($miniTableData)> 0)
<div style="overflow-x: auto;">
    <table cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-bordered table-responsive-sm">
        <thead>
            <tr>
                <th class="active text-center text-white">YEAR</th>
                    @foreach($miniTableData['nondescriptive'] as $data)
                        <th class="text-center text-success">{{$data->year}}</th>
                    @endforeach              
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="ministry table-overflow">TOTAL AMOUNT</td>
                @foreach($miniTableData['nondescriptive'] as $data)
                    <td class="table-overflow">&#8358;{{ number_format($data->total, 2) }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endif
{{-- <div class="table-footer d-flex align-items-center pagination1">
    <span>{{ $collection['summary']->firstItem() }} - {{ $collection['summary']->lastItem() }} of {{ $collection['summary']->total() }} results</span>
    {{ $collection['summary']->links() }}
</div> --}}
<div style="overflow-x: auto;">
    <table cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm">
        <thead>
            <tr>
                <th class="section-shadow row-ministry">Ministry</th>
                <th class="row-project">Beneficiary</th>
                <th class="row-company">Purpose</th>
                <th class="row-amount">Amount</th>
                <th class="row-date">Date</th>
            </tr>
        </thead>
        <tbody>
            @if (count($collection['daily']) >0)
            @foreach ($collection['daily'] as $expense)
            @if($expense->ministry())
                <tr>
                    <td class="section-shadow">
                        {{-- @empty($expense->ministry())
                                {{ "null" }}
                        @else
                        <a href="{{ route('ministries.single', ['ministry' => strtolower($expense->ministry()['shortname']) ]) }}" class="text-success">
                            {{ucfirst($expense->ministry()['name'])}} 
                        </a>
                        @endempty --}}
                        <a href="{{ route('ministries.single', ['ministry' => strtolower($expense->ministry()['shortname']) ]) }}" class="text-success">
                            {{ucfirst($expense->ministry()['name'])}} 
                        </a>
                    </td>
                    <td><a href="{{ route('contractors.single', ['company' => str_replace(' ', '-', $expense->beneficiary) ]) }}">{{$expense->beneficiary}}</a></td>
                    @if($expense->description)
                    <td>{{$expense->description}}</td>
                    @else
                    <td class="text-danger">Not Stated</td>
                    @endif
                    <td>&#8358;{{ number_format($expense->amount) }}</td>
                    <td>{{ date('jS M, Y', strtotime($expense->payment_date))}}</td>
                </tr>
            @endif
            @endforeach
            @else
            <tr><td></td><td style="color:red">No data available for this period<td><td></td><td></td></tr>
            @endif
        </tbody>
    </table>
</div>
<div class="table-footer d-flex align-items-center pagination1">
    <span>{{ $collection['daily']->firstItem() }} - {{ $collection['daily']->lastItem() }} of {{ $collection['daily']->total() }} results</span>
    {{ $collection['daily']->links() }}
</div>


    <div style="overflow-x: auto;">
        <table cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th class="section-shadow row-ministry">Ministry</th>
                    <th class="row-project">Project</th>
                    <th class="row-company">Company</th>
                    <th class="row-amount">Amount</th>
                    <th class="row-date">Date</th>
                </tr>
            </thead>
            <tbody>
                @if (count($collection['summary']) >0)
                @foreach ($collection['summary'] as $expense)
                    <tr>
                        <td class="section-shadow">
                            @empty($expense->ministry())
                                {{ "null" }}
                            @else
                            <a href="{{ route('ministries.single', ['ministry' => strtolower($expense->ministry()['shortname']) ]) }}" class="text-success">
                                {{ ucfirst($expense->ministry()['name']) }}

                            </a>
                            @endempty
                        </td>
                        <td>{{$expense->description}}</td>
                        <td>{{$expense->beneficiary}}</td>
                        <td>&#8358;{{ number_format($expense->amount) }}</td>
                        <td>{{ date('d-m-Y', strtotime($expense->payment_date))}}</td>
                    </tr>
                @endforeach
                @else
                <tr><td></td><td style="color:red">No data available for this period<td><td></td></tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="table-footer d-flex align-items-center pagination1">
        <span>{{ $collection['summary']->firstItem() }} - {{ $collection['summary']->lastItem() }} of {{ $collection['summary']->total() }} results</span>
        {{ $collection['summary']->links() }}
    </div>



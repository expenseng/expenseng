<div style="overflow-x: auto;">
        <table cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-striped table-responsive-sm">
            <thead>
                <tr>
                    <th class="section-shadow row-ministry">Ministry</th>
                    <th class="row-project">Project</th>
                    <th class="row-company">Beneficiary</th>
                    <th class="row-amount">Amount</th>
                    <th class="row-date">Date</th>
                    <th>Share</th>
                </tr>
            </thead>
            <tbody>
                @if (count($collection['summary']) >0)
                    @foreach ($collection['summary'] as $expense)
                        @if($expense->ministry())
                            <tr>
                                <td class="section-shadow">
                                    {{-- @empty($expense->ministry())
                                        {{ "null" }}
                                    @else
                                    <a href="{{ route('ministries.single', ['ministry' => strtolower($expense->ministry()['shortname']) ]) }}" class="text-success">
                                        {{ ucfirst($expense->ministry()['name']) }}

                                    </a>
                                    @endempty --}}
                                
                                    <a href="{{ route('ministries.single', ['ministry' => strtolower($expense->ministry()['shortname']) ]) }}" class="text-success">
                                        {{ ucfirst($expense->ministry()['name']) }}

                                    </a>
                                
                                </td>
                                @if($expense->description)
                                <td>{{$expense->description}}</td>
                                @else
                                <td class="text-danger">Not Stated</td>
                                @endif
                                <td>{{$expense->beneficiary}}</td>
                                <td>&#8358;{{ number_format($expense->amount) }}</td>
                                <td>{{ date('jS M, Y', strtotime($expense->payment_date))}}</td>
                                <td>{!! Share::page(route('ministries.single', ['ministry' => strtolower($expense->ministry()['shortname']) ]))->facebook() ->twitter() ->whatsapp(); !!}</td>
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
        <span>{{ $collection['summary']->firstItem() }} - {{ $collection['summary']->lastItem() }} of {{ $collection['summary']->total() }} results</span>
        {{ $collection['summary']->links() }}
    </div>
    <br/>
    @if(count($miniTableData)> 0)
        <div style="overflow-x: auto;">
            <table cell-spacing="0" data-pagination="true" data-page-size="10" class="table table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th class="active text-center text-white">YEAR</th>
                            @foreach($miniTableData['all'] as $data)
                                <th class="text-center text-success">{{$data->year}}</th>
                            @endforeach              
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ministry table-overflow">TOTAL AMOUNT</td>
                        @foreach($miniTableData['all'] as $data)
                            <td class="table-overflow">&#8358;{{ number_format($data->total, 2) }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    @endif

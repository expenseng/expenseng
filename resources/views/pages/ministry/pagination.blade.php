
<div class="table-div">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Project</th>
                <th scope="col">Company</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
            </tr>
        </thead>

        <tbody id="expense-table">
            @if (count($payments) > 0)
                @php
                $back = true;
                @endphp
                @foreach($payments as $payment)
            
                @php
                $back = !$back;
                $shade = $back ? 'back': '';
                @endphp
                    <tr  class="{{$shade}}">
                        @if($payment->description)
                        <td>{{$payment->description}}</td>
                        @else
                        <td class="text-danger">Not Stated</td>
                        @endif
                        <td><a class="text-success" href="{{ route('contractors.single', ['company' => str_replace(' ', '-', $payment->beneficiary) ]) }}"><u>{{$payment->beneficiary}}</u></a></td>
                        <td> ₦{{number_format($payment->amount, 2)}}</td>
                        <td> {{date('jS, M Y', strtotime($payment->payment_date))}}</td>
                    </tr>
                @endforeach
        @else
            <tr><td></td><td style="color:red">No data available for this period<td><td></td></tr>  
        @endif
        
        </tbody>

    </table>

</div>
<div class="row centeri mzet-3 pt-3 pr-3 align-items-center">
    <span class="col-md result text-muted">{{ $payments->firstItem() }} - {{ $payments->lastItem() }} of {{ $payments->total() }} results</span>
    {{ $payments->links() }}
</div>


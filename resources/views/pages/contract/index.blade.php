@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('css/aboutus-header_footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/contract_page.css') }}">
<title>FG Expense - Contracts Page</title>
@endpush


@section('content')
<br />
<br />
<br />
<header class="container header"><!-- Breadcrumb start -->
	<header class="section-wrapper">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item not-active"><a href="{{ url('/') }}">HOME &nbsp;</a></li>
				<span>&#8226;</span>
				<li class="breadcrumb-item not-active"><a href="#">&nbsp; CONTRACTORS</a></li>
			</ol>
		</nav>
	</header>
</header>
	<section>
      <div class="container">
        <h1 class="ws-10 font-weight-bold">Contracted Companies and Organisations</h1>
        <br />
        <div class="row">
            <div class="col-md-5">
                <p class="para">ExpenseNG gives an insight to how much is being dispensed to contracted companies.</p>
                <h5>Subscribe to daily Expense Report</h5>
                <span>
                    @include('partials.modals.subscription')

                </span>
            </div>
        </div>
      </div>
        <br>
        <br>
        <div class="table-responsive pt-3">
          <h4 style="color: #00945E"><b>Federal Executive Council (FEC) Approved Contracts 2017</b></h4>
          <table class="table table-bordered">
           <thead class = "table table-dark">
             <tr>
              <th>
                S/N
              </th>
              <th>
                ITEM/SERVICE
              </th>
              <th>
                NAME OF COMPANY
              </th>
              <th>
                COST
              </th>
              <th>
                DURATION
              </th>
            </tr>
          </thead>
          @foreach ($companies as $row)
          <tbody>
            <tr>
              <td>{{ $row->id }}</td>
              <td>{{ $row->shortname }}</td>
              <td>{{ $row->industry }}</td>
              <td>{{ $row->ceo }}</td>
              <td>{{ $row->twitter }}</td>
            </tr> 
          </tbody>
          @endforeach
          </table>
        </div>
      <div style="background-color: #323E48; padding: 10px;">
        <h4 style="color: #00945E"><b>Federal Executive Council Approved Contracts</b></h4>
        <h6 style="color: #00945E">Click to Download</h6>
        <h5><a href="https://www.bpp.gov.ng/wp-content/uploads/2019/01/FEC-FY2016.pdf"; style="color: white;">FEC Approved Contracts 2016</a></h5>
        <h5><a href="https://bpp.gov.ng/wp-content/uploads/2019/01/FEC-MAY-20.pdf"; style="color: white;">FEC Approved Contracts 2015</a></h5>
        <h5><a href="https://bpp.gov.ng/wp-content/uploads/2019/01/FEC-2014-Approved-Contracts.pdf"; style="color: white;">FEC Approved Contracts 2014</a></h5>
        <h5><a href="https://bpp.gov.ng/wp-content/uploads/2019/01/FEC-APPROVED-CONTRACTS-JAN-MARCH-2013.pdf"; style="color: white;">FEC Approved Contracts 2013</a></h5>
        <h5><a href="https://www.bpp.gov.ng/wp-content/uploads/2019/01/FEC-APPROVED-CONTRACTS-FOR-FY-2012.pdf"; style="color: white;">FEC Approved Contracts 2012</a></h5>
        <h5><a href="https://www.bpp.gov.ng/wp-content/uploads/2019/01/FEC-APPROVED-CONTRACTS-FOR-FY-2011.pdf"; style="color: white;">FEC Approved Contracts 2011</a></h5>
        <h5><a href="https://www.bpp.gov.ng/wp-content/uploads/2019/01/FEC-APPROVED-CONTRACTS-FOR-FY-2010.pdf"; style="color: white;">FEC Approved Contracts 2010</a></h5>
        <h5><a href="https://www.bpp.gov.ng/wp-content/uploads/2019/01/FEDERAL_EXECUTIVE_COUNCIL_APPROVED_CONTRACTS_OCTOBER_7_2009.pdf"; style="color: white;">FEC Approved Contracts 2009</a></h5>
        <h5><a href="https://www.bpp.gov.ng/wp-content/uploads/2019/01/FEC-APPROVED-CONTRACTS-FOR-FY-2008-.pdf"; style="color: white;">FEC Approved Contracts 2008</a></h5>
        <h5><a href="https://www.bpp.gov.ng/wp-content/uploads/2019/01/FEC-APPROVED-CONTRACTS-FOR-FY-2007.pdf"; style="color: white;">FEC Approved Contracts 2007</a></h5>
      </div>
      <br />
      </div>
      @endsection

@section('js')
<script src="{{ asset('js/contract_page.js') }}" type="text/javascript"></script>
@endsection

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
          <tbody>
            <tr>
              <td>
                1
              </td>
              <td>
                Revised Estimated Total Cost 
                for the Constructions of 
                2X60MVA, 132/33KV 
                Substation at Odogunyan, 
                2X60MVA, 132/33KV 
                Substation at Ayobo, Ikeja 
                West-Ayobo 132KV D/C 
                Transmission Lines and 
                2X132KV Lines Bays Extension 
                at Ikeja West
              </td>
              <td> <a href="https://lagacepower.laga-group.com/">LAGA CE Power Limited </a></td>
              <td>N3,502,347,285.84</td>
              <td>3 Months</td>
            </tr>
            <tr>
              <td>
                2
              </td>
              <td>
                Award of contract for Soil 
                Erosion and Flood Control 
                Project in Kwoi Town, Jaba
                LGA, Kaduna State
              </td>
              <td>
                <a href="http://harrisdome.com/">Harris & 
                  Dome Nigeria Limited</a>
              </td>
              <td>
                N899,391,526.78
              </td>
              <td>9 Months</td>
            </tr>
            <tr>
              <td>
                3
              </td>
              <td>
                Award of contract for the 
                Development of IT Integrated 
                Automation and Interactive 
                Portal for the Ministry of 
                Mines and Steel Development
              </td>
              <td>
              <a href="">Westblue 
              Nigeria Limited</a>
              </td>
              <td>
                N732,966,461.03
              </td>
              <td>5 Months</td>
            </tr>
            <tr>
              <td>
                4
              </td>
              <td>
                Award of contract for the 
                completion of Sabke/Dutsi and 
                Mashi Water Supply Project in 
                Katsina State</td>
                <td><a href="http://www.branluebbeng.com/">Bran & 
                Luebbe Water 
                Engineers (Nig.) 
                Limited</a></td>
                <td>N1,735,272,435.33</td><td>18 months</td>
            <tr>
              <td>
                5
              </td>
              <td>
                Award of contract for Direct 
                Procurement and Acquisition 
                of Microsoft Office 365 
                Enterprise License by the 
                National Pension Commission
              </td>
              <td>
                <a href="https://www.microsoft.com/en-ie/aboutireland">Microsoft 
                Ireland</a>
              </td>
              <td>
                N164,300,086.92
              </td>
              <td> </td>
            </tr>
            <tr>
              <td>
                6
              </td>
              <td>
                Revised Estimated Total Cost 
                (RETC) of the contract for the 
                upgrade and rehabilitation of
                the Kaduna International Airport Terminal
              </td>
              <td>
                <a href="">Dari 
                Investment Limited</a>
              </td>
              <td>
                N1,164,523,063.09
              </td>
              <td>6 Months</td>
            </tr>
            <tr>
              <td>
                7
              </td>
              <td>
                Award of contract for the Early 
                Works IV (EW IV) of the second 
                Niger Bridge project linking 
                Anambra and Delta States
              </td>
              <td>
                <a href="https://www.julius-berger.com/">Julius Berger 
                  Nigeria Limited</a>
              </td>
              <td>
                N14,446,010,410.16
              </td>
              <td>9 Months</td>
            </tr>
            <tr>
              <td>
                8
              </td>
              <td>
                Award of contract for the 
                Emergency Repairs of 
                Tamburawa Bridge along 
                Kano-Kaduna Dual 
                Carriageway
              </td>
              <td><a href="">Borini Prono 
                & Co. Nigeria Limited</a></td>
              <td>N1,898,456,175.00</td>
              <td>12 Months</td>
            </tr>
            <tr>
              <td>
                9
              </td>
              <td>
                Award of contract for the 
                Procurement and supply of 
                700 Tons of Alum and 1000 
                Drums of High Test 
                Hypochlorite (HTH) for water treatment to the FCT Water Board
              </td>
              <td>
              <a href="">Mudpha 
                International Ltd</a>
              </td>
              <td>
                N225,200,000.00
              </td>
              <td>4 Weeks</td>
            </tr>
            <tr>
              <td>
                10
              </td>
              <td>
                Revised Estimated Total Cost 
                for the Engineering Design, 
                Manufacture, Supply, 
                Construction and 
                Commissioning of the 
                2X30/40MVA, 132/33KV 
                Substation at Walalambe and 
                tur In and Out of Dan-Agundi 
                Dakata 132KV Transmission 
                Line in Kano State
              </td>
              <td>
                <a href="">GIT 
                    Engineering Limited</a>
              </td>
              <td>
                €3,975,089.73 Plus 
                5,319,921.33
              </td>
              <td>10 Months</td>
            </tr>
            <tr>
              <td>
                11
              </td>
              <td>
                Approved the procurement of 
                2Nos. Multipurpose Drilling 
                Rigs</td>
                <td><a href="">Total 
                  Advance Services Ltd</a></td>
                <td>N807,650,646.00</td><td>8 Weeks</td>
            <tr>
              <td>
                12
              </td>
              <td>
                Award of contract for the 
                furnishing of the Federal 
                Secretariat, Gombe, Gombe 
                State       
              </td>
              <td>
                <a href="">Muhsin Nig. 
                  Ltd</a>
              </td>
              <td>
                N595,345,712.58
              </td>
              <td>12 Weeks</td>
            </tr>
            <tr>
              <td>
                13
              </td>
              <td>
                Award of contract for the 
                construction of Federal 
                Secretariat Complex Ado-Ekiti, 
                in Ekiti State
              </td>
              <td>
                  <a href="http://deuxproject.com/">Deux Projects 
                  Nigeria Limited</a>
              </td>
              <td>
                N3,340,608,368.07
              </td>
              <td>88 Weeks</td>
            </tr>
            <tr>
              <td>
                14
              </td>
              <td>
                Award of contract for the 
                extension of the Lagos-Ibadan 
                segment of Lagos-Kano 
                Railway Modernization Project 
                form its terminal point at 
                Ebutte-Metta to the Lagos Port 
                Complex at Apapa
              </td>
              <td>
                  <a href="http://www.ccecc.com.cn/col/col7669/index.html">China Civil 
                  Engineering 
                  Construction 
                  Corporation (CCECC)</a>
              </td>
              <td>
                USD1,267,317,586.10
              </td>
              <td>36 Months</td>
            </tr>
            <tr>
              <td>
                15
              </td>
              <td>
                Award of contract for a Direct
                Procurement of 40 units of 
                IVM double carrier pick-up 
                Vehicles
              </td>
              <td><a href="https://www.innosonvehicles.com/">Innoson Vehicle 
                  Manufacturing Co. 
                  Ltd</a></td>
              <td>N299,607,000.00</td>
              <td>30 Days</td>
            </tr>
            <tr>
              <td>
                16
              </td>
              <td>
                Award of contract for a Direct 
                Procurement of 27 units of 
                Peugeot 301 Access Vehicles
              </td>
              <td>
                <a href="https://www.peugeotnigeria.com/">Peugeot Automobile 
                  Nigeria (PAN) Ltd</a>
              </td>
              <td>
                N164,910,826.21
              </td>
              <td>30 Days</td>
            </tr>
            <tr>
              <td>
                17
              </td>
              <td>
                Award of contract for the 
                procurement of 38Nos. Nissan 
                NP 300 Pick-up 4 Wheel Drive 
                vehicles
              </td>
              <td>
                <a href="https://stalliongroup.com/">Stallion NMN 
                Limited</a>
              </td>
              <td>
                N326,781,000.00
              </td>
              <td>3 Weeks</td>
            </tr>
            <tr>
              <td>
                18
              </td>
              <td>
                Refurbishment of Port 
                Harcourt International Airport 
                Terminal Building Phase II</td>
                <td><a href="https://inter-bau.com.ng/">Inter Bau 
                    Construction Limited</a></td>
                <td>N1,411,662,855.57</td><td>16 Weeks</td>
            <tr>
              <td>
                19
              </td>
              <td>
                Upgrade and Rehabilitation of 
                Terminal Building 
                (International Wing) at Port 
                Harcourt International Airport)
              </td>
              <td>
                <a href="https://inter-bau.com.ng/">Inter Bau 
                Construction Limited</a>
              </td>
              <td>
                N1,684,052,319.58
              </td>
              <td>16 Weeks</td>
            </tr>
            <tr>
              <td>
                20
              </td>
              <td>
                Award of contract for 
                additional works for the 
                215MW Kaduna Power Plant 
                project
              </td>
              <td>
                <a href="">General 
                  Electric/Rockson 
                  Engineering Limited</a>
              </td>
              <td>
                From 
                €135,840,665.71 
                Plus
                N6,066,626,449.24
              </td>
              <td>6 Months</td>
                </tr>
            </tbody>
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

@extends('layouts.master')

@push('css')
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
  <link rel="stylesheet" href="{{asset('css/faq.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>

  <title>FG Expense - FAQ</title>
@endpush


@section('content')
    <div class="container faq">
      {{ Breadcrumbs::render('FAQ') }}
        <h1>FAQ</h1>

        <h4>What is ExpenseNG?</h4>
        <p class="para">ExpenseNG is a not-for-profit, nonpartisan civic initiative with the single most comprehensive and understandable source of government data. <a href="#"> Learn more about USAFacts and how we operate here.</a></p>

        <h4>Will ExpenseNG always be free? Are there plans for a paid premium version?</h4>
        <p>We’re here to provide free access to government data for everyone, no paywalls needed. As long as ExpenseNG exists, it will be free.</p>

        <h4>Can I use your data? Do I need to credit ExpenseNG?</h4>
        <p>You can absolutely use our data! It’s really your data. It is shared under a Creative Commons license and we do ask that you credit ExpenseNG when using our curated material. We also love to see what users create – be sure to tag us @ExpenseNG on Twitter, Facebook, and Instagram.</p>

        <h4>Can I upload my own datasets to the ExpenseNG website?</h4>
        <p>We offer curated data from government sources. For that reason, we do not accept crowd-sourced datasets. However, we’re always interested in learning about potential government data sources. Please email info@expenseng.com if you have data to recommend.</p>

        <h4>How is ExpenseNG funded?</h4>
        <p>ExpenseNG is privately funded by HNG. Although we may accept contributions from external donors in form of donations, grants, etc.), we’re completely nonpartisan and don’t answer to a board.
        We do not make grants and we do not advocate for any views of HNGr except for one: that facts matter and public data should be available and understandable.</p>

        <h4>How often is your data updated?</h4>
        <p>We completely refresh the data on our website and in our reports once a year, with monthly data updates as new data is released by government agencies</p>

        <h4>Why do you only use government data?</h4>
        <p>We rely solely on government data for consistency and to screen for bias. Data curated by think tanks, academics, or any outlet expressing a viewpoint about the data is not reliably nonpartisan. The Nigerian government has a network of statistical agencies tasked with collecting information on government operations and the Nigerian population. We believe this is the best source for data to make important decisions. However, government data is not perfect. ExpenseNG also advocates for higher-quality and more timely government data.</p>

        <h4>Why is some of your data old?</h4>
        <p>We publish the most up-to-date government numbers available. Due to funding or staffing levels, collection and release of data can also have a significant delay. For example a ministry may not have any data concerinig there expense on there public treasury site for the month of May through August.</p>

        <h4>Not all government data is created equal. How do you address reliability and quality issues?</h4>
        <p>While government data is not perfect, we believe it is the best source for verifiable information about Nigeria. Most government data is collected by career agency statisticians who work throughout, and independently of, various administrations. ExpenseNG includes collection issue information, such as the last date data has been reported and the number of reporting jurisdictions. ExpenseNG is working with government agencies and Congress to improve the quality and timeliness of published data.</p>

        <h4>Do you provide government data for other countries?</h4>
        <p>We do not provide data for countries other than Nigeria.</p>

        <h4>Why do your financial figures sometimes differ from other government sources?</h4>
        <p>Multiple agencies collect and publish financial data for the Nigerian government, including the Department of the Treasury, Federal Reserve, and Office of Management and Budget. Figures can vary between agencies depending on how they collect data or classify certain financial assets. For instance, the Federal Reserve and the Treasury Department treat Social Security and pension obligations quite differently.</p>
    </div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
<script src="{{asset('/js/index.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection


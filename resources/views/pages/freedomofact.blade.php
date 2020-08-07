@extends('layouts.master')

@push('css')
  <link rel="stylesheet" href="{{asset('css/breadcrumb.css') }}">
  <link rel="stylesheet" href="{{asset('css/freedomofact.css') }}">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174166304-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174166304-1');
</script>
  <title>FG Expense - Freedom of Infromation Act</title>
@endpush


@section('content')
  <div class="wrapper">
    <div class="container content">
      {{ Breadcrumbs::render('FOIA') }}
        <h1>Freedom Of Information Act</h1>

        <div class="conditions">
            <p>
                Freedom of Information Act
            </p>
            <p>
                If your FOIA request is related to information concerning the Department of the Treasury, Bureau of the Fiscal Service,
                please visit the <a href="#" class="link">CBN FOIA site</a> or <a href="#" class="link">download the PDF</a>
            </p>

            <p class="pdf-link">
               or Copy link: <a href="https://www.cbn.gov.ng/FOI/Freedom%20Of%20Information%20Act.pdf" class="link long-link">https://www.cbn.gov.ng/FOI/Freedom%20Of%20Information%20Act.pdf</a>
            </p>
        </div>


        <h1 id='disclaimer'>Disclaimer</h1>

        <div class="conditions" >
            <p>
                Disclaimer
            </p>
            <p>
            Some information on Expenseng may create an unreasonable risk for readers who choose to apply or use the information in their own activities or to promote the information for use by third parties.</p><br>

            <p>None of the authors, contributors, administrators, vandals, or anyone else connected with Expenseng, in any way whatsoever, can be responsible for your use of the information contained in or linked from these web pages.</p><br>

           <p> Please take all steps necessary to ascertain that information you receive from Expenseng is correct and has been verified. Check the references at the end of the article. Read the article's talk page and revision h to see if there are outstanding disputes over the contents of the article. Double-check all information with independent sources.</p><br>

            <p>If an article contains suggestions regarding dangerous, illegal or unethical activities, remember that anyone can post this information on Expenseng. The authors may not be qualified to provide you with complete information or to inform you about adequate safety precautions and other measures to prevent injury, or other damage to your person, property or reputation. If you need specific advice (for example, medical, legal, financial, marital or risk management) please seek a professional licensed or knowledgeable in that area.</p><br>

            <p>Expenseng is not uniformly peer reviewed; while readers may correct errors or remove erroneous suggestions, they have no legal duty to do so. All information found on the site is without any implied warranty of fitness for any purpose or use whatsoever.</p><br>

            <p>No consequential damages can be sought against Expenseng, as it is a voluntary association of individuals formed to create freely licensed online educational, cultural and informational resources. This information is being given to you gratuitously and there is no agreement or understanding between you and Expenseng regarding your use or modification of this information beyond the Creative Commons Attribution-Sharealike 3.0 Unported License (CC BY-SA) and the GNU Free Documentation License (GFDL).</p><br>

            <p>DO NOT RELY UPON ANY INFORMATION FOUND IN EXPENSENG WITHOUT INDEPENDENT VERIFICATION.</p><br>
              
            <p>
                If your Report request is related to information concerning the Department of the Treasury, Bureau of the Fiscal Service,
                please visit the <a href="https://opentreasury.gov.ng " class="link">Federal Government Opentreasury site</a>
            </p>
        </div>
    </div>
  </div>


@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
<script src="{{asset('/js/index.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection


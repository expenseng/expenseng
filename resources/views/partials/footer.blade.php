<!-------------Footer starts here-------------->
<footer class="my-footer">
    <div class="footer">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-md-3 footer-brand pt-2 d-flex flex-column">
                    <a href="{{ url('/') }}">
                        <img src=" {{asset('images/Frame 390.svg')}}" class="ft" alt="Logo">
                    </a>
                    <a href="https://twitter.com/expenseng" class="pt-3 footer-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> @expenseng</a>
                </div>

                <div class="col-md-7 section-pages-link d-flex justify-content-md-end justify-content-sm-around pt-4 pb-5">
                    <div class="footer-first mr-4 mr-lg-5">
                        <h6>Pages</h6>
                        <ul >
                            <li class="section-footer-links">
                                <a  href="/">Home</a>
                            </li>
                            <li class="section-footer-links">
                                <a  href="{{ route('ministries') }}" target="_blank">Ministries</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('contractors') }}" target="_blank">Contractors</a>
                            </li>
                        </ul>

                    </div>
                    <div class="footer-second mr-4 mr-lg-5">
                        <h6>Profile</h6>
                        <ul>
                            <li class="section-footer-links">
                                <a  href="{{ route('expense.reports') }}" target="_blank">Expenditure Report</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('expense.ministry') }}" target="_blank">Ministry Spending</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-third mr-4 mr-lg-5">
                        <h6>Reference</h6>
                        <ul >
                            <li class="section-footer-links">
                                <a href="{{ route('about') }}" target="_blank">About us</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('contact') }}" target="_blank">Contact us</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('handles') }}" target="_blank">Government Twitter handles</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('login') }}" target="_blank">Admin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-2">
        <div class="container">
            <div class="row footer-last p-2">
                <div class="col-md-9">
                    <a href="/accessibility" target="_blank">Accessibility</a>
                    <a href="/privacy" target="_blank"> | Privacy Policy</a>
                    <a href="/FOIA" target="_blank"> | Freedom of Information Act</a>
                    <a href="/faq" target="_blank"> | FAQ</a>
                </div>
                <div class="col-md-3">
                    <a href="" target="_blank"><span>&#169</span>2020EXPENSENG.com</a>
                </div>
            </div>
        </div>
    </div>
</footer>

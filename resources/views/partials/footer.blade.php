<!-------------Footer starts here-------------->
<footer class="my-footer">
    <div class="footer">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-md-3 footer-brand pt-2 d-flex flex-column">
                    <a href="{{ url('/') }}">
                        <img src=" {{asset('images/Frame 390.svg')}}" class="ft" alt="Logo">
                    </a>
                    <a href="https://twitter.com/expenseng" class="pt-3 footer-twitter" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i> @expenseng</a>
                </div>

                <div class="col-md-7 section-pages-link d-flex justify-content-md-end justify-content-sm-around pt-4 pb-5">
                    <div class="footer-first mr-4 mr-lg-5">
                        <h6>Pages</h6>
                        <ul >
                            <li class="section-footer-links">
                                <a  href="/">Home</a>
                            </li>
                            <li class="section-footer-links">
                                <a  href="{{ route('ministries') }}">Ministries</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('contractors') }}">Contractors</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('blogetc.index') }}">Blog</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('teams') }}">Our Team</a>
                            </li>

                        </ul>

                    </div>
                    <div class="footer-second mr-4 mr-lg-5">
                        <h6>Reports</h6>
                        <ul>
                            <li class="section-footer-links">
                                <a  href="{{ route('expense.reports') }}">Expenditure Report</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('expense.ministry') }}">Ministry Spending</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-third mr-4 mr-lg-5">
                        <h6>Reference</h6>
                        <ul >
                            <li class="section-footer-links">
                                <a href="{{ route('about') }}">About us</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('contact') }}">Contact us</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('handles') }}">Government Twitter handles</a>
                            </li>
                            <li class="section-footer-links">
                                <a href="{{ route('login') }}">Admin</a>
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
                    <a href="/accessibility">Accessibility</a>
                    <a href="/privacy"> | Privacy Policy</a>
                    <a href="/FOIA"> | Freedom of Information Act</a>
                    <a href="/FOIA#disclaimer"> | Disclaimer</a>
                    <a href="/faq"> | FAQ</a>
                </div>
                <div class="col-md-3">
                    <a href=""><span>&#169</span>2020EXPENSENG.com</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- 1st Column: Pet Sitting -->
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                <h2 class="footer-heading">Pet Sitting</h2>
                <p>We provide a safe and comfortable environment for your pets. Our dedicated team ensures your pets are happy and healthy. Contact us for more information about our services. </p>
                <ul class="ftco-footer-social p-0">
                    <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                </ul>
            </div>

            <!-- 2nd Column: Quick Links -->
            <div class="col-md-6 col-lg-4 pl-lg-5 mb-4 mb-md-0">
                <h2 class="footer-heading">Quick Links</h2>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="py-2 d-block">Home</a></li>
                    <li><a href="{{ route('user.about') }}" class="py-2 d-block">About</a></li>
                    <li><a href="{{ route('user.services-page') }}" class="py-2 d-block">Services</a></li>
                    <li><a href="{{ route('user.blog') }}" class="py-2 d-block">Blog</a></li>
                    <li><a href="{{ route('user.contact') }}" class="py-2 d-block">Contact</a></li>
                </ul>
            </div>

            <!-- 3rd Column: Contact Info -->
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                <h2 class="footer-heading">Contact Info</h2>
                <div class="block-23 mb-3">
                    <ul>
                        <li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                        <li><a href="tel:+1235235598"><span class="icon fa fa-phone"></span><span class="text">+1 235 2355 98</span></a></li>
                        <li><a href="mailto:petsetting@gmail.com"><span class="icon fa fa-envelope"></span><span class="text">petsetting@gmail.com</span></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">

                <p class="copyright mb-0">
                    &copy; {{ now()->year }} Pet-Sitting. All rights reserved 
                    <i class="fa fa-paw ml-2" style="color:#00bd56;" aria-hidden="true"></i>
                </p>
            </div>
        </div>
    </div>
</footer>



{{-- <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
    <h2 class="footer-heading">Latest News</h2>
    @foreach($latestBlogs as $blog)
<div class="block-21 mb-4 d-flex">
    <a href="{{ route('user.single_blog', $blog->id) }}" class="blog-img mr-4" style="background-image: url({{ asset($blog->image) }});"></a>
<div class="text">
    <h3 class="heading"><a href="{{ route('user.single_blog', $blog->id) }}" style="font-size: 75%;">{{ $blog->description ?? null }}</a></h3>
    <div class="meta">
        <div><a href="#"><span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($blog->date)->format('F d, Y') ?? null }}</a></div>
        <div><a href="#"><span class="icon-person"></span> {{ $blog->name ?? null }}</a></div>
        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
    </div>
</div>
</div>
@endforeach
</div> --}}

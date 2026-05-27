<!-- Loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
    </svg>
</div>

<!-- Core JS -->
<script src="{{ asset('page/js/jquery.min.js') }}"></script>
<script src="{{ asset('page/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('page/js/popper.min.js') }}"></script>
<script src="{{ asset('page/js/bootstrap.min.js') }}"></script>

<!-- Plugin JS -->
<script src="{{ asset('page/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('page/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('page/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('page/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('page/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('page/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('page/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('page/js/scrollax.min.js') }}"></script>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('page/js/google-map.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>

<script>
    var urlComment = @json(route('comment'));

    $(document).ready(function () {
        toastr.options.closeButton = true;
        toastr.options.timeOut = 3000;

        @if(session('success'))
            toastr.success(@json(session('success')));
        @endif

        @if(session('error'))
            toastr.error(@json(session('error')));
        @endif

        setTimeout(function () {
            toastr.clear();
        }, 3000);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

<!-- Main JS -->
<script src="{{ asset('page/js/main.js') }}"></script>
<script src="{{ asset('page/js/tour.js') }}"></script>
<script src="{{ asset('page/js/comment.js') }}"></script>
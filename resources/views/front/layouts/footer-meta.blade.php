<script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front_assets/js/all.js') }}"></script>
<script src="{{ asset('front_assets/js/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="{{ asset('front_assets/js/aos.js') }}"></script>
<script src="{{asset('backend_assets/js/sweetalert.js')}}"></script>
<script>
    AOS.init();
</script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
    $(".btn-elipse-mobile").click(function (){
        $("#name").focus();
    })
</script>
<script>

</script>

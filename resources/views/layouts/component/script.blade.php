 <!-- Bootstrap JS -->
 <script src="{{ asset('theme/assets/js/bootstrap.bundle.min.js') }}"></script>
 <!--plugins-->
 <script src="{{ asset('theme/assets/js/jquery.min.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/jquery-knob/excanvas.js') }}"></script>
 <script src="{{ asset('theme/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>


 <script src="{{ asset('theme/assets/js/index.js') }}"></script>
 <!--app JS-->
 <script src="{{asset('assets/sweetalert2/sweetalert2.all.min.js')}}"></script>
 <script src="{{ asset('theme/assets/js/app.js') }}"></script>
 <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>

 <script>
    $(function() {
        $(".knob").knob();
    });

    $('.dropify').dropify({
            messages: {
                'default': 'Minimum image size 1 MB',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Oops! Something wrong happened.'
            }

        });

</script>

@stack('script')

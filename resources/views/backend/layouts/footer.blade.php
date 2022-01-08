@section('footer')
    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Laravel11am <a href="{{route('dashboard')}}">My project</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src="{{url('backend-assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{url('backend-assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('backend-assets/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{url('backend-assets/vendors/nprogress/nprogress.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{url('backend-assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{url('backend-assets/vendors/google-code-prettify/src/prettify.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{url('backend-assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('backend-assets/build/js/custom.min.js')}}"></script>
    <script src="{{url('backend-assets/custom/custom.js')}}"></script>

    </body>
    </html>
@endsection

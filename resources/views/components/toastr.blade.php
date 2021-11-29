<div>
    @if(session()->has('success'))
    <script>
        toastr.success("{{session()->get('success')}}");
    </script>
    @elseif(session()->has('error'))
    <script>
        toastr.error("{{session()->get('error')}}");
    </script>
    @endif

    <!-- 
        https://codeseven.github.io/toastr/demo.html
     -->

    <!-- 
            // for info - blue box
            toastr.info('Page Loaded!');
    // for success - green box
    toastr.success('Success messages');

    // for errors - red box
    toastr.error('errors messages');

    // for warning - orange box
    toastr.warning('warning messages');
     -->
</div>
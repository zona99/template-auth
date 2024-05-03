@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible show fade" id="success-alert">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    </div>
@endif

@push('scripts')

    <script>
        $(document).ready(function() {
            $("#success-alert").hide();
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        });
    </script>
@endpush

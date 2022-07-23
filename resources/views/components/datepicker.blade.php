<div class="mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Select your date range</h1>
        <p class="col-md-8 fs-4">Using this you can search free rooms...
        </p>
        <form method="GET" action="{{ route('list') }}">
            <input type="text" name="date-range" value="{{ $date_range }}" />
            <button class="btn btn-primary btn-sm" type="submit">Search</button>
        </form>
    </div>
</div>
<script>
    $(function() {
        $('input[name="date-range"]').daterangepicker({
            opens: 'left'
        }, function(start, end) {
            let dateRangeStr = start.format('m/d/Y') + ' - ' + end.format('m/d/Y')
            $('input[name="date-range"]').val(dateRangeStr);
        });
    });
</script>

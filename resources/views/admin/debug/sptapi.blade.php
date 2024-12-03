@extends('Layouts.Admin')

@section('content')
<input type="text" id="api_path" placeholder="/?" />
<h1>Response:</h1>
<pre id="api_response"></pre>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("====== Application start ======");
        document.getElementById('api_path').addEventListener('change', apiRequest);
    });
    function apiRequest() {
        let path = $('#api_path').val();
        axios.post(`{{route('api.spt.dynamic')}}`, {'path': path})
        .then(function (response) {
            let data = response.data;
            console.log(data);
            $('#api_response').html(JSON.stringify(data, null, 2));
        })
        .catch(function (error) {
            $('#api_response').html('Error loading data');
            console.log(error);
        });
    }
</script>
@endpush

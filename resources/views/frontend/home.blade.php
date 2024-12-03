@extends('Layouts.Guest')

@section('content')
<h1>Raids:</h1>
<div id="raid_list"></div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log("====== Application start ======");
        loadRaids();
    });
    function loadRaids() {
        axios.get(`{{route('api.spt.fika.raids')}}`)
        .then(function (response) {
            let data = response.data;
            console.log(data);
            let html = '<ul>';
            if (data.length === 0) {
                html += '<li>No raids found</li>';
            } else {
                data.forEach(function(raid) {
                    html += '<li>' + raid.name + '</li>';
                });
            }
            html += '</ul>';
            $('#raid_list').html(html);
        })
        .catch(function (error) {
            $('#raid_list').html('Error loading raids');
            console.log(error);
        });
    }
</script>
@endpush

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>

            </style>
        @endif
    </head>
<body>
    <h1>Raids:</h1>
    <div id="raid_list"></div>
</body>
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
</html>

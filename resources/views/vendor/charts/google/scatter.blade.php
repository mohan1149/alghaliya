<script type="text/javascript">
    chart = google.charts.setOnLoadCallback(drawChart)

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            [
                'Element', "{!! $model->element_label !!}"],
                @for ($i = 0; $i < count($model->values); $i++)
                    ["{!! $model->labels[$i] !!}", {{ $model->values[$i] }}],
                @endfor
        ])

        var options = {
            @include('charts::_partials.dimension.js')
            fontSize: 12,
            @include('charts::google.titles')
            @include('charts::google.colors')
            @if(!$model->legend)
            legend: null
            @else
            legend: { position: 'top', alignment: 'end' }
            @endif
        };

        var chart = new google.visualization.ScatterChart(document.getElementById("{{ $model->id }}"))

        chart.draw(data, options)
    }
</script>

@if(!$model->customId)
    @include('charts::_partials.container.div')
@endif

@extends('decorators.admin.index')
@section('content')
<div id="container" style="width: 100%;height: 100%;margin: 0;padding: 0;">
</div>
@endsection

@section('script')
<script>
    anychart.onDocumentReady(function () {

    // create data
    var data = [
    @foreach($dl as $key=>$value)
      ["{{$key}}", {{number_format($value,0,"","")}}],
	@endforeach      
    ];

    // set the chart type
    var chart = anychart.line();

    // create a series, set the data and name
    var series = chart.column(data);
    series.name("Sales");

    // enable and configure labels on the series
    series.labels(true);
    series.labels().fontColor("green");
    series.labels().fontWeight(900);

    // set the chart title
    chart.title("Biểu đồ thống kê doanh thu");

    // set the titles of the axes
    chart.xAxis().title("");
    chart.yAxis().title("");

    // set the container id
    chart.container("container");

    // initiate drawing the chart
    chart.draw();
});
</script>
@stop


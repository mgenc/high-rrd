(function($) {

  //Define rrdChart plugin
  $.fn.rrdChart = function() {

    var div = $(this).attr('id');

    var options = {
      chart: {
        renderTo: div,
        type: 'line'
      },
      title: {
        text: 'Network Traffic'
      },
      tooltip: {
        enabled: false
      },
      xAxis: {
        type: 'datetime'
      },
      yAxis: {
        title: {
          text: ''
        }
      },
      plotOptions: {
        series: {
          animation: false
        }
      },
      series: []
    };

    $.getJSON('get_rrd.php', function(data) {

      var datas = new Array();

      var RRD_start = data.start * 1000;
      var RRD_interval = data.step * 1000;

      $.each(data.data, function(key, val) {

        $.each(val, function(key, val) {
          datas.push(val);
        });

        new_serie = {
          name: key,
          pointInterval: RRD_interval,
          pointStart: RRD_start,
          lineWidth: 1,
          marker: {
            radius: 0
          }
        } 

        new_serie.data = datas;
        options.series.push(new_serie);

        datas = [];

      });

      chart = new Highcharts.Chart(options);

    });

    //Return Jquery Object
    return this;

  };
})(jQuery);

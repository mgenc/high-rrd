(function($) {

  //Define rrdChart plugin
  $.fn.rrdChart = function(host, plugin) {

    var div = $(this).attr('id');

    var options = {
      chart: {
        renderTo: div,
        type: 'line'
      },
      title: {
        text: host + ' / ' + plugin
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

    $.getJSON('get_rrd.php?host='+host+'&plugin='+plugin, function(data) {

      var datas = new Array();

      $.each(data, function(rrd_name, rrd_file) {

        var RRD_start = rrd_file.start * 1000;
        var RRD_interval = rrd_file.step * 1000;

        $.each(rrd_file.data, function(serie_name, serie_data) {

          $.each(serie_data, function(key, val) {
            datas.push(val);
          });

          if (serie_name=='value') {
            serie_name = rrd_name;
          } else {
            serie_name = rrd_name + '/' + serie_name;
          }

          new_serie = {
            name: serie_name,
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

      });

      chart = new Highcharts.Chart(options);

    });

    //Return Jquery Object
    return this;

  };
})(jQuery);

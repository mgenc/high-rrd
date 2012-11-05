$(document).ready(function() {

  var hosts;

  //Get list of hosts and plugins
  $.getJSON('get_hosts.php', function(data) {

    hosts = data;

    $.each(hosts, function(key, val) {

     $('#hosts')
         .append($("<option></option>")
         .attr("value",key)
         .text(key)); 

    })

  }).error(function() {

    alert("Error while loading hosts list!");

  });

  //Refresh plugins list on host selection
  $('#hosts').change(function() {

    $('#plugins')
      .find('option')
      .remove()
      .end()
      .append($("<option></option>")
      .attr("value","all")
      .text("All plugins"));

    $.each(hosts[$(this).val()], function(key, val) {

      $('#plugins')
        .append($("<option></option>")
        .attr("value",key)
        .text(key));

    });

  });

  //Display charts
  $('#btn_display').click(function() {

    $('#charts').empty();

    cpt_charts=0;
    cpt_chart_rows=0

    if ($('#plugins').val()=='all') {

      $.each(hosts[$('#hosts').val()], function(key, val) {

        if (cpt_charts%3 == 0) {
          cpt_chart_rows++;
          $('#charts').append($('<div id="chart-row-'+cpt_chart_rows+'" class="row-fluid"></div>'));
        }

        $('#chart-row-'+cpt_chart_rows).append($('<div id="chart-'+key+'" class="span4" style="height:400px;"></div>'));
        $('#chart-'+key).rrdChart($('#hosts').val(), key);
        cpt_charts++;

      });

    } else {

        $('#charts').append($('<div id="chart1" class="span12" style="height:700px;"></div>'));

        $('#chart1').rrdChart($('#hosts').val(), $('#plugins').val());

    }

  });

}); //document.ready

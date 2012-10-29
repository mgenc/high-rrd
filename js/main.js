$(document).ready(function() {

  var hosts;

  $.getJSON('get_hosts.php', function(data) {

    hosts = data;

    $.each(hosts, function(key, val) {

     $('#hosts')
         .append($("<option></option>")
         .attr("value",key)
         .text(key)); 

    });

  });

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


  $('#btn_display').click(function() {

    //$.each(hosts[$('#hosts').val()][$('#plugins').val()], function(key, val) {

      $('#charts').append($('<div id="chart1" class="span10" style="height:600px;"></div>'));

      $('#chart1').rrdChart($('#hosts').val(), $('#plugins').val());

    //});

  });



}); //document.ready

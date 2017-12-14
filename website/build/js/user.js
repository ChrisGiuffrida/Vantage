function init_morris_charts() {
    
    if( typeof (Morris) === 'undefined'){ return; }
    console.log('init_morris_charts');
    
    if ($('#user_processes').length){ 
    
        Morris.Bar({
          element: 'user_processes',
          data: 
          [
            {'Day of Week': 'Sunday', Processes: <?php echo $data["user_graph"][0] ?>},
            {'Day of Week': 'Monday', Processes: 655},
            {'Day of Week': 'Tuesday', Processes: 275},
            {'Day of Week': 'Wednesday', Processes: 1571},
            {'Day of Week': 'Thursday', Processes: 655},
            {'Day of Week': 'Friday', Processes: 2154},
            {'Day of Week': 'Saturday', Processes: 1144}
          ],
          xkey: 'Day of Week',
          ykeys: ['Processes'],
          labels: ['Processes'],
          barRatio: 0.4,
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          xLabelAngle: 35,
          hideHover: 'auto',
          resize: true
        });

    }
};	




$(document).ready(function() {
    //init_morris_charts();
});
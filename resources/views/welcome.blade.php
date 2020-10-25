<!DOCTYPE html>
<html lang="en">

<?php
	$events = DB::table('events')->get();
	$alldates = [];
	
	$start_date = $events[0]->start_date;
	$end_date = $events[0]->end_date;

	while (strtotime($start_date) <= strtotime($end_date)) 
	{
		$timestamp = strtotime($start_date);
		$day = date('w', $timestamp);
		
		$selectedEvents = explode(",",$events[0]->weekdays);
		if(in_array($day, $selectedEvents))
		{
			$alldates[] = $start_date;
		}
		
		$start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
	}
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calendar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="/plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="/plugins/fullcalendar-bootstrap/main.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="sidebar-mini sidebar-collapse Fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary"></aside> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
					<form method="post" action="/process" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Event:</label><br>
							<div class="col-sm-12">
							  <input type="text" class="form-control" name="event">
							</div>
						</div>
					
						<div class="form-group">
							<label>From:</label>
							<div class="input-group date">
								<input type="date" name="startdate" class="form-control datetimepicker-input" data-target="#reservationdate"/>
							</div>
						</div>
						
						<div class="form-group">
							<label>To:</label>
							<div class="input-group date">
								<input type="date" name="enddate" class="form-control datetimepicker-input" data-target="#reservationdate"/>
							</div>
						</div>
						
						<!-- checkbox -->
						<div class="form-group">
						  <div class="icheck-primary d-inline">
							<input type="checkbox" value="0" name="weekdays[]">&nbsp;
							<label>Sunday</label>
						  </div><br>
						  <div class="icheck-primary d-inline">
							<input type="checkbox" value="1" name="weekdays[]">&nbsp;
							<label>Monday</label>
						  </div><br>
						  <div class="icheck-primary d-inline">
							<input type="checkbox" value="2" name="weekdays[]">&nbsp;
							<label>Tuesday</label>
						  </div><br>
						  <div class="icheck-primary d-inline">
							<input type="checkbox" value="3" name="weekdays[]">&nbsp;
							<label>Wednesday</label>
						  </div><br>
						  <div class="icheck-primary d-inline" >
							<input type="checkbox" value="4" name="weekdays[]">&nbsp;
							<label>Thursday</label>
						  </div><br>
						  <div class="icheck-primary d-inline">
							<input type="checkbox" value="5" name="weekdays[]">&nbsp;
							<label>Friday</label>
						  </div><br>
						  <div class="icheck-primary d-inline">
							<input type="checkbox" value="6" name="weekdays[]">&nbsp;
							<label>Saturday</label>
						  </div>
						</div>
						
						<button type="submit" class="btn btn-block btn-info">Save</button>
					</form>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer"></footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/fullcalendar/main.min.js"></script>
<script src="/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="/plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        var eventObject = {
          title: $.trim($(this).text())
        }

        $(this).data('eventObject', eventObject)

        $(this).draggable({
          zIndex        : 1070,
          revert        : true, 
          revertDuration: 0 
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      'themeSystem': 'bootstrap',

      events    : [
		@if(!empty($events))
			@foreach($alldates as $key=>$alldate)
				{
				  title          : "{{ $events[0]->event }}",
				  start          : "{{ $alldate }}",
				  backgroundColor: '#00c0ef',
				  borderColor    : '#00c0ef',
				  allDay         : true
				},
			@endforeach
		@endif
      ],
      editable  : true,
      droppable : true,
      drop      : function(info) {
        if (checkbox.checked) {
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    //$('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc'

    $('#add-new-event').click(function (e) {
      e.preventDefault()
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>
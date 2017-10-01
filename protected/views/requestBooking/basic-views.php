<link
	href="<?php echo Yii::app()->request->baseUrl;?>/fullcalendar-2.2.2/fullcalendar.css"
	rel='stylesheet' />
<link
	href="<?php echo Yii::app()->request->baseUrl;?>/fullcalendar-2.2.2/fullcalendar.print.css"
	rel='stylesheet' media='print' />

<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/fullcalendar-2.2.2/lib/moment.min.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/fullcalendar-2.2.2/lib/jquery.min.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/fullcalendar-2.2.2/fullcalendar.min.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/fullcalendar-2.2.2/jquery.browser.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/fullcalendar-2.2.2/jquery.qtip-1.0.0-rc3.min.js"></script>


<script>
	$(document).ready(function() {
		
	      
		$('#calendar').fullCalendar({
			header : {
				left : 'prev,next today',
				center : 'title',
				right : 'month,basicWeek,basicDay'
			},
			//defaultDate : '2014-11-12',
			editable : true,
			eventLimit : true, // allow "more" link when too many events
			events : "http://localhost:81/itech/index.php/WebService/BorrowEvents",
            eventRender: function(event, element) {
            	//alert('start: ' + element.end);
                element.qtip({
                    content: {
                        title: { text: event.contact },
                        text: 
                            '<span class="title" style="font-weight:bold;">Start: </span>' +moment(event.start).format('YYYY-MM-DD hh:mm') +
                            '<br><span class="title" style="font-weight:bold;">End: </span>' + moment(event.end).format('YYYY-MM-DD hh:mm')  +
                            '<br><span class="title" style="font-weight:bold;">Room: </span>' + event.location +
                            '<br><span class="title" style="font-weight:bold;">Request type: </span>' + event.description+
                            '<br><span class="title" style="font-weight:bold;">Equipment list: </span>' + event.equipLists
                            
                    },
                                position: {
                                    adjust: { screen: true },
                                    corner: { target: 'bottomRight', tooltip: 'topLeft' }
                                },
                                show: {
                                    solo: true, effect: { type: 'slide' }, effect: function () {
                                        $(this).fadeTo(200, 0.8);
                                    }
                                },
                                hide: { when: 'mouseout', fixed: true },
                                style: {
                                    tip: true, // Give it a speech bubble tip
                                    background: '#585858',
                                    color:'#fff',
                                    border: {
                                        width: 2,
                                        radius: 5,
                                        color: '#000000',
                                        background: '#9193c4'

                                    },
                                    title: {
                                        color: '#fff',
                                        background: '#9193c4'
                                    },
                                }
                             });
            }

            
		});

	});
</script>
<style>
#calendar {
	max-width: 900px;
	margin: 0 auto;
}
</style>
<div>

	<table>
		<tr>
			<td><h3>Request type:</h3></td>
			<td id="darkgreen"><span style="background: #003300">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Daily</td>
			<td id="darkgreen"><span style="background: #003366">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Activity/Meeting</td>
			<td id="darkgreen"><span style="background: #CC6600">&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;Semester</td>
		</tr>
	</table>
</div>
<div id='calendar'></div>




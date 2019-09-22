<div class="module-head">
	<span>Borrow</span>
</div>

<link rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.css">
<!-- Generic page styles -->
<link rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/css/style.css">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<link rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/css/jquery.fileupload-ui.css">
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/ajax.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/util.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/js/borrow/request.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/js/vendor/jquery.ui.widget.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/js/jquery.iframe-transport.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl;?>/jQuery-File-Upload-8.2.1/js/jquery.fileupload.js"></script>
<script type="text/javascript">

$(function(){	
	
    var user_role = $('#user_role').val();
	
	$minDate = 0;

	if( user_role == 'StudentFAA' ||user_role == 'Student' ){

		$minDate =3;
		
	}else
	{
		$minDate = 0;
	}
	
	$('#post').submit(function(){


		var validateEventType = $('#type_of_event :selected').val();
		var validateFromDate = $('#from_date').val();
		var validateToDate = $('#thru_date').val();
		var validateDescripton = $('#description').val();
		var validateSubject = $('#teacher_id :selected').val();
		var equipmentList = $('#equipmentList').html();
		var validateMobile_phone = $('#mobile_phone').val();

                   
		if( validateFromDate == "" ){
			alert('Please enter from date.');
			$('#from_date').focus();
			return false;
		}
		if( validateToDate == "" ){
			alert('Please enter to date.');
			$('#thru_date').focus()
			return false;
		}
		
		if( validateEventType == 0 ){
			alert('Please select event type.');
			$('#type_of_event').focus();
			return false;
		}
		if( validateDescripton == "" ){
			alert('Please enter Purpose of borrowing.');
			$('#description').focus();
			return false;
		}
		if( validateMobile_phone == "" ){
			alert('Please enter Phone number.');
			$('#mobile_phone').focus();
			return false;
		}
		
	       var user_role = $('#user_role').val();
	       var location = $('#location').val();
	       var fromDate = $('#from_date').datepicker('getDate');
	       var toDate = $('#thru_date').datepicker('getDate');	

	       if( user_role == 'StudentFAA' ||user_role == 'Student' ){
				if( validateSubject == 0 ){
					alert('Please select subject.');
					$('#teacher_id').focus();
					return false;
				}
	       }
	       
		if( equipmentList == '<div><i>- no item found -</i></div>' ){
			alert('Please add borrow item.');
			$('#equipment_type').focus();
			return false;
		}
       
       if( user_role == 'StudentFAA' ||user_role == 'Student' ){
           
            var today = new Date();
            var diff = Math.floor(( fromDate - today ) / (1000 * 60 * 60 * 24))+1;
            if( diff < 2 ){
            	alert('Please borrow 3 day before use date.');
            	$('#from_date').val('');
            	 $('#thru_date').val('');
            	 $('#from_date').focus();
            	return false;
            }
            
       }
	   var order = 1;
       var eqItemList ="\n  ************************** \n";
       $('div.eqmList>div').each(function(){ 
           var str = $(this).text();
    	   eqItemList +=order+".  "+ str +"\n";
    	   order++;
            });

      	
       
			var result2=  confirm("Do you want to continue ? "+eqItemList);
			if(result2 == true){
				return true;
			}else{
				return false;
			}
		
	});

	$( "#EquipmentTypeQty").spinner({min: 0, max:250, stop: function(event, ui) {$(this).change();}    });

	$( "#from_date" ).datepicker({
        minDate: $minDate,
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        numberOfMonths: 1,
        changeYear: true,
        beforeShowDay:($minDate ==0)? $.datepicker.Weekends: $.datepicker.noWeekends,
        onClose: function( selectedDate, inst ) {
        	selectedDate = getDateFormat(selectedDate, 'yy-mm-dd');
            var minDate = new Date(Date.parse(selectedDate));
            var maxDate = new Date(Date.parse(selectedDate));
            minDate.setDate(minDate.getDate());
            maxDate.setDate(maxDate.getDate() + 4);
            $( "#thru_date" ).datepicker( "option", "minDate", minDate);
            $( "#thru_date" ).datepicker( "option", "maxDate", maxDate);

    		var url = 
    		"http://ed.muic.mahidol.ac.th/itech/index.php/AjaxRequest/CheckDate?tmp="
    		+ new Date().getTime() + "&cd=" + selectedDate;

            $.ajax({
                // GET is the default type, no need to specify it
                url: url,
                success: function(data) {
                     //data is the object that youre after, handle it here
                           var response = JSON.parse(data);
                           if( response.holiday_desc != '-' ){
                        	   $( "#from_date" ).val('');
                        	   alert("Can't recieve equipment in "+response.holiday_desc);
                               return false;
                           }
                }
            });
            
//             $('#equipment_type_span').html('');
            $('#equipment_list').html('');
            $('#equipmentList').html('');
            $('#equipment_remain').html('');
            $('#EquipmentTypeQty').val(0)
            $("#equipment_type").val(0);

            }
    });

    $( "#thru_date" ).datepicker({
        minDate: "+1D",
       	dateFormat: "dd-mm-yy",
        changeMonth: true,
        numberOfMonths: 1,
        changeYear: true,
        beforeShowDay:($minDate ==0)? $.datepicker.Weekends: $.datepicker.noWeekends,
        onClose: function( selectedDate, inst ) {
        	selectedDate = getDateFormat(selectedDate, 'yy-mm-dd');
             var maxDate = new Date(Date.parse(selectedDate));
             maxDate.setDate(maxDate.getDate() - 1);            
     		var url = 
        		"http://ed.muic.mahidol.ac.th/itech/index.php/AjaxRequest/CheckDate?tmp="
        		+ new Date().getTime() + "&cd=" + selectedDate;

                $.ajax({
                    // GET is the default type, no need to specify it
                    url: url,
                    success: function(data) {
                         //data is the object that youre after, handle it here
                               var response = JSON.parse(data);
                               if( response.holiday_desc != '-' ){
                            	   $( "#thru_date" ).val('');
                            	   alert("Can't return equipment in "+response.holiday_desc);
                                   return false;
                               }
                             
                    }
                });
                
//                 $('#equipment_type_span').html('');
                $('#equipment_list').html('');
                $('#equipmentList').html('');
                $('#equipment_remain').html('');
                $('#EquipmentTypeQty').val(0)
                $("#equipment_type").val(0);
                
        }
    });
    
	function validateForm(){

		var validateEventType = $('#type_of_event :selected').val();
		var validateFromDate = $('#from_date').val();
		var validateToDate = $('#thru_date').val();
		var validateDescripton = $('#description').val();
		var validateSubject = $('#teacher_id :selected').val();
		var equipmentList = $('#equipmentList').html();
		var validateMobile_phone = $('#mobile_phone').val();
		


		if( validateFromDate == "" ){
			alert('Please enter from date.');
			$('#from_date').focus();
			return false;
		}
		if( validateToDate == "" ){
			alert('Please enter to date.');
			$('#thru_date').focus()
			return false;
		}
		
		if( validateEventType == 0 ){
			alert('Please select event type.');
			$('#type_of_event').focus();
			return false;
		}
		if( validateDescripton == "" ){
			alert('Please enter Purpose of borrowing.');
			$('#description').focus();
			return false;
		}
		if( validateMobile_phone == "" ){
			alert('Please enter Phone number.');
			$('#mobile_phone').focus();
			return false;
		}
		
	       var user_role = $('#user_role').val();
	       var location = $('#location').val();
	       var fromDate = $('#from_date').datepicker('getDate');
	       var toDate = $('#thru_date').datepicker('getDate');	

	       if( user_role == 'StudentFAA' ||user_role == 'Student' ){
				if( validateSubject == 0 ){
					alert('Please select subject.');
					$('#teacher_id').focus();
					return false;
				}
	       }
	       
		if( equipmentList == '<div><i>- no item found -</i></div>' ){
			alert('Please add borrow item.');
			$('#equipment_type').focus();
			return false;
		}
       
       if( user_role == 'StudentFAA' ||user_role == 'Student' ){
           
            var today = new Date();
            var diff = Math.floor(( fromDate - today ) / (1000 * 60 * 60 * 24))+1;
            if( diff < 2 ){
            	alert('Please borrow 3 day before use date.');
            	$('#from_date').val('');
            	 $('#thru_date').val('');
            	 $('#from_date').focus();
            	return false;
            }
            
       }
       

	}
});

</script>
<script type="text/javascript">
	$(function(){
		loadDatePicker('date_picker_1');
				});

	function changeTypeOfEvent() {
		$('#EquipmentTypeQty').val(0)
		$('#equipment_remain').html('');
		$('#equipment_list').html('');
		ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/ChageEquipmentTypeListByTypeOfEvent/id")?>/'
						+ $('#type_of_event').val(),	'equipment_type_span', null);

		
	}
	
	function changeEquipmentType() {
		$('#EquipmentTypeQty').val(0)
		$('#equipment_remain').html('');

		//alert('--->'+$('#type_of_event').val());
		
		ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/RequestEquipmentTypeList/id")?>/'
						+ $('#equipment_type').val()+'/typeOfEvent/'+$('#type_of_event').val(),	'equipment_list', null);

		switch($('#type_of_event').val()){
			case "1":
			case "2":
			case "3":
			case "4":
				ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/EquipmentRemain/id")?>/'
						+ $('#equipment_type_list_id').val()+','+$("#from_date").val(),	'equipment_remain', null);

		//X1X
		ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/EquipmentImage/id")?>/'+ $('#equipment_type_list_id').val(),	'previewImg', null);
						
				break;
		}

	}

	function changeEquipmentRemain() {
		
		$('#EquipmentTypeQty').val(0)
		ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/EquipmentRemain/id")?>/'
						+ $('#equipment_type_list_id').val()+','+$("#from_date").val(),	'equipment_remain', null);

		//X1X
		ajaxUpdateArea('<?php echo Yii::app()->createUrl("AjaxRequest/EquipmentImage/id")?>/'+ $('#equipment_type_list_id').val(),	'previewImg', null);
	}
	
	function changeQuntitySpin() {
		
		var use = $('#EquipmentTypeQty').val();
		var remain = $('#equipmentItemRemain').val();
		

		if( parseInt(use) > parseInt(remain) ){
			alert('Equipment is out of stock!.');
			$('#EquipmentTypeQty').val(remain)
			return false;
		}
	}
	
</script>
<?php
$subjects = Subject::model ()->findAll (array("condition"=>"status = 'A'"));
$eventTypes = EventType::model ()->findAll (array("condition"=>"status = 'A'"));

?>

<?php if( !UserLoginUtil::isInUseEquipment(UserLoginUtil::getUserLoginId()) ){ ?>

<form method="post" action="">
	<input type="hidden" id="user_role"
		value="<?php echo UserLoginUtil::getUserRoleName();?>">

	<!-- IMG DIV -->
	<div style="position: absolute; right: 2%;" id="previewImg"></div>
	<!-- END IMG DIV -->

	<table class="simple-form">
		<tr>
			<td class="column-left" width="25%">Receive date</td>
			<td class="column-right"><input type="text"
				name="RequestBorrow[from_date]" id="from_date"><span><font
					color="red">*</font> </span></td>
			<td><div id="validateFromDate"></div></td>
		</tr>
		<tr>
			<td class="column-left">Return Date</td>
			<td class="column-right"><input type="text"
				name="RequestBorrow[thru_date]" id="thru_date"><span><font
					color="red">*</font> </span></td>
			<td><div id="validateToDate"></div></td>
		</tr>
		<tr>
			<td class="column-left" valign="top">Place of use</td>
			<td class="column-right"><Input type='Radio' checked="checked"
				Name='RequestBorrow[location]' id="location" value='WHITHIN_MUIC'>In
				MUIC <Input type='Radio' Name='RequestBorrow[location]'
				value='WITHOUT_MUIC'>Outside MUIC</td>
			<td>
		
		</tr>
		<tr>
			<td class="column-left">Type of Event</td>
			<td class="column-right"><select id="type_of_event"
				onchange="changeTypeOfEvent()" name="RequestBorrow[event_type_id]">
					<option value="">--Select--</option>
					<?php foreach($eventTypes as $eventType) {?>
					<option value="<?php echo $eventType->id?>">
						<?php echo $eventType->name?>
					</option>
					<?php }?>
			</select><span><font color="red">*</font> </span></td>
			<td><div id="validateEventType"></div></td>
		</tr>
		<?php
	
	if (UserLoginUtil::areUserRole ( array (
	    UserRoles::STUDENT_FAA , UserRoles::STUDENT
	) )) {
		
		?>
		<tr>
			<td class="column-left">Subject</td>
			<td class="column-right"><select id="teacher_id"
				name="RequestBorrow[teacher_id]">
					<option value="">--Select--</option>
					<?php foreach($subjects as $subject) {?>
					<option value="<?php echo $subject->subj_code?>">
						<?php echo $subject->sbj_name ." (" . $subject->user_login->user_information->first_name." )"?>
					</option>
					<?php }?>
			</select><span><font color="red">*</font> </span></td>
			<td><div id="validateSubject"></div></td>
		</tr>
		<?php }?>

		<tr>
			<td align="right">Equipment :</td>
			<td align="left"><span id="equipment_type_span"><select
					name="equipment_type" id="equipment_type">
						<option value="">-Select-</option>
				</select><span><font color="red">*</font> </span> </span></td>
		</tr>
		<tr>
			<td align="right">Detail :</td>
			<td><span id="equipment_list"><select name="equipment_type_list_id"
					id="equipment_type_list_id">
						<option value="">-Select-</option>
				</select> </span><span><font color="red">*</font> </span></td>
		</tr>
		<tr>
			<td align="right">Quantity :</td>
			<td><input type="text" readonly="readonly" id="EquipmentTypeQty"
				value="0" onchange="changeQuntitySpin();" /> <span
				id="equipment_remain"></span><span><font color="red">*</font> </span>
			</td>

		</tr>
		<tr>
			<td align="right"></td>
			<td><input type="button" name="add_equipment" id="add_equipment"
				width="10px" value="Add Equipment" /></td>
		</tr>
			<?php
			if (UserLoginUtil::getUserRoleName () == 'StudentFAA' || UserLoginUtil::getUserRoleName () == 'Student') {
		?>
		<tr>
			<td></td>
			<td><font color="blue"> *All students checking out equipment must
					write the course code, course name,<br> name of the responsible
					lecturer and name of the homework assignment in the “purpose of
					borrow” section. Failure to do so will result in a disapproval of
					the request. <br>Example: Course ICFP 202 Cinematography, Lecturer
					Mr. Sakchai, Homework Assignment number 04 outdoor shooting.</td>
			</font>
		</tr>
		<?php }?>
		<tr>
			<td class="column-left">Purpose of borrow</td>
			<td class="column-right"><textarea name="RequestBorrow[description]"
					id="description" style="margin: 0px; width: 422px; height: 53px;"></textarea><span><font
					color="red">*</font> </span></td>
			<td><div id="validateDescripton"></div></td>
		</tr>
		<tr>
			<td class="column-left">Other Device & Notes</td>
			<td class="column-right"><textarea name="RequestBorrow[otherDevice]"
					id="otherDevice" style="margin: 0px; width: 422px; height: 53px;"></textarea>
			</td>
			<td><div id="validateDescripton"></div></td>
		</tr>
		<tr>
			<td class="column-left">Phone Number</td>
			<td class="column-right"><input type="text"
				name="RequestBorrow[mobile_phone]" id="mobile_phone"></input><span><font
					color="red">*</font> </span></td>
			<td></td>
		</tr>
	</table>
	<br>
	<fieldset>
		<legend>Equipment List</legend>
		<div id="equipmentList" class="eqmList"></div>
	</fieldset>
	<table class="simple-form">

		<tr>
			<td align="center"><input type="submit" name="add_request"
				value="Save" /></td>
		</tr>
	</table>

</form>
<?php }else{?>
<div>
	<?php echo CHtml::image('/itech/images/info.png', 'Infomation.'); ?>
	<font color="red"><b>ไม่สามารถทำรายได้ได้เนื่องจากมีรายการยืมค้าง.</b>
	</font><br>
</div>
<?php }?>

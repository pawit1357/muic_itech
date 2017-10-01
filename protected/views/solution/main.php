<span class="module-head">Status</span>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js"></script>

<style>
.ui-dialog-titlebar-close {
	display: none;
}
</style>
<script type="text/javascript">

/*
var url = 'http://api.twitter.com/1/users/show.json?screen_name=nightoutinc&callback=??';
$.getJSON(url,  function(twitterAPI) {
        console.log(twitterAPI)
        var twitter = twitterAPI.followers_count;
        $('#followCounter').html(twitter);

        alert(twitter);
});
*/

$(function() {
	$( "#dialogON,#dialogOff,#dialogPing" ).dialog({
	      height: 140,
	      autoOpen: false,
	      modal: true
	    });
  });
  
function turnOnEquipment(ip) {
	$( "#dialogON" ).dialog("open");
			$.ajax({
				url : "http://" + ip + "/cgi-bin/sender.exe?KEY=3B",
				type : "GET",
				data : '',
				success : function(data) {		
					$( "#dialogON" ).dialog("close");
				},
				error : function() {
					$( "#dialogON" ).dialog("close");
				}
			});
}

function turnOffEquipment(ip) {
	$( "#dialogOff" ).dialog("open");
	$('#ip').val(ip);
	$.getJSON("http://" + ip + "/cgi-bin/sender.exe?KEY=3B",
			function(data) {

			});
}

function confirmTurnOffEquipment() {
	var ip = $("#ip").val();
	$.getJSON("http://" + ip + "/cgi-bin/sender.exe?KEY=3B",
			function(data) {

			});
	$( "#dialogOff" ).dialog("close");
}

function turnOnComputer(ip, mac) {

	$( "#dialogPing" ).dialog("open");
	$('#pResult').empty();
	$('#pResult').append("<font color='green'><strong>Wake-On-Lan command has been sent.</strong></font>");	
	$.getJSON("http://localhost:88/itech/wol.php?wake_machine="+mac+"&wake_ip="+ip,
			function(data) {		
				alert(data.result+"xxxx");		
			});	
}

function turnOffComputer(ip, mac,client_user,client_pass) {

	$( "#dialogPing" ).dialog("open");
	
	$('#pResult').empty();
	
	$.getJSON("<?php echo Yii::app()->createUrl('Management/Shutdown/ip')?>/"+ip+"/user/"+client_user+"/pass/"+client_pass,
			function(data) {

				if( data != null){					
					if( data == "1"){
						$('#pResult').append("<font color='green'><strong>Shutdown Success!</strong></font>");
					}else
					{
						$('#pResult').append("<font color='red'><strong>Shutdown Fail!</strong></font>");
					}					
				}else
				{
					$('#pResult').append("<font color='red'><strong>Shutdown Fail!</strong></font>");
				}		
			});
	
	//$( "#dialogOff" ).dialog("open");
	//$('#ip').val(ip);
	//$.getJSON("http://localhost:88/itech/shutdown.php?ip_address="+ip+"&client_user="+client_user+"&client_pass="+client_pass,
	//		function(data) {
	//		});	
}

function pingEquipment(ip) {
	$( "#dialogPing" ).dialog("open");
	
	$('#pResult').empty();
	$.getJSON("<?php echo Yii::app()->createUrl('Management/Ping/ip')?>/"+ip,
			function(data) {
		if( data != null){	
				if( data == '1'){
					$('#pResult').append("<font color='green'><strong>Online!</strong></font>");					
				}else
				{
					$('#pResult').append("<font color='red'><strong>Offline!</strong></font>");
				}		
		}else
		{
			$('#pResult').append("<font color='red'><strong>Offline!</strong></font>");
			}
			});
}

</script>

<script type="text/javascript">
function filter(){
	var data = '';
	if($('#room_filter').val() != '') {
		data = 'room_filter='+$('#room_filter').val();
	}
	if($('#equipment_type_filter').val() != '') {
		if(data != '') {
			data = data + '&';
		}
		data = data + 'equipment_type_filter='+$('#equipment_type_filter').val();
	}
	$('#my-model-grid').yiiGridView('update', {url : '<?php echo Yii::app()->createUrl('Solution/Index')?>/ajax/my-model-grid', data: data});
}
</script>
<input type="hidden"
	name="ip" id="ip" value="">


<div id="dialogON" title="Alert">
	<div id="test1"></div>
	<p>Turning Equipment ON / OFF</p>
	<p></p>
</div>

<div id="dialogOff" title="Alert">
	<p>Power Off ?</p>
	<p style="text-align: center">
		<input type="submit" value="Yes" onclick="confirmTurnOffEquipment()" />
	</p>
</div>

<div id="dialogPing" title="Alert">
	<p>Begin Sent command.</p>
	<div id="pResult"></div>

</div>

<div>
	Equipment <select name="equipment_type_filter"
		id="equipment_type_filter" onchange="filter()">
		<option value="">All Equipment</option>
		<?php 
		$equipmentTypes = EquipmentType::model()->findAll(array('condition'=>"id='8' OR id='9'"));
		foreach($equipmentTypes as $equipmentType) {
			?>
		<option value="<?php echo $equipmentType->id?>">
			<?php echo $equipmentType->name?>
		</option>
		<?php }?>
	</select> Room <select name="room_filter" id="room_filter"
		onchange="filter()">
		<option value="">All Room</option>
		<?php 
		$rooms = Room::model()->findAll();
		foreach($rooms as $room) {
			?>
		<option value="<?php echo $room->id?>">
			<?php echo $room->name?>
		</option>
		<?php }?>
	</select> &nbsp;

	<div class="search-box">
		<?php 
		$form = $this->beginWidget('CActiveForm', array(
				'id' => 'room-form',
				'method'=>'get',
				'action'=>'',
				'enableAjaxValidation' => false,
		));
		?>
		<input type="text" name="search_text"
			value="<?php echo $_GET['search_text']?>">
		<?php $this->endWidget(); ?>
	</div>
</div>


<div id="followCounter"></div>
<div class="simple-grid">
	<table class="items">
		<thead>
			<tr>
			<tr>
				<th width="5%">#</th>
				<th width="15%">Name</th>
				<th width="10%">Room</th>
				<th width="10%">Using Hour</th>
				<th width="10%">Temperature</th>
				<th width="10%">IP Address</th>
				<th width="10%">Status</th>
				<th width="15%">Action</th>
			</tr>
			</tr>
		</thead>
		<tbody>
		<?php 
			$counter = 1;
			$dataProvider = $data->search();


			foreach ($dataProvider->data as $request) {
		?>
			<tr class="line-<?php echo $counter%2 == 0 ? '1' : '2'?>">
			<td class="center"><?php echo GridUtil::getDataIndex($dataProvider, $counter++)?></td>
				<td class="center"><?php echo $request->name;?>
				<td class="center"><?php echo $request->room->name;?>
				<td class="center"><?php echo "0"; ?>
				<td class="center"><?php echo "25"; ?>
				<td class="center"><?php echo $request->ip_address;?></td>
				<td class="center">
					<?php if( false ){// HardwareUtil::isEquipmentOnline($request->id,$request->ip_address) ){?>
					<img src="../images/green-circle.png" alt="ONLINE">
					<?php }else{?>
					<img src="../images/red-circle.png" alt="OFFLINE">
					<?php }?>
				</td>
				<td class="center">
				<?php if( $request->ip_address != null ){?>
					<a title="PING" href="<?php echo $request->equipment_type->equipment_type_code == "1008" ? "javascript:pingEquipment(\'".$request->ip_address."\')" : "javascript:pingEquipment(\'".$request->ip_address."\')"; ?>">PING</a>
|	
					<a title="ON" href="<?php echo $request->equipment_type->equipment_type_code == "1008" ? "javascript:turnOnComputer(\'".$request->ip_address."\', \'".$request->mac_address."\')" : "javascript:turnOnEquipment(\'".$request->ip_address."\')"; ?>">ON</a>
|
					<a title="OFF" href="<?php $request->equipment_type->equipment_type_code == "1008" ? "javascript:turnOffComputer(\'".$request->ip_address."\', \'".$request->mac_address."\', \'".$request->client_user."\',\'".$request->client_pass."\' )" : "javascript:turnOffEquipment(\'".$request->ip_address."\')"; ?>">OFF</a>
				<?php }?>
				</td>
			</tr>
				
		<?php }?>
		</tbody>
	</table>
				<div class="paging">
				<?php GridUtil::RenderPageButton($this, $dataProvider); ?>
			</div>
</div>

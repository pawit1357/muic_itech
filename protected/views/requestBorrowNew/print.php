<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(function() {
	window.print();	
	window.close();	
});
</script>
<?php
$width = "700";
$userLogin = $data->user_login;
$personInfo = $data->user_login->user_information;

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="<?php echo $width?>">
	<tr>
		<td align="center"><font size="4"><b>Equipment borrowing request form</b>
		</font></td>
	</tr>
	<tr>
		<td align="right"><font size="2">Date <?php echo date("d")?> Month <?php echo date("m")?> Year <?php echo date("Y")?>
		</font></td>
	</tr>
	<tr>
		<td align="left"><b><font size="2"><br>Part 1 For borrower</font> </b>
		</td>
	</tr>
	<tr>
		<td align="center"><font size="2">Name .......<?php echo $personInfo->personal_title.$personInfo->first_name.' '.$personInfo->last_name ?>........
				<input type="checkbox"
				<?php echo $userLogin->role->name == 'Lecturer' ? 'checked="checked"' : ''?>>
				Lecturer&nbsp;&nbsp;&nbsp; <input type="checkbox"
				<?php echo $userLogin->role->name == 'Staff' ? 'checked="checked"' : ''?>>
				Staff&nbsp;&nbsp;&nbsp; <input type="checkbox"
				<?php echo $userLogin->role->name == 'Student' || $userLogin->role->name == 'StudentFAA' ? 'checked="checked"' : ''?>>
				Student&nbsp;&nbsp;&nbsp;
				Faculty.........................................
		</font></td>
	</tr>
	<tr>
		<td align="center"><font size="2">ID No.
				.........<?php echo $userLogin->username; ?>................ Mobile Phone .......<?php echo $data->mobile_phone; ?>........
				request for approval to borrow MUIC's equipment.<br> <br>
		</font></td>
	</tr>
	<tr>
		<td align="center">

			<table width="95%" border="1" cellpadding="0" cellspacing="0">
				<tr>
					<th width="5%"><font size="1">No.</font></th>
					<th width="70%"><font size="1">List of items</font></th>
					<th width="15%"><font size="1">Device Code <br>(fill-in at the
							office)
					</font></th>
					<th><font size="1">Check Out</font></th>
					<th><font size="1">Check In</font></th>
					<!-- 					<th width="10%"><font size="1">Unit</font></th> -->
				</tr>
				<?php
				$requestBorrowEquipmentTypes = RequestBorrowEquipmentType::model ()->findAll ( array (
						'condition' => "request_borrow_id = '" . $data->id . "'" 
				) );
				$count = 1;
				if (count ( $requestBorrowEquipmentTypes ) > 0) {
					
					foreach ( $requestBorrowEquipmentTypes as $requestBorrowEquipmentType ) {
						$requestBorrowEquipmentTypeItems = RequestBorrowEquipmentTypeItem::model ()->findAll ( array (
								'condition' => "request_borrow_equipment_type_id = '" . $requestBorrowEquipmentType->id . "'" 
						) );
						if (count ( $requestBorrowEquipmentTypeItems ) > 0) {
							foreach ( $requestBorrowEquipmentTypeItems as $requestBorrowEquipmentTypeItem ) {
								?>
				<tr>
					<td align="center"><font size="1"><?php echo $count++?></font></td>
					<td>&nbsp;&nbsp;<font size="1"><?php echo $requestBorrowEquipmentTypeItem->equipment->name .''.$requestBorrowEquipmentTypeItem->equipment->equipment_type_list->accessories;?></font></td>
					<td align="center"><font size="1"><?php echo $requestBorrowEquipmentTypeItem->equipment->barcode?></font></td>
					<!-- 					<td align="center"><font size="1">1</font></td> -->
					<td></td>
					<td></td>
				</tr>

<?php
							}
						} else {
							?>
				<tr>
					<td align="center"><font size="1"><?php echo $count++?></font></td>
					<td>&nbsp;&nbsp;<font size="1"><?php echo $requestBorrowEquipmentType->equipment_type_list->name.'   '.$requestBorrowEquipmentType->equipment_type_list->accessories;?></font></td>
					<td align="center"><font size="1">-</font></td>
					<!--  <td align="center"><font size="1"><?//php echo $requestBorrowEquipmentType->quantity?></font></td> -->
					<td></td>
					<td></td>
				</tr>

<?php
						}
					}
				}
				?>
				
				<tr>
					<td align="center"><font size="1"><?php echo $count++?></font></td>
					<td>&nbsp;&nbsp;<font size="1"><?php echo $data->otherDevice?></font></td>
					<td align="center"><font size="1">-</font></td>
					<td align="center"><font size="1">-</td>
				</tr>
			</table> <!-- List of item optional --> <br>
	
	
	<tr>
		<td align="left"><font size="2"> Red Drum
				................................................ Sand Bag
				............................................. Slate
				.................................................<br> Other
				..................................................................................................................................................................
				<br> <br>
		</font></td>
	</tr>
	<!-- 
	<table width="95%" border="1" cellpadding="0" cellspacing="0">
		<tr>
			<th width="5%"><font size="1">No.</font></th>
			<th width="70%"><font size="1">List of items <br> (Additional)
			</font></th>
			<th width="15%"><font size="1">Device Code <br>(fill-in at the ffice)
			</font></th>
			<th><font size="1">Check Out</font></th>
			<th><font size="1">Check In</font></th>
		</tr>
		<tr>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>

		</tr>
		<tr>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>

		</tr>
		<tr>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>
			<td align="center"><font size="1">&nbsp;</font></td>

		</tr>
	</table>
 -->
	<!-- 	</td> -->
	<!-- 	</tr> -->

	<tr>
		<td align="center"><font size="2"><br> <br>Purpose of
				borrowing.......................................................
				Place of use <input type="checkbox"
				<?php echo $data->location == 'WHITHIN_MUIC' ? 'checked="checked"' : ''?>>
				In MUIC&nbsp;&nbsp;&nbsp; <input type="checkbox"
				<?php echo $data->location == 'WHITHOUT_MUIC' ? 'checked="checked"' : ''?>>
				Outside MUIC&nbsp;&nbsp;&nbsp; </font></td>
	</tr>
	<tr>
		<td align="center"><font size="2">Place of use (please
				specify)......................................... From...<?php echo DateTimeUtil::getDateFormat($data->from_date, "dd MM yyyy")?>...
				Until...<?php echo DateTimeUtil::getDateFormat($data->thru_date, "dd MM yyyy")?>...1
				Total...<?php  echo DateTimeUtil::getDayRemain($data->from_date, $data->thru_date)?>...Days
		</font></td>
	</tr>
	<tr>
		<td align="center"><font size="2"> I have read the terms of agreements
				about the rules of borrowing the MUIC's Equipment and will follow
				accordingly. <br> <br>
		</font></td>
	</tr>
	<tr>
		<td align="center">
			<table width="100%">
				<tr>
					<td width="40%">
						<table width="100%">
							<tr>
								<td align="left"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name...............................................(Borrower)</font>
								</td>
							</tr>
							<tr>
								<td align="left"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(..............................................)</font>
								</td>
							</tr>
							<tr>
								<td align="left"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date
										.......................................</font></td>
							</tr>
							<tr>
								<td align="left">
									<table width="100%" border="1" cellpadding="0" cellspacing="0">
										<tr>
											<td align="center"><font size="2"><b>Principles of borrowing
														and fines</b> </font></td>
										</tr>
										<tr>
											<td>
												<table width="100%">
													<tr>
														<td align="left"><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;1.
																For students, please show your student card and wear
																proper uniform.</font></td>
													</tr>
													<tr>
														<td align="left"><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;2.
																For students, please fully fill in and get approval from
																lecturers and a student ID card attached to this request
																form. Send the request at least 3 days before borrowing
																date.</font></td>
													</tr>
													<tr>
														<td align="left"><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;3.
																Can borrow not more than 5 days (including non-working
																days).</font></td>
													</tr>
													<tr>
														<td align="left"><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;4.
																Borrower must count and check the MUIC's Equipment that
																they are usable when receiving from the officer.</font>
														</td>
													</tr>
													<tr>
														<td align="left"><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;5.
																Borrower must be the same person to return the MUIC's
																Equipment.</font></td>
													</tr>
													<tr>
														<td align="left"><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;6.
																Borrower must return the MUIC's Equipment that are
																usable. If there are damages and unusable, borrower must
																repair it to good status.</font></td>
													</tr>
													<tr>
														<td align="left"><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;7.
																If the MUIC's Equipment are loss or returned in an
																unusable status, borrower must find a new comarable
																MUIC's Equipment in replacement or pay a fine the value
																of the MUIC's Equipment that Mahidol University has
																bought.</font></td>
													</tr>
													<tr>
														<td align="left"><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;8.
																In the case of returning late, borrower must pay fines
																at 500 baht per day. However, the fines will not be
																charged morethan 5,000 baht.</font></td>
													</tr>
													<tr>
														<td align="left"><font size="1">&nbsp;&nbsp;&nbsp;&nbsp;9.
																If the borrower returns late more than 2 times in 1
																timester, the Educational Technology Section will
																conserve authority in the next service.</font></td>
													</tr>
													<tr>
														<td align="left"><font size="1"><br> <input
																type="checkbox" checked="checked"> I have read and agree
																with the term of service</font></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top">
						<table width="100%" border="1" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center"><font size="2"><b>Part 2 For approval from
											lecturers (FFA 2 Guarantor)</b> </font></td>
							</tr>
							<tr>
								<td align="left"><font size="2"><br>&nbsp;&nbsp;Name
										............<?php echo UserLoginUtil::getUserById( $data->approver1)->user_information->first_name;?>.......................................
										Guarantor / Lecturer</font></td>
							</tr>
							<tr>
								<td align="left"><font size="2"><br>&nbsp;&nbsp;Name
										.................<?php echo UserLoginUtil::getUserById( $data->approver2)->user_information->first_name;?>..................................
										Guarantor / Program Director</font></td>
							</tr>
							<!-- 
							<tr>
								<td align="left"><font size="2"><br>&nbsp;&nbsp;Name
										........................................................
										Approver / Chairman<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
										........................................................ )<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date
										................................................... </font></td>
							</tr>
							 -->
						</table>
						<table width="100%" border="1" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center"><font size="2"><b>Part 3 For receiving MUIC's
											Equipments</b> </font></td>
							</tr>
							<tr>
								<td align="left"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I
										have counted and checked MUIC's Equipment borrowed <br> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name
										........................................................
										Receiver<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
										........................................................ )<br>
								</font>
							
							</tr>
							<tr>
								<td align="left"><font size="2"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name
										........................................................
										Officer<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
										........................................................ )<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date
										................................................... </font></td>
							</tr>
						</table>
						<table width="100%" border="1" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center"><font size="2"><b>Part 4 Returning MUIC's
											Equipments</b> </font></td>
							</tr>
							<tr>
								<td align="left"><font size="2"> <input type="checkbox">
										Materials are in a good condition<br> <input type="checkbox">
										Materials are damaged/broken
										..........................................<br> <br> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name
										........................................................
										Returner<br>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
										........................................................ )<br>
								</font>
							
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

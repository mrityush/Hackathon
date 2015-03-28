<!DOCTYPE html>
<html>
<?php
include 'header.php';
include 'connection.php';
include 'constants.php';
?>
<form action="javascript:postFilterItems()">
	<table id="locationFilterId">
		<tr>
			<td><label>Location (optional)</label> <select id="preFilledPlacesId"
				class="post-param">
					<option value='{"lat":1, "long":2}'>Gurgaon</option>
					<option value='{"lat":3, "long":4}'>Chandigarh</option>
					<option value='{"lat":5, "long":6}'>Mohali</option>
					<option value='{"lat":7, "long":8}'>Panchkula</option>
			</select></td>
			<td><label>Location Latitude</label><input type="text"
				name="latitude" id="latitudeId" class="post-param"></td>
			<td><label>Location Longitude</label><input type="text"
				name="longitude" id="longitudeId" class="post-param"></td>
			<td><label>Radius</label><input type="number" id="radiusId"
				name="radius" class="post-param"></td>
			<td><button type="submit"">Go</button></td>
		</tr>
	</table>
</form>

<div id="userTemplateContainerId">
	<script id="usersTemplate" type="text/x-jquery-tmpl">
	<tr id="editForm${id}">
		<td><input type="text" class="post-param" name="user" id="user${id}" value="${id}"></td>
		<td><input type="text" class="post-param" name="email" id="email${id}" value="${email}" disabled="true"></td>
	</tr>
</script>
</div>
<?php include 'footer.php';?>
<script type="text/javascript">
$(document).ready(function () {
	$( "#preFilledPlacesId" ).change(function() {
	  $("#latitudeId").val($.parseJSON($("#preFilledPlacesId").val())["lat"]);
	  $("#longitudeId").val($.parseJSON($("#preFilledPlacesId").val())["long"]);
	});
});

function postFilterItems(){
	var requestParams = getRequestParams("locationFilterId");
	console.log("requestParams = " + JSON.stringify(requestParams));
	makeAJAXRequest("getUsers.php", requestParams, function(data) {
        console.log("data received: " + data);
        fillData(data, "usersTemplate", "userTemplateContainerId");
    }, errorRequestProcess("error in fetching"))
}


</script>
</html>

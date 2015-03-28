function makeAJAXRequest(requestURL, requestParams, successCallBack,
		failureCallBack) {
	$("#ajaxError").text("");
	$.ajax({
		type : 'POST',
		url : requestURL,
		data : requestParams,
		success : function(tData) {
			successCallBack(tData);
		},
		error : function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
			failureCallBack();
		}
	});
}

function getRequestParams(tableId) {
	var requestParams = {};
	$('#' + tableId + ' .post-param').each(function() {
		var curElem = $(this);
		requestParams[curElem.attr('name')] = curElem.val();
	});
	return requestParams;
}

function fillData(data, templateId, templateContainerId) {
	try {
		var uiData = $.parseJSON(data);
		$("#" + templateId).tmpl(uiData).appendTo("#" + templateContainerId);
		console.log("Success in fetching");
	} catch (err) {
		console.log(err);
		errorRequestProcess("Error in Parsing fetched items");
	}
}

function errorRequestProcess(errorMessage) {
	console.log("error:" + errorMessage);
	// div can be created for showing the error
}
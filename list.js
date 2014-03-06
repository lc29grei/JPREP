function Toggle(item) {
   obj=document.getElementById(item);
   visible=(obj.style.display!="none")
   key=document.getElementById("x" + item);
   if (visible) {
     obj.style.display="none";
     key.innerHTML="[+]";
   } else {
      obj.style.display="block";
      key.innerHTML="[-]";
   }
}
function Expand() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="block";
     key=document.getElementById("x" + divs[i].id);
     key.innerHTML="[-]";
   }
}
function Collapse() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="none";
     key=document.getElementById("x" + divs[i].id);
     key.innerHTML="[+]";
   }
}


function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            
            if ((rowCount-6) <= 25) {
            	var row = table.insertRow(rowCount-1);
            
            	var cell1 = row.insertCell(0);
            	cell1.innerHTML = 'Test Case ' + (rowCount - 6);
            	
            	var x = false;
            	for (var i=1;i<6;i++) {
            		var cell2 = row.insertCell(i);
            		if (x === false) {
            			if ((document.getElementById('param2name').disabled) && (i == 2)) {
            				var element1 = document.createElement("input");
            				element1.type = "text";
            				element1.name = "txtbox[]";
            				element1.disabled = true;
            				cell2.appendChild(element1);
            				x = true;
            			} else if ((document.getElementById('param3name').disabled) && (i == 3)) {
            				var element1 = document.createElement("input");
            				element1.type = "text";
            				element1.name = "txtbox[]";
            				element1.disabled = true;
            				cell2.appendChild(element1);
            				x = true;
            			} else if ((document.getElementById('param4name').disabled) && (i == 4)) {
            				var element1 = document.createElement("input");
            				element1.type = "text";
            				element1.name = "txtbox[]";
            				element1.disabled = true;
            				cell2.appendChild(element1);
            				x = true;
            			} else if ((document.getElementById('param5name').disabled) && (i == 5)) {
            				var element1 = document.createElement("input");
            				element1.type = "text";
            				element1.name = "txtbox[]";
            				element1.disabled = true;
            				cell2.appendChild(element1);
            				x = true;
            			} else {
            				var element1 = document.createElement("input");
            				element1.type = "text";
            				element1.name = "txtbox[]";
            				cell2.appendChild(element1);
            			}
            		} else {
            			var element1 = document.createElement("input");
            			element1.type = "text";
            			element1.name = "txtbox[]";
            			element1.disabled = true;
            			cell2.appendChild(element1);
            		}
            	}
            	
            	var cell3 = row.insertCell(6);
            	var element2 = document.createElement("input");
            	element2.type = "text";
            	element2.name = "txtbox[]";
            	cell3.appendChild(element2);
            
            	var cell8 = row.insertCell(7);
            	var element7 = document.createElement("input");
            	element7.type = "checkbox";
            	element7.name = "checkbox[]";
            	cell8.appendChild(element7);
            	
            	var cell9 = row.insertCell(8);
            	var element8 = document.createElement("input");
            	element8.type = "checkbox";
            	element8.name = "checkbox[]";
            	cell9.appendChild(element8);
            	
            } else {
            	alert('Sorry, you can only have up to 25 test cases');
            }
 
}
 
function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
           	if ((rowCount - 6) > 2) {
           		table.deleteRow(rowCount-2);
           	} else {
           		alert('You must have at least 1 test case!');
           	}
            }catch(e) {
                alert(e);
            }
}

function addParam() {
	
	if (document.getElementById('param2name').disabled) {
		document.getElementById('param2name').disabled=false;
		document.getElementById('param2type').disabled=false;
		document.getElementById('case1param2').disabled=false;
		return;
	} else if (document.getElementById('param3name').disabled) {
		document.getElementById('param3name').disabled=false;
		document.getElementById('param3type').disabled=false;
		document.getElementById('case1param3').disabled=false;
		return;
	} else if (document.getElementById('param4name').disabled) {
		document.getElementById('param4name').disabled=false;
		document.getElementById('param4type').disabled=false;
		document.getElementById('case1param4').disabled=false;
		return;
	} else if (document.getElementById('param5name').disabled) {
		document.getElementById('param5name').disabled=false;
		document.getElementById('param5type').disabled=false;
		document.getElementById('case1param5').disabled=false;
		return;
	} else {
		alert('Sorry, you can only have up to 5 parameters');
	}
	
}

function removeParam(tableId) {
	var r = confirm("Are you sure you want to remove a parameter?");
	if (r==true) {
	if (document.getElementById('param5name').disabled === false) {
		document.getElementById('param5name').disabled=true;
		document.getElementById('param5type').disabled=true;
		document.getElementById('case1param5').disabled=true;
		return;
	} else if (document.getElementById('param4name').disabled === false) {
		document.getElementById('param4name').disabled=true;
		document.getElementById('param4type').disabled=true;
		document.getElementById('case1param4').disabled=true;
		return;
	} else if (document.getElementById('param3name').disabled === false) {
		document.getElementById('param3name').disabled=true;
		document.getElementById('param3type').disabled=true;
		document.getElementById('case1param3').disabled=true;
		return;
	} else if (document.getElementById('param2name').disabled === false) {
		document.getElementById('param2name').disabled=true;
		document.getElementById('param2type').disabled=true;
		document.getElementById('case1param2').disabled=true;
		return;
	} else {
		alert('You must have at least 1 parameter!');
	}
	} else {
		return;
	}
}

function cancelConfirm() {
	var x = confirm("Are you sure you want to cancel?");
	if (x==true) {
		window.location.href = './home.php';
		return;
	} else {
		return;
	}
}



/**function passwordChecker() {
	if (document.getElementsByName("oldpassword") != "") {
		alert("Please enter your old password");
		return false;
	} else if (document.getElementsByName("newpassword") != "") {
		alert("Please enter your new password");
		return false;
	} else if (document.getElementsByName("confirmpassword") != "") {
		alert("Please confirm your new password");
		return false;
	} else {
		return true;
	}
}**/


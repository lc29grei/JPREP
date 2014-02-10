function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            
            if ((rowCount-5) <= 50) {
            	var row = table.insertRow(rowCount);
            
            	var cell1 = row.insertCell(0);
            	cell1.innerHTML = 'Test Case ' + (rowCount - 5);
            	
            	for (var i=1;i<7;i++) {
            		var cell2 = row.insertCell(i);
            		var element1 = document.createElement("input");
            		element1.type = "text";
            		element1.name = "txtbox[]";
            		cell2.appendChild(element1);
            	}
            
            	var cell8 = row.insertCell(7);
            	var element7 = document.createElement("input");
            	element7.type = "checkbox";
            	element7.name = "checkbox[]";
            	cell8.appendChild(element7);
            	
            }
 
}
 
function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
           	if ((rowCount - 6) > 1) {
           		table.deleteRow(rowCount-1);
           	} else {
           		alert('You must have at least 1 test case!');
           	}
            }catch(e) {
                alert(e);
            }
        }
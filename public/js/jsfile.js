function test(){
  var author = document.getElementById('bookauthor');
  var authorFilter = /^[a-zA-Z]*$/i;
  var test_filter = authorFilter.test(author.value);
  if (test_filter == false)
  {
      alert('Please Enter valid Author Name');
  }
}


function search() {
    var inputForSearch, filter, table, tableRow, tableData, textValue;

    inputForSearch = document.getElementById("search-input");
    filter = inputForSearch.value.toUpperCase();
    table = document.getElementById("myTable");
    tableRow = table.getElementsByTagName("tr");
    
    for (var i = 1; i < tableRow.length; i++) {
        tableData = tableRow[i];
        if(tableData) {
          textValue = tableData.textContent || tableData.innerText;
          if (textValue.toUpperCase().indexOf(filter) > -1) {
            tableRow[i].style.display = "";
          } else {
            tableRow[i].style.display = "none";
          }
        }
    }
}



var ascending = 0;
function sort_table(table, column)
{
	$('.sortorder').remove();

	if (ascending == 2){
    ascending = -1;
  } 
  else{
    ascending = 2;
  }

	var rows = table.tBodies[0].rows;
	var rowLength = rows.length-1;
	var array = new Array();
	var i, j, cells, columnLength, showArrow;

	// fill the array with values from the table
	for(i = 0; i <=rowLength; i++)
	{
		cells = rows[i].cells;
		columnLength = cells.length;
		array[i] = new Array();

		for(j = 0; j < columnLength; j++) {
       array[i][j] = cells[j].innerHTML;
      }
	}

	// sort the array by the specified column number (col)[a] and order (asc)[b]
	array.sort(function(a, b)
	{
		var returnValue=0;
		var column1 = a[column];
		var column2 = b[column];
		var fA=parseFloat(column1);
		var fB=parseFloat(column2);
		if(column1 != column2)
		{
			if((fA==column1) && (fB==column2)){ 
        returnValue=( fA > fB ) ? ascending : -1*ascending;
      } //numerical
			else { 
        returnValue=(column1 > column2) ? ascending : -1*ascending;
      }
		}
		return returnValue;      
	});

	for(var rowId=0;rowId<=rowLength;rowId++)
	{
		for(var columnId=0;columnId<array[rowId].length;columnId++){ 
      table.tBodies[0].rows[rowId].cells[columnId].innerHTML=array[rowId][columnId]; 
    }
	}
	
  showArrow = table.rows[0].cells[column];

	if (ascending == -1) {
		$(showArrow).html($(showArrow).html() + '<span class="sortorder"> ▲ </span>');
		} else {
		$(showArrow).html($(showArrow).html() + '<span class="sortorder"> ▼ </span>');
	}
} // END OF sort_table()


function sortTable(tableColumn){
	sort_table(document.getElementById("myTable"), tableColumn);
}



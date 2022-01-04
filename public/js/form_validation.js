
    function loadfile(event){
        var file_name = event.target.files[0].name;
        $('#file_name').text(file_name).css('overflow', 'hidden');
        var output = document.getElementById('image');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style = "border: 1px solid black;margin-left:7px; padding: 10px; height:150px; width:120px; display:block;"
    };
    function space_not_allowed(key) {
        if (key.keyCode == 32) {
            key.preventDefault();
        }
    }

$('form input').keydown(function (e) {
    if (e.keyCode == 13) {
        var inputs = $(this).parents("form").eq(0).find(":input");
        if (inputs[inputs.index(this) + 1] != null) {
            inputs[inputs.index(this) + 1].focus();
        }
        e.preventDefault();
        return false;
    }
});
function autoMove(fro, too){
    var len = fro.value.length;
    var mx = fro.getAttribute('maxLength');
    if (len == mx) {
        document.getElementById(too).focus();
    }
}
$(document).ready(function(){

    // $('.format').focusin(function(){
    //     $('.format').val($('.format').val() + "");
    // });

    $('.format').focusout(function(){
        const formatter = new Intl.NumberFormat('en');
        var x = this.value;
        if ($.isNumeric(x)) {
            if (Math.floor(x) != x) {
                $(this).val(formatter.format(x));
            }
            else{
                y = formatter.format(x);
                y += ".00"
                $(this).val(y);
            }
        }
    });
});


function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  }else{
// Handle key press
var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\.|\,/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


///table
//     function myFunction() {
//     // Declare variables
//     var input, filter, table, tr, td, i, txtValue;
//     input = document.getElementById("myInput");
//     filter = input.value.toUpperCase();
//     table = document.getElementById("myTable");
//     tr = table.getElementsByTagName("tr");

//     // Loop through all table rows, and hide those who don't match the search query
//     for (i = 0; i < tr.length; i++) {

//         td = tr[i].getElementsByTagName("td")[0];
//       if (td) {
//         txtValue = td.textContent || td.innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//           tr[i].style.display = "";
//         } else {
//           tr[i].style.display = "none";
//         }
//       }

//     }
//   }

  function myFunction() {
    var input, filter, table, tr, td, i, t;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
      var filtered = false;
      var tds = tr[i].getElementsByTagName("td");
      for(t=0; t<tds.length; t++) {
          var td = tds[t];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
              filtered = true;
            }
          }
      }
      if(filtered===true) {
          tr[i].style.display = '';
      }
      else {
          tr[i].style.display = 'none';
      }
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
      const table = document.getElementById('myTable');
      const headers = table.querySelectorAll('th');
      const tableBody = table.querySelector('tbody');
      const rows = tableBody.querySelectorAll('tr');

      // Track sort directions
      const directions = Array.from(headers).map(function(header) {
          return '';
      });

      // Transform the content of given cell in given column
      const transform = function(index, content) {
          // Get the data type of column
          const type = headers[index].getAttribute('data-type');
          switch (type) {
              case 'number':
                  return parseFloat(content);
              case 'string':
              default:
                  return content;
          }
      };

      const sortColumn = function(index) {
          // Get the current direction
          const direction = directions[index] || 'asc';

          // A factor based on the direction
          const multiplier = (direction === 'asc') ? 1 : -1;

          const newRows = Array.from(rows);

          newRows.sort(function(rowA, rowB) {
              const cellA = rowA.querySelectorAll('td')[index].innerHTML;
              const cellB = rowB.querySelectorAll('td')[index].innerHTML;

              const a = transform(index, cellA);
              const b = transform(index, cellB);

              switch (true) {
                  case a > b: return 1 * multiplier;
                  case a < b: return -1 * multiplier;
                  case a === b: return 0;
              }
          });

          // Remove old rows
          [].forEach.call(rows, function(row) {
              tableBody.removeChild(row);
          });

          // Reverse the direction
          directions[index] = direction === 'asc' ? 'desc' : 'asc';

          // Append new row
          newRows.forEach(function(newRow) {
              tableBody.appendChild(newRow);
          });
      };

      [].forEach.call(headers, function(header, index) {
          header.addEventListener('click', function() {
              sortColumn(index);
          });
      });
  });


  // search 2
  function myFunction2() {
    var input, filter, table, tr, td, i, t;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable2");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
      var filtered = false;
      var tds = tr[i].getElementsByTagName("td");
      for(t=0; t<tds.length; t++) {
          var td = tds[t];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
              filtered = true;
            }
          }
      }
      if(filtered===true) {
          tr[i].style.display = '';
      }
      else {
          tr[i].style.display = 'none';
      }
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
      const table = document.getElementById('myTable2');
      const headers = table.querySelectorAll('th');
      const tableBody = table.querySelector('tbody');
      const rows = tableBody.querySelectorAll('tr');

      // Track sort directions
      const directions = Array.from(headers).map(function(header) {
          return '';
      });

      // Transform the content of given cell in given column
      const transform = function(index, content) {
          // Get the data type of column
          const type = headers[index].getAttribute('data-type');
          switch (type) {
              case 'number':
                  return parseFloat(content);
              case 'string':
              default:
                  return content;
          }
      };

      const sortColumn = function(index) {
          // Get the current direction
          const direction = directions[index] || 'asc';

          // A factor based on the direction
          const multiplier = (direction === 'asc') ? 1 : -1;

          const newRows = Array.from(rows);

          newRows.sort(function(rowA, rowB) {
              const cellA = rowA.querySelectorAll('td')[index].innerHTML;
              const cellB = rowB.querySelectorAll('td')[index].innerHTML;

              const a = transform(index, cellA);
              const b = transform(index, cellB);

              switch (true) {
                  case a > b: return 1 * multiplier;
                  case a < b: return -1 * multiplier;
                  case a === b: return 0;
              }
          });

          // Remove old rows
          [].forEach.call(rows, function(row) {
              tableBody.removeChild(row);
          });

          // Reverse the direction
          directions[index] = direction === 'asc' ? 'desc' : 'asc';

          // Append new row
          newRows.forEach(function(newRow) {
              tableBody.appendChild(newRow);
          });
      };

      [].forEach.call(headers, function(header, index) {
          header.addEventListener('click', function() {
              sortColumn(index);
          });
      });
  });

  //search 3
  function myFunction3() {
    var input, filter, table, tr, td, i, t;
    input = document.getElementById("myInput3");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable3");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
      var filtered = false;
      var tds = tr[i].getElementsByTagName("td");
      for(t=0; t<tds.length; t++) {
          var td = tds[t];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
              filtered = true;
            }
          }
      }
      if(filtered===true) {
          tr[i].style.display = '';
      }
      else {
          tr[i].style.display = 'none';
      }
    }
  }
  document.addEventListener('DOMContentLoaded', function() {
      const table = document.getElementById('myTable3');
      const headers = table.querySelectorAll('th');
      const tableBody = table.querySelector('tbody');
      const rows = tableBody.querySelectorAll('tr');

      // Track sort directions
      const directions = Array.from(headers).map(function(header) {
          return '';
      });

      // Transform the content of given cell in given column
      const transform = function(index, content) {
          // Get the data type of column
          const type = headers[index].getAttribute('data-type');
          switch (type) {
              case 'number':
                  return parseFloat(content);
              case 'string':
              default:
                  return content;
          }
      };

      const sortColumn = function(index) {
          // Get the current direction
          const direction = directions[index] || 'asc';

          // A factor based on the direction
          const multiplier = (direction === 'asc') ? 1 : -1;

          const newRows = Array.from(rows);

          newRows.sort(function(rowA, rowB) {
              const cellA = rowA.querySelectorAll('td')[index].innerHTML;
              const cellB = rowB.querySelectorAll('td')[index].innerHTML;

              const a = transform(index, cellA);
              const b = transform(index, cellB);

              switch (true) {
                  case a > b: return 1 * multiplier;
                  case a < b: return -1 * multiplier;
                  case a === b: return 0;
              }
          });

          // Remove old rows
          [].forEach.call(rows, function(row) {
              tableBody.removeChild(row);
          });

          // Reverse the direction
          directions[index] = direction === 'asc' ? 'desc' : 'asc';

          // Append new row
          newRows.forEach(function(newRow) {
              tableBody.appendChild(newRow);
          });
      };

      [].forEach.call(headers, function(header, index) {
          header.addEventListener('click', function() {
              sortColumn(index);
          });
      });
  });

  // search 4
  function myFunction4() {
    var input, filter, table, tr, td, i, t;
    input = document.getElementById("myInput4");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable4");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
      var filtered = false;
      var tds = tr[i].getElementsByTagName("td");
      for(t=0; t<tds.length; t++) {
          var td = tds[t];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
              filtered = true;
            }
          }
      }
      if(filtered===true) {
          tr[i].style.display = '';
      }
      else {
          tr[i].style.display = 'none';
      }
    }
  }


  document.addEventListener('DOMContentLoaded', function() {
      const table = document.getElementById('myTable4');
      const headers = table.querySelectorAll('th');
      const tableBody = table.querySelector('tbody');
      const rows = tableBody.querySelectorAll('tr');

      // Track sort directions
      const directions = Array.from(headers).map(function(header) {
          return '';
      });

      // Transform the content of given cell in given column
      const transform = function(index, content) {
          // Get the data type of column
          const type = headers[index].getAttribute('data-type');
          switch (type) {
              case 'number':
                  return parseFloat(content);
              case 'string':
              default:
                  return content;
          }
      };

      const sortColumn = function(index) {
          // Get the current direction
          const direction = directions[index] || 'asc';

          // A factor based on the direction
          const multiplier = (direction === 'asc') ? 1 : -1;

          const newRows = Array.from(rows);

          newRows.sort(function(rowA, rowB) {
              const cellA = rowA.querySelectorAll('td')[index].innerHTML;
              const cellB = rowB.querySelectorAll('td')[index].innerHTML;

              const a = transform(index, cellA);
              const b = transform(index, cellB);

              switch (true) {
                  case a > b: return 1 * multiplier;
                  case a < b: return -1 * multiplier;
                  case a === b: return 0;
              }
          });

          // Remove old rows
          [].forEach.call(rows, function(row) {
              tableBody.removeChild(row);
          });

          // Reverse the direction
          directions[index] = direction === 'asc' ? 'desc' : 'asc';

          // Append new row
          newRows.forEach(function(newRow) {
              tableBody.appendChild(newRow);
          });
      };

      [].forEach.call(headers, function(header, index) {
          header.addEventListener('click', function() {
              sortColumn(index);
          });
      });
  });


//Modal



// Get the modal
var advanceModal = document.getElementById("advanceModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var advance_close = document.getElementsByClassName("advance_modal_close")[0];
// When the user clicks the button, open the modal
btn.onclick = function() {
    advanceModal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
advance_close.onclick = function() {
    advanceModal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == advanceModal) {
      advanceModal.style.display = "none";
    }
}


var expenseModal = document.getElementById("expenseModal");
var deliveryModal = document.getElementById("deliveryModal");
var profitModal = document.getElementById("profitModal");




var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");
var btn3 = document.getElementById("myBtn3");



var expense_close = document.getElementsByClassName("expense_modal_close")[0];
var delivery_close = document.getElementsByClassName("delivery_modal_close")[0];
var profit_close = document.getElementsByClassName("profit_modal_close")[0];
// var button =  document.getElementsByClassName("buttonClose")[0];



btn1.onclick = function() {
    expenseModal.style.display = "block";
}

btn2.onclick = function() {
    deliveryModal.style.display = "block";
}

btn3.onclick = function() {
    profitModal.style.display = "block";
}



expense_close.onclick = function() {
    expenseModal.style.display = "none";
}

delivery_close.onclick = function() {
    deliveryModal.style.display = "none";
}

profit_close.onclick = function() {
    profitModal.style.display = "none";
}




window.onclick = function(event) {
    if (event.target == expenseModal) {
        expenseModal.style.display = "none";
    }
}

window.onclick = function(event) {
    if (event.target == deliveryModal) {
        deliveryModal.style.display = "none";
    }
}

window.onclick = function(event) {
    if (event.target == itemSaleModal) {
        profitModal.style.display = "none";
    }
}


function sort_name()
{
 var table=$('#mytable');
 var tbody =$('#table1');

 tbody.find('tr').sort(function(a, b) 
 {
  if($('#name_order').val()=='asc') 
  {
   return $('td:first', a).text().localeCompare($('td:first', b).text());
  }
  else 
  {
   return $('td:first', b).text().localeCompare($('td:first', a).text());
  }
		
 }).appendTo(tbody);
	
 var sort_order=$('#name_order').val();
 if(sort_order=="asc")
 {
  document.getElementById("name_order").value="desc";
 }
 if(sort_order=="desc")
 {
  document.getElementById("name_order").value="asc";
 }
}
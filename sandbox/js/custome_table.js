 $(document).ready(function() {

         $('#example').dataTable( {
          "bProcessing": true,
          "sAjaxSource": "http://localhost/pickup2013/sandbox/test.php",
          "aoColumns": [
            { "mData": "ID" },
            { "mData": "lastname" },
            { "mData": "PreviousSchool" },
            { "mData": "hometown" },
            { "mData": "Major" },
            { "mData": "arrive_5" },
            { "mData": "arrive_airport_5" },
            { "mData": "LugBag" },
            { "mData": "LugBox" },
            { "mData": "LugBin" },
            { "mData": "FamilyMember" }],


          "fnInitComplete": function () {
                   
                $('#example tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } );  }
        } );
          $("select").change(function () {

          $('#example tr').unbind('click'); 
          $('#example tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 
          });

          $('#example_next').click( function() {
          $('#example tr').bind('click',function() {
          $(this).toggleClass('row_selected');
        } ); 
        } ); 

        $('#button1').click(function() {
          
          alert($("tr[class~='row_selected']").text());
        });
        $('#button2').click(function() {
          $("tr[class~='row_selected']").toggleClass("row_selected");
        });


      } );
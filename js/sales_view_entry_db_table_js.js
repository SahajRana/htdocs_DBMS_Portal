//filter button.
$(document).ready(function(){

    $('.filterable .btn-filter').click(function(){
        
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        
        var code = e.keyCode || e.which;
        if (code == '9') return;
        
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        
        $table.find('tbody .no-result').remove();
        
        $rows.show();
        $filteredRows.hide();
        
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    }); 
});


$(document).ready(function(){
    var datedb,servicesdb,feedbackdb,uniqid,dateNew; 
    $('#edit').on('shown.bs.modal', function (e) {

        //alert(document.getElementById("edityo").value);     
        uniqid=$(e.relatedTarget).data('book-id');
       

        datedb=document.getElementById("tddatedb"+uniqid).innerText;
        servicesdb=document.getElementById("tdservicesdb"+uniqid).innerText;
        feedbackdb=document.getElementById("tdfeedbackdb"+uniqid).innerText;
        
     
        document.getElementById("dxdatedb").placeholder = datedb;
        document.getElementById("dxservicesdb").placeholder = "Services: "+servicesdb;
        document.getElementById("dxfeedbackdb").placeholder = "Feedback: "+feedbackdb;
        
        
     });

    $('#edit .modal-footer button').on('click', function(event) {
        event.preventDefault();
        dateNew=document.getElementById("dxdatedb").value;
        //alert(dateNew);
        if (dateNew !=='') {
            datedb=dateNew;
        }

       
        servicesdb=document.getElementById("dxservicesdb").value;
        feedbackdb=document.getElementById("dxfeedbackdb").value;
        
       // alert(date);
      
      $.post("sales_update_db_table_php.php", {
        uniqid:uniqid,datedb:datedb, servicesdb:servicesdb, feedbackdb:feedbackdb
        }).then(function (result) {
            console.log(result);
        }).fail(function () {
            console.err('failed to fetch data');
        });

      $(this).closest('.modal').one('hidden.bs.modal', function(e) {
        // Fire if the button element 
        e.preventDefault();

      });
       location.reload();
    });



    $('#delete').on('shown.bs.modal', function (e) {

        //alert(document.getElementById("edityo").value);     
        uniqid=$(e.relatedTarget).data('book-id');
        //alert(name); 
     });

    $('#delete .modal-footer .btn-success').on('click', function(event) {
        event.preventDefault();
        //alert("Asdada");
      $.post("sales_delete_db_table_php.php", {
        uniqid:uniqid
        }).then(function (result) {
            console.log(result);
        }).fail(function () {
            console.err('failed to fetch data');
        });

      $(this).closest('.modal').one('hidden.bs.modal', function(e) {
        // Fire if the button element 
        e.preventDefault();

      });
       location.reload();
    });




});
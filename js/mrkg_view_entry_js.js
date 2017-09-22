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
    var date,name,corp,uniqid,mobno,address,field,request,dateNew,age; 
    $('#edit').on('shown.bs.modal', function (e) {

        //alert(document.getElementById("edityo").value);     
        uniqid=$(e.relatedTarget).data('book-id');
       

        date=document.getElementById("tddate"+uniqid).innerText;
        name=document.getElementById("tdname"+uniqid).innerText;
        corp=document.getElementById("tdcorp"+uniqid).innerText;
        mobno=document.getElementById("tdmobno"+uniqid).innerText;
        address=document.getElementById("tdaddress"+uniqid).innerText;
        field=document.getElementById("tdfield"+uniqid).innerText;
        request=document.getElementById("tdrequest"+uniqid).innerText;
        age=document.getElementById("tdage"+uniqid).innerText;

     
        document.getElementById("dxdate").placeholder = date;
        document.getElementById("dxname").placeholder = "Name: "+name;
        document.getElementById("dxage").placeholder = "Age: "+age;
        document.getElementById("dxcorp").placeholder = "Corp: "+corp;
        document.getElementById("dxmobno").placeholder = "Mobile No.: "+mobno;
        document.getElementById("dxaddress").placeholder = "Address: "+address;
        document.getElementById("dxfield").placeholder = "Field: "+field;
        document.getElementById("dxrequest").placeholder = "Request: "+request;
        
        
        
     });

    $('#edit .modal-footer button').on('click', function(event) {
        event.preventDefault();
        dateNew=document.getElementById("dxdate").value;
        if (dateNew !=='') {
            date=dateNew;
        }
        name=document.getElementById("dxname").value;
        corp=document.getElementById("dxcorp").value;
        mobno=document.getElementById("dxmobno").value;
        address=document.getElementById("dxaddress").value;
        field=document.getElementById("dxfield").value;
        age=document.getElementById("dxage").value;
        request=document.getElementById("dxrequest").value;

       // alert(date);
      
      $.post("mrkg_update.php", {
        date:date, uniqid:uniqid, name:name, age:age, corp:corp, mobno:mobno, address:address, field:field, request:request
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
      $.post("mrkg_delete.php", {
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
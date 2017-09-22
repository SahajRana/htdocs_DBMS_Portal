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
    var sector,corp,contname,contmobnum,contemail,corpcatg,othrinfo,uniqid; 
    $('#edit').on('shown.bs.modal', function (e) {

        //alert(document.getElementById("edityo").value);     
        uniqid=$(e.relatedTarget).data('book-id');
       

        sector=document.getElementById("tdsector"+uniqid).innerText;
        corp=document.getElementById("tdcorp"+uniqid).innerText;
        contname=document.getElementById("tdcontname"+uniqid).innerText;
        contmobnum=document.getElementById("tdcontmobnum"+uniqid).innerText;
        contemail=document.getElementById("tdcontemail"+uniqid).innerText;
        clsifctn=document.getElementById("tdclsifctn"+uniqid).innerText;
        corpcatg=document.getElementById("tdcorpcatg"+uniqid).innerText;
        othrinfo=document.getElementById("tdothrinfo"+uniqid).innerText;

     
        document.getElementById("dxsector").placeholder = "Sector: "+sector;
        document.getElementById("dxcorp").placeholder = "Corporation: "+corp;
        document.getElementById("dxcontname").placeholder = "Contact Name: "+contname;
        document.getElementById("dxcontmobnum").placeholder = "Contact Mobile No.: "+contmobnum;
        document.getElementById("dxcontemail").placeholder = "Contact Email: "+contemail;
        document.getElementById("dxclsifctn").placeholder = "Classifation: "+clsifctn;
        document.getElementById("dxcorpcatg").placeholder = "Corp Catagory: "+corpcatg;
        document.getElementById("dxothrinfo").placeholder = "Other Information: "+othrinfo;
        
        
        
     });

    $('#edit .modal-footer button').on('click', function(event) {
        event.preventDefault();


        sector=document.getElementById("dxsector").value;
        corp=document.getElementById("dxcorp").value;
        contname=document.getElementById("dxcontname").value;
        contmobnum=document.getElementById("dxcontmobnum").value;
        contemail=document.getElementById("dxcontemail").value;
        clsifctn=document.getElementById("dxclsifctn").value;
        corpcatg=document.getElementById("dxcorpcatg").value;
        othrinfo=document.getElementById("dxothrinfo").value;

       // alert(date);
      
      $.post("sales_update_db_php.php", {
        sector:sector, uniqid:uniqid, contname:contname, contemail:contemail, corp:corp, contmobnum:contmobnum, clsifctn:clsifctn, corpcatg:corpcatg, othrinfo:othrinfo
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
      $.post("sales_delete_db_php.php", {
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

function deals(element){
    alert(element);
    event.preventDefault();
    $.post("sales_db_help_iddb_php.php", {
        iddb:element
        }).then(function (result) {
            console.log(result);
        }).fail(function () {
            console.err('failed to fetch data');
    });
    location.href = 'sales_inside_view_db_deals.php';

};
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



//add function
//Read more: http://mrbool.com/how-to-add-edit-and-delete-rows-of-a-html-table-with-jquery/26721#ixzz4n0ONDTKX
var a=1;
function Add(){ 
    
    $("#tblData tbody").append( 
        "<tr>"+ 
        "<td style=\"width: 60px;\">"+a+"</td>"+ 
        "<td ><input type='text'/></td>"+ 
        "<td style=\"max-width: 140px; width: 140px;\"><input type='text' style=\"width: 140px;\"/></td>"+ 
        "<td style=\"max-width: 100px; width: 100px;\"><input type='text' style=\"width: 100px;\"/></td>"+ 
        "<td style=\"max-width: 100px; width: 100px;\"><input type='text' style=\"width: 100px;\"/></td>"+ 
        "<td><input type='text'/></td>"+ 
        "<td style=\"max-width: 100px; width: 100px;\"><input type='text' style=\"width: 100px;\"/></td>"+ 
        "<td style='width: 85px; background:#fff;'><button id='"+a+"' class=\"btnSave\"><span class=\"glyphicon glyphicon-floppy-saved\"></span></button></td>"+

        "<td style=\"width: 85px; background:#fff;\"><button id=id='"+a+"' class=\"btn btn-danger btn-xs btnDelete\" onClick=\"DeleteA(this)\"><span class=\"glyphicon glyphicon-trash\"></span></button></td>"+
        
        "</tr>"); 
  //  alert(a);
    a=a+1;

    $(".btnSave").bind("click", Save); 
   // $(".btnDelete").bind("click", Delete); 
}; 

function Save(element){
    var par = $(this).parent().parent(); //tr 
    var tdResDet = par.children("td:nth-child(2)"); 
    var tdNum = par.children("td:nth-child(3)"); 
    var tdCost = par.children("td:nth-child(4)"); 
    var tdTotal = par.children("td:nth-child(5)"); 
    var tdResPer = par.children("td:nth-child(6)"); 
    var tdRest = par.children("td:nth-child(7)"); 
    var tdEdit = par.children("td:nth-child(8)"); 
    var tdDelete = par.children("td:nth-child(9)"); 

    tdResDet.html(tdResDet.children("input[type=text]").val()); 
    tdNum.html(tdNum.children("input[type=text]").val()); 
    tdCost.html(tdCost.children("input[type=text]").val()); 
    tdTotal.html(tdTotal.children("input[type=text]").val()); 
    tdResPer.html(tdResPer.children("input[type=text]").val()); 
    tdRest.html(tdRest.children("input[type=text]").val()); 
    tdEdit.html("<button class=\"btnEdit\"><span class=\"glyphicon glyphicon-pencil\"></span></button>"); 
    tdDelete.html("<button class=\"btnDelete\"><span class=\"glyphicon glyphicon-trash\"></span></button>"); 

    $(".btnEdit").bind("click", Edit); 
    $(".btnDelete").bind("click", Delete);
}; 

function Edit(){ 
    var par = $(this).parent().parent(); //tr 
    var tdResDet = par.children("td:nth-child(2)"); 
    var tdNum = par.children("td:nth-child(3)"); 
    var tdCost = par.children("td:nth-child(4)"); 
    var tdTotal = par.children("td:nth-child(5)"); 
    var tdResPer = par.children("td:nth-child(6)"); 
    var tdRest = par.children("td:nth-child(7)"); 
    var tdEdit = par.children("td:nth-child(8)"); 
    var tdDelete = par.children("td:nth-child(9)"); 


    tdResDet.html("<input type='text' id='txtName' value='"+tdResDet.html()+"'/>"); 
    tdNum.html("<input type='text' id='txtName' style=\"width: 140px;\" value='"+tdNum.html()+"'/>"); 
    tdCost.html("<input type='text' id='txtName' style=\"width: 100px;\" value='"+tdCost.html()+"'/>"); 
    tdTotal.html("<input type='text' id='txtName' style=\"width: 100px;\" value='"+tdTotal.html()+"'/>"); 
    tdResPer.html("<input type='text' id='txtName' value='"+tdResPer.html()+"'/>"); 
    tdRest.html("<input type='text' id='txtName' style=\"width: 100px;\" value='"+tdRest.html()+"'/>"); 
    tdEdit.html("<button class=\"btnSave\"><span class=\"glyphicon glyphicon-floppy-saved\"></span></button>"); 
    tdDelete.html("<button class=\"btnDelete\"><span class=\"glyphicon glyphicon-trash\"></span></button>"); 

    $(".btnSave").bind("click", Save); 
    //$(".btnEdit").bind("click", Edit); 
    $(".btnDelete").bind("click", Delete); 
};


function Delete(element){
    var par = $(this).parent().parent(); //tr
    par.remove();

    //var i= element.id;
   // var n = parseInt(element.id.substr(4));
   // var i= $("#"+n).closest('tr').index();
    //i=i+1;
    //alert(i);
    //document.getElementById("tblData").deleteRow(i);
};

function DeleteA(element){
    ///var par = $(this).parent().parent(); //tr
    //par.remove();
    
    var i= element.id;
    var n = parseInt(element.id.substr(4));
    var i= $("#"+n).closest('tr').index();
    i=i+1;
    //alert(i);
    document.getElementById("tblData").deleteRow(i);
};


$(function(){ 
    //Add, Save, Edit and Delete functions code 
    $(".btnEdit").bind("click", Edit); 
    $(".btnDelete").bind("click", Delete); 
    $("#btnAdd").bind("click", Add); 
});



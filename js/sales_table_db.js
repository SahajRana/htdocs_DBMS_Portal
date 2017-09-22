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
var a=1,id;
var $datedb,$servicesdb,$feedbackdb;
function Add(){ 
    
    $("#tblData tbody").append( 
        "<tr>"+ 
        "<td style=\"width: 60px;\">"+a+"</td>"+ 
        "<td id='tddatee"+a+"' style=\"max-width: 140px; width: 200px;\"><input id='tddate"+a+"' name='tddate"+a+"' type='date' style=\"width: 200px;\"/></td>"+ 
        "<td id='tdservicese"+a+"' ><input id='tdservices"+a+"' name='tdservices"+a+"' type='text'/></td>"+ 
        "<td id='tdfeedbacke"+a+"'><input id='tdfeedback"+a+"' name='tdfeedback"+a+"' type='text'/></td>"+ 
        
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
    var tdDate = par.children("td:nth-child(2)"); 
    var tdServices = par.children("td:nth-child(3)");
    var tdFeedback = par.children("td:nth-child(4)"); 
    var tdEdit = par.children("td:nth-child(5)"); 
    var tdDelete = par.children("td:nth-child(6)"); 

    tdDate.html(tdDate.children("input[type=date]").val()); 
    tdServices.html(tdServices.children("input[type=text]").val()); 
    tdFeedback.html(tdFeedback.children("input[type=text]").val()); 
    tdEdit.html("<button class=\"btnEdit\"><span class=\"glyphicon glyphicon-pencil\"></span></button>"); 
    tdDelete.html("<button class=\"btnDelete\"><span class=\"glyphicon glyphicon-trash\"></span></button>"); 

    id=this.id;
    datedb=document.getElementById("tddatee"+this.id).innerText;
    servicesdb=document.getElementById("tdservicese"+this.id).innerText;
    feedbackdb=document.getElementById("tdfeedbacke"+this.id).innerText;

    

    formSubmit();

    $(".btnEdit").bind("click", Edit); 
    $(".btnDelete").bind("click", Delete);
}; 

function Edit(){ 
    var par = $(this).parent().parent(); //tr 
    var tdDate = par.children("td:nth-child(2)"); 
    var tdServices = par.children("td:nth-child(3)"); 
    var tdFeedback = par.children("td:nth-child(4)"); 
    var tdEdit = par.children("td:nth-child(5)"); 
    var tdDelete = par.children("td:nth-child(6)"); 


    tdDate.html("<input type='date'  style=\"width: 200px;\" value='"+tdDate.html()+"'/>"); 
    tdServices.html("<input type='text'  value='"+tdServices.html()+"'/>"); 
    tdFeedback.html("<input type='text' value='"+tdFeedback.html()+"'/>"); 
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

function formSubmit(){
      event.preventDefault();
      //  alert(id);
      $.post("sales_db_a_php.php", {
        numberA:a,id:id,datedb:datedb,servicesdb:servicesdb,feedbackdb:feedbackdb
        }).then(function (result) {
            console.log(result);
        }).fail(function () {
            console.err('failed to fetch data');
        });
};


$(function(){ 
    //Add, Save, Edit and Delete functions code 
    $(".btnEdit").bind("click", Edit); 
    $(".btnDelete").bind("click", Delete); 
    $("#btnAdd").bind("click", Add); 
});



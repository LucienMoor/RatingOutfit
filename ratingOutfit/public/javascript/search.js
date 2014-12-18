 $("document").ready(function(){
            $("#female").change(search())
   
   function search()
   {
     var allVals = [];
    $('#searchInput :checked').each(function () {
       allVals.push($(this).val());
 });

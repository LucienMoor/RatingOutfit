<div id="searchInput">
    <table class="center">
        <tr>
          <td>{{ Form::label('sex-w', 'Female') }}{{ Form::checkbox('female', 'female', null, ['id' => 'female'])}}</td>
          <td>{{ Form::label('sex-m', 'Male') }}{{ Form::checkbox('man', 'man',null, ['id' => 'male'])}}</td>
          <td>{{ Form::label('sex-u', 'Unisex') }}{{ Form::checkbox('unisex', 'unisex',null, ['id' => 'unisex']) }}</td>
          <td>{{ Form::label('style-emo', 'Emo') }}{{ Form::checkbox('emo', 'emo',null, ['id' => 'emo'])}}</td>
          <td>{{ Form::label('style-fluo', 'Fluo') }}{{ Form::checkbox('fluo', 'fluo',null, ['id' => 'fluo'])}}</td>
        </tr>
      </table>
  </div>

<script>
  $("document").ready(function(){
   $(":checkbox").change(function(){ 
     var allVals = [];
     $('.grid-item').hide();
     $('input:checkbox:checked').each(function() {
       allVals.push($(this).val());
     }); 
     for(var i=0; i<allVals.length;i++)
       {
         $('.'+allVals[i]).show();  
       }
     
   });

 });
  
</script>



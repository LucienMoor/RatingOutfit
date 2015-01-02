<label class="checkbox">{{ Form::checkbox('all', 'all')}} Show all</label>
<?php $style=Style::getStyleArray() ?>

<label class="labelCheckbox">Gender</label>

  <label class="checkbox">{{ Form::checkbox('female', 'female')}} Women</label>
  <label class="checkbox">{{ Form::checkbox('man', 'man')}}Men</label>
  <label class="checkbox">{{ Form::checkbox('child', 'child')}}Child</label>
  <label class="checkbox">{{ Form::checkbox('unisex', 'unisex')}}Unisex</label>
  
<label class="labelCheckbox">Style</label>
  @foreach ($style as $value)
    <label class="checkbox"> {{ Form::checkbox($value, $value)}} {{$value}}</label>
  @endforeach    



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



<label class="checkbox">{{ Form::checkbox('all', 'all')}} Show all</label>
<?php $style=Style::getStyleArray() ?>

<label class="labelCheckbox">Gender</label>

  <label class="checkbox">{{ Form::checkbox('Women', 'Women')}} Women</label>
  <label class="checkbox">{{ Form::checkbox('Men', 'Men')}}Men</label>
  <label class="checkbox">{{ Form::checkbox('Child', 'Child')}}Child</label>
  <label class="checkbox">{{ Form::checkbox('Unisex', 'Unisex')}}Unisex</label>
  
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



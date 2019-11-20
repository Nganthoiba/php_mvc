
  <link href="<?=Config::get('host')?>/root/jquery_ui/jquery-ui.css" rel="stylesheet">
  <style>
  #sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
  }
  #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
  }
  .highlights{
	background-color: GREEN;
  }
  </style>
   <script type="text/javascript" src="<?=Config::get('host')?>/root/jquery_ui/jquery-ui.js"></script>
  <script>
  

  $( function() {
    $( "#sortable1, #sortable2" ).sortable({
		connectWith: ".connectedSortable",
		start: function(event, ui) {
           var start_pos = ui.item.index();
            ui.item.data('start_pos', start_pos);
		},
		change: function(event, ui) {
			//alert("here");
			var start_pos = ui.item.data('start_pos');
			var index = ui.placeholder.index();
			if (start_pos < index) {
				//$('#sortable1 li:nth-child(' + index + ')').addClass('highlights');
			} else {
				//$('#sortable1 li:eq(' + (index + 1) + ')').addClass('highlights');
			} 
		},
		update: function(event, ui) {
			//$('#sortable1 li').removeClass('highlights');
		}
    }).disableSelection();
  } );

  


function fn_change(){
	console.log('---------------- Excluded values ---------------------');
	$('#sortable1 li').each(function(i)
	{
	   console.log( $(this).html()+ ' value = ' + $(this).attr('data-value') ); // This is your rel value
	   
	});
	console.log('---------------- Included values ---------------------');
	$('#sortable2 li').each(function(i)
	{
	   console.log( $(this).html()+ ' value = ' + $(this).attr('data-value') ); // This is your rel value
	   
	});
	 
	 
}
  
  </script>


<div>

<ul id="sortable1" class="connectedSortable" >
EXCLUDED MEMBER
  <li class="ui-state-default" data-value="1" >Operator</li>
  <li class="ui-state-default" data-value="2" >Copying Section</li>
  <li class="ui-state-default"  data-value="3" >Registrar General</li>
  <li class="ui-state-default"  data-value="4" >Judicial 1</li>
  <li class="ui-state-default"  data-value="5" >Judicial 2</li>
  <li class="ui-state-default"  data-value="6" >Judicial 3</li>
  <li class="ui-state-default"  data-value="7" >Jr. AA</li>
  <li class="ui-state-default"  data-value="8" >Sr. AA</li>
  <li class="ui-state-default"  data-value="9" >Assistant Registrar 2</li>
  <li class="ui-state-default"  data-value="10" >Deputy Registrar Judicial</li>
</ul>

<ul id="sortable2" class="connectedSortable">
INCLUDED MEMBER
  <li class="ui-state-highlight" data-value="11"  >Superintendent</li>
  <li class="ui-state-highlight" data-value="12" >Applicant</li>
</ul>
</div>

<button onClick="fn_change();" >SAVE</button>





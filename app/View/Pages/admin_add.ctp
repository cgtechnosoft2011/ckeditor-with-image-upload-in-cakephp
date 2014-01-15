<?php
/****************************************
***** For more information contact ******
*********** kkhatti@gmail.com ***********
****************************************/ 

echo $this->Html->script('ckeditor/ckeditor');?>
<div class="row">
  <div class="col-md-9">
    <h1><?php echo $title; ?></h1>
  </div>
</div>
<?php echo $this->Form->create('Page');?>

	<div class="clear20"></div>
	<div class="row">
  		<div class="col-md-3">Title</div>
      <div class="col-md-8">
      		 <?php echo $this->Form->input('Page.p_title',array('label' => false, 'required' => 'required', 'class' => 'form-control')); ?>
     </div>
  </div>  
  
  
  <div class="clear10"></div>
	<div class="row">
  		<div class="col-md-3">Description</div>
      <div class="col-md-8">
      <?php echo $this->Form->textarea('Page.p_desc', array('class'=>'ckeditor form-control','required'=>'false','autocomplete'=>'off'));  ?>
      
     </div>
  </div>  
  <script type="text/javascript">
      CKEDITOR.config.toolbar = 'Custom_medium';
      CKEDITOR.config.height = '400';
			CKEDITOR.replace('PagePDesc');
  </script>

	<div class="clear10"></div>
	<div class="row">
  		<div class="col-md-3">Status</div>
      <div class="col-md-8">
      		<?php echo $this->Form->input('p_status', array('type' =>'radio', 'options'=>array('1'=>' Enable','0'=>' Disable'), 'required'=>'required', 'legend'=>false,'div'=>false, 'label'=>false, 'separator' => '  ','value'=>1))?>
     </div>
  </div>  
  
  <div class="clear10"></div>
	<div class="row">
  		<div class="col-md-3">&nbsp;</div>
      <div class="col-md-8">
      		<?php echo $this->Form->button('Save',array('type'=>'submit','class'=>'btn btn-primary'))?>
     </div>
  </div>    
    
<?php echo $this->Form->end();?>

</div>
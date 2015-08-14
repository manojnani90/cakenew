<div class="panel-body">
  <?php echo $this->Form->create('Employe',array('class' => 'form-horizontal','enctype'=>'multipart/form-data')); ?>
     <center>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Upload Employe Names</label><br><br/>
    		<div class="col-md-3">
            <?php echo $this->Form->input('Employes', array('name'=>'Employes','type' => 'file'));?>
      			
                <p class="btn-warning">Note: .csv .xls .xlsx accepted</p>
    		</div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-md-3">
                
    		</div>
  		</div>
         <div class="form-group">
    		<label for="inputEmail3" class="col-sm-2 control-label"></label>
    		<div class="col-sm-3">
      			<?php echo $this->Session->flash(); ?>
    		</div>
  		</div>
        <br/>
        <?php /*?><div class="form-group">
        	<p class="btn-danger">Example user upload columns both Excel and csv </p>
    		<image src="<?php echo '/directoryfire/submitDirectories/images/mlritmusersexcel.png'; ?>" alt="mlritm users upload" data-toggle="modal" data-target="#myModal" width="1090" height="70">
            
  		</div><?php */?>
        <?php echo $this->Form->end(__('Submit')); ?>
        </center>
</div>



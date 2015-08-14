
    <div class="logo">
  	<a href="<?php echo base_url.'admin/EmployeStages/reports'?>"><img src="<?php echo base_url.'images/logo.png'?>" alt=""></a>
	</div>
       
	<div class="menu">
	 <ul>
            <?php /*?><li class="<?php echo (empty($this->params['action']) && ($this->params['action']=='users') )?'active' :'inactive' ?>">
                  <a href="<?php echo base_url.'admin/Users'?>"><i class="icon-hdd"></i>User Management</a>
            </li><?php */?>
             
           <li>
                  <a href="<?php echo base_url.'admin/Users'?>">User Management</a>
           </li> 	   
           <li><a href="<?php echo base_url.'admin/EmployeStages/reports'?>">Reports</a></li>
	   <li><a href="<?php echo base_url.'admin/Employes'?>">Employees</a></li>
	   <li><a href="<?php echo base_url.'admin/EmployeStages'?>">Employee Stages</a></li>
           
	   <li><a href="<?php echo base_url.'admin/Roles'?>">Roles</a></li>
	   
	 </ul>
	</div>
	
	<div class="welcome-message">
	 Welcome <?php $data=$this->Session->read('Auth.User');
                    echo $data['name'];?> !
	</div>
	
	<div class="logout">
	 <a href="<?php echo base_url.'admin/Users/logout'?>">Logout</a>
	</div>
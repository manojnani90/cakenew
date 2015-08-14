<div class="form-section">
  <form  action="<?php echo base_url.'admin/EmployeStages/reports';?>" method='get' id="report-search" accept-charset="UTF-8">  
   <div class="form-reports">
    <div class="reports-row">     
      <div class="form-item form-type-select form-item-estage">
		 
		 <?php  
		 		
				if(isset($this->request->query['estage']))
				$sestage = $this->request->query['estage']; 
				if(isset($this->request->query['empid']))
				$sempid = $this->request->query['empid'];
				if(isset($this->request->query['companyname']))
				$scompanyname = $this->request->query['companyname'];
				if(isset($this->request->query['startdate']))
				$sstartdate = $this->request->query['startdate'];
				
				$estageselected = '';
				$empidselected = '';
				$companynameselected = '';
				$startdateselected = '';
		?>  		
		
          <label>Bus Stop</label>
           <select id="employestage" name="estage" class="form-select">
			<option value="0" selected="selected">Select BusStop</option>
			
			 <?php foreach ($employeStages1 as $stage): 
                            
				if($stage['EmployeStage']['stage']==$sestage){
					$estageselected = 'selected="selected"';
				}else{
					$estageselected ='';
				}
		     ?> 
<option value="<?php echo $stage['EmployeStage']['stage']; ?>"<?php echo $estageselected; ?>> 
    <?php echo $stage['EmployeStage']['stage']; ?> 
</option>
<?php endforeach; ?>
</select> 
  </div>
    </div>
	
	<div class="reports-row">     
      <div class="form-item form-type-select form-item-estage">
        <label>Employee Id</label>
          <select id="empid" name="empid" class="form-select">
			<option value="0">Select EmployeeId</option>
			
			<?php foreach ($empid1 as $empid): 
                            
				if($empid['EmployeStage']['employeid']==$sempid){
					$empidselected = 'selected="selected"';
				}else{
					$empidselected ='';
				}
		 ?> 
<option value="<?php echo $empid['EmployeStage']['employeid']; ?>"<?php echo $empidselected; ?>> 
    <?php echo $empid['EmployeStage']['employeid']; ?> 
</option>
<?php endforeach; ?>
</select> 
</div>
 </div>
     
	<div class="reports-row">     
      <div class="form-item form-type-select form-item-estage">
        <label>Company Name</label>
          <select id="companyname" name="companyname" class="form-select">
			<option value="0">Select Company</option>
			
			<?php foreach ($companynames as $companyname): 
                         
				if($companyname['Employe']['company_name']==$scompanyname){
					$companynameselected = 'selected="selected"';
				}else{
					$companynameselected ='';
				}
		 ?> 
<option value="<?php echo $companyname['Employe']['company_name']; ?>"<?php echo $companynameselected; ?>> 
    <?php echo $companyname['Employe']['company_name']; ?> 
</option>
<?php endforeach; ?>
</select> 
</div>
 </div> 
	             
        <div class="reports-row1 margin_t10">
		
           <label>Start date</label>
              <div>     
                  <?php echo $this->Form->input('date',array('label'=>false,'id'=>'dpStartDate','name'=>'startdate'));?>
              </div>
           
               <div style="margin-left: 22px;"><strong>Time</strong></div>
                <div>
		           <?php 
                        $start = strtotime('12:00 AM');
                        $end   = strtotime('11:59 PM');
                    ?>
                    <select style="width: 50px;" name="starthours" class="styled" id="startDateTimeSelect">
                        <option value="00">00</option>
						<?php for($i = $start;$i<=$end;$i+=3600){ ?>  
						<option value='<?php echo date('H:i', $i); ?>'><?php echo date('H:i', $i); ?></option>;
						<?php } ?>
						</select>
		           </div>
                 
                
				<div>			
                    <select style="width: 50px;" name="startminutes" class="styled" id="startDateTimeSelect1">
                        <option value="00">00</option>
						<option value="01">01</option><option value="02">02</option><option value="03">03</option>
						<option value="04">04</option><option value="05">05</option><option value="06">06</option>
						<option value="07">07</option><option value="08">08</option><option value="09">09</option>
						<option value="10">10</option><option value="11">11</option><option value="12">12</option>
						<option value="13">13</option><option value="14">14</option><option value="15">15</option>
						<option value="16">16</option><option value="17">17</option><option value="18">18</option>
						<option value="19">19</option><option value="20">20</option><option value="21">21</option>
						<option value="22">22</option><option value="23">23</option><option value="24">24</option>
						<option value="25">25</option><option value="26">26</option><option value="27">27</option>
						<option value="28">28</option><option value="29">29</option><option value="30">30</option>
						<option value="31">31</option><option value="32">32</option><option value="33">33</option>
						<option value="34">34</option><option value="35">35</option><option value="36">36</option>
						<option value="37">37</option><option value="38">38</option><option value="39">39</option>
						<option value="40">40</option><option value="41">41</option><option value="42">42</option>
						<option value="43">43</option><option value="44">44</option><option value="45">45</option>
						<option value="46">46</option><option value="47">47</option><option value="48">48</option>
						<option value="49">49</option><option value="50">50</option><option value="51">51</option>
						<option value="52">52</option><option value="53">53</option><option value="54">54</option>
						<option value="55">55</option><option value="56">56</option><option value="57">57</option>
						<option value="58">58</option><option value="59">59</option><option value="60">60</option>
                    </select>
		</div>
		
				<div>			
                    <select style="width: 50px;" name="startseconds" class="styled" id="startDateTimeSelect2">
                        <option value="00">00</option>
						<option value="01">01</option><option value="02">02</option><option value="03">03</option>
						<option value="04">04</option><option value="05">05</option><option value="06">06</option>
						<option value="07">07</option><option value="08">08</option><option value="09">09</option>
						<option value="10">10</option><option value="11">11</option><option value="12">12</option>
						<option value="13">13</option><option value="14">14</option><option value="15">15</option>
						<option value="16">16</option><option value="17">17</option><option value="18">18</option>
						<option value="19">19</option><option value="20">20</option><option value="21">21</option>
						<option value="22">22</option><option value="23">23</option><option value="24">24</option>
						<option value="25">25</option><option value="26">26</option><option value="27">27</option>
						<option value="28">28</option><option value="29">29</option><option value="30">30</option>
						<option value="31">31</option><option value="32">32</option><option value="33">33</option>
						<option value="34">34</option><option value="35">35</option><option value="36">36</option>
						<option value="37">37</option><option value="38">38</option><option value="39">39</option>
						<option value="40">40</option><option value="41">41</option><option value="42">42</option>
						<option value="43">43</option><option value="44">44</option><option value="45">45</option>
						<option value="46">46</option><option value="47">47</option><option value="48">48</option>
						<option value="49">49</option><option value="50">50</option><option value="51">51</option>
						<option value="52">52</option><option value="53">53</option><option value="54">54</option>
						<option value="55">55</option><option value="56">56</option><option value="57">57</option>
						<option value="58">58</option><option value="59">59</option><option value="60">60</option>
                    </select>
		</div>
        </div>
            <div class="reports-row1">
                <label> End date</label>
                  <div> 
                      <?php echo $this->Form->input('date',array('label'=>false,'id'=>'dpEndDate','name'=>'enddate'));?>
                  </div>
                
                  <div style="margin-left: 22px;"><strong>Time</strong></div>
		    	   <div>
                    <?php 
                        $start = strtotime('12:00 AM');
                        $end   = strtotime('11:59 PM');
                    ?>
                    <select style="width: 50px;" name="endhours" class="styled" id="endDateTimeSelect">
                        <option value="00">00</option>
                    <?php for($i = $start;$i<=$end;$i+=3600){ ?>  
                    <option value='<?php echo date('H:i', $i); ?>'><?php echo date('H:i', $i); ?></option>;
                    <?php } ?>
                    </select>                    
				   </div>					
                    <div>
                      <select style="width: 50px;" name="endminutes" class="styled" id="endDateTimeSelect1">
                        <option value="00">00</option>
						<option value="01">01</option><option value="02">02</option><option value="03">03</option>
						<option value="04">04</option><option value="05">05</option><option value="06">06</option>
						<option value="07">07</option><option value="08">08</option><option value="09">09</option>
						<option value="10">10</option><option value="11">11</option><option value="12">12</option>
						<option value="13">13</option><option value="14">14</option><option value="15">15</option>
						<option value="16">16</option><option value="17">17</option><option value="18">18</option>
						<option value="19">19</option><option value="20">20</option><option value="21">21</option>
						<option value="22">22</option><option value="23">23</option><option value="24">24</option>
						<option value="25">25</option><option value="26">26</option><option value="27">27</option>
						<option value="28">28</option><option value="29">29</option><option value="30">30</option>
						<option value="31">31</option><option value="32">32</option><option value="33">33</option>
						<option value="34">34</option><option value="35">35</option><option value="36">36</option>
						<option value="37">37</option><option value="38">38</option><option value="39">39</option>
						<option value="40">40</option><option value="41">41</option><option value="42">42</option>
						<option value="43">43</option><option value="44">44</option><option value="45">45</option>
						<option value="46">46</option><option value="47">47</option><option value="48">48</option>
						<option value="49">49</option><option value="50">50</option><option value="51">51</option>
						<option value="52">52</option><option value="53">53</option><option value="54">54</option>
						<option value="55">55</option><option value="56">56</option><option value="57">57</option>
						<option value="58">58</option><option value="59">59</option><option value="60">60</option>
                    </select>
		</div>	  
					<div>
                      <select style="width: 50px;" name="endseconds" class="styled" id="endDateTimeSelect2">
                        <option value="00">00</option>
						<option value="01">01</option><option value="02">02</option><option value="03">03</option>
						<option value="04">04</option><option value="05">05</option><option value="06">06</option>
						<option value="07">07</option><option value="08">08</option><option value="09">09</option>
						<option value="10">10</option><option value="11">11</option><option value="12">12</option>
						<option value="13">13</option><option value="14">14</option><option value="15">15</option>
						<option value="16">16</option><option value="17">17</option><option value="18">18</option>
						<option value="19">19</option><option value="20">20</option><option value="21">21</option>
						<option value="22">22</option><option value="23">23</option><option value="24">24</option>
						<option value="25">25</option><option value="26">26</option><option value="27">27</option>
						<option value="28">28</option><option value="29">29</option><option value="30">30</option>
						<option value="31">31</option><option value="32">32</option><option value="33">33</option>
						<option value="34">34</option><option value="35">35</option><option value="36">36</option>
						<option value="37">37</option><option value="38">38</option><option value="39">39</option>
						<option value="40">40</option><option value="41">41</option><option value="42">42</option>
						<option value="43">43</option><option value="44">44</option><option value="45">45</option>
						<option value="46">46</option><option value="47">47</option><option value="48">48</option>
						<option value="49">49</option><option value="50">50</option><option value="51">51</option>
						<option value="52">52</option><option value="53">53</option><option value="54">54</option>
						<option value="55">55</option><option value="56">56</option><option value="57">57</option>
						<option value="58">58</option><option value="59">59</option><option value="60">60</option>
                    </select>
		</div>								
              </div>      
            </div>
          <div class="report-buttons">
           <div class="slist-text1" align="center">
               <input type="submit" name="op" value="Display Reports" class="input-active" />                   
            </div>
            <hr>
            
            <div id="FareInformation">
                <?php
echo $this->Html->link('Export Reports to Excel',array('controller'=>'EmployeStages','action'=>'admin_downloads','?' => $this->request->query), array('target'=>'_blank','id'=>'downloadregistrations','class'=>'anchor_button','type'=>'button'));?>
                
            </div>   
            </div>
       </form>     
</div></div>




<?php $this->load->view('staff/template/header'); ?>

<div class="container" >
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
                <br />
                <br />
                <br />
				<div class="blog-wrap">
					<div class="container pd-0">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <div class="row no-gutters">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="blog-caption">
                                                        
                                                            
                                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                                <div class="pd-20 bg-white border-radius-4 box-shadow">
                                                                    <table class="data-table table-bordered stripe hover nowrap">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No.</th>
                                                                                <th>Meter No.</th>
                                                                                <th>Name</th>
                                                                                <th>Address</th>
                                                                                <th class="datatable-nosort">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        
                                                                        <tbody>
                                                                            <?php
                                                                                $i = 1;
                                                                                foreach($noRead as $nr){?>
                                                                                <tr>
                                                                                    <td><?php echo 
                                                                                        $i;
                                                                                        $i++
                                                                                    ?></td>
                                                                                    <td><?php echo $nr['Mtr_id']?></td>
                                                                                    <td><?php echo $nr['Cons_name']?></td>
                                                                                    <td><?php echo $nr['address']?></td>
                                                                                    <td class = "text-center">
                                                                                        <button class = "btn btn-primary btn-sm" type = "button">
                                                                                            <a href = "<?php echo base_url('staff/dashboard1/get_meter/'.$nr['Mtr_id']);?>">
                                                                                                <i class = "fa fa-check" style = "color: white"> Select</i>
                                                                                            </a>
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php }?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>										
                            </div>
                        </div>
					</div>

			</div>
		</div>
	</div>
</div>
<?php $this->load->view('modal/logout');?>	
<?php $this->load->view('modal/alert');?>	

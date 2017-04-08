<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$url = base_url () .'home/index/';
?>
<div class="">
<h1 style="font-size:20pt">CI Example Record listing With Searching,Sorting and Pagination</h1>


<div class="well clearfix">
	<div class="col-sm-12 clearfix pull-right" id="nav-search">
		<form class="form-search" method="post" action="<?php echo $url;?>">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="ace-icon fa fa-check"></i>
				</span>

				<input type="text" class="form-control search-query" placeholder="Type your search word" name="search" id="search" value="<?php echo $search_string;?>">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-purple btn-sm">
						<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
						Search
					</button>
				</span>
			</div>
		</form>
	</div><!-- /.nav-search -->
	</div>
<span><?php echo 'Total records - '. $total_rows;?></span>
<table class="table table-bordered table-hover" cellspacing="0" width="100%" id="employee">
<thead>
<tr>
<?php foreach($sort_cols as $field_name => $field_display): ?>
    <th><?php echo anchor('home/index/'.$field_name.'/'.($sort_by == $field_name ? $sort_order : 'asc').'/'.$page.'/'.$search_string, $field_display); ?></th>
<?php endforeach;?>
</tr>
</thead>
<tbody>
                <?php $i=1;foreach($data as $rec): ?>
                <tr>
                                <td><?php echo $rec->employee_name; ?></td>
                                <td><?php echo $rec->employee_salary; ?></td>
                                <td><?php echo $rec->employee_age; ?></td>
                </tr>
                <?php endforeach; ?>
</tbody>
</table>
<div><?php echo $links; ?></div>
</div>

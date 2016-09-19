<aside class="col-sm-3">
	<div class="list-group">
	<?php echo $this->Html->link('Check url in page', ['controller' => 'Seo', 'action' => 'checkurl', '_full' => true], ['class' => 'list-group-item active']); ?>
		
	</div>
</aside>
<section class="col-sm-9">
	<div class="panel panel-primary">
		<div class="panel-heading">Check URL in forum CSV file</div>
		<div class="panel-body">
			<div id="message">
				
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="col-sm-6">
						<span class="btn btn-success fileinput-button">
					        <i class="glyphicon glyphicon-plus"></i>
					        <span>Add files CSV</span>
					        <input id="csvupload" type="file" name="files[]" accept=".csv" >
					    </span>
				    </div>
				    <div class="col-sm-6">
					    <span class="btn btn-success pull-right">
					        <i class="glyphicon glyphicon-download-alt"></i>
					        <span><a href="/seo/downloadFileCSV" target="_blank" style="color: white;text-decoration: none" >Files CSV format<a/></span>
					    </span>
				    </div>
				</div>
			</div>

		</div>
	</div>
	<div class="panel panel-default hidden">
		<div id="actionbtn" class="panel-body">
		</div>
	</div>
	
</section>

<div class="clearfix"></div>

		
<div id="resultCheck" class="col-xs-12 hidden"  >
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="progress" style="margin-bottom: 0px;">
				<div id="progress" status="" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" >
					
				</div>
			</div>
		</div>
	    <div class="panel-body">
	    	<div class="col-xs-12 col-md-6" style="overflow-x: auto;display:block;">
	    		<div class="alert alert-success" role="alert">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					<span class="sr-only">Success:</span>
					Success! <span class="numberSuccess"></span>
					<span class="pull-right hidden"><a target="_blank" id="downloadFileSuccess" href="javascript:void(0)"><i class="glyphicon glyphicon-save"></i> Download</a></span>
				</div>
				<table id="tablesuccess" class="table table-striped table-bordered" >
					<thead>
			            <tr align="center" >
							<th width="10%">STT</th>
							<th width="60%">FORUM</th>
							<th width="30%">URL</th>
						</tr>
			        </thead>
			        <tfoot>

					</tfoot>
					<tbody>
						
					</tbody>
				</table>
			</div>	
			<div class="col-xs-12 col-md-6" style="overflow-x: auto;display:block;">
				<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					Wrong! <span class="numberWrong"></span>
					<span class="pull-right hidden"><a target="_blank" id="downloadFileWrong" href="javascript:void(0)"><i class="glyphicon glyphicon-save"></i> Download</a></span>
				</div>
				<table id="tabledanger" class="table table-striped table-bordered">
					<thead>
			            <tr align="center" >
							<th width="10%">Stt</th>
							<th width="60%">Forum</th>
							<th width="30%">Url</th>
						</tr>
			        </thead>
			        <tfoot>

					</tfoot>
					<tbody>
						
					</tbody>
				</table>
			</div>	
	    </div>
	</div>
</div>

<style type="text/css">

.paging-nav {
  text-align: right;
  padding-top: 2px;
}

.paging-nav a {
  margin: auto 1px;
  text-decoration: none;
  display: inline-block;
  padding: 1px 7px;
  background: #91b9e6;
  color: white;
  border-radius: 3px;
}

.paging-nav .selected-page {
  background: #187ed5;
  font-weight: bold;
}

</style>
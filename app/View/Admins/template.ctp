<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	10th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * */
 echo $this->Html->css(array("admin/bootstrap-fileupload.min","admin/bootstrap-timepicker.min","admin/datepicker","ckeditor/contents"));
 $serviceStatus = Configure::read("serviceStatus");
 $grades = Configure::read("grades");
 $projectType = Configure::read("projectType");
 ?>
<?php if($i == 1){ echo $this->Html->script(array("admin/jquery-migrate-1.1.1.min","admin/jquery.cookie","admin/modernizr.min","admin/detectizr.min","admin/custom","admin/jquery.flot.min","admin/jquery.flot.resize.min")); ?>
<div class="pagetitle">
	<h1>Dashboard</h1> <span>This is a dashboard for PMIS</span>
</div><!--pagetitle-->
<div class="maincontent">
	<div class="contentinner content-dashboard">
    	<div class="alert alert-info">
        	<button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Welcome!</strong> This alert needs your attention, but it's not super important.
        </div><!--alert-->
        
        <div class="row-fluid">
        	<div class="span8">
            	<ul class="widgeticons row-fluid">
                	<li class="one_fifth"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/edit.png" alt="" /><span>Projects</span></a></li>
                	<li class="one_fifth"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/reports.png" alt="" /><span>Reports</span></a></li>
                	<li class="one_fifth"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/location.png" alt="" /><span>Maps</span></a></li>
                    <li class="one_fifth"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/calendar.png" alt="" /><span>Tours</span></a></li>
                    <li class="one_fifth last"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/users.png" alt="" /><span>Manage Users</span></a></li>
                	<li class="one_fifth"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/image.png" alt="" /><span>Media</span></a></li>
                    <li class="one_fifth"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/mail.png" alt="" /><span>Check Mail</span></a></li>
                    <li class="one_fifth"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/settings.png" alt="" /><span>Settings</span></a></li>
                    <li class="one_fifth"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/archive.png" alt="" /><span>Archives</span></a></li>
                    <li class="one_fifth last"><a href="#"><img src="<?php echo $this->webroot;?>img/gemicon/notify.png" alt="" /><span>Notifications</span></a></li>
                </ul>
                
                <br />
                
                <h4 class="widgettitle">Report Summary</h4>
                <div class="widgetcontent">
                	<div id="chartplace2" style="height:300px;"></div>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Recent Projects</h4>
                <div class="widgetcontent">
                    <div id="tabs">
                        <ul>
                            <li style="text-align:center;"><a href="#tabs-1"><span class="icon-leaf"></span> Agriculture, Rural<br/>Development &amp; Research&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <li style="text-align:center;"><a href="#tabs-2"><span class="icon-fire"></span> Industry &amp;<br/>Power&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <li style="text-align:center;"><a href="#tabs-3"><span class="icon-road"></span> Local Government &amp;<br/>Transport&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <li style="text-align:center;"><a href="#tabs-4"><span class="icon-book"></span> Education &amp;<br/>Social&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                        </ul>
                        <div id="tabs-1">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Submitted By</th>
                                        <th>Date Added</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#"><strong>1st Project Title...</strong></a></td>
                                        <td><a href="#">admin</a></td>
                                        <td>Feb 02, 2014</td>
                                        <td class="center"><a href="#" class="btn btn-primary"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>2nd Project Title...</strong></a></td>
                                        <td><a href="#">PD</a></td>
                                        <td>Feb 02, 2014</td>
                                        <td class="center"><a href="#" class="btn btn-primary"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>3rd Project Title....</strong></a></td>
                                        <td><a href="#">PD</a></td>
                                        <td>Jan 01, 2014</td>
                                        <td class="center"><a href="#" class="btn btn-primary"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>4th Project Title...</strong></a></td>
                                        <td><a href="#">admin</a></td>
                                        <td>Jan 01, 2014</td>
                                        <td class="center"><a href="#" class="btn btn-primary"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>5th Project Title...</strong></a></td>
                                        <td><a href="#">PD</a></td>
                                        <td>Dec 31, 2013</td>
                                        <td class="center"><a href="#" class="btn btn-primary"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>6th Project Title...</strong></a></td>
                                        <td><a href="#">PD</a></td>
                                        <td>Dec 31, 2013</td>
                                        <td class="center"><a href="#" class="btn btn-primary"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>7th Project Title...</strong></a></td>
                                        <td><a href="#">PD</a></td>
                                        <td>Oct 31, 2013</td>
                                        <td class="center"><a href="#" class="btn btn-primary"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>8th Project Title...</strong></a></td>
                                        <td><a href="#">PD</a></td>
                                        <td>Aug 30, 2013</td>
                                        <td class="center"><a href="#" class="btn btn-primary"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>9th Project Title...</strong></a></td>
                                        <td><a href="#">PD</a></td>
                                        <td>Jul 31, 2013</td>
                                        <td class="center"><a href="#" class="btn btn-primary"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tabs-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Submitted By</th>
                                        <th>Date Added</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#"><strong>Nemo enim ipsam voluptatem quia</strong></a></td>
                                        <td><a href="#">mandylane</a></td>
                                        <td>Jan 04, 2012</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Excepteur sint occaecat cupidatat non...</strong></a></td>
                                        <td><a href="#">admin</a></td>
                                        <td>Jan 02, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus...</strong></a></td>
                                        <td><a href="#">themepixels</a></td>
                                        <td>Jan 02, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus</strong></a></td>
                                        <td><a href="#">johndoe</a></td>
                                        <td>Jan 01, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Quis autem vel eum iure reprehenderi...</strong></a></td>
                                        <td><a href="#">amanda</a></td>
                                        <td>Jan 01, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tabs-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Submitted By</th>
                                        <th>Date Added</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#"><strong>Quis autem vel eum iure reprehenderi...</strong></a></td>
                                        <td><a href="#">amanda</a></td>
                                        <td>Jan 03, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Nemo enim ipsam voluptatem quia</strong></a></td>
                                        <td><a href="#">mandylane</a></td>
                                        <td>Dec 31, 2012</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Excepteur sint occaecat cupidatat non...</strong></a></td>
                                        <td><a href="#">admin</a></td>
                                        <td>Jan 02, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus...</strong></a></td>
                                        <td><a href="#">themepixels</a></td>
                                        <td>Jan 02, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus</strong></a></td>
                                        <td><a href="#">johndoe</a></td>
                                        <td>Jan 01, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        <div id="tabs-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Submitted By</th>
                                        <th>Date Added</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#"><strong>Excepteur sint occaecat cupidatat non...</strong></a></td>
                                        <td><a href="#">admin</a></td>
                                        <td>Jan 02, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus...</strong></a></td>
                                        <td><a href="#">themepixels</a></td>
                                        <td>Jan 02, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Sed ut perspiciatis unde omnis iste natus</strong></a></td>
                                        <td><a href="#">johndoe</a></td>
                                        <td>Jan 01, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Quis autem vel eum iure reprehenderi...</strong></a></td>
                                        <td><a href="#">amanda</a></td>
                                        <td>Jan 01, 2013</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><strong>Nemo enim ipsam voluptatem quia</strong></a></td>
                                        <td><a href="#">mandylane</a></td>
                                        <td>Dec 31, 2012</td>
                                        <td class="center"><a href="#" class="btn"><span class="icon-edit"></span> Edit</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!--#tabs-->
                </div><!--widgetcontent-->
                
                
            </div><!--span8-->
            <div class="span4">
            	<h4 class="widgettitle nomargin">Latest News</h4>
                <div class="widgetcontent bordered">
                	 Some latest news scroll here.<br/>Some latest news scroll here.<br/>Some latest news scroll here.<br/>Some latest news scroll here.<br/>Some latest news scroll here.<br/>Some latest news scroll here.<br/> 
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle nomargin">Inspections this month</h4>
                <div class="widgetcontent">
                	<div id="calendar" class="widgetcalendar"></div>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Project Progress (Ministries)</h4>
                <div class="widgetcontent">
                	<div id="bargraph2" style="height:200px;"></div>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Internal Sectors</h4>
                <div class="widgetcontent">
                	<div id="accordion" class="accordion">
                            <h3><a href="#">Co-ordination and MIS</a></h3>
                            <div>
                                <p>
	                                # Collection and compilation of project wise data for preparing quarterly, annual and   periodical progress reports for NEC, ECNEC and other concerned.<br/> 
	 								# Publication of yearly evaluation report on the completed project of Annual Development Program (ADP).<br/>
	 								# Identify the common problems of project implementation and recommend the way to solve these problems to the higher authority. 
	  							</p>
                            </div>
                            <h3><a href="#">Evaluation</a></h3>
                            <div>
                                <p>
                                Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                suscipit faucibus urna.
                                </p>
                            </div>
                            <h3><a href="#">Central Procurement Technical Unit (CPTU)‏</a></h3>
                            <div>
                                <p>
                                Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                </p>
                                <ul class="margin1020">
                                    <li>List item one</li>
                                    <li>List item two</li>
                                    <li>List item three</li>
                                </ul>
                            </div>
                            <h3><a href="#">Administration Wing</a></h3>
                            <div>
                                <p>
                                Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                mauris vel est.
                                </p>
                                <p>
                                Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                inceptos himenaeos.
                                </p>
                	       </div>
                	</div><!--#accordion-->
                </div><!--widgetcontent-->
            </div><!--span4-->
        </div><!--row-fluid-->
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
								
		// basic chart
		var flash = [[0, 23], [1, 66], [2, 39], [3, 81], [4, 50], [5, 67], [6, 89], [7, 14], [8, 11], [9, 19], [10, 39], [11, 21], [12, 09]];
		var html5 = [[0, 54], [1, 47], [2, 49], [3, 43], [4, 59], [5, 84], [6, 76], [7, 46], [8, 58], [9, 79], [10, 89], [11, 93], [12, 97]];
			
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace2"),
			   [ { data: flash, label: " Running", color: "#fb6409"}, { data: html5, label: " Completed", color: "#096afb"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10 },
				   yaxis: { min: 0, max: 100 },
				   xaxis: { min: 1, max: 12 }
				 });
		
		var previousPoint = null;
		jQuery("#chartplace2").bind("plothover", function (event, pos, item) {
			jQuery("#x").text(pos.x.toFixed(2));
			jQuery("#y").text(pos.y.toFixed(2));
			
			if(item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
						
					jQuery("#tooltip").remove();
					var x = item.datapoint[0].toFixed(2),
					y = item.datapoint[1].toFixed(2);
						
					showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
				}
			
			} else {
			   jQuery("#tooltip").remove();
			   previousPoint = null;            
			}
		
		});
		
		jQuery("#chartplace2").bind("plotclick", function (event, pos, item) {
			if (item) {
				jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});


		// bar graph
		var d2 = [];
		for (var i = 0; i <= 10; i += 1)
			d2.push([i, parseInt(Math.random() * 30)]);
			
		var stack = 0, bars = true, lines = false, steps = false;
		jQuery.plot(jQuery("#bargraph2"), [ d2 ], {
			series: {
				stack: stack,
				lines: { show: lines, fill: true, steps: steps },
				bars: { show: bars, barWidth: 0.6 }
			},
			grid: { hoverable: true, clickable: true, borderColor: '#bbb', borderWidth: 1, labelMargin: 10 },
			colors: ["#06c"]
		});
		
		// calendar
		jQuery('#calendar').datepicker();
});
</script>
<?php }elseif($i == 2){ ?>
<div class="pagetitle">
	<h1>File Manager</h1> <span>This is a sample demo for online file manager...</span>
</div><!--pagetitle-->
<div class="maincontent">
	<div class="contentinner">
		<div class="mediamgr">
			<div class="mediamgr_left">
	        	<div class="mediamgr_head">
	            	<ul class="mediamgr_menu">
	                	<li><a class="btn prev prev_disabled"><span class="icon-chevron-left"></span></a></li>
	                    <li><a class="btn next"><span class="icon-chevron-right"></span></a></li>
	                    <li class="marginleft15"><a class="btn selectall"><span class="icon-check"></span> Select All</a></li>
	                    <li class="marginleft15 newfoldbtn"><a class="btn newfolder" title="Add New Folder"><span class="icon-folder-open"></span></a></li>
	                    <li class="marginleft5 trashbtn"><a class="btn trash" title="Trash"><span class="icon-trash"></span></a></li>
	                    <li class="marginleft15 filesearch">
	                    	<form>
	                    		<input type="text" id="filekeyword" class="filekeyword" placeholder="Search file here" />
	                        </form>
	                    </li>
	                    <li class="right newfilebtn"><a href="#" class="btn btn-primary">Upload New File</a></li>
	                </ul>
	                <span class="clearall"></span>
	            </div><!--mediamgr_head-->
        
	            <div class="mediamgr_category">
	            	<ul>
	                	<li class="current"><a href="#">All</a></li>
	                    <li><a href="#">Images</a></li>
	                    <li><a href="#">Video</a></li>
	                    <li><a href="#">Audio</a></li>
	                    <li><a href="#">Documents</a></li>
	                    <li class="right"><span class="pagenuminfo">Showing 1 - 20 of 69</span></li>
	                </ul>
	            </div><!--mediamgr_category-->
        
	            <div class="mediamgr_content">
					
	            <small><em>Tips: Hold Control key to select multiple items (Windows only).</em></small>
	                
	            <br /><br />
	            	
	                <ul class="listfile">
	                	<li>
	                        <a href="ajax/image.html" data-rel="image"><img src="<?php echo $this->webroot; ?>img/thumbs/image1.png" alt="" /></a>
	                    	<span class="filename">Image1.jpg</span>
	                    </li>
	                	<li>
	                        <a href="ajax/image.html" data-rel="image"><img src="<?php echo $this->webroot; ?>img/thumbs/image2.png" alt="" /></a>
	                    	<span class="filename">Image2.jpg</span>
	                    </li>
	                    <li>
	                        <a href="ajax/doc.html" data-rel="doc"><img src="<?php echo $this->webroot; ?>img/thumbs/doc.png" alt="" /></a>
	                    	<span class="filename">Tutorial.pdf</span>
	                    </li>
	                    <li>
	                        <a href="ajax/video.html" data-rel="video"><img src="<?php echo $this->webroot; ?>img/thumbs/video.png" alt="" /></a>
	                    	<span class="filename">Movie1.avi</span>
	                    </li>
	                    <li>
	                        <a href="ajax/audio.html" data-rel="video"><img src="<?php echo $this->webroot; ?>img/thumbs/audio.png" alt="" /></a>
	                    	<span class="filename">Song1.mp3</span>
	                    </li>
	                    <li>
	                        <a href="ajax/doc.html" data-rel="doc"><img src="<?php echo $this->webroot; ?>img/thumbs/doc.png" alt="" /></a>
	                    	<span class="filename">Tutorial1.pdf</span>
	                    </li>
	                    <li>
	                        <a href="ajax/doc.html" data-rel="doc"><img src="<?php echo $this->webroot; ?>img/thumbs/doc.png" alt="" /></a>
	                    	<span class="filename">Tutorial1.pdf</span>
	                    </li>
	                    <li>
	                        <a href="ajax/image.html" data-rel="image"><img src="<?php echo $this->webroot; ?>img/thumbs/image1.png" alt="" /></a>
	                    	<span class="filename">Image1.jpg</span>
	                    </li>
	                	<li>
	                        <a href="ajax/image.html" data-rel="image"><img src="<?php echo $this->webroot; ?>img/thumbs/image2.png" alt="" /></a>
	                    	<span class="filename">Image2.jpg</span>
	                    </li>
	                    <li>
	                        <a href="ajax/doc.html" data-rel="doc"><img src="<?php echo $this->webroot; ?>img/thumbs/doc.png" alt="" /></a>
	                    	<span class="filename">Tutorial.pdf</span>
	                    </li>
	                    <li>
	                        <a href="ajax/video.html" data-rel="video"><img src="<?php echo $this->webroot; ?>img/thumbs/video.png" alt="" /></a>
	                    	<span class="filename">Movie1.avi</span>
	                    </li>
	                    <li>
	                        <a href="ajax/audio.html" data-rel="audio"><img src="<?php echo $this->webroot; ?>img/thumbs/audio.png" alt="" /></a>
	                    	<span class="filename">Song1.mp3</span>
	                    </li>
	                    <li>
	                        <a href="ajax/doc.html" data-rel="doc"><img src="<?php echo $this->webroot; ?>img/thumbs/doc.png" alt="" /></a>
	                    	<span class="filename">Tutorial1.pdf</span>
	                    </li>
	                    <li>
	                        <a href="ajax/doc.html" data-rel="doc"><img src="<?php echo $this->webroot; ?>img/thumbs/doc.png" alt="" /></a>
	                    	<span class="filename">Tutorial1.pdf</span>
	                    </li>
	                    <li>
	                        <a href="ajax/image.html" data-rel="image"><img src="<?php echo $this->webroot; ?>img/thumbs/image1.png" alt="" /></a>
	                    	<span class="filename">Image1.jpg</span>
	                    </li>
	                	<li>
	                        <a href="ajax/image.html" data-rel="image"><img src="<?php echo $this->webroot; ?>img/thumbs/image2.png" alt="" /></a>
	                    	<span class="filename">Image2.jpg</span>
	                    </li>
	                    <li>
	                        <a href="ajax/doc.html" data-rel="doc"><img src="<?php echo $this->webroot; ?>img/thumbs/doc.png" alt="" /></a>
	                    	<span class="filename">Tutorial.pdf</span>
	                    </li>
	                    <li>
	                        <a href="ajax/video.html" data-rel="video"><img src="<?php echo $this->webroot; ?>img/thumbs/video.png" alt="" /></a>
	                    	<span class="filename">Movie1.avi</span>
	                    </li>
	                    <li>
	                        <a href="ajax/audio.html" data-rel="audio"><img src="<?php echo $this->webroot; ?>img/thumbs/audio.png" alt="" /></a>
	                    	<span class="filename">Song1.mp3</span>
	                    </li>
	                    <li>
	                        <a href="ajax/doc.html" data-rel="doc"><img src="<?php echo $this->webroot; ?>img/thumbs/doc.png" alt="" /></a>
	                    	<span class="filename">Tutorial1.pdf</span>
	                    </li>
	                </ul>
	                
	                <br class="clearall" />
	                
	            </div><!--mediamgr_content-->
        
    		</div><!--mediamgr_left -->
    
	        <div class="mediamgr_right">
	        	<div class="mediamgr_rightinner">
	                <h4>Browse Files</h4>
	                <ul class="menuright">
	                	<li class="current"><a href="#">All Files</a></li>
	                    <li><a href="#">Deleted Files</a></li>
	                    <li><a href="#">Recently Added</a></li>
	                    <li><a href="#">Recently Viewed</a></li>
	                    <li><a href="#">New Folder</a></li>
	                    <li><a href="#">New Folder(2)</a></li>
	                </ul>
	            </div><!-- mediamgr_rightinner -->
	        </div><!-- mediamgr_right -->
    		<br class="clearall" />
		</div><!--mediamgr-->
	</div>
</div>
<?php }elseif($i == 3){ echo $this->Html->script(array("admin/jquery.dataTables","admin/jquery-ui-1.8.16.min","admin/slider","admin/colorpicker","admin/charts","admin/jquery.flot.pie","admin/forms","admin/charCount","admin/jquery.autogrow-textarea","admin/jquery.tagsinput.min","admin/jquery.validate.min","admin/jquery.uniform.min","admin/bootstrap-timepicker.min","admin/bootstrap-fileupload.min","jquery.smartWizard.min","admin/jquery-migrate-1.1.1.min","admin/jquery.cookie","admin/modernizr.min","admin/detectizr.min","ckeditor/ckeditor","ckeditor/adapters/jquery","ckeditor/styles","admin/fullcalendar")); ?>	
<div class="pagetitle">
	<h1>UI Elements &amp; Widgets</h1> <span>This is a sample description for dashboard page...</span>
</div><!--pagetitle-->
        
<div class="maincontent">
	<div class="contentinner content-elements">
    
    	<div class="row-fluid">
          <div class="span6">
				<h4 class="widgettitle">Content Title (Default)</h4>
                
				<h4 class="widgettitle">Tabbed Widget  </h4>
                <div class="widgetcontent">
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Tab 1</a></li>
                            <li><a href="#tabs-2">Tab 2</a></li>
                            <li><a href="#tabs-3">Tab 3</a></li>
                        </ul>
                        <div id="tabs-1">
                            Your content goes here for tab 1
                        </div>
                        <div id="tabs-2">
                            Your content goes here for tab 2
                        </div>
                        <div id="tabs-3">
                            Your content goes here for tab 3 
                        </div>
                    </div><!--#tabs-->
                </div><!--widgetcontent-->
                                        
				<h4 class="widgettitle">Accordion Widget </h4>
                <div class="widgetcontent">
                	<div id="accordion" class="accordion">
                            <h3><a href="#">Section 1</a></h3>
                            <div>
                                <p>
                                Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                                ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                                amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                                odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                                </p>
                            </div>
                            <h3><a href="#">Section 2</a></h3>
                            <div>
                                <p>
                                Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                suscipit faucibus urna.
                                </p>
                            </div>
                            <h3><a href="#">Section 3</a></h3>
                            <div>
                                <p>
                                Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                </p>
                                <ul class="margin1020">
                                    <li>List item one</li>
                                    <li>List item two</li>
                                    <li>List item three</li>
                                </ul>
                            </div>
                            <h3><a href="#">Section 4</a></h3>
                            <div>
                                <p>
                                Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                mauris vel est.
                                </p>
                                <p>
                                Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                inceptos himenaeos.
                                </p>
                	       </div>
                	</div><!--#accordion-->
                </div><!--widgetcontent-->
                        
                <h4 class="widgettitle">Color Picker </h4>
                <div class="widgetcontent">
                    <form action="http://themepixels.com/main/themes/demo/webpage/katniss/elements.html" method="post">
                        <p>
                            <input type="text" name="colorpicker" class="input-mini" id="colorpicker" />
                            <span id="colorSelector" class="colorselector">
                                <span></span>
                            </span>
                        </p>
                    </form>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Sliders</h4>
                <div class="widgetcontent">
                	<div class="pargroup">
                    	<div class="par">
                        	<h6>Normal Slider</h6>
                        	<div id="slider"></div>
                        </div>
                        <div class="par">
                        	<h6>Snap To Increments</h6>
                            <p class="pull-right">Withdrawal: <strong><span id="amount" class="color333"></span></strong></p>
                        	<div id="slider2"></div>
                        </div>
                        <div class="par">
                        	<h6>Range Slider</h6>
                        	<p class="pull-right">Price Range: <strong><span id="amount2" class="color333"></span></strong></p>
                			<div id="slider3"></div>
                        </div>
                        
                        <div class="par">
                        	<h6>Fixed Minimum</h6>
                        	<p class="pull-right">Maximum price: <strong><span id="amount4" class="color069"></span></strong></p>
                			<div id="slider4"></div>
                        </div>
                        
                        <div class="par">
                        	<h6>Fixed Maximum</h6>
                        	<p class="pull-right">Maximum price: <strong><span id="amount5" class="color333"></span></strong></p>
                			<div id="slider5"></div>
                        </div>
                        
                        <div class="par">
                        	<h6>Vertical Slider</h6>
                            <div style="float: left; margin: 20px 0 0 15px">
                                <div id="slider6" style="height:100px;"></div>
                            </div>
                            
                            <div class="vs2" style="float: left; margin: 20px 0 0 40px;">
                                <div id="slider7" style="height:100px;"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                    </div><!--pargroup-->
                    
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle nomargin shadowed">Widget Title</h4>
                <div class="widgetcontent bordered shadowed nomargin">
                	Content goes here...
                </div><!--widgetcontent-->
            <div class="divider15"></div>
            <div class="divider30"></div>
              
            </div><!--span6-->
            
            
            <div class="span6">
            	<h4 class="widgettitle ctitle">Content Title (2)</h4>
                <h4 class="widgettitle">Tabbed Widget (2)</h4>
                <div class="widgetcontent">
                    <div id="tabs2" class="tabs2">
                        <ul>
                            <li><a href="#stabs1">Tab 1</a></li>
                            <li><a href="#stabs2">Tab 2</a></li>
                            <li><a href="#stabs3">Tab 3</a></li>
                        </ul>
                        <div id="stabs1">
                            Your content goes here for tab 1
                        </div>
                        <div id="stabs2">
                            Your content goes here for tab 2
                        </div>
                        <div id="stabs3">
                            Your content goes here for tab 3 
                        </div>
                    </div><!--#tabs-->
                </div><!--widgetcontent-->
                
				<h4 class="widgettitle">Accordion Widget </h4>
                <div class="widgetcontent">
                    <div id="accordion2" class="accordion2">
                            <h3><a href="#">Section 1</a></h3>
                            <div>
                                <p>
                                Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                                ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                                amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                                odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                                </p>
                            </div>
                            <h3><a href="#">Section 2</a></h3>
                            <div>
                                <p>
                                Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                                purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                                velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                                suscipit faucibus urna.
                                </p>
                            </div>
                            <h3><a href="#">Section 3</a></h3>
                            <div>
                                <p>
                                Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                                Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                                ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                                lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                                </p>
                                <ul class="margin1020">
                                    <li>List item one</li>
                                    <li>List item two</li>
                                    <li>List item three</li>
                                </ul>
                            </div>
                            <h3><a href="#">Section 4</a></h3>
                            <div>
                                <p>
                                Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                                et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                                faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                                mauris vel est.
                                </p>
                                <p>
                                Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                inceptos himenaeos.
                                </p>
                	       </div>
                    </div><!--#accordion-->
                    
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Date Picker </h4>
                <div class="widgetcontent">
                	<input id="datepicker" type="text" name="date" class="input-small" /> &nbsp; <small><em>mm / dd / yyyy</em></small>
                </div><!--widgetcontent-->  
                
                <h4 class="widgettitle">Growl Notifications </h4>
                <div class="widgetcontent">
               		<a id="growl" class="btn"><small>Basic growl</small></a> &nbsp;
           		  	<a id="growl2" class="btn"><small>Long live growl message</small></a>
                    
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Alert Boxes (Draggable) </h4>
                <div class="widgetcontent">
                	<a class="btn alertboxbutton"><small>Basic Alert</small></a> &nbsp;
                    <a class="btn confirmbutton"><small>Confirm Box</small></a> &nbsp;
                    <a class="btn promptbutton"><small>Prompt Box</small></a> &nbsp;
                    <a class="btn alerthtmlbutton"><small>Dialog with HTML support</small></a>

                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Sortable List</h4>
                <div class="widgetcontent">
                	<ul id="sortable" class="sortlist">
                        <li><div class="label"><span class="icon-align-justify"></span> Item 1</div></li>
                        <li><div class="label"><span class="icon-align-justify"></span> Item 2</div></li>
                        <li><div class="label"><span class="icon-align-justify"></span> Item 3</div></li>
                    </ul>
                  
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Sortable List With Content </h4>
                <div class="widgetcontent">
                	<ul id="sortable2" class="sortlist">
                        <li>
                            <div class="label">
                                <span class="icon-align-justify"></span>
                                <span class="icon-arrow-down showcnt"></span>
                                Item 1
                            </div><!--label-->
                            <div class="details">
                                <p>Content goes here...</p>
                            </div><!--details-->
                        </li>
                        <li>
                            <div class="label">
                                <span class="icon-align-justify"></span>
                                <span class="icon-arrow-down showcnt"></span>
                                Item 2
                            </div><!--label-->
                            <div class="details">
                                <p>Content goes here... can be any html element</p>
                            </div><!--details-->
                        </li>
                        <li>
                            <div class="label">
                                <span class="icon-align-justify"></span>
                                <span class="icon-arrow-down showcnt"></span>
                                Item 3
                            </div><!--label-->
                            <div class="details">
                                <p>Content goes here... can be any html element</p>
                            </div><!--details-->
                        </li>
                   	</ul>
               	  
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Ajax Image Loaders</h4>
                <div class="widgetcontent">
                	<div class="loaders">
                        <img src="<?php echo $this->webroot;?>img/loaders/loader1.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader2.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader3.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader4.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader8.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader9.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader5.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader6.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader7.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader10.gif" alt="" />
						<img src="<?php echo $this->webroot;?>img/loaders/loader11.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader12.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader13.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader14.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader15.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader16.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader17.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader18.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader19.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader20.gif" alt="" />
						<img src="<?php echo $this->webroot;?>img/loaders/loader21.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader22.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader23.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader24.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader25.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader26.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader27.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader28.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader29.gif" alt="" />
                        <img src="<?php echo $this->webroot;?>img/loaders/loader30.gif" alt="" />
                        <br /><br />
                    </div><!--loaders-->
                </div>
            </div><!--span6-->
        </div><!--row-fluid-->
    </div><!--contentinner-->
</div><!--maincontent-->
<?php }elseif($i == 4){ echo $this->Html->script(array("admin/jquery.dataTables","admin/jquery-ui-1.8.16.min","admin/slider","admin/colorpicker","admin/charts","admin/jquery.flot.pie","admin/forms","admin/charCount","admin/jquery.autogrow-textarea","admin/jquery.tagsinput.min","admin/jquery.validate.min","admin/jquery.uniform.min","admin/bootstrap-timepicker.min","admin/bootstrap-fileupload.min","jquery.smartWizard.min","admin/jquery-migrate-1.1.1.min","admin/jquery.cookie","admin/modernizr.min","admin/detectizr.min","ckeditor/ckeditor","ckeditor/adapters/jquery","ckeditor/styles","admin/fullcalendar")); ?>
<div class="pagetitle">
	<h1>Bootstrap Components</h1> <span>This is a sample demo for components...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner content-bootstrap">
    	<div class="row-fluid">
            <div class="span6">
                <h4 class="widgettitle">Dropdown Menu </h4>
                <div class="widgetcontent">
                    <ul class="dropdown-menu" style="display: block; position: inherit; top: 0; left: 10px; float: none; width: 180px;">
                        <li><a tabindex="-1" href="#">Action</a></li>
                        <li><a tabindex="-1" href="#">Another action</a></li>
                        <li><a tabindex="-1" href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="#">Separated link</a></li>
                    </ul>
                    
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Single Button Group </h4>
                <div class="widgetcontent">
                    <div class="btn-group">
                        <button class="btn">1</button>
                        <button class="btn">2</button>
                        <button class="btn">3</button>
                    </div>
                    
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <button class="btn">1</button>
                            <button class="btn">2</button>
                            <button class="btn">3</button>
                            <button class="btn">4</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn">5</button>
                            <button class="btn">6</button>
                            <button class="btn">7</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn">8</button>
                        </div>
                    </div><!--btn-toolbar-->
                    
                    <div class="btn-group btn-group-vertical">
                        <button class="btn">1</button>
                        <button class="btn">2</button>
                        <button class="btn">3</button>
                    </div>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Basic Tabs </h4>
                <div class="widgetcontent">
                	<ul class="nav nav-tabs">
                      <li class="active"><a href="#">Home</a></li>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Messages</a></li>
                    </ul>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Basic Pills </h4>
                <div class="widgetcontent">
                	<ul class="nav nav-pills">
                      <li class="active"><a href="#">Home</a></li>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Messages</a></li>
                    </ul>
                  
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Stacked Tabs </h4>
                <div class="widgetcontent navsample">
                	<ul class="nav nav-tabs nav-stacked">
                      <li class="active"><a href="#">Home</a></li>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Messages</a></li>
                    </ul>
                  
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Stacked Pills </h4>
                <div class="widgetcontent navsample">
                	<ul class="nav nav-pills nav-stacked">
                      <li class="active"><a href="#">Home</a></li>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Messages</a></li>
                    </ul>
                  
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Tabbable In Any Direction </h4>
                <div class="widgetcontent">
               		<div class="tabbable tabs-below">
                  		<div class="tab-content">
                    		<div id="A" class="tab-pane">
                      			<p>I'm in Section A.</p>
                    		</div>
                    		<div id="B" class="tab-pane">
                      			<p>Howdy, I'm in Section B.</p>
                    		</div>
                    		<div id="C" class="tab-pane active">
                      			<p>What up girl, this is Section C.</p>
                    		</div>
                  		</div>
                  		<ul class="nav nav-tabs">
                    		<li class=""><a data-toggle="tab" href="#A">Section 1</a></li>
                    		<li class=""><a data-toggle="tab" href="#B">Section 2</a></li>
                    		<li class="active"><a data-toggle="tab" href="#C">Section 3</a></li>
                  		</ul>
                	</div><!--tabbable-->
                    
                    <div class="divider15"></div>
                    
                    <div class="tabbable tabs-right">
                    	<ul class="nav nav-tabs">
                        	<li class="active"><a data-toggle="tab" href="#rA">Section 1</a></li>
                        	<li><a data-toggle="tab" href="#rB">Section 2</a></li>
                        	<li><a data-toggle="tab" href="#rC">Section 3</a></li>
                      	</ul>
                      	<div class="tab-content">
                        	<div id="rA" class="tab-pane active">
                          		<p>I'm in Section A.</p>
                        	</div>
                        	<div id="rB" class="tab-pane">
                          		<p>Howdy, I'm in Section B.</p>
                        	</div>
                        	<div id="rC" class="tab-pane">
                          		<p>What up girl, this is Section C.</p>
                        	</div>
                      </div><!--tab-content-->
                    </div><!--tabbable tabs-right-->
                    
                    <div class="divider15"></div>
                    
                    <div class="tabbable tabs-left">
                    	<ul class="nav nav-tabs">
                        	<li class="active"><a data-toggle="tab" href="#lA">Section 1</a></li>
                        	<li><a data-toggle="tab" href="#lB">Section 2</a></li>
                        	<li><a data-toggle="tab" href="#lC">Section 3</a></li>
                      	</ul>
                      	<div class="tab-content">
                        	<div id="lA" class="tab-pane active">
                          		<p>I'm in Section A.</p>
                        	</div>
                        	<div id="lB" class="tab-pane">
                          		<p>Howdy, I'm in Section B.</p>
                        	</div>
                        	<div id="lC" class="tab-pane">
                          		<p>What up girl, this is Section C.</p>
                        	</div>
                      	</div><!--tab-content-->
                    </div><!--tabbable tabs-left-->
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle nomargin">Pagination </h4>
                <div class="widgetcontent bordered">
                	<div class="pagination">
                      <ul>
                        <li class="disabled"><a>Previous</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                      </ul>
                    </div><!--pagination-->
                    
                    <div class="pagination pagination-large">
                      <ul>
                        <li class="disabled"><a>&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                      </ul>
                    </div><!--pagination-->
                    
                    <div class="pagination pagination-mini">
                      <ul>
                        <li class="disabled"><a>Previous</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                      </ul>
                    </div><!--pagination-->
                    
                    <div class="pagination pagination-centered">
                      <ul>
                        <li class="disabled"><a>Previous</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                      </ul>
                    </div><!--pagination-->
                    
                    <div class="pagination pagination-right">
                      <ul>
                        <li class="disabled"><a>Previous</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                      </ul>
                    </div><!--pagination-->
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle nomargin shadowed">Pager </h4>
                <div class="widgetcontent bordered shadowed">
                	<ul class="pager">
                      <li><a href="#">Previous</a></li>
                      <li><a href="#">Next</a></li>
                    </ul>
                    
                    <ul class="pager">
                      <li class="previous"><a href="#"><span>&larr;</span> Older</a></li>
                      <li class="next"><a href="#">Newer <span>&rarr;</span></a></li>
                    </ul>
                    
                    <ul class="pager">
                      <li class="previous disabled"><a href="#"><span>&larr;</span> Older</a></li>
                      <li class="next"><a href="#">Newer <span>&rarr;</span></a></li>
                    </ul>
                    
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle nomargin">Progress Bars </h4>
                <div class="widgetcontent bordered">
                	
                    <div class="progress">
                      <div style="width: 60%;" class="bar"></div>
                    </div><!--progress-->
                    
                    <div class="progress progress-striped">
                      <div style="width: 20%;" class="bar"></div>
                    </div><!--progress-->
                    
                    <div class="progress progress-striped active">
                      <div style="width: 45%" class="bar"></div>
                    </div><!--progress-->
                    
                    <div class="progress progress-info">
                      <div style="width: 20%" class="bar"></div>
                    </div><!--progress-->
                    
                    <div class="progress progress-success">
                      <div style="width: 40%" class="bar"></div>
                    </div><!--progress-->
                    
                    <div class="progress progress-warning progress-striped">
                      <div style="width: 60%" class="bar"></div>
                    </div><!--progress-->
                    
                    <div class="progress progress-danger progress-striped active">
                      <div style="width: 80%" class="bar"></div>
                    </div><!--progress-->
                    
                </div><!--widgetcontent-->
                    
            </div><!--span6-->
            
            <div class="span6">
                
                <h4 class="widgettitle">Button Dropdowns</h4>
                <div class="widgetcontent">
                	<table class="table table-bordered table-buttonlist">
                    	<tbody>
                        	<tr>
                                <td>
                                    <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                                </td>
                                
                            </tr>
                        	<tr>
                                <td>
                                    <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-inverse dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                   <div class="btn-group">
                                    <button class="btn">Action</button>
                                    <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Nav List </h4>
                <div class="widgetcontent">
                	<ul class="nav nav-list">
                        <li class="nav-header">List header</li>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li><a href="#">Applications</a></li>
                        <li class="nav-header">Another list header</li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                    
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Basic Navbar </h4>
                <div class="widgetcontent">
                	<div class="navbar">
                      <div class="navbar-inner">
                        <a href="#" class="brand">Title</a>
                        <ul class="nav">
                          <li class="active"><a href="#">Home</a></li>
                          <li><a href="#">Link</a></li>
                          <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li class="divider"></li>
                              <li class="nav-header">Nav header</li>
                              <li><a href="#">Separated link</a></li>
                              <li><a href="#">One more separated link</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div><!--navbar-inner-->
                    </div><!--navbar-->
                                                
                    <div class="navbar">
                  		<div class="navbar-inner">
                    		<form class="navbar-search pull-left">
                            	<input type="text" class="search-query" placeholder="Search">
                            </form>
                  		</div><!--navbar-inner-->
                	</div><!--navbar-->
                    
                    <div class="navbar">
                  		<div class="navbar-inner">
                    		<form class="navbar-form pull-right">
                      			<input type="text" class="span2">
                      			<button class="btn" type="submit">Submit</button>
                    		</form>
                  		</div><!--navbar-inner-->
                	</div><!--navbar-->
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Inversed Navbar</h4>
                <div class="widgetcontent">
                	<div class="navbar navbar-inverse">
                      <div class="navbar-inner">
                        <a href="#" class="brand">Title</a>
                        <ul class="nav">
                          <li class="active"><a href="#">Home</a></li>
                          <li><a href="#">Link</a></li>
                          <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li class="divider"></li>
                              <li class="nav-header">Nav header</li>
                              <li><a href="#">Separated link</a></li>
                              <li><a href="#">One more separated link</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div><!--navbar-inner-->
                    </div><!--navbar-->
                    
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Breadcrumbs </h4>
                <div class="widgetcontent">
                 	<ul class="breadcrumb">
                      <li class="active">Home</li>
                    </ul>
                    <ul class="breadcrumb">
                      <li><a href="#">Home</a> <span class="divider">/</span></li>
                      <li class="active">Library</li>
                    </ul>
                    <ul class="breadcrumb">
                      <li><a href="#">Home</a> <span class="divider">/</span></li>
                      <li><a href="#">Library</a> <span class="divider">/</span></li>
                      <li class="active">Data</li>
                    </ul>
                    
                </div><!--widgetcontent-->
        
        		<h4 class="widgettitle">Labels</h4>
                <div class="widgetcontent">
                	<table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Labels</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <span class="label">Default</span>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              <span class="label label-success">Success</span>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              <span class="label label-warning">Warning</span>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              <span class="label label-important">Important</span>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              <span class="label label-info">Info</span>
                            </td>
                           
                          </tr>
                          <tr>
                            <td>
                              <span class="label label-inverse">Inverse</span>
                            </td>
                           
                          </tr>
                        </tbody>
                      </table>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Badges</h4>
                <div class="widgetcontent">
                	<table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Example</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              Default
                            </td>
                            <td>
                              <span class="badge">1</span>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              Success
                            </td>
                            <td>
                              <span class="badge badge-success">2</span>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              Warning
                            </td>
                            <td>
                              <span class="badge badge-warning">4</span>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              Important
                            </td>
                            <td>
                              <span class="badge badge-important">6</span>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              Info
                            </td>
                            <td>
                              <span class="badge badge-info">8</span>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>
                              Inverse
                            </td>
                            <td>
                              <span class="badge badge-inverse">10</span>
                            </td>
                            
                          </tr>
                        </tbody>
                      </table>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Modal Window </h4>
                <div class="widgetcontent">
                	<a class="btn btn-primary" href="#myModal" data-toggle="modal">Launch demo modal</a>
                    
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Tooltip</h4>
                <div class="widgetcontent">
                	<ul class="tooltipsample">
                      <li><a data-placement="top" data-rel="tooltip" href="#" data-original-title="Tooltip on top" class="btn">Top</a></li>
                      <li><a data-placement="right" data-rel="tooltip" href="#" data-original-title="Tooltip on right" class="btn">Right</a></li>
                      <li><a data-placement="bottom" data-rel="tooltip" href="#" data-original-title="Tooltip on bottom" class="btn">Bottom</a></li>
                      <li><a data-placement="left" data-rel="tooltip" href="#" data-original-title="Tooltip on left" class="btn">Left</a></li>
                    </ul>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Popover</h4>
                <div class="widgetcontent">
					<ul class="popoversample">
                        <li><a data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-placement="top" data-rel="popover" class="btn" href="#" data-original-title="Popover on top">Top</a></li>
                        <li><a data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-placement="right" data-rel="popover" class="btn" href="#" data-original-title="Popover on right">Right</a></li>
                        <li><a data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-placement="bottom" data-rel="popover" class="btn" href="#" data-original-title="Popover on bottom">Bottom</a></li>
                        <li><a data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-placement="left" data-rel="popover" class="btn" href="#" data-original-title="Popover on left">Left</a></li>
                    </ul>
                </div><!--widgetcontent-->

                        
            </div><!--span6-->
        </div><!--row-fluid-->
        
    </div><!--contentinner-->
</div><!--maincontent-->
<?php }elseif($i == 5){ echo $this->Html->script(array("admin/jquery.dataTables","admin/jquery-ui-1.8.16.min","admin/slider","admin/colorpicker","admin/charts","admin/jquery.flot.pie","admin/forms","admin/charCount","admin/jquery.autogrow-textarea","admin/jquery.tagsinput.min","admin/jquery.validate.min","admin/jquery.uniform.min","admin/bootstrap-timepicker.min","admin/bootstrap-fileupload.min","jquery.smartWizard.min","admin/jquery-migrate-1.1.1.min","admin/jquery.cookie","admin/modernizr.min","admin/detectizr.min","ckeditor/ckeditor","ckeditor/adapters/jquery","ckeditor/styles","admin/fullcalendar"));?>
<div class="pagetitle">
	<h1>Dynamic Table</h1> <span>This is a sample demo for the page for dynamic table...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
    
    	<h4 class="widgettitle">Projects</h4>
    	<table class="table table-bordered" id="dyntable">
            <colgroup>
                <col class="con0" style="align: center; width: 4%" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
            </colgroup>
            <thead>
                <tr>
                  	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                    <th class="head1 width30">Project Name</th>
					<th class="head0">Start</th>
		            <th class="head1">Finished</th>
		            <th class="head0">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        	if(!empty($projects)){ 
        		foreach($projects as $project){
        ?>
        <tr class="gradeX">
        	<td><span class="center"><input type="checkbox" /></span></td>
          	<td><?php echo $project["Project"]["title"];?></td>
          	<td>
          	<?php 
				if(!empty($project["Project"]["start"])) 
					$input = date("F, Y",$project["Project"]["start"]); 
				echo $input; 
			?>
          	</td>
          	<td>
          	<?php 
          		if(!empty($project["Project"]["end3"])) 
					$input = date("F, Y",$project["Project"]["end3"]); 
				elseif(!empty($project["Project"]["end2"])) 
					$input = date("F, Y",$project["Project"]["end2"]); 
				elseif(!empty($project["Project"]["end1"])) 
					$input = date("F, Y",$project["Project"]["end1"]); 
				elseif(!empty($project["Project"]["end"])) 
					$input = date("F, Y",$project["Project"]["end"]);
				echo $input;
          	?></td>
          	<td>
          		<a href="<?php echo $this->webroot."projectManagements/updateProject/".$project["Project"]["id"]."/".$project["Project"]["organization_id"];?>" class="btn btn-primary"><i class="icon-pencil"></i></a>
				<a href="<?php echo $this->webroot."projectManagements/projectDetail/".$project["Project"]["id"];?>" class="btn btn-primary"><i class="icon-eye-open"></i></a>
				<a href="<?php echo $this->webroot."tourManagements/addTour/".$project["Project"]["id"];?>" class="btn btn-primary"><i class="icon-road"></i></a>
          	 </td>
            
        </tr>
        <?php } }else{ ?>
		<tr><td colspan="8" style="text-align:center"><b><?php echo "No data found."; ?></b></td></tr>
		<?php } ?>
            </tbody>
        </table>
        
        <div class="divider15"></div>
    </div><!--contentinner-->
</div><!--maincontent-->
<script type="text/javascript">
    jQuery(document).ready(function(){
                                    
        //Replaces data-rel attribute to rel.
        //We use data-rel because of w3c validation issue
        jQuery('a[data-rel]').each(function() {
            jQuery(this).attr('rel', jQuery(this).data('rel'));
        });
    });
</script> 
<?php }elseif($i == 6){ ?>
<div class="pagetitle">
	<h1>Typography</h1> <span>This is a sample description for typography page...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner content-typography">
    	
        <div class="row-fluid">
        	<div class="span6">
                <h4 class="widgettitle nomargin shadowed">Headings</h4>
                <div class="widgetcontent bordered shadowed">
                    <h1>h1. Heading 1</h1>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                    <h2>h2. Heading 2</h2>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                    <h3>h3. Heading 3</h3>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                    <h4>h4. Heading 4</h4>
                    <h5>h5. Heading 5</h5>
                    <h6>h6. Heading 6</h6>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle nomargin shadowed">Blockquotes</h4>
                <div class="widgetcontent bordered shadowed">
                	<blockquote>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    </blockquote>
                    <div class="divider15"></div>
                    <blockquote>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                      <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                    <div class="divider15"></div>
                    <blockquote class="pull-right">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                      <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </blockquote>
                    <div class="clearfix"></div>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle">Alerts</h4>
                <div class="widgetcontent">
                	<div class="alert">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <strong>Warning!</strong> Best check yo self, you're not looking too good.
                    </div><!--alert-->
                    
                    <div class="alert alert-block">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <h4>Warning!</h4>
                      <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                    </div><!--alert-->
                    
                    <div class="alert alert-error">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div><!--alert-->
                    
                    <div class="alert alert-success">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <strong>Well done!</strong> You successfully read this important alert message.
                    </div><!--alert-->
                    
                    <div class="alert alert-info">
                      <button data-dismiss="alert" class="close" type="button">×</button>
                      <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                    </div><!--alert-->
    
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle nomargin shadowed">Description</h4>
                <div class="widgetcontent bordered shadowed">
                	<dl>
                        <dt>Description lists</dt>
                        <dd>A description list is perfect for defining terms.</dd>
                        <dt>Euismod</dt>
                        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                        <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                        <dt>Malesuada porta</dt>
                        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                	</dl>
                    <div class="dline15"></div>
                    <dl class="dl-horizontal">
                        <dt>Description lists</dt>
                        <dd>A description list is perfect for defining terms.</dd>
                        <dt>Euismod</dt>
                        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                        <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                        <dt>Malesuada porta</dt>
                        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                        <dt>Felis euismod semper eget lacinia</dt>
                        <dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
                    </dl>
                </div><!--widgetcontent-->
                
            </div><!--span6-->
            
            <div class="span6">
            	<h4 class="widgettitle nomargin shadowed">Emphasis Classes </h4>
                <div class="widgetcontent bordered shadowed">
                    <p class="muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
                    <p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>
                    <p class="text-error">Donec ullamcorper nulla non metus auctor fringilla.</p>
                    <p class="text-info">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.</p>
                    <p class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                </div><!--widgetcontent-->
                
                <h4 class="widgettitle nomargin shadowed">List Styles</h4>
                <div class="widgetcontent bordered shadowed">
                	<div class="row-fluid">
                    	<div class="span6">
                            <ul class="list-unordered">
                              <li>Lorem ipsum dolor sit amet</li>
                              <li>Consectetur adipiscing elit
                              	<ul>
                                  <li>Phasellus iaculis neque</li>
                                  <li>Purus sodales ultricies</li>
                                </ul>
                              </li>
                              <li>Faucibus porta lacus fringilla vel</li>
                              <li>Aenean sit amet erat nunc</li>
                            </ul>
                            
                            <div class="divider15"></div>
                            <div class="divider30"></div>
                            
                            <ul class="list-unordered list-checked">
                              <li>Lorem ipsum dolor sit amet</li>
                              <li>Consectetur adipiscing elit
                              	<ul>
                                  <li>Phasellus iaculis neque</li>
                                  <li>Purus sodales ultricies</li>
                                </ul>
                              </li>
                              <li>Faucibus porta lacus fringilla vel</li>
                              <li>Aenean sit amet erat nunc</li>
                            </ul>
                            <div class="divider15"></div>
                            <div class="divider30"></div>
                            
                            <ul class="list-nostyle">
                              <li><span class="icon-chevron-right"></span> Lorem ipsum dolor sit amet</li>
                              <li><span class="icon-chevron-right"></span> Consectetur adipiscing elit
                              	<ul>
                                  <li><span class="icon-check"></span> Phasellus iaculis neque</li>
                                  <li><span class="icon-check"></span> Purus sodales ultricies</li>
                                </ul>
                              </li>
                              <li><span class="icon-chevron-right"></span> Faucibus porta lacus fringilla vel</li>
                              <li><span class="icon-chevron-right"></span> Aenean sit amet erat nunc</li>
                            </ul>
                            
                            <div class="divider15"></div>
                      </div><!--span6-->
                        
                        <div class="span6">
                            <ol class="list-ordered">
                              <li>Lorem ipsum dolor sit amet</li>
                              <li>Consectetur adipiscing elit
                              	<ol>
                                  <li>Phasellus iaculis neque</li>
                                  <li>Purus sodales ultricies</li>
                                </ol>
                              </li>
                              <li>Faucibus porta lacus fringilla vel</li>
                              <li>Aenean sit amet erat nunc</li>
                            </ol>
                            
                            <div class="divider15"></div>
                            <div class="divider30"></div>
                            
                            <ul class="list-unordered list-checked2">
                              <li>Lorem ipsum dolor sit amet</li>
                              <li>Consectetur adipiscing elit
                              	<ul>
                                  <li>Phasellus iaculis neque</li>
                                  <li>Purus sodales ultricies</li>
                                </ul>
                              </li>
                              <li>Faucibus porta lacus fringilla vel</li>
                              <li>Aenean sit amet erat nunc</li>
                            </ul>
                            
                            <div class="divider15"></div>
                            <div class="divider30"></div>
                            
                            <ul class="list-nostyle">
                              <li><span class="icon-plus"></span> Lorem ipsum dolor sit amet</li>
                              <li><span class="icon-plus"></span> Consectetur adipiscing elit
                              	<ul>
                                  <li><span class="icon-star"></span> Phasellus iaculis neque</li>
                                  <li><span class="icon-star"></span> Purus sodales ultricies</li>
                                </ul>
                              </li>
                              <li><span class="icon-plus"></span> Faucibus porta lacus fringilla vel</li>
                              <li><span class="icon-plus"></span> Aenean sit amet erat nunc</li>
                            </ul>
                            
                            <div class="divider15"></div>
                        </div><!--span6-->
                    </div><!--row-fluid-->
                </div><!--widgetcontent-->
                
            </div><!--span6-->
        
        </div><!--row-fluid-->
        
    </div><!--contentinner-->
</div><!--maincontent-->
<?php }elseif($i == 7){ echo $this->Html->script(array("admin/charts","admin/jquery.flot.min","admin/jquery.flot.pie"));?>
<div class="pagetitle">
	<h1>Graph &amp; Charts</h1> <span>This is a sample demo for the charts...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner content-charts">
    
        <div class="row-fluid">
            <div class="span6">
            	<h4 class="widgettitle">Simple Chart</h4>
                <br />
                <div id="chartplace" style="height:300px;"></div>
            </div>
            <div class="span6">
            	<h4 class="widgettitle">Bar Graph</h4>
                <br />
                <div id="bargraph" style="height:300px;"></div>
            </div>
        </div><!--row-fluid-->
        
        <br /><br />
        
        <div class="row-fluid">
            <div class="span6">
            	<h4 class="widgettitle">Real Time Chart</h4>
               	<br />
                <div id="realtime" style="height:300px;"></div>
                <br />
                <small>You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</small>
            </div>
            
            <div class="span6">
            	<h4 class="widgettitle">Pie Chart</h4>
                <br />
                <div id="piechart" style="height: 300px;"></div>
            </div>
        </div><!--row-fluid-->
        
      <div class="divider30"></div>
    </div><!--contentinner-->
</div><!--maincontent-->	
<?php }elseif($i == 8){ ?>
<div class="pagetitle">
	<h1>Messages</h1> <span>This is a sample description for messages page...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
    
    	<div id="tabs">
        	<ul>
            	<li><a href="#mail">Mail</a></li>
            	<li><a href="#chat">Chat</a></li>
			</ul>
        	<div id="mail">
            	<div class="msghead">
                    <ul class="msghead_menu">
                        <li>
                            <button class="btn"><span class="iconsweets-alert2"></span> Report Spam</button>
                            <button class="btn msgtrash"><span class="iconsweets-trashcan"></span></button>
                            <div class="btn-group">
                                <button class="btn">Actions</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="#">Mark as Read</a></li>
                                  <li><a href="#">Mark as Unread</a></li>
                                  <li><a href="#">Move to Folder</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#">Add Star</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="right btn-group">
                            <a class="btn prev prev_disabled"><span class="icon-chevron-left"></span></a>
                            <a class="btn next"><span class="icon-chevron-right"></span></a>
                        </li>
                        <li class="right"><span class="pageinfo">1-10 of 2,139</span></li>
                    </ul>
                    <span class="clearall"></span>
                </div><!--msghead-->
                
                <br />
                
                <table class="table table-bordered mailinbox">
                    <colgroup>
                        <col class="con1 width4" />
                        <col class="con0 width4" />
                        <col class="con1 width15" />
                        <col class="con0 width63" />
                        <col class="con1 width4" />
                        <col class="con1 width10" />
                    </colgroup>
                    <thead>
                    <tr>
                        <th class="head1 aligncenter"><input type="checkbox" name="checkall" class="checkall" /></th>
                        <th class="head0">&nbsp;</th>
                        <th class="head1">Sender</th>
                        <th class="head0">Subject</th>
                        <th class="head1 attachement">&nbsp;</th>
                        <th class="head0">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="unread">
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar"></a></td>
                            <td>PD</td>
                            <td><a href="#" class="title">Message Subject</a></td>
                            <td class="attachment"><img src="<?php echo $this->webroot;?>img/attachment.png" alt="" /></td>
                            <td class="date">July 1</td>
                        </tr>
                        <tr class="unread">
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar"></a></td>
                            <td>Executive</td>
                            <td><a href="#" class="title">Message Subject</a></td>
                            <td class="attachment"><img src="<?php echo $this->webroot;?>img/attachment.png" alt="" /></td>
                            <td class="date">July 7</td>
                        </tr>
                        <tr>
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar starred"></a></td>
                            <td>DPD</td>
                            <td><a href="#" class="title">Message subject</a></td>
                            <td class="attachment"></td>
                            <td class="date">June 19</td>
                        </tr>
                        <tr>
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar"></a></td>
                            <td>Consultant</td>
                            <td><a href="#" class="title">Message Subject</a></td>
                            <td class="attachment"><img src="img/attachment.png" alt="" /></td>
                            <td class="date">June 20</td>
                        </tr>
                        <tr>
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar starred"></a></td>
                            <td>Site Engineer</td>
                            <td><a href="#" class="title">Message subject</a></td>
                            <td class="attachment"></td>
                            <td class="date">June 19</td>
                        </tr>
                        <tr class="unread">
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar"></a></td>
                            <td>PD</td>
                            <td><a href="#" class="title">Message Subject</a></td>
                            <td class="attachment"><img src="<?php echo $this->webroot;?>img/attachment.png" alt="" /></td>
                            <td class="date">July 1</td>
                        </tr>
                        <tr class="unread">
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar"></a></td>
                            <td>PD</td>
                            <td><a href="#" class="title">Message Subject</a></td>
                            <td class="attachment"><img src="<?php echo $this->webroot;?>img/attachment.png" alt="" /></td>
                            <td class="date">July 27</td>
                        </tr>
                        <tr class="unread">
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar"></a></td>
                            <td>Contructer</td>
                            <td><a href="#" class="title">Message Subject</a></td>
                            <td class="attachment"><img src="<?php echo $this->webroot;?>img/attachment.png" alt="" /></td>
                            <td class="date">July 31</td>
                        </tr>
                        <tr class="unread">
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar"></a></td>
                            <td>PD</td>
                            <td><a href="#" class="title">Message Subject</a></td>
                            <td class="attachment"><img src="<?php echo $this->webroot;?>img/attachment.png" alt="" /></td>
                            <td class="date">July 1</td>
                        </tr>
                        <tr>
                            <td class="aligncenter"><input type="checkbox" name="" /></td>
                            <td class="star"><a class="msgstar starred"></a></td>
                            <td>Consultant</td>
                            <td><a href="#" class="title">Message subject</a></td>
                            <td class="attachment"></td>
                            <td class="date">June 19</td>
                        </tr>
                    </tbody>
                </table>             
            </div>
            <div id="chat" class="chatcontent">
                    <div id="chatmessage" class="chatmessage">
                        <div id="chatmessageinner">
                            <p class="reply">
			<img src="img/avatar.png" alt="" class="img-polaroid"/>
			<span class="msgblock">
			    <strong>PD</strong> <span class="time">- 12:10 pm</span>
			    <span class="msg">Hello, what's up!</span>
			</span>
                            </p>
                        </div><!--chatmessageinner-->
                    </div><!--chatmessage-->
                
                    <div class="messagebox">
                        <button class="btn btn-primary send">Send</button>
                        <span class="inputbox">
                            <input type="text" id="msgbox" name="msgbox"  class="input-block-level" />
                        </span>
                        <div class="clearfix"></div>
                    </div><!--messagebox-->
           	</div><!--#chat-->
        </div><!--#tabs-->
    	
     
        
    </div><!--contentinner-->
</div><!--maincontent-->	
<?php }elseif($i == 9){ ?>
<div class="pagetitle">
    	<h1>Buttons &amp; Icons</h1> <span>This is a sample buttons and icons page...</span>
    </div><!--pagetitle-->
    
    <div class="maincontent">
    	<div class="contentinner content-buttons">
        	
            <div class="tabbable">
            	<ul class="nav nav-tabs">
                	<li class="active"><a data-toggle="tab" href="#glyphs">Icon Glyphs</a></li>
                    <li><a data-toggle="tab" href="#fontawesome">Font Awesome</a></li>
                    <li><a data-toggle="tab" href="#iconsweets">IconSweets</a></li>
                    <li><a data-toggle="tab" href="#examples">Examples</a></li>
                </ul>
            	<div class="tab-content">
                	<div id="glyphs" class="tab-pane active">
                    	<p>140 icons in sprite form, available in dark gray (default) and white, provided by <a href="http://glyphicons.com/" target="_blank">Glyphicons</a>.</p>
                    	<ul class="glyphicons clearfix">
                            <li><i class="icon-glass"></i> icon-glass</li>
                            <li><i class="icon-music"></i> icon-music</li>
                            <li><i class="icon-search"></i> icon-search</li>
                            <li><i class="icon-envelope"></i> icon-envelope</li>
                            <li><i class="icon-heart"></i> icon-heart</li>
                            <li><i class="icon-star"></i> icon-star</li>
                            <li><i class="icon-star-empty"></i> icon-star-empty</li>
                            <li><i class="icon-user"></i> icon-user</li>
                            <li><i class="icon-film"></i> icon-film</li>
                            <li><i class="icon-th-large"></i> icon-th-large</li>
                            <li><i class="icon-th"></i> icon-th</li>
                            <li><i class="icon-th-list"></i> icon-th-list</li>
                            <li><i class="icon-ok"></i> icon-ok</li>
                            <li><i class="icon-remove"></i> icon-remove</li>
                            <li><i class="icon-zoom-in"></i> icon-zoom-in</li>
                            <li><i class="icon-zoom-out"></i> icon-zoom-out</li>
                            <li><i class="icon-off"></i> icon-off</li>
                            <li><i class="icon-signal"></i> icon-signal</li>
                            <li><i class="icon-cog"></i> icon-cog</li>
                            <li><i class="icon-trash"></i> icon-trash</li>
                            <li><i class="icon-home"></i> icon-home</li>
                            <li><i class="icon-file"></i> icon-file</li>
                            <li><i class="icon-time"></i> icon-time</li>
                            <li><i class="icon-road"></i> icon-road</li>
                            <li><i class="icon-download-alt"></i> icon-download-alt</li>
                            <li><i class="icon-download"></i> icon-download</li>
                            <li><i class="icon-upload"></i> icon-upload</li>
                            <li><i class="icon-inbox"></i> icon-inbox</li>
                
                            <li><i class="icon-play-circle"></i> icon-play-circle</li>
                            <li><i class="icon-repeat"></i> icon-repeat</li>
                            <li><i class="icon-refresh"></i> icon-refresh</li>
                            <li><i class="icon-list-alt"></i> icon-list-alt</li>
                            <li><i class="icon-lock"></i> icon-lock</li>
                            <li><i class="icon-flag"></i> icon-flag</li>
                            <li><i class="icon-headphones"></i> icon-headphones</li>
                            <li><i class="icon-volume-off"></i> icon-volume-off</li>
                            <li><i class="icon-volume-down"></i> icon-volume-down</li>
                            <li><i class="icon-volume-up"></i> icon-volume-up</li>
                            <li><i class="icon-qrcode"></i> icon-qrcode</li>
                            <li><i class="icon-barcode"></i> icon-barcode</li>
                            <li><i class="icon-tag"></i> icon-tag</li>
                            <li><i class="icon-tags"></i> icon-tags</li>
                            <li><i class="icon-book"></i> icon-book</li>
                            <li><i class="icon-bookmark"></i> icon-bookmark</li>
                            <li><i class="icon-print"></i> icon-print</li>
                            <li><i class="icon-camera"></i> icon-camera</li>
                            <li><i class="icon-font"></i> icon-font</li>
                            <li><i class="icon-bold"></i> icon-bold</li>
                            <li><i class="icon-italic"></i> icon-italic</li>
                            <li><i class="icon-text-height"></i> icon-text-height</li>
                            <li><i class="icon-text-width"></i> icon-text-width</li>
                            <li><i class="icon-align-left"></i> icon-align-left</li>
                            <li><i class="icon-align-center"></i> icon-align-center</li>
                            <li><i class="icon-align-right"></i> icon-align-right</li>
                            <li><i class="icon-align-justify"></i> icon-align-justify</li>
                            <li><i class="icon-list"></i> icon-list</li>
                
                            <li><i class="icon-indent-left"></i> icon-indent-left</li>
                            <li><i class="icon-indent-right"></i> icon-indent-right</li>
                            <li><i class="icon-facetime-video"></i> icon-facetime-video</li>
                            <li><i class="icon-picture"></i> icon-picture</li>
                            <li><i class="icon-pencil"></i> icon-pencil</li>
                            <li><i class="icon-map-marker"></i> icon-map-marker</li>
                            <li><i class="icon-adjust"></i> icon-adjust</li>
                            <li><i class="icon-tint"></i> icon-tint</li>
                            <li><i class="icon-edit"></i> icon-edit</li>
                            <li><i class="icon-share"></i> icon-share</li>
                            <li><i class="icon-check"></i> icon-check</li>
                            <li><i class="icon-move"></i> icon-move</li>
                            <li><i class="icon-step-backward"></i> icon-step-backward</li>
                            <li><i class="icon-fast-backward"></i> icon-fast-backward</li>
                            <li><i class="icon-backward"></i> icon-backward</li>
                            <li><i class="icon-play"></i> icon-play</li>
                            <li><i class="icon-pause"></i> icon-pause</li>
                            <li><i class="icon-stop"></i> icon-stop</li>
                            <li><i class="icon-forward"></i> icon-forward</li>
                            <li><i class="icon-fast-forward"></i> icon-fast-forward</li>
                            <li><i class="icon-step-forward"></i> icon-step-forward</li>
                            <li><i class="icon-eject"></i> icon-eject</li>
                            <li><i class="icon-chevron-left"></i> icon-chevron-left</li>
                            <li><i class="icon-chevron-right"></i> icon-chevron-right</li>
                            <li><i class="icon-plus-sign"></i> icon-plus-sign</li>
                            <li><i class="icon-minus-sign"></i> icon-minus-sign</li>
                            <li><i class="icon-remove-sign"></i> icon-remove-sign</li>
                            <li><i class="icon-ok-sign"></i> icon-ok-sign</li>
                
                            <li><i class="icon-question-sign"></i> icon-question-sign</li>
                            <li><i class="icon-info-sign"></i> icon-info-sign</li>
                            <li><i class="icon-screenshot"></i> icon-screenshot</li>
                            <li><i class="icon-remove-circle"></i> icon-remove-circle</li>
                            <li><i class="icon-ok-circle"></i> icon-ok-circle</li>
                            <li><i class="icon-ban-circle"></i> icon-ban-circle</li>
                            <li><i class="icon-arrow-left"></i> icon-arrow-left</li>
                            <li><i class="icon-arrow-right"></i> icon-arrow-right</li>
                            <li><i class="icon-arrow-up"></i> icon-arrow-up</li>
                            <li><i class="icon-arrow-down"></i> icon-arrow-down</li>
                            <li><i class="icon-share-alt"></i> icon-share-alt</li>
                            <li><i class="icon-resize-full"></i> icon-resize-full</li>
                            <li><i class="icon-resize-small"></i> icon-resize-small</li>
                            <li><i class="icon-plus"></i> icon-plus</li>
                            <li><i class="icon-minus"></i> icon-minus</li>
                            <li><i class="icon-asterisk"></i> icon-asterisk</li>
                            <li><i class="icon-exclamation-sign"></i> icon-exclamation-sign</li>
                            <li><i class="icon-gift"></i> icon-gift</li>
                            <li><i class="icon-leaf"></i> icon-leaf</li>
                            <li><i class="icon-fire"></i> icon-fire</li>
                            <li><i class="icon-eye-open"></i> icon-eye-open</li>
                            <li><i class="icon-eye-close"></i> icon-eye-close</li>
                            <li><i class="icon-warning-sign"></i> icon-warning-sign</li>
                            <li><i class="icon-plane"></i> icon-plane</li>
                            <li><i class="icon-calendar"></i> icon-calendar</li>
                            <li><i class="icon-random"></i> icon-random</li>
                            <li><i class="icon-comment"></i> icon-comment</li>
                            <li><i class="icon-magnet"></i> icon-magnet</li>
                
                            <li><i class="icon-chevron-up"></i> icon-chevron-up</li>
                            <li><i class="icon-chevron-down"></i> icon-chevron-down</li>
                            <li><i class="icon-retweet"></i> icon-retweet</li>
                            <li><i class="icon-shopping-cart"></i> icon-shopping-cart</li>
                            <li><i class="icon-folder-close"></i> icon-folder-close</li>
                            <li><i class="icon-folder-open"></i> icon-folder-open</li>
                            <li><i class="icon-resize-vertical"></i> icon-resize-vertical</li>
                            <li><i class="icon-resize-horizontal"></i> icon-resize-horizontal</li>
                            <li><i class="icon-hdd"></i> icon-hdd</li>
                            <li><i class="icon-bullhorn"></i> icon-bullhorn</li>
                            <li><i class="icon-bell"></i> icon-bell</li>
                            <li><i class="icon-certificate"></i> icon-certificate</li>
                            <li><i class="icon-thumbs-up"></i> icon-thumbs-up</li>
                            <li><i class="icon-thumbs-down"></i> icon-thumbs-down</li>
                            <li><i class="icon-hand-right"></i> icon-hand-right</li>
                            <li><i class="icon-hand-left"></i> icon-hand-left</li>
                            <li><i class="icon-hand-up"></i> icon-hand-up</li>
                            <li><i class="icon-hand-down"></i> icon-hand-down</li>
                            <li><i class="icon-circle-arrow-right"></i> icon-circle-arrow-right</li>
                            <li><i class="icon-circle-arrow-left"></i> icon-circle-arrow-left</li>
                            <li><i class="icon-circle-arrow-up"></i> icon-circle-arrow-up</li>
                            <li><i class="icon-circle-arrow-down"></i> icon-circle-arrow-down</li>
                            <li><i class="icon-globe"></i> icon-globe</li>
                            <li><i class="icon-wrench"></i> icon-wrench</li>
                            <li><i class="icon-tasks"></i> icon-tasks</li>
                            <li><i class="icon-filter"></i> icon-filter</li>
                            <li><i class="icon-briefcase"></i> icon-briefcase</li>
                            <li><i class="icon-fullscreen"></i> icon-fullscreen</li>
                          </ul>
                    </div><!--tab-pane-->
                    <div id="fontawesome" class="tab-pane">
                    	<p>220 icons in a single collection by <a href="http://fortawesome.github.com/Font-Awesome" target="_blank">Font Awesome</a>.</p>
                         <div class="row-fluid fontawesomeicons">                            
                          <div class="span12">
                            <h4>Web Application Icons</h4>
                          </div>
                          <div class="span3" style="margin-left: 0;">
                            <ul class="the-icons">
                              <li><i class="iconfa-adjust"></i> iconfa-adjust</li>
                              <li><i class="iconfa-asterisk"></i> iconfa-asterisk</li>
                              <li><i class="iconfa-ban-circle"></i> iconfa-ban-circle</li>
                              <li><i class="iconfa-bar-chart"></i> iconfa-bar-chart</li>
                              <li><i class="iconfa-barcode"></i> iconfa-barcode</li>
                              <li><i class="iconfa-beaker"></i> iconfa-beaker</li>
                              <li><i class="iconfa-bell"></i> iconfa-bell</li>
                              <li><i class="iconfa-bolt"></i> iconfa-bolt</li>
                              <li><i class="iconfa-book"></i> iconfa-book</li>
                              <li><i class="iconfa-bookmark"></i> iconfa-bookmark</li>
                              <li><i class="iconfa-bookmark-empty"></i> iconfa-bookmark-empty</li>
                              <li><i class="iconfa-briefcase"></i> iconfa-briefcase</li>
                              <li><i class="iconfa-bullhorn"></i> iconfa-bullhorn</li>
                              <li><i class="iconfa-calendar"></i> iconfa-calendar</li>
                              <li><i class="iconfa-camera"></i> iconfa-camera</li>
                              <li><i class="iconfa-camera-retro"></i> iconfa-camera-retro</li>
                              <li><i class="iconfa-certificate"></i> iconfa-certificate</li>
                              <li><i class="iconfa-check"></i> iconfa-check</li>
                              <li><i class="iconfa-check-empty"></i> iconfa-check-empty</li>
                              <li><i class="iconfa-cloud"></i> iconfa-cloud</li>
                              <li><i class="iconfa-cog"></i> iconfa-cog</li>
                              <li><i class="iconfa-cogs"></i> iconfa-cogs</li>
                              <li><i class="iconfa-comment"></i> iconfa-comment</li>
                              <li><i class="iconfa-comment-alt"></i> iconfa-comment-alt</li>
                              <li><i class="iconfa-comments"></i> iconfa-comments</li>
                              <li><i class="iconfa-comments-alt"></i> iconfa-comments-alt</li>
                              <li><i class="iconfa-credit-card"></i> iconfa-credit-card</li>
                              <li><i class="iconfa-dashboard"></i> iconfa-dashboard</li>
                              <li><i class="iconfa-download"></i> iconfa-download</li>
                              <li><i class="iconfa-download-alt"></i> iconfa-download-alt</li>
                              <li><i class="iconfa-edit"></i> iconfa-edit</li>
                              <li><i class="iconfa-envelope"></i> iconfa-envelope</li>
                              <li><i class="iconfa-envelope-alt"></i> iconfa-envelope-alt</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-exclamation-sign"></i> iconfa-exclamation-sign</li>
                              <li><i class="iconfa-external-link"></i> iconfa-external-link</li>
                              <li><i class="iconfa-eye-close"></i> iconfa-eye-close</li>
                              <li><i class="iconfa-eye-open"></i> iconfa-eye-open</li>
                              <li><i class="iconfa-facetime-video"></i> iconfa-facetime-video</li>
                              <li><i class="iconfa-film"></i> iconfa-film</li>
                              <li><i class="iconfa-filter"></i> iconfa-filter</li>
                              <li><i class="iconfa-fire"></i> iconfa-fire</li>
                              <li><i class="iconfa-flag"></i> iconfa-flag</li>
                              <li><i class="iconfa-folder-close"></i> iconfa-folder-close</li>
                              <li><i class="iconfa-folder-open"></i> iconfa-folder-open</li>
                              <li><i class="iconfa-gift"></i> iconfa-gift</li>
                              <li><i class="iconfa-glass"></i> iconfa-glass</li>
                              <li><i class="iconfa-globe"></i> iconfa-globe</li>
                              <li><i class="iconfa-group"></i> iconfa-group</li>
                              <li><i class="iconfa-hdd"></i> iconfa-hdd</li>
                              <li><i class="iconfa-headphones"></i> iconfa-headphones</li>
                              <li><i class="iconfa-heart"></i> iconfa-heart</li>
                              <li><i class="iconfa-heart-empty"></i> iconfa-heart-empty</li>
                              <li><i class="iconfa-home"></i> iconfa-home</li>
                              <li><i class="iconfa-inbox"></i> iconfa-inbox</li>
                              <li><i class="iconfa-info-sign"></i> iconfa-info-sign</li>
                              <li><i class="iconfa-key"></i> iconfa-key</li>
                              <li><i class="iconfa-leaf"></i> iconfa-leaf</li>
                              <li><i class="iconfa-legal"></i> iconfa-legal</li>
                              <li><i class="iconfa-lemon"></i> iconfa-lemon</li>
                              <li><i class="iconfa-lock"></i> iconfa-lock</li>
                              <li><i class="iconfa-unlock"></i> iconfa-unlock</li>
                              <li><i class="iconfa-magic"></i> iconfa-magic</li>
                              <li><i class="iconfa-magnet"></i> iconfa-magnet</li>
                              <li><i class="iconfa-map-marker"></i> iconfa-map-marker</li>
                              <li><i class="iconfa-minus"></i> iconfa-minus</li>
                              <li><i class="iconfa-minus-sign"></i> iconfa-minus-sign</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-money"></i> iconfa-money</li>
                              <li><i class="iconfa-move"></i> iconfa-move</li>
                              <li><i class="iconfa-music"></i> iconfa-music</li>
                              <li><i class="iconfa-off"></i> iconfa-off</li>
                              <li><i class="iconfa-ok"></i> iconfa-ok</li>
                              <li><i class="iconfa-ok-circle"></i> iconfa-ok-circle</li>
                              <li><i class="iconfa-ok-sign"></i> iconfa-ok-sign</li>
                              <li><i class="iconfa-pencil"></i> iconfa-pencil</li>
                              <li><i class="iconfa-picture"></i> iconfa-picture</li>
                              <li><i class="iconfa-plane"></i> iconfa-plane</li>
                              <li><i class="iconfa-plus"></i> iconfa-plus</li>
                              <li><i class="iconfa-plus-sign"></i> iconfa-plus-sign</li>
                              <li><i class="iconfa-print"></i> iconfa-print</li>
                              <li><i class="iconfa-pushpin"></i> iconfa-pushpin</li>
                              <li><i class="iconfa-qrcode"></i> iconfa-qrcode</li>
                              <li><i class="iconfa-question-sign"></i> iconfa-question-sign</li>
                              <li><i class="iconfa-random"></i> iconfa-random</li>
                              <li><i class="iconfa-refresh"></i> iconfa-refresh</li>
                              <li><i class="iconfa-remove"></i> iconfa-remove</li>
                              <li><i class="iconfa-remove-circle"></i> iconfa-remove-circle</li>
                              <li><i class="iconfa-remove-sign"></i> iconfa-remove-sign</li>
                              <li><i class="iconfa-reorder"></i> iconfa-reorder</li>
                              <li><i class="iconfa-resize-horizontal"></i> iconfa-resize-horizontal</li>
                              <li><i class="iconfa-resize-vertical"></i> iconfa-resize-vertical</li>
                              <li><i class="iconfa-retweet"></i> iconfa-retweet</li>
                              <li><i class="iconfa-road"></i> iconfa-road</li>
                              <li><i class="iconfa-rss"></i> iconfa-rss</li>
                              <li><i class="iconfa-screenshot"></i> iconfa-screenshot</li>
                              <li><i class="iconfa-search"></i> iconfa-search</li>
                              <li><i class="iconfa-share"></i> iconfa-share</li>
                              <li><i class="iconfa-share-alt"></i> iconfa-share-alt</li>
                              <li><i class="iconfa-shopping-cart"></i> iconfa-shopping-cart</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-signal"></i> iconfa-signal</li>
                              <li><i class="iconfa-signin"></i> iconfa-signin</li>
                              <li><i class="iconfa-signout"></i> iconfa-signout</li>
                              <li><i class="iconfa-sitemap"></i> iconfa-sitemap</li>
                              <li><i class="iconfa-sort"></i> iconfa-sort</li>
                              <li><i class="iconfa-sort-down"></i> iconfa-sort-down</li>
                              <li><i class="iconfa-sort-up"></i> iconfa-sort-up</li>
                              <li><i class="iconfa-star"></i> iconfa-star</li>
                              <li><i class="iconfa-star-empty"></i> iconfa-star-empty</li>
                              <li><i class="iconfa-star-half"></i> iconfa-star-half</li>
                              <li><i class="iconfa-tag"></i> iconfa-tag</li>
                              <li><i class="iconfa-tags"></i> iconfa-tags</li>
                              <li><i class="iconfa-tasks"></i> iconfa-tasks</li>
                              <li><i class="iconfa-thumbs-down"></i> iconfa-thumbs-down</li>
                              <li><i class="iconfa-thumbs-up"></i> iconfa-thumbs-up</li>
                              <li><i class="iconfa-time"></i> iconfa-time</li>
                              <li><i class="iconfa-tint"></i> iconfa-tint</li>
                              <li><i class="iconfa-trash"></i> iconfa-trash</li>
                              <li><i class="iconfa-trophy"></i> iconfa-trophy</li>
                              <li><i class="iconfa-truck"></i> iconfa-truck</li>
                              <li><i class="iconfa-umbrella"></i> iconfa-umbrella</li>
                              <li><i class="iconfa-upload"></i> iconfa-upload</li>
                              <li><i class="iconfa-upload-alt"></i> iconfa-upload-alt</li>
                              <li><i class="iconfa-user"></i> iconfa-user</li>
                              <li><i class="iconfa-user-md"></i> iconfa-user-md</li>
                              <li><i class="iconfa-volume-off"></i> iconfa-volume-off</li>
                              <li><i class="iconfa-volume-down"></i> iconfa-volume-down</li>
                              <li><i class="iconfa-volume-up"></i> iconfa-volume-up</li>
                              <li><i class="iconfa-warning-sign"></i> iconfa-warning-sign</li>
                              <li><i class="iconfa-wrench"></i> iconfa-wrench</li>
                              <li><i class="iconfa-zoom-in"></i> iconfa-zoom-in</li>
                              <li><i class="iconfa-zoom-out"></i> iconfa-zoom-out</li>
                            </ul>
                          </div>
                        
                          <div class="span12" style="margin: 30px 0 0 0;">
                            <h4>Text Editor Icons</h4>
                          </div>
                          <div class="span3" style="margin: 0">
                            <ul class="the-icons">
                              <li><i class="iconfa-file"></i> iconfa-file</li>
                              <li><i class="iconfa-cut"></i> iconfa-cut</li>
                              <li><i class="iconfa-copy"></i> iconfa-copy</li>
                              <li><i class="iconfa-paste"></i> iconfa-paste</li>
                              <li><i class="iconfa-save"></i> iconfa-save</li>
                              <li><i class="iconfa-undo"></i> iconfa-undo</li>
                              <li><i class="iconfa-repeat"></i> iconfa-repeat</li>
                              <li><i class="iconfa-paper-clip"></i> iconfa-paper-clip</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-text-height"></i> iconfa-text-height</li>
                              <li><i class="iconfa-text-width"></i> iconfa-text-width</li>
                              <li><i class="iconfa-align-left"></i> iconfa-align-left</li>
                              <li><i class="iconfa-align-center"></i> iconfa-align-center</li>
                              <li><i class="iconfa-align-right"></i> iconfa-align-right</li>
                              <li><i class="iconfa-align-justify"></i> iconfa-align-justify</li>
                              <li><i class="iconfa-indent-left"></i> iconfa-indent-left</li>
                              <li><i class="iconfa-indent-right"></i> iconfa-indent-right</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-font"></i> iconfa-font</li>
                              <li><i class="iconfa-bold"></i> iconfa-bold</li>
                              <li><i class="iconfa-italic"></i> iconfa-italic</li>
                              <li><i class="iconfa-strikethrough"></i> iconfa-strikethrough</li>
                              <li><i class="iconfa-underline"></i> iconfa-underline</li>
                              <li><i class="iconfa-link"></i> iconfa-link</li>
                              <li><i class="iconfa-columns"></i> iconfa-columns</li>
                              <li><i class="iconfa-table"></i> iconfa-table</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-th-large"></i> iconfa-th-large</li>
                              <li><i class="iconfa-th"></i> iconfa-th</li>
                              <li><i class="iconfa-th-list"></i> iconfa-th-list</li>
                              <li><i class="iconfa-list"></i> iconfa-list</li>
                              <li><i class="iconfa-list-ol"></i> iconfa-list-ol</li>
                              <li><i class="iconfa-list-ul"></i> iconfa-list-ul</li>
                              <li><i class="iconfa-list-alt"></i> iconfa-list-alt</li>
                            </ul>
                          </div>
                        
                          <div class="span12" style="margin: 30px 0 0 0">
                            <h4>Directional Icons</h4>
                          </div>
                          <div class="span3" style="margin: 0">
                            <ul class="the-icons">
                              <li><i class="iconfa-arrow-down"></i> iconfa-arrow-down</li>
                              <li><i class="iconfa-arrow-left"></i> iconfa-arrow-left</li>
                              <li><i class="iconfa-arrow-right"></i> iconfa-arrow-right</li>
                              <li><i class="iconfa-arrow-up"></i> iconfa-arrow-up</li>
                              <li><i class="iconfa-chevron-down"></i> iconfa-chevron-down</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-circle-arrow-down"></i> iconfa-circle-arrow-down</li>
                              <li><i class="iconfa-circle-arrow-left"></i> iconfa-circle-arrow-left</li>
                              <li><i class="iconfa-circle-arrow-right"></i> iconfa-circle-arrow-right</li>
                              <li><i class="iconfa-circle-arrow-up"></i> iconfa-circle-arrow-up</li>
                              <li><i class="iconfa-chevron-left"></i> iconfa-chevron-left</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-caret-down"></i> iconfa-caret-down</li>
                              <li><i class="iconfa-caret-left"></i> iconfa-caret-left</li>
                              <li><i class="iconfa-caret-right"></i> iconfa-caret-right</li>
                              <li><i class="iconfa-caret-up"></i> iconfa-caret-up</li>
                              <li><i class="iconfa-chevron-right"></i> iconfa-chevron-right</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-hand-down"></i> iconfa-hand-down</li>
                              <li><i class="iconfa-hand-left"></i> iconfa-hand-left</li>
                              <li><i class="iconfa-hand-right"></i> iconfa-hand-right</li>
                              <li><i class="iconfa-hand-up"></i> iconfa-hand-up</li>
                              <li><i class="iconfa-chevron-up"></i> iconfa-chevron-up</li>
                            </ul>
                          </div>
                        
                          <div class="span12" style="margin: 30px 0 0 0;">
                            <h4>Video Player Icons</h4>
                          </div>
                          <div class="span3" style="margin: 0">
                            <ul class="the-icons">
                              <li><i class="iconfa-play-circle"></i> iconfa-play-circle</li>
                              <li><i class="iconfa-play"></i> iconfa-play</li>
                              <li><i class="iconfa-pause"></i> iconfa-pause</li>
                              <li><i class="iconfa-stop"></i> iconfa-stop</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-step-backward"></i> iconfa-step-backward</li>
                              <li><i class="iconfa-fast-backward"></i> iconfa-fast-backward</li>
                              <li><i class="iconfa-backward"></i> iconfa-backward</li>
                              <li><i class="iconfa-forward"></i> iconfa-forward</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-fast-forward"></i> iconfa-fast-forward</li>
                              <li><i class="iconfa-step-forward"></i> iconfa-step-forward</li>
                              <li><i class="iconfa-eject"></i> iconfa-eject</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-fullscreen"></i> iconfa-fullscreen</li>
                              <li><i class="iconfa-resize-full"></i> iconfa-resize-full</li>
                              <li><i class="iconfa-resize-small"></i> iconfa-resize-small</li>
                            </ul>
                          </div>
                        
                          <div class="span12" style="margin: 30px 0 0 0">
                            <h4>Social Icons</h4>
                          </div>
                          <div class="span3" style="margin: 0">
                            <ul class="the-icons">
                              <li><i class="iconfa-phone"></i> iconfa-phone</li>
                              <li><i class="iconfa-phone-sign"></i> iconfa-phone-sign</li>
                              <li><i class="iconfa-facebook"></i> iconfa-facebook</li>
                              <li><i class="iconfa-facebook-sign"></i> iconfa-facebook-sign</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-twitter"></i> iconfa-twitter</li>
                              <li><i class="iconfa-twitter-sign"></i> iconfa-twitter-sign</li>
                              <li><i class="iconfa-github"></i> iconfa-github</li>
                              <li><i class="iconfa-github-sign"></i> iconfa-github-sign</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-linkedin"></i> iconfa-linkedin</li>
                              <li><i class="iconfa-linkedin-sign"></i> iconfa-linkedin-sign</li>
                              <li><i class="iconfa-pinterest"></i> iconfa-pinterest</li>
                              <li><i class="iconfa-pinterest-sign"></i> iconfa-pinterest-sign</li>
                            </ul>
                          </div>
                          <div class="span3">
                            <ul class="the-icons">
                              <li><i class="iconfa-google-plus"></i> iconfa-google-plus</li>
                              <li><i class="iconfa-google-plus-sign"></i> iconfa-google-plus-sign</li>
                              <li><i class="iconfa-sign-blank"></i> iconfa-sign-blank</li>
                            </ul>
                          </div>
                        
                        </div><!--row-->
                    </div><!--tab-pane-->
                    
                    <div id="iconsweets" class="tab-pane">
                    	<p>291 icons in sprite form, available in dark gray (default) and white, provided by <a href="http://www.iconsweets2.com/" target="_blank">IconSweets</a>.</p>
                		<ul class="iconsweetslist clearfix">
                        	<li><i class="iconsweets-magnifying"></i> iconsweets-magnifying</li>
                            <li><i class="iconsweets-trashcan"></i> iconsweets-trashcan</li>
                            <li><i class="iconsweets-trashcan2"></i> iconsweets-trashcan2</li>
                            <li><i class="iconsweets-presentation"></i> iconsweets-presentation</li>
                            <li><i class="iconsweets-download"></i> iconsweets-download2</li>
                            <li><i class="iconsweets-download2"></i> iconsweets-download2</li>
                            <li><i class="iconsweets-upload"></i> iconsweets-upload</li>
                            <li><i class="iconsweets-flag"></i> iconsweets-flag</li>
                            <li><i class="iconsweets-flag2"></i> iconsweets-flag2</li>
                            <li><i class="iconsweets-finish-flag"></i> iconsweets-finish-flag</li>
                            <li><i class="iconsweets-podium"></i> iconsweets-podium</li>
                            <li><i class="iconsweets-cup"></i> iconsweets-cup</li>
                            <li><i class="iconsweets-home"></i> iconsweets-home</li>
                            <li><i class="iconsweets-home2"></i> iconsweets-home2</li>
                            <li><i class="iconsweets-link"></i> iconsweets-link</li>
                            <li><i class="iconsweets-link2"></i> iconsweets-link2</li>
                            <li><i class="iconsweets-notebook"></i> iconsweets-notebook</li>
                            <li><i class="iconsweets-book"></i> iconsweets-book</li>
                            <li><i class="iconsweets-book-large"></i> iconsweets-book-large</li>
                            <li><i class="iconsweets-books"></i> iconsweets-books</li>
                            <li><i class="iconsweets-tree"></i> iconsweets-tree</li>
                            <li><i class="iconsweets-construction"></i> iconsweets-consruction</li>
                            <li><i class="iconsweets-umbrella"></i> iconsweets-umbrella</li>
                            <li><i class="iconsweets-mail"></i> iconsweets-mail</li>
                            <li><i class="iconsweets-help"></i> iconsweets-help</li>
                            <li><i class="iconsweets-rss"></i> iconsweets-rss</li>
                            <li><i class="iconsweets-strategy"></i> iconsweets-strategy</li>
                            <li><i class="iconsweets-strategy2"></i> iconsweets-strategy2</li>
                            <li><i class="iconsweets-apartment"></i> iconsweets-apartment</li>
                            <li><i class="iconsweets-companies"></i> iconsweets-companies</li>
                            <li><i class="iconsweets-ghost"></i> iconsweets-ghost</li>
                            <li><i class="iconsweets-pacman"></i> iconsweets-pacman</li>
                            <li><i class="iconsweets-vault"></i> iconsweets-vault</li>
                            <li><i class="iconsweets-archive"></i> iconsweets-archive</li>
                            <li><i class="iconsweets-cabinet"></i> iconsweets-cabinet</li>
                            <li><i class="iconsweets-bandaid"></i> iconsweets-bandaid</li>
                            <li><i class="iconsweets-postcard"></i> iconsweets-postcard</li>
                            <li><i class="iconsweets-alert"></i> iconsweets-alert</li>
                            <li><i class="iconsweets-alert2"></i> iconsweets-alert2</li>
                            <li><i class="iconsweets-alarm"></i> iconsweets-alarm</li>
                            <li><i class="iconsweets-alarm2"></i> iconsweets-alarm2</li>
                            <li><i class="iconsweets-robot"></i> iconsweets-robot</li>
                            <li><i class="iconsweets-globe"></i> iconsweets-globe</li>
                            <li><i class="iconsweets-globe2"></i> iconsweets-globe2</li>
                            <li><i class="iconsweets-chemical"></i> iconsweets-chemical</li>
                            <li><i class="iconsweets-lightbulb"></i> iconsweets-lightbulb</li>
                            <li><i class="iconsweets-cloud"></i> iconsweets-cloud</li>
                            <li><i class="iconsweets-cloud-upload"></i> iconsweets-cloud-upload</li>
                            <li><i class="iconsweets-cloud-download"></i> iconsweets-cloud-download</li>
                            <li><i class="iconsweets-lamp"></i> iconsweets-lamp</li>
                            <li><i class="iconsweets-preview"></i> iconsweets-preview</li>
                            <li><i class="iconsweets-icecream"></i> iconsweets-icecream</li>
                            <li><i class="iconsweets-icecream2"></i> iconsweets-icecream2</li>
                            <li><i class="iconsweets-paperclip"></i> iconsweets-paperclip</li>
                            <li><i class="iconsweets-footprints"></i> iconsweets-footprints</li>
                            <li><i class="iconsweets-firefox"></i> iconsweets-firefox</li>
                            <li><i class="iconsweets-chrome"></i> iconsweets-chrome</li>
                            <li><i class="iconsweets-safari"></i> iconsweets-safari</li>
                            <li><i class="iconsweets-loadingbar"></i> iconsweets-loadingbar</li>
                            <li><i class="iconsweets-bullseye"></i> iconsweets-bullseye</li>
                            <li><i class="iconsweets-folder"></i> iconsweets-folder</li>
                            <li><i class="iconsweets-locked"></i> iconsweets-locked</li>
                            <li><i class="iconsweets-locked2"></i> iconsweets-locked2</li>
                            <li><i class="iconsweets-unlock"></i> iconsweets-unlock</li>
                            <li><i class="iconsweets-tag"></i> iconsweets-tag</li>
                            <li><i class="iconsweets-tag2"></i> iconsweets-tag2</li>
                            <li><i class="iconsweets-mac"></i> iconsweets-mac</li>
                            <li><i class="iconsweets-windows"></i> iconsweets-windows</li>
                            <li><i class="iconsweets-linux"></i> iconsweets-linux</li>
                            <li><i class="iconsweets-create"></i> iconsweets-create</li>
                            <li><i class="iconsweets-expose"></i> iconsweets-expose</li>
                            <li><i class="iconsweets-key"></i> iconsweets-key</li>
                            <li><i class="iconsweets-key2"></i> iconsweets-key2</li>
                            <li><i class="iconsweets-table"></i> iconsweets-table</li>
                            <li><i class="iconsweets-chair"></i> iconsweets-chair</li>
                            <li><i class="iconsweets-denied"></i> iconsweets-denied</li>
                            <li><i class="iconsweets-ballons"></i> iconsweets-ballons</li>
                            <li><i class="iconsweets-cat"></i> iconsweets-cat</li>
                            <li><i class="iconsweets-airplane"></i> iconsweets-airplane</li>
                            <li><i class="iconsweets-track"></i> iconsweets-track</li>
                            <li><i class="iconsweets-car"></i> iconsweets-car</li>
                            <li><i class="iconsweets-info"></i> iconsweets-info</li>
                            <li><i class="iconsweets-alarmclock"></i> iconsweets-alarmclock</li>
                            <li><i class="iconsweets-stopwatch"></i> iconsweets-stopwatch</li>
                            <li><i class="iconsweets-timer"></i> iconsweets-timer</li>
                            <li><i class="iconsweets-clock"></i> iconsweets-clock</li>
                            <li><i class="iconsweets-day"></i> iconsweets-day</li>
                            <li><i class="iconsweets-month"></i> iconsweets-month</li>
                            <li><i class="iconsweets-dress"></i> iconsweets-dress</li>
                            <li><i class="iconsweets-tshirt"></i> iconsweets-tshirt</li>
                            <li><i class="iconsweets-sportshirt"></i> iconsweets-sportshirt</li>
                            <li><i class="iconsweets-sweater"></i> iconsweets-sweater</li>
                            <li><i class="iconsweets-sleeveless"></i> iconsweets-sleeveless</li>
                            <li><i class="iconsweets-pants"></i> iconsweets-pants</li>
                            <li><i class="iconsweets-socks"></i> iconsweets-socks</li>
                            <li><i class="iconsweets-trolly"></i> iconsweets-trolly</li>
                            <li><i class="iconsweets-medical"></i> iconsweets-medical</li>
                            <li><i class="iconsweets-suitcase"></i> iconsweets-suitcase</li>
                            <li><i class="iconsweets-suitcase2"></i> iconsweets-suitcase2</li>
                            <li><i class="iconsweets-suitcase3"></i> iconsweets-suitcase3</li>
                            <li><i class="iconsweets-shoppingbag"></i> iconsweets-shoppingbag</li>
                            <li><i class="iconsweets-purse"></i> iconsweets-purse</li>
                            <li><i class="iconsweets-bag"></i> iconsweets-bag</li>
                            <li><i class="iconsweets-paypal"></i> iconsweets-paypal</li>
                            <li><i class="iconsweets-paypal2"></i> iconsweets-paypal2</li>
                            <li><i class="iconsweets-paypal3"></i> iconsweets-paypal3</li>
                            <li><i class="iconsweets-money"></i> iconsweets-money</li>
                            <li><i class="iconsweets-money2"></i> iconsweets-money2</li>
                            <li><i class="iconsweets-pricetag"></i> iconsweets-pricetag</li>
                            <li><i class="iconsweets-pricetags"></i> iconsweets-pricetags</li>
                            <li><i class="iconsweets-piggybank"></i> iconsweets-piggybank</li>
                            <li><i class="iconsweets-lemonade"></i> iconsweets-lemonade</li>
                            <li><i class="iconsweets-basket"></i> iconsweets-basket</li>
                            <li><i class="iconsweets-basket2"></i> iconsweets-basket2</li>
                            <li><i class="iconsweets-scan"></i> iconsweets-scan</li>
                            <li><i class="iconsweets-cart"></i> iconsweets-cart</li>
                            <li><i class="iconsweets-cart2"></i> iconsweets-cart2</li>
                            <li><i class="iconsweets-cart3"></i> iconsweets-cart3</li>
                            <li><i class="iconsweets-cart4"></i> iconsweets-cart4</li>
                            <li><i class="iconsweets-digg"></i> iconsweets-cart4</li>
                            <li><i class="iconsweets-digg2"></i> iconsweets-cart4</li>
                            <li><i class="iconsweets-buzz"></i> iconsweets-cart4</li>
                            <li><i class="iconsweets-delicious"></i> iconsweets-delicious</li>
                            <li><i class="iconsweets-twitter"></i> iconsweets-twitter</li>
                            <li><i class="iconsweets-twitter2"></i> iconsweets-twitter2</li>
                            <li><i class="iconsweets-tumblr"></i> iconsweets-tumblr</li>
                            <li><i class="iconsweets-plixi"></i> iconsweets-plixi</li>
                            <li><i class="iconsweets-dribbble"></i> iconsweets-dribbble</li>
                            <li><i class="iconsweets-dribbble2"></i> iconsweets-dribbble2</li>
							<li><i class="iconsweets-stumbleupon"></i> iconsweets-stumbleupon</li>
                            <li><i class="iconsweets-lastfm"></i> iconsweets-lastfm</li>
                            <li><i class="iconsweets-mobypicture"></i> iconsweets-mobypicture</li>
                            <li><i class="iconsweets-youtube"></i> iconsweets-youtube</li>
                            <li><i class="iconsweets-youtube2"></i> iconsweets-youtube2</li>
                            <li><i class="iconsweets-vimeo"></i> iconsweets-vimeo</li>
                            <li><i class="iconsweets-vimeo2"></i> iconsweets-vimeo2</li>
                            <li><i class="iconsweets-skype"></i> iconsweets-skype</li>
                            <li><i class="iconsweets-facebook"></i> iconsweets-facebook</li>
                            <li><i class="iconsweets-like"></i> iconsweets-like</li>
                            <li><i class="iconsweets-ichat"></i> iconsweets-ichat</li>
                            <li><i class="iconsweets-myspace"></i> iconsweets-myspace</li>
                            <li><i class="iconsweets-dropbox"></i> iconsweets-dropbox</li>
                            <li><i class="iconsweets-walking"></i> iconsweets-walking</li>
                            <li><i class="iconsweets-running"></i> iconsweets-running</li>
                            <li><i class="iconsweets-exit"></i> iconsweets-exit</li>
                            <li><i class="iconsweets-male"></i> iconsweets-male</li>
                            <li><i class="iconsweets-female"></i> iconsweets-female</li>
                            <li><i class="iconsweets-user"></i> iconsweets-user</li>
                            <li><i class="iconsweets-users"></i> iconsweets-users</li>
                            <li><i class="iconsweets-admin"></i> iconsweets-admin</li>
                            <li><i class="iconsweets-malesymbol"></i> iconsweets-malesymbol</li>
                            <li><i class="iconsweets-user2"></i> iconsweets-user2</li>
                            <li><i class="iconsweets-users2"></i> iconsweets-users2</li>
                            <li><i class="iconsweets-admin2"></i> iconsweets-admin2</li>
                            <li><i class="iconsweets-femalesymbol"></i> iconsweets-femalesymbol</li>
                            <li><i class="iconsweets-usercomment"></i> iconsweets-usercomment</li>
                            <li><i class="iconsweets-cog"></i> iconsweets-cog</li>
                            <li><i class="iconsweets-cog2"></i> iconsweets-cog2</li>
                            <li><i class="iconsweets-cog3"></i> iconsweets-cog3</li>
                            <li><i class="iconsweets-cog4"></i> iconsweets-cog4</li>
                            <li><i class="iconsweets-settings"></i> iconsweets-settings</li>
                            <li><i class="iconsweets-settings2"></i> iconsweets-settings2</li>
                            <li><i class="iconsweets-hd"></i> iconsweets-hd</li>
                            <li><i class="iconsweets-hd2"></i> iconsweets-hd2</li>
                            <li><i class="iconsweets-hd3"></i> iconsweets-hd3</li>
                            <li><i class="iconsweets-sd"></i> iconsweets-sd</li>
                            <li><i class="iconsweets-sd2"></i> iconsweets-sd2</li>
                            <li><i class="iconsweets-sd3"></i> iconsweets-sd3</li>
                            <li><i class="iconsweets-dvd"></i> iconsweets-dvd</li>
                            <li><i class="iconsweets-blueray"></i> iconsweets-blueray</li>
                            <li><i class="iconsweets-record"></i> iconsweets-record</li>
                            <li><i class="iconsweets-cd"></i> iconsweets-cd</li>
                            <li><i class="iconsweets-cassette"></i> iconsweets-cassette</li>
                            <li><i class="iconsweets-image"></i> iconsweets-image</li>
                            <li><i class="iconsweets-image2"></i> iconsweets-image2</li>
                            <li><i class="iconsweets-image3"></i> iconsweets-image3</li>
                            <li><i class="iconsweets-image4"></i> iconsweets-image4</li>
                            <li><i class="iconsweets-sound"></i> iconsweets-sound</li>
                            <li><i class="iconsweets-megaphone"></i> iconsweets-megaphone</li>
                            <li><i class="iconsweets-film"></i> iconsweets-film</li>
                            <li><i class="iconsweets-film2"></i> iconsweets-film2</li>
                            <li><i class="iconsweets-headphone"></i> iconsweets-headphone</li>
                            <li><i class="iconsweets-microphone"></i> iconsweets-microphone</li>
                            <li><i class="iconsweets-printer"></i> iconsweets-printer</li>
                            <li><i class="iconsweets-radio"></i> iconsweets-radio</li>
                            <li><i class="iconsweets-television"></i> iconsweets-television</li>
                            <li><i class="iconsweets-imac"></i> iconsweets-imac</li>
                            <li><i class="iconsweets-laptop"></i> iconsweets-laptop</li>
                            <li><i class="iconsweets-mightymouse"></i> iconsweets-mightymouse</li>
                            <li><i class="iconsweets-magicmouse"></i> iconsweets-magicmouse</li>
                            <li><i class="iconsweets-mousewire"></i> iconsweets-mousewire</li>
                            <li><i class="iconsweets-monitor"></i> iconsweets-monitor</li>
                            <li><i class="iconsweets-camera"></i> iconsweets-camera</li>
                            <li><i class="iconsweets-camera2"></i> iconsweets-camera2</li>
                            <li><i class="iconsweets-ipod"></i> iconsweets-ipod</li>
                            <li><i class="iconsweets-ipodnano"></i> iconsweets-ipadnano</li>
                            <li><i class="iconsweets-ipad"></i> iconsweets-ipad</li>
                            <li><i class="iconsweets-filmcamera"></i> iconsweets-filmcamera</li>
                            <li><i class="iconsweets-calculator"></i> iconsweets-calculator</li>
                            <li><i class="iconsweets-cashregister"></i> iconsweets-cashregister</li>
                            <li><i class="iconsweets-fax"></i> iconsweets-fax</li>
                            <li><i class="iconsweets-frames"></i> iconsweets-frames</li>
                            <li><i class="iconsweets-coverflow"></i> iconsweets-coverflow</li>
                            <li><i class="iconsweets-list"></i> iconsweets-list</li>
                            <li><i class="iconsweets-list2"></i> iconsweets-list2</li>
                            <li><i class="iconsweets-list3"></i> iconsweets-list3</li>
                            <li><i class="iconsweets-list4"></i> iconsweets-list4</li>
                            <li><i class="iconsweets-wordpress"></i> iconsweets-wordpress</li>
                            <li><i class="iconsweets-wordpress2"></i> iconsweets-wordpress2</li>
                            <li><i class="iconsweets-joomla"></i> iconsweets-joomla</li>
                            <li><i class="iconsweets-expressionengine"></i> iconsweets-expressionengine</li>
                            <li><i class="iconsweets-drupal"></i> iconsweets-drupal</li>
                            <li><i class="iconsweets-arrowright"></i> iconsweets-arrowright</li>
                            <li><i class="iconsweets-arrowleft"></i> iconsweets-arrowleft</li>
                            <li><i class="iconsweets-arrowdown"></i> iconsweets-arrowdown</li>
                            <li><i class="iconsweets-arrowup"></i> iconsweets-arrowup</li>
                            <li><i class="iconsweets-refresh"></i> iconsweets-refresh</li>
                            <li><i class="iconsweets-refresh2"></i> iconsweets-refresh2</li>
                            <li><i class="iconsweets-repeat"></i> iconsweets-repeat</li>
                            <li><i class="iconsweets-shuffle"></i> iconsweets-shuffle</li>
                            <li><i class="iconsweets-refresh3"></i> iconsweets-refresh3</li>
                            <li><i class="iconsweets-refresh4"></i> iconsweets-refresh4</li>
                            <li><i class="iconsweets-recycle"></i> iconsweets-recycle</li>
                            <li><i class="iconsweets-fullscreen"></i> iconsweets-fullscreen</li>
                            <li><i class="iconsweets-fitscreen"></i> iconsweets-fitscreen</li>
                            <li><i class="iconsweets-origscreen"></i> iconsweets-origscreen</li>
                            <li><i class="iconsweets-bluetooth"></i> iconsweets-bluetooth</li>
                            <li><i class="iconsweets-bluetooth2"></i> iconsweets-bluetooth2</li>
                            <li><i class="iconsweets-wifi"></i> iconsweets-wifi</li>
                            <li><i class="iconsweets-wifi2"></i> iconsweets-wifi2</li>
                            <li><i class="iconsweets-iphone3"></i> iconsweets-iphone3</li>
                            <li><i class="iconsweets-iphone4"></i> iconsweets-iphone4</li>
                            <li><i class="iconsweets-blackberry"></i> iconsweets-blackberry</li>
                            <li><i class="iconsweets-android"></i> iconsweets-android</li>
                            <li><i class="iconsweets-mobile"></i> iconsweets-mobile</li>
                            <li><i class="iconsweets-inbox"></i> iconsweets-inbox</li>
                            <li><i class="iconsweets-outgoing"></i> iconsweets-outgoing</li>
                            <li><i class="iconsweets-incoming"></i> iconsweets-incoming</li>
                            <li><i class="iconsweets-speech"></i> iconsweets-speech</li>
                            <li><i class="iconsweets-speech2"></i> iconsweets-speech2</li>
                            <li><i class="iconsweets-speech3"></i> iconsweets-speech3</li>
                            <li><i class="iconsweets-speech4"></i> iconsweets-speech4</li>
                            <li><i class="iconsweets-phone"></i> iconsweets-phone</li>
                            <li><i class="iconsweets-phone2"></i> iconsweets-phone2</li>
                            <li><i class="iconsweets-battery"></i> iconsweets-battery</li>
                            <li><i class="iconsweets-battery2"></i> iconsweets-battery2</li>
                            <li><i class="iconsweets-battery3"></i> iconsweets-battery3</li>
                            <li><i class="iconsweets-battery4"></i> iconsweets-battery4</li>
                            <li><i class="iconsweets-batteryfull"></i> iconsweets-batteryfull</li>
                            <li><i class="iconsweets-power"></i> iconsweets-power</li>
                            <li><i class="iconsweets-electric"></i> iconsweets-electric</li>
                            <li><i class="iconsweets-plug"></i> iconsweets-plug</li>
                            <li><i class="iconsweets-brush"></i> iconsweets-brush</li>
                            <li><i class="iconsweets-brush2"></i> iconsweets-brush2</li>
                            <li><i class="iconsweets-pen"></i> iconsweets-pen</li>
                            <li><i class="iconsweets-bigbrush"></i> iconsweets-bigbrush</li>
                            <li><i class="iconsweets-pencil"></i> iconsweets-pencil</li>
                            <li><i class="iconsweets-scissor"></i> iconsweets-scissor</li>
                            <li><i class="iconsweets-eyedrop"></i> iconsweets-eyedrop</li>
                            <li><i class="iconsweets-abacus"></i> iconsweets-abacus</li>
                            <li><i class="iconsweets-ruler"></i> iconsweets-ruler</li>
                            <li><i class="iconsweets-ruler2"></i> iconsweets-ruler2</li>
                            <li><i class="iconsweets-map"></i> iconsweets-map</li>
                            <li><i class="iconsweets-maps"></i> iconsweets-maps</li>
                            <li><i class="iconsweets-post"></i> iconsweets-post</li>
                            <li><i class="iconsweets-marker"></i> iconsweets-marker</li>
                            <li><i class="iconsweets-document"></i> iconsweets-document</li>
                            <li><i class="iconsweets-documents"></i> iconsweets-documents</li>
                            <li><i class="iconsweets-pdf"></i> iconsweets-pdf</li>
                            <li><i class="iconsweets-pdf2"></i> iconsweets-pdf2</li>
                            <li><i class="iconsweets-word"></i> iconsweets-word</li>
                            <li><i class="iconsweets-word2"></i> iconsweets-word2</li>
                            <li><i class="iconsweets-word3"></i> iconsweets-word3</li>
                            <li><i class="iconsweets-zip"></i> iconsweets-zip</li>
                            <li><i class="iconsweets-zip2"></i> iconsweets-zip2</li>
                            <li><i class="iconsweets-ppt"></i> iconsweets-ppt</li>
                            <li><i class="iconsweets-ppt2"></i> iconsweets-ppt2</li>
                            <li><i class="iconsweets-excel"></i> iconsweets-excel</li>
                            <li><i class="iconsweets-excel2"></i> iconsweets-excel2</li>
                            <li><i class="iconsweets-vcard"></i> iconsweets-vcard</li>
                            <li><i class="iconsweets-vcard2"></i> iconsweets-vcard2</li>
                            <li><i class="iconsweets-address"></i> iconsweets-address</li>
                            <li><i class="iconsweets-chart"></i> iconsweets-chart</li>
                            <li><i class="iconsweets-chart2"></i> iconsweets-chart2</li>
                            <li><i class="iconsweets-chart3"></i> iconsweets-chart3</li>
                            <li><i class="iconsweets-chart4"></i> iconsweets-chart4</li>
                            <li><i class="iconsweets-chart5"></i> iconsweets-chart5</li>
                            <li><i class="iconsweets-chart6"></i> iconsweets-chart6</li>
                            <li><i class="iconsweets-chart7"></i> iconsweets-chart7</li>
                            <li><i class="iconsweets-chart8"></i> iconsweets-chart8</li>
                        </ul>
                	</div><!--tab-pane-->
                    
                    <div id="examples" class="tab-pane">
                		<div class="row-fluid">
                        	<div class="span4">
                            	<h4 class="widgettitle">Using Glyphicons</h4>
                    			<div class="widgetcontent">
                                	<ul class="nav nav-tabs nav-stacked samplenavs">
                                    	<li class="active"><a href="#"><i class="icon-home"></i> &nbsp; Home</a></li>
                                        <li><a href="#"><i class="icon-user"></i> &nbsp; Profile</a></li>
                                        <li><a href="#"><i class="icon-envelope"></i> &nbsp; Messages</a></li>
                                    </ul>
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-th"></i> &nbsp; User <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#"><i class="icon-music"></i> &nbsp;Music</a></li>
                                          <li><a href="#"><i class="icon-star"></i> &nbsp;Favorites</a></li>
                                          <li><a href="#"><i class="icon-globe"></i> &nbsp;Notification</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#"><i class="icon-arrow-right"></i> &nbsp;Signout</a></li>
                                        </ul>
                                    </div><!--btn-group-->
                                    <div class="divider30"></div>                                        
                                    <div class="btn-group">
                                      <button class="btn btn-inverse"><i class="icon-fast-backward icon-white"></i></button>
                                      <button class="btn btn-inverse"><i class="icon-backward icon-white"></i></button>
                                      <button class="btn btn-inverse"><i class="icon-stop icon-white"></i></button>
                                      <button class="btn btn-inverse"><i class="icon-play icon-white"></i></button>
                                      <button class="btn btn-inverse"><i class="icon-forward icon-white"></i></button>
                                      <button class="btn btn-inverse"><i class="icon-fast-forward icon-white"></i></button>
                                    </div>
                                    <div class="divider30"></div> 
                                    <ul class="list-nostyle list-inline">
                                    	<li><a href="#" class="btn"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" class="btn btn-primary"><i class="icon-headphones icon-white"></i></a></li>
                                        <li><a href="#" class="btn btn-warning"><i class="icon-signal"></i></a></li>
                                        <li><a href="#" class="btn btn-danger"><i class="icon-book icon-white"></i></a></li>
                                        <li><a href="#" class="btn btn-info"><i class="icon-pencil"></i></a></li>
                                    </ul>
                                    <div class="divider30"></div> 
                                    <ul class="list-nostyle list-inline">
                                    	<li><a href="#" class="btn btn-circle"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" class="btn btn-primary btn-circle"><i class="icon-headphones icon-white"></i></a></li>
                                        <li><a href="#" class="btn btn-warning btn-circle"><i class="icon-signal"></i></a></li>
                                        <li><a href="#" class="btn btn-danger btn-circle"><i class="icon-book icon-white"></i></a></li>
                                        <li><a href="#" class="btn btn-info btn-circle"><i class="icon-pencil"></i></a></li>
                                    </ul>
                                    
                                    <div class="divider30"></div> 
                                    <ul class="list-nostyle list-inline">
                                    	<li><a href="#" class="btn btn-warning btn-rounded"><i class="icon-heart icon-white"></i> Button</a></li>
                                        <li><a href="#" class="btn btn-danger btn-rounded"><i class="icon-headphones icon-white"></i> Another Button</a></li>
                                    </ul>
                                    
                                </div><!--widgetcontent-->
                            </div><!--span4-->
                            
                            <div class="span4">
                            	<h4 class="widgettitle">Using Font Awesome</h4>
                    			<div class="widgetcontent">
                                	<ul class="nav nav-tabs nav-stacked samplenavs">
                                    	<li class="active"><a href="#"><i class="iconfa-arrow-left"></i> &nbsp; Home</a></li>
                                        <li><a href="#"><i class="iconfa-user"></i> &nbsp; Profile</a></li>
                                        <li><a href="#"><i class="iconfa-envelope"></i> &nbsp; Messages</a></li>
                                    </ul>
                                    
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-th"></i> &nbsp; User <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#"><i class="iconfa-music"></i> &nbsp;Music</a></li>
                                          <li><a href="#"><i class="iconfa-star"></i> &nbsp;Favorites</a></li>
                                          <li><a href="#"><i class="iconfa-globe"></i> &nbsp;Notification</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#"><i class="iconfa-remove"></i> &nbsp;Signout</a></li>
                                        </ul>
                                    </div><!--btn-group-->
                                    <div class="divider30"></div>                                        
                                    <div class="btn-group">
                                      <button class="btn"><i class="iconfa-fast-backward"></i></button>
                                      <button class="btn"><i class="iconfa-backward"></i></button>
                                      <button class="btn"><i class="iconfa-stop"></i></button>
                                      <button class="btn"><i class="iconfa-play"></i></button>
                                      <button class="btn"><i class="iconfa-forward"></i></button>
                                      <button class="btn"><i class="iconfa-fast-forward"></i></button>
                                    </div>
                                    <div class="divider30"></div> 
                                    <ul class="list-nostyle list-inline">
                                    	<li><a href="#" class="btn"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" class="btn btn-primary"><i class="iconfa-off"></i></a></li>
                                        <li><a href="#" class="btn btn-warning"><i class="iconfa-signal"></i></a></li>
                                        <li><a href="#" class="btn btn-danger"><i class="iconfa-book"></i></a></li>
                                        <li><a href="#" class="btn btn-info"><i class="iconfa-pencil"></i></a></li>
                                    </ul>
                                    
                                    <div class="divider30"></div> 
                                    <ul class="list-nostyle list-inline">
                                    	<li><a href="#" class="btn btn-circle"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" class="btn btn-primary btn-circle"><i class="iconfa-off"></i></a></li>
                                        <li><a href="#" class="btn btn-warning btn-circle"><i class="iconfa-signal"></i></a></li>
                                        <li><a href="#" class="btn btn-danger btn-circle"><i class="iconfa-book"></i></a></li>
                                        <li><a href="#" class="btn btn-info btn-circle"><i class="iconfa-pencil"></i></a></li>
                                    </ul>
                                    
                                    <div class="divider30"></div> 
                                    <ul class="list-nostyle list-inline">
                                    	<li><a href="#" class="btn btn-rounded"><i class="icon-heart"></i> Button</a></li>
                                        <li><a href="#" class="btn btn-info btn-rounded"><i class="iconfa-off"></i> Another Button</a></li>
                                    </ul>
                                    
                                    
                                </div><!--widgetcontent-->
                            </div><!--span4-->
                            
                            <div class="span4">
                            	<h4 class="widgettitle">Using Icon Sweets</h4>
                    			<div class="widgetcontent">
                                	<ul class="nav nav-tabs nav-stacked samplenavs">
                                    	<li class="active"><a href="#"><i class="iconsweets-home"></i> &nbsp; Home</a></li>
                                        <li><a href="#"><i class="iconsweets-user"></i> &nbsp; Profile</a></li>
                                        <li><a href="#"><i class="iconsweets-speech"></i> &nbsp; Messages</a></li>
                                    </ul>
                                    
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-th"></i> &nbsp; User <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#"><i class="iconsweets-sound"></i> &nbsp;Music</a></li>
                                          <li><a href="#"><i class="iconsweets-cup"></i> &nbsp;Favorites</a></li>
                                          <li><a href="#"><i class="iconsweets-globe"></i> &nbsp;Notification</a></li>
                                          <li class="divider"></li>
                                          <li><a href="#"><i class="iconsweets-exit"></i> &nbsp;Signout</a></li>
                                        </ul>
                                    </div><!--btn-group-->
                                    
                                    <div class="divider30"></div>                                        
                                    <div class="btn-group">
                                      <button class="btn"><i class="iconsweets-twitter"></i></button>
                                      <button class="btn"><i class="iconsweets-like"></i></button>
                                      <button class="btn"><i class="iconsweets-stumbleupon"></i></button>
                                      <button class="btn"><i class="iconsweets-dribbble2"></i></button>
                                      <button class="btn"><i class="iconsweets-skype"></i></button>
                                      <button class="btn"><i class="iconsweets-youtube"></i></button>
                                    </div>
                                    <div class="divider30"></div> 
                                    <ul class="list-nostyle list-inline">
                                    	<li><a href="#" class="btn"><i class="iconsweets-link"></i></a></li>
                                        <li><a href="#" class="btn btn-primary"><i class="iconsweets-magnifying iconsweets-white"></i></a></li>
                                        <li><a href="#" class="btn btn-warning"><i class="iconsweets-mail iconsweets-white"></i></a></li>
                                        <li><a href="#" class="btn btn-danger"><i class="iconsweets-create iconsweets-white"></i></a></li>
                                        <li><a href="#" class="btn btn-info"><i class="iconsweets-clock iconsweets-white"></i></a></li>
                                    </ul>
                                    
                                    <div class="divider30"></div> 
                                    <ul class="list-nostyle list-inline">
                                    	<li><a href="#" class="btn btn-circle"><i class="iconsweets-link"></i></a></li>
                                        <li><a href="#" class="btn btn-primary btn-circle"><i class="iconsweets-magnifying iconsweets-white"></i></a></li>
                                        <li><a href="#" class="btn btn-warning btn-circle"><i class="iconsweets-mail iconsweets-white"></i></a></li>
                                        <li><a href="#" class="btn btn-danger btn-circle"><i class="iconsweets-create iconsweets-white"></i></a></li>
                                        <li><a href="#" class="btn btn-info btn-circle"><i class="iconsweets-clock iconsweets-white"></i></a></li>
                                    </ul>
                                    
                                    <div class="divider30"></div> 
                                    <ul class="list-nostyle list-inline">
                                    	<li><a href="#" class="btn btn-rounded"> <i class="iconsweets-link"></i> &nbsp; Button</a> </li>
                                        <li><a href="#" class="btn btn-primary btn-rounded"> <i class="iconsweets-magnifying iconsweets-white"></i>  &nbsp; Another Button</a></li>
                                    </ul>

                                </div><!--widgetcontent-->
                            </div><!--span4-->
                            
                        </div><!--row-fluid-->
                	</div><!--tab-pane-->
                </div><!--tabcontent-->
           </div><!--tabbable-->
           
        </div><!--contentinner-->
    </div><!--maincontent-->
<?php }elseif($i == 10){ ?>
<div class="pagetitle">
	<h1>Form Styles</h1> <span>This is a sample description for form styles page...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
    	<h4 class="widgettitle">Form Elements</h4>
        <div class="widgetcontent">
        	<form class="stdform" action="#" method="post">
            	<p>
                	<label>Small Input</label>
                    <span class="field"><input type="text" name="input1" class="input-small" placeholder=".input-small" /></span>
                    <small class="desc">Small description of this field.</small>
                </p>
                
                <p>
                	<label>Medium Input</label>
                    <span class="field"><input type="text" name="input2" class="input-medium" placeholder=".input-medium" /></span>
                </p>
                
                <p>
                	<label>Large Input</label>
                    <span class="field"><input type="text" name="input3" class="input-large" placeholder=".input-large" /></span>
                </p>
                
                <p>
                	<label>X Large Input</label>
                    <span class="field"><input type="text" name="input4" class="input-xlarge" placeholder=".input-xlarge" /></span>
                </p>
                
                <p>
                	<label>XX Large Input</label>
                    <span class="field"><input type="text" name="input5" class="input-xxlarge" placeholder=".input-xxlarge" /></span>
                </p>
                
                <p>
                	<label>Input Block Level</label>
                    <span class="field"><input type="text" name="input6" class="input-block-level" placeholder=".input-block-level" /></span>
                </p>
                
                <div class="par control-group warning">
                  <label for="inputWarning" class="control-label">Input with warning</label>
                  <div class="controls">
                    <input type="text" class="span4" id="inputWarning" placeholder=".span4" />
                    <span class="help-inline">Something may have gone wrong</span>
                  </div>
                </div>
                
                <div class="par control-group error">
                  <label for="inputError" class="control-label">Input with error</label>
                  <div class="controls">
                    <input type="text" class="span4" id="inputError" placeholder=".span4">
                    <span class="help-inline">Please correct the error</span>
                  </div>
                </div><!--par-->
                
                <div class="par control-group info">
                  <label for="inputInfo" class="control-label">Input with info</label>
                  <div class="controls">
                    <input type="text" class="span4" id="inputInfo" placeholder=".span4">
                    <span class="help-inline">Username is taken</span>
                  </div>
                </div><!--par-->
                
                <div class="par control-group success">
                  <label for="inputSuccess" class="control-label">Input with success</label>
                  <div class="controls">
                    <input type="text" class="span4" id="inputSuccess" placeholder=".span4">
                    <span class="help-inline">Woohoo!</span>
                  </div>
                </div><!--par-->
                
                <p>
                	<label>Textarea</label>
                    <span class="field"><textarea cols="80" rows="5" class="span5"></textarea></span> 
                </p>
	
				<p>
                	<label>Textarea with Auto Resize</label>
                    <span class="field"><textarea id="autoResizeTA" cols="80" rows="5" class="span5" style="resize: vertical"></textarea></span> 
                </p>
                
                <p>
                	<label>Textarea with Character Count</label>
                    <span class="field">
                        <textarea cols="80" rows="5" id="textarea2" class="span5"></textarea>
                    </span> 
                </p>
                
                <p>
                	<label>Select</label>
                    <span class="field">
                    <select name="select" class="uniformselect">
                    	<option value="">Choose One</option>
                        <option value="">Selection One</option>
                        <option value="">Selection Two</option>
                        <option value="">Selection Three</option>
                        <option value="">Selection Four</option>
                    </select>
                    
                    </span>
                </p>
                
                <p>
                	<label>Disabled Select</label>
                    <span class="field">
					<select name="select" disabled="disabled" class="uniformselect">
                    	<option value="">Choose One</option>
                        <option value="">Selection One</option>
                        <option value="">Selection Two</option>
                        <option value="">Selection Three</option>
                        <option value="">Selection Four</option>
                    </select>
                    </span>
                </p>
                
                <p>
                	<label>Multiple Select</label>
                    <span class="field">
                    <select name="select2" multiple="multiple" class="span4" size="5">
                        <option value="">Selection One</option>
                        <option value="">Selection Two</option>
                        <option value="">Selection Three</option>
                        <option value="">Selection Four</option>
                        <option value="">Selection Five</option>
                        <option value="">Selection Six</option>
                        <option value="">Selection Seven</option>
                        <option value="">Selection Eight</option>
                    </select>
                    </span>
                </p>
                
                <p>
                	<label>Dual Select</label>
                    <span id="dualselect" class="dualselect">
                    	<select class="uniformselect" name="select3" multiple="multiple" size="10">
                            <option value="">Selection One</option>
                            <option value="">Selection Two</option>
                            <option value="">Selection Three</option>
                            <option value="">Selection Four</option>
                            <option value="">Selection Five</option>
                            <option value="">Selection Six</option>
                            <option value="">Selection Seven</option>
                            <option value="">Selection Eight</option>
                        </select>
                        <span class="ds_arrow">
                        	<button class="btn ds_prev"><i class="icon-chevron-left"></i></button><br />
                            <button class="btn ds_next"><i class="icon-chevron-right"></i></button>
                        </span>
                        <select name="select4" multiple="multiple" size="10">
                        	<option value=""></option>
                        </select>
                    </span>
                </p>
                
                <p>
                	<label>Select with Search</label>
                    <span class="formwrapper">
                    	<select data-placeholder="Choose a Country..." style="width:350px" class="chzn-select" tabindex="2">
                          <option value=""></option> 
                          <option value="United States">United States</option> 
                          <option value="United Kingdom">United Kingdom</option> 
                          <option value="Afghanistan">Afghanistan</option> 
                          <option value="Albania">Albania</option> 
                          <option value="Algeria">Algeria</option> 
                          <option value="American Samoa">American Samoa</option> 
                          <option value="Andorra">Andorra</option> 
                          <option value="Angola">Angola</option> 
                          <option value="Anguilla">Anguilla</option> 
                          <option value="Antarctica">Antarctica</option> 
                          <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                          <option value="Argentina">Argentina</option> 
                          <option value="Armenia">Armenia</option> 
                          <option value="Aruba">Aruba</option> 
                          <option value="Australia">Australia</option> 
                          <option value="Austria">Austria</option> 
                          <option value="Azerbaijan">Azerbaijan</option> 
                          <option value="Bahamas">Bahamas</option> 
                          <option value="Bahrain">Bahrain</option> 
                          <option value="Bangladesh">Bangladesh</option> 
                          <option value="Barbados">Barbados</option> 
                          <option value="Belarus">Belarus</option> 
                          <option value="Belgium">Belgium</option> 
                          <option value="Belize">Belize</option> 
                          <option value="Benin">Benin</option> 
                          <option value="Bermuda">Bermuda</option> 
                          <option value="Bhutan">Bhutan</option> 
                          <option value="Bolivia">Bolivia</option> 
                          <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                          <option value="Botswana">Botswana</option> 
                          <option value="Bouvet Island">Bouvet Island</option> 
                          <option value="Brazil">Brazil</option> 
                          <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                          <option value="Brunei Darussalam">Brunei Darussalam</option> 
                          <option value="Bulgaria">Bulgaria</option> 
                          <option value="Burkina Faso">Burkina Faso</option> 
                          <option value="Burundi">Burundi</option> 
                          <option value="Cambodia">Cambodia</option> 
                          <option value="Cameroon">Cameroon</option> 
                          <option value="Canada">Canada</option> 
                          <option value="Cape Verde">Cape Verde</option> 
                          <option value="Cayman Islands">Cayman Islands</option> 
                          <option value="Central African Republic">Central African Republic</option> 
                          <option value="Chad">Chad</option> 
                          <option value="Chile">Chile</option> 
                          <option value="China">China</option> 
                          <option value="Christmas Island">Christmas Island</option> 
                          <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                          <option value="Colombia">Colombia</option> 
                          <option value="Comoros">Comoros</option> 
                          <option value="Congo">Congo</option> 
                          <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                          <option value="Cook Islands">Cook Islands</option> 
                          <option value="Costa Rica">Costa Rica</option> 
                          <option value="Cote D'ivoire">Cote D'ivoire</option> 
                          <option value="Croatia">Croatia</option> 
                          <option value="Cuba">Cuba</option> 
                          <option value="Cyprus">Cyprus</option> 
                          <option value="Czech Republic">Czech Republic</option> 
                          <option value="Denmark">Denmark</option> 
                          <option value="Djibouti">Djibouti</option> 
                          <option value="Dominica">Dominica</option> 
                          <option value="Dominican Republic">Dominican Republic</option> 
                          <option value="Ecuador">Ecuador</option> 
                          <option value="Egypt">Egypt</option> 
                          <option value="El Salvador">El Salvador</option> 
                          <option value="Equatorial Guinea">Equatorial Guinea</option> 
                          <option value="Eritrea">Eritrea</option> 
                          <option value="Estonia">Estonia</option> 
                          <option value="Ethiopia">Ethiopia</option> 
                          <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                          <option value="Faroe Islands">Faroe Islands</option> 
                          <option value="Fiji">Fiji</option> 
                          <option value="Finland">Finland</option> 
                          <option value="France">France</option> 
                          <option value="French Guiana">French Guiana</option> 
                          <option value="French Polynesia">French Polynesia</option> 
                          <option value="French Southern Territories">French Southern Territories</option> 
                          <option value="Gabon">Gabon</option> 
                          <option value="Gambia">Gambia</option> 
                          <option value="Georgia">Georgia</option> 
                          <option value="Germany">Germany</option> 
                          <option value="Ghana">Ghana</option> 
                          <option value="Gibraltar">Gibraltar</option> 
                          <option value="Greece">Greece</option> 
                          <option value="Greenland">Greenland</option> 
                          <option value="Grenada">Grenada</option> 
                          <option value="Guadeloupe">Guadeloupe</option> 
                          <option value="Guam">Guam</option> 
                          <option value="Guatemala">Guatemala</option> 
                          <option value="Guinea">Guinea</option> 
                          <option value="Guinea-bissau">Guinea-bissau</option> 
                          <option value="Guyana">Guyana</option> 
                          <option value="Haiti">Haiti</option> 
                          <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                          <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                          <option value="Honduras">Honduras</option> 
                          <option value="Hong Kong">Hong Kong</option> 
                          <option value="Hungary">Hungary</option> 
                          <option value="Iceland">Iceland</option> 
                          <option value="India">India</option> 
                          <option value="Indonesia">Indonesia</option> 
                          <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                          <option value="Iraq">Iraq</option> 
                          <option value="Ireland">Ireland</option> 
                          <option value="Israel">Israel</option> 
                          <option value="Italy">Italy</option> 
                          <option value="Jamaica">Jamaica</option> 
                          <option value="Japan">Japan</option> 
                          <option value="Jordan">Jordan</option> 
                          <option value="Kazakhstan">Kazakhstan</option> 
                          <option value="Kenya">Kenya</option> 
                          <option value="Kiribati">Kiribati</option> 
                          <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                          <option value="Korea, Republic of">Korea, Republic of</option> 
                          <option value="Kuwait">Kuwait</option> 
                          <option value="Kyrgyzstan">Kyrgyzstan</option> 
                          <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                          <option value="Latvia">Latvia</option> 
                          <option value="Lebanon">Lebanon</option> 
                          <option value="Lesotho">Lesotho</option> 
                          <option value="Liberia">Liberia</option> 
                          <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                          <option value="Liechtenstein">Liechtenstein</option> 
                          <option value="Lithuania">Lithuania</option> 
                          <option value="Luxembourg">Luxembourg</option> 
                          <option value="Macao">Macao</option> 
                          <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                          <option value="Madagascar">Madagascar</option> 
                          <option value="Malawi">Malawi</option> 
                          <option value="Malaysia">Malaysia</option> 
                          <option value="Maldives">Maldives</option> 
                          <option value="Mali">Mali</option> 
                          <option value="Malta">Malta</option> 
                          <option value="Marshall Islands">Marshall Islands</option> 
                          <option value="Martinique">Martinique</option> 
                          <option value="Mauritania">Mauritania</option> 
                          <option value="Mauritius">Mauritius</option> 
                          <option value="Mayotte">Mayotte</option> 
                          <option value="Mexico">Mexico</option> 
                          <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                          <option value="Moldova, Republic of">Moldova, Republic of</option> 
                          <option value="Monaco">Monaco</option> 
                          <option value="Mongolia">Mongolia</option> 
                          <option value="Montenegro">Montenegro</option>
                          <option value="Montserrat">Montserrat</option> 
                          <option value="Morocco">Morocco</option> 
                          <option value="Mozambique">Mozambique</option> 
                          <option value="Myanmar">Myanmar</option> 
                          <option value="Namibia">Namibia</option> 
                          <option value="Nauru">Nauru</option> 
                          <option value="Nepal">Nepal</option> 
                          <option value="Netherlands">Netherlands</option> 
                          <option value="Netherlands Antilles">Netherlands Antilles</option> 
                          <option value="New Caledonia">New Caledonia</option> 
                          <option value="New Zealand">New Zealand</option> 
                          <option value="Nicaragua">Nicaragua</option> 
                          <option value="Niger">Niger</option> 
                          <option value="Nigeria">Nigeria</option> 
                          <option value="Niue">Niue</option> 
                          <option value="Norfolk Island">Norfolk Island</option> 
                          <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                          <option value="Norway">Norway</option> 
                          <option value="Oman">Oman</option> 
                          <option value="Pakistan">Pakistan</option> 
                          <option value="Palau">Palau</option> 
                          <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                          <option value="Panama">Panama</option> 
                          <option value="Papua New Guinea">Papua New Guinea</option> 
                          <option value="Paraguay">Paraguay</option> 
                          <option value="Peru">Peru</option> 
                          <option value="Philippines">Philippines</option> 
                          <option value="Pitcairn">Pitcairn</option> 
                          <option value="Poland">Poland</option> 
                          <option value="Portugal">Portugal</option> 
                          <option value="Puerto Rico">Puerto Rico</option> 
                          <option value="Qatar">Qatar</option> 
                          <option value="Reunion">Reunion</option> 
                          <option value="Romania">Romania</option> 
                          <option value="Russian Federation">Russian Federation</option> 
                          <option value="Rwanda">Rwanda</option> 
                          <option value="Saint Helena">Saint Helena</option> 
                          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                          <option value="Saint Lucia">Saint Lucia</option> 
                          <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                          <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                          <option value="Samoa">Samoa</option> 
                          <option value="San Marino">San Marino</option> 
                          <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                          <option value="Saudi Arabia">Saudi Arabia</option> 
                          <option value="Senegal">Senegal</option> 
                          <option value="Serbia">Serbia</option> 
                          <option value="Seychelles">Seychelles</option> 
                          <option value="Sierra Leone">Sierra Leone</option> 
                          <option value="Singapore">Singapore</option> 
                          <option value="Slovakia">Slovakia</option> 
                          <option value="Slovenia">Slovenia</option> 
                          <option value="Solomon Islands">Solomon Islands</option> 
                          <option value="Somalia">Somalia</option> 
                          <option value="South Africa">South Africa</option> 
                          <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                          <option value="South Sudan">South Sudan</option> 
                          <option value="Spain">Spain</option> 
                          <option value="Sri Lanka">Sri Lanka</option> 
                          <option value="Sudan">Sudan</option> 
                          <option value="Suriname">Suriname</option> 
                          <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                          <option value="Swaziland">Swaziland</option> 
                          <option value="Sweden">Sweden</option> 
                          <option value="Switzerland">Switzerland</option> 
                          <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                          <option value="Taiwan, Republic of China">Taiwan, Republic of China</option> 
                          <option value="Tajikistan">Tajikistan</option> 
                          <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                          <option value="Thailand">Thailand</option> 
                          <option value="Timor-leste">Timor-leste</option> 
                          <option value="Togo">Togo</option> 
                          <option value="Tokelau">Tokelau</option> 
                          <option value="Tonga">Tonga</option> 
                          <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                          <option value="Tunisia">Tunisia</option> 
                          <option value="Turkey">Turkey</option> 
                          <option value="Turkmenistan">Turkmenistan</option> 
                          <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                          <option value="Tuvalu">Tuvalu</option> 
                          <option value="Uganda">Uganda</option> 
                          <option value="Ukraine">Ukraine</option> 
                          <option value="United Arab Emirates">United Arab Emirates</option> 
                          <option value="United Kingdom">United Kingdom</option> 
                          <option value="United States">United States</option> 
                          <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                          <option value="Uruguay">Uruguay</option> 
                          <option value="Uzbekistan">Uzbekistan</option> 
                          <option value="Vanuatu">Vanuatu</option> 
                          <option value="Venezuela">Venezuela</option> 
                          <option value="Viet Nam">Viet Nam</option> 
                          <option value="Virgin Islands, British">Virgin Islands, British</option> 
                          <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                          <option value="Wallis and Futuna">Wallis and Futuna</option> 
                          <option value="Western Sahara">Western Sahara</option> 
                          <option value="Yemen">Yemen</option> 
                          <option value="Zambia">Zambia</option> 
                          <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </span>
                </p>
                
                <p>
                	<label>Enhanced Multiple Select</label>
                    <span class="formwrapper">
                        <select data-placeholder="Choose a Country..." class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">
                          <option value=""></option> 
                          <option value="United States">United States</option> 
                          <option value="United Kingdom">United Kingdom</option> 
                          <option value="Afghanistan">Afghanistan</option> 
                          <option value="Albania">Albania</option> 
                          <option value="Algeria">Algeria</option> 
                          <option value="American Samoa">American Samoa</option> 
                          <option value="Andorra">Andorra</option> 
                          <option value="Angola">Angola</option> 
                          <option value="Anguilla">Anguilla</option> 
                          <option value="Antarctica">Antarctica</option> 
                          <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                          <option value="Argentina">Argentina</option> 
                          <option value="Armenia">Armenia</option> 
                          <option value="Aruba">Aruba</option> 
                          <option value="Australia">Australia</option> 
                          <option value="Austria">Austria</option> 
                          <option value="Azerbaijan">Azerbaijan</option> 
                          <option value="Bahamas">Bahamas</option> 
                          <option value="Bahrain">Bahrain</option> 
                          <option value="Bangladesh">Bangladesh</option> 
                          <option value="Barbados">Barbados</option> 
                          <option value="Belarus">Belarus</option> 
                          <option value="Belgium">Belgium</option> 
                          <option value="Belize">Belize</option> 
                          <option value="Benin">Benin</option> 
                          <option value="Bermuda">Bermuda</option> 
                          <option value="Bhutan">Bhutan</option> 
                          <option value="Bolivia">Bolivia</option> 
                          <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                          <option value="Botswana">Botswana</option> 
                          <option value="Bouvet Island">Bouvet Island</option> 
                          <option value="Brazil">Brazil</option> 
                          <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                          <option value="Brunei Darussalam">Brunei Darussalam</option> 
                          <option value="Bulgaria">Bulgaria</option> 
                          <option value="Burkina Faso">Burkina Faso</option> 
                          <option value="Burundi">Burundi</option> 
                          <option value="Cambodia">Cambodia</option> 
                          <option value="Cameroon">Cameroon</option> 
                          <option value="Canada">Canada</option> 
                          <option value="Cape Verde">Cape Verde</option> 
                          <option value="Cayman Islands">Cayman Islands</option> 
                          <option value="Central African Republic">Central African Republic</option> 
                          <option value="Chad">Chad</option> 
                          <option value="Chile">Chile</option> 
                          <option value="China">China</option> 
                          <option value="Christmas Island">Christmas Island</option> 
                          <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                          <option value="Colombia">Colombia</option> 
                          <option value="Comoros">Comoros</option> 
                          <option value="Congo">Congo</option> 
                          <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                          <option value="Cook Islands">Cook Islands</option> 
                          <option value="Costa Rica">Costa Rica</option> 
                          <option value="Cote D'ivoire">Cote D'ivoire</option> 
                          <option value="Croatia">Croatia</option> 
                          <option value="Cuba">Cuba</option> 
                          <option value="Cyprus">Cyprus</option> 
                          <option value="Czech Republic">Czech Republic</option> 
                          <option value="Denmark">Denmark</option> 
                          <option value="Djibouti">Djibouti</option> 
                          <option value="Dominica">Dominica</option> 
                          <option value="Dominican Republic">Dominican Republic</option> 
                          <option value="Ecuador">Ecuador</option> 
                          <option value="Egypt">Egypt</option> 
                          <option value="El Salvador">El Salvador</option> 
                          <option value="Equatorial Guinea">Equatorial Guinea</option> 
                          <option value="Eritrea">Eritrea</option> 
                          <option value="Estonia">Estonia</option> 
                          <option value="Ethiopia">Ethiopia</option> 
                          <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                          <option value="Faroe Islands">Faroe Islands</option> 
                          <option value="Fiji">Fiji</option> 
                          <option value="Finland">Finland</option> 
                          <option value="France">France</option> 
                          <option value="French Guiana">French Guiana</option> 
                          <option value="French Polynesia">French Polynesia</option> 
                          <option value="French Southern Territories">French Southern Territories</option> 
                          <option value="Gabon">Gabon</option> 
                          <option value="Gambia">Gambia</option> 
                          <option value="Georgia">Georgia</option> 
                          <option value="Germany">Germany</option> 
                          <option value="Ghana">Ghana</option> 
                          <option value="Gibraltar">Gibraltar</option> 
                          <option value="Greece">Greece</option> 
                          <option value="Greenland">Greenland</option> 
                          <option value="Grenada">Grenada</option> 
                          <option value="Guadeloupe">Guadeloupe</option> 
                          <option value="Guam">Guam</option> 
                          <option value="Guatemala">Guatemala</option> 
                          <option value="Guinea">Guinea</option> 
                          <option value="Guinea-bissau">Guinea-bissau</option> 
                          <option value="Guyana">Guyana</option> 
                          <option value="Haiti">Haiti</option> 
                          <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                          <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                          <option value="Honduras">Honduras</option> 
                          <option value="Hong Kong">Hong Kong</option> 
                          <option value="Hungary">Hungary</option> 
                          <option value="Iceland">Iceland</option> 
                          <option value="India">India</option> 
                          <option value="Indonesia">Indonesia</option> 
                          <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                          <option value="Iraq">Iraq</option> 
                          <option value="Ireland">Ireland</option> 
                          <option value="Israel">Israel</option> 
                          <option value="Italy">Italy</option> 
                          <option value="Jamaica">Jamaica</option> 
                          <option value="Japan">Japan</option> 
                          <option value="Jordan">Jordan</option> 
                          <option value="Kazakhstan">Kazakhstan</option> 
                          <option value="Kenya">Kenya</option> 
                          <option value="Kiribati">Kiribati</option> 
                          <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                          <option value="Korea, Republic of">Korea, Republic of</option> 
                          <option value="Kuwait">Kuwait</option> 
                          <option value="Kyrgyzstan">Kyrgyzstan</option> 
                          <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                          <option value="Latvia">Latvia</option> 
                          <option value="Lebanon">Lebanon</option> 
                          <option value="Lesotho">Lesotho</option> 
                          <option value="Liberia">Liberia</option> 
                          <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                          <option value="Liechtenstein">Liechtenstein</option> 
                          <option value="Lithuania">Lithuania</option> 
                          <option value="Luxembourg">Luxembourg</option> 
                          <option value="Macao">Macao</option> 
                          <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                          <option value="Madagascar">Madagascar</option> 
                          <option value="Malawi">Malawi</option> 
                          <option value="Malaysia">Malaysia</option> 
                          <option value="Maldives">Maldives</option> 
                          <option value="Mali">Mali</option> 
                          <option value="Malta">Malta</option> 
                          <option value="Marshall Islands">Marshall Islands</option> 
                          <option value="Martinique">Martinique</option> 
                          <option value="Mauritania">Mauritania</option> 
                          <option value="Mauritius">Mauritius</option> 
                          <option value="Mayotte">Mayotte</option> 
                          <option value="Mexico">Mexico</option> 
                          <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                          <option value="Moldova, Republic of">Moldova, Republic of</option> 
                          <option value="Monaco">Monaco</option> 
                          <option value="Mongolia">Mongolia</option> 
                          <option value="Montenegro">Montenegro</option>
                          <option value="Montserrat">Montserrat</option> 
                          <option value="Morocco">Morocco</option> 
                          <option value="Mozambique">Mozambique</option> 
                          <option value="Myanmar">Myanmar</option> 
                          <option value="Namibia">Namibia</option> 
                          <option value="Nauru">Nauru</option> 
                          <option value="Nepal">Nepal</option> 
                          <option value="Netherlands">Netherlands</option> 
                          <option value="Netherlands Antilles">Netherlands Antilles</option> 
                          <option value="New Caledonia">New Caledonia</option> 
                          <option value="New Zealand">New Zealand</option> 
                          <option value="Nicaragua">Nicaragua</option> 
                          <option value="Niger">Niger</option> 
                          <option value="Nigeria">Nigeria</option> 
                          <option value="Niue">Niue</option> 
                          <option value="Norfolk Island">Norfolk Island</option> 
                          <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                          <option value="Norway">Norway</option> 
                          <option value="Oman">Oman</option> 
                          <option value="Pakistan">Pakistan</option> 
                          <option value="Palau">Palau</option> 
                          <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                          <option value="Panama">Panama</option> 
                          <option value="Papua New Guinea">Papua New Guinea</option> 
                          <option value="Paraguay">Paraguay</option> 
                          <option value="Peru">Peru</option> 
                          <option value="Philippines">Philippines</option> 
                          <option value="Pitcairn">Pitcairn</option> 
                          <option value="Poland">Poland</option> 
                          <option value="Portugal">Portugal</option> 
                          <option value="Puerto Rico">Puerto Rico</option> 
                          <option value="Qatar">Qatar</option> 
                          <option value="Reunion">Reunion</option> 
                          <option value="Romania">Romania</option> 
                          <option value="Russian Federation">Russian Federation</option> 
                          <option value="Rwanda">Rwanda</option> 
                          <option value="Saint Helena">Saint Helena</option> 
                          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                          <option value="Saint Lucia">Saint Lucia</option> 
                          <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                          <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                          <option value="Samoa">Samoa</option> 
                          <option value="San Marino">San Marino</option> 
                          <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                          <option value="Saudi Arabia">Saudi Arabia</option> 
                          <option value="Senegal">Senegal</option> 
                          <option value="Serbia">Serbia</option> 
                          <option value="Seychelles">Seychelles</option> 
                          <option value="Sierra Leone">Sierra Leone</option> 
                          <option value="Singapore">Singapore</option> 
                          <option value="Slovakia">Slovakia</option> 
                          <option value="Slovenia">Slovenia</option> 
                          <option value="Solomon Islands">Solomon Islands</option> 
                          <option value="Somalia">Somalia</option> 
                          <option value="South Africa">South Africa</option> 
                          <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                          <option value="South Sudan">South Sudan</option> 
                          <option value="Spain">Spain</option> 
                          <option value="Sri Lanka">Sri Lanka</option> 
                          <option value="Sudan">Sudan</option> 
                          <option value="Suriname">Suriname</option> 
                          <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                          <option value="Swaziland">Swaziland</option> 
                          <option value="Sweden">Sweden</option> 
                          <option value="Switzerland">Switzerland</option> 
                          <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                          <option value="Taiwan, Republic of China">Taiwan, Republic of China</option> 
                          <option value="Tajikistan">Tajikistan</option> 
                          <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                          <option value="Thailand">Thailand</option> 
                          <option value="Timor-leste">Timor-leste</option> 
                          <option value="Togo">Togo</option> 
                          <option value="Tokelau">Tokelau</option> 
                          <option value="Tonga">Tonga</option> 
                          <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                          <option value="Tunisia">Tunisia</option> 
                          <option value="Turkey">Turkey</option> 
                          <option value="Turkmenistan">Turkmenistan</option> 
                          <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                          <option value="Tuvalu">Tuvalu</option> 
                          <option value="Uganda">Uganda</option> 
                          <option value="Ukraine">Ukraine</option> 
                          <option value="United Arab Emirates">United Arab Emirates</option> 
                          <option value="United Kingdom">United Kingdom</option> 
                          <option value="United States">United States</option> 
                          <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                          <option value="Uruguay">Uruguay</option> 
                          <option value="Uzbekistan">Uzbekistan</option> 
                          <option value="Vanuatu">Vanuatu</option> 
                          <option value="Venezuela">Venezuela</option> 
                          <option value="Viet Nam">Viet Nam</option> 
                          <option value="Virgin Islands, British">Virgin Islands, British</option> 
                          <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                          <option value="Wallis and Futuna">Wallis and Futuna</option> 
                          <option value="Western Sahara">Western Sahara</option> 
                          <option value="Yemen">Yemen</option> 
                          <option value="Zambia">Zambia</option> 
                          <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </span>
                </p>
                
                <p>
                	<label>Radio Buttons</label>
                    <span class="formwrapper">
                    	<input type="radio" name="radiofield" /> Unchecked Radio &nbsp; &nbsp;
                    	<input type="radio" name="radiofield" checked="checked" /> Checked Radio &nbsp; &nbsp;
                        <input type="radio" name="radiofield" disabled="disabled" /> Disabled Radio  &nbsp; &nbsp;
                        <input type="radio" name="radiofield" checked="checked" disabled="disabled" /> Disabled Radio 
                    </span>
                </p>
                                                                
                <p>
                	<label>Checkboxes</label>
                    <span class="formwrapper">
                    	<input type="checkbox" name="check2" /> Unchecked Checkbox<br />
                    	<input type="checkbox" name="check2" checked="checked" /> Checked Checkbox <br />
                        <input type="checkbox" name="check2" disabled="disabled" /> Disabled Checkbox <br /> 
                        <input type="checkbox" name="check2" disabled="disabled" checked="checked" /> Disabled Checked Checkbox
                    </span>
                </p>
                
                <p>
                    <label>File Upload</label>
                    <span class="field">
                    	<input type="file" class="uniform-file" name="filename" />
                    </span>
                </p>
	
				<div class="par">
				    <label>Bootstrap File Upload</label>
				    <div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="input-append">
					<div class="uneditable-input span3">
					    <i class="icon-file fileupload-exists"></i>
					    <span class="fileupload-preview"></span>
					</div>
					<span class="btn btn-file"><span class="fileupload-new">Select file</span>
					<span class="fileupload-exists">Change</span>
					<input type="file" /></span>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
					</div>
				    </div>
				</div>
                
                <p>
                	<label>Input Tags</label>
                    <span class="field">
                    	<input name="tags" id="tags" class="input-large" value="foo,bar,baz" />
                    </span>
                </p>
                
                 <p>
                	<label>Spinner</label>
                    <span class="field"><input type="text" id="spinner" name="" class="input-small input-spinner" /></span>
                    <small class="desc">Try to use mouse wheel.</small>
                </p>
	 
				<div class="par">
                    <label>Time Picker</label>
                     <div class="input-append bootstrap-timepicker">
						<input id="timepicker1" type="text" class="input-small">
						<span class="add-on"><i class="icon-time"></i></span>
				    </div>
                </div>
                
                <div class="par">
                    <label>Prepended Inputs</label>
                    <div class="input-prepend">
                      <span class="add-on">@</span>
                      <input type="text" placeholder="Username" id="prependedInput" class="span2">
                    </div>
                </div>
                
                <div class="par">
                    <label>Appended Inputs</label>
                    <div class="input-append">
                      <input type="text" id="appendedInput" class="span2">
                      <span class="add-on">.00</span>
                    </div>
                </div>
                
                <div class="par">
                    <label>Combined Prepend &amp; Append</label>
                    <div class="input-prepend input-append">
                      <span class="add-on">$</span>
                      <input type="text" id="appendedPrependedInput" class="span2">
                      <span class="add-on">.00</span>
                    </div>
                </div>
                
                <div class="par">
                    <label>Buttons instead of text</label>
                    <div class="input-append">
                      <input type="text" id="appendedInputButton" class="span2">
                      <button type="button" class="btn">Go!</button>
                    </div>
                </div>
                
                <div class="par">
                    <label>Another example</label>
                    <div class="input-append">
                      <input type="text" id="appendedInputButtons" class="span2">
                      <button type="button" class="btn">Search</button>
                      <button type="button" class="btn">Options</button>
                    </div>
                </div>
                
                <div class="par">
                    <label>Button dropdown</label>
                    <div class="input-append">
                      <input type="text" id="appendedDropdownButton" class="span2">
                      <div class="btn-group">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                    </div>
                </div>
                
                <div class="par">
                    <label>Dropdown In Left</label>
                    <div class="input-prepend">
                      <div class="btn-group">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                      <input type="text" id="prependedDropdownButton" class="span2">
                    </div>
                </div>
                
                <div class="par">
                    <label>or can be both</label>
                    <div class="input-prepend input-append">
                      <div class="btn-group">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                      <input type="text" id="appendedPrependedDropdownButton" class="span2">
                      <div class="btn-group">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </div><!-- /btn-group -->
                    </div>
                </div><!--par-->
                
                <div class="par">
                    <label>Segmented Dropdown Group</label>
                    <div class="input-append">
                      <input type="text">
                      <div class="btn-group">
                        <button tabindex="-1" class="btn">Action</button>
                        <button tabindex="-1" data-toggle="dropdown" class="btn dropdown-toggle">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </div>
                    </div>
                </div><!--par-->
                
                <div class="par">
                    <label>&nbsp;</label>
                    <div class="input-prepend">
                      <div class="btn-group">
                        <button tabindex="-1" class="btn">Action</button>
                        <button tabindex="-1" data-toggle="dropdown" class="btn dropdown-toggle">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </div>
                      <input type="text">
                    </div>
                </div><!--par-->
                
                                        
                <p class="stdformbutton">
                    <button class="btn btn-primary">Submit Button</button>
                    <button type="reset" class="btn">Reset Form</button>
                </p>
                
                
            </form>  
        </div><!--widgetcontent-->
        
        <h4 class="widgettitle">With Form Validation</h4>
        <div class="widgetcontent">
        	<form id="form1" class="stdform" method="post" action="#">
            	<div class="par control-group">
                	<label class="control-label" for="firstname">First Name</label>
                    <div class="controls"><input type="text" name="firstname" id="firstname" class="input-large" /></div>
                </div>
                
                <div class="control-group">
                	<label class="control-label" for="lastname">Last Name</label>
                    <div class="controls"><input type="text" name="lastname" id="lastname" class="input-large" /></div>
                </div>
                
                <div class="par control-group">
                	<label class="control-label" for="email">Email</label>
                    <div class="controls"><input type="text" name="email" id="email" class="input-xlarge" /></div>
                </div>
                
                <div class="par control-group">
                	<label class="control-label" for="location">Location</label>
                    <div class="controls"><textarea cols="80" rows="5" name="location" class="input-xxlarge" id="location"></textarea></div> 
                </div>
                                        
                <p class="stdformbutton">
                	<button class="btn btn-primary">Submit Button</button>
                </p>
            </form>
        </div><!--widgetcontent-->
        
        <h4 class="widgettitle nomargin shadowed">Form Bordered</h4>
        <div class="widgetcontent bordered shadowed nopadding">
            <form class="stdform stdform2" method="post" action="#">
                    <p>
                        <label>First Name</label>
                        <span class="field"><input type="text" name="firstname" id="firstname2" class="input-xxlarge" /></span>
                    </p>
                    
                    <p>
                        <label>Last Name</label>
                        <span class="field"><input type="text" name="lastname" id="lastname2" class="input-xxlarge" /></span>
                    </p>
                    
                    <p>
                        <label>Email</label>
                        <span class="field"><input type="text" name="email" id="email2" class="input-xxlarge" /></span>
                    </p>
                    
                    <p>
                        <label>Location <small>You can put your own description for this field here.</small></label>
                        <span class="field"><textarea cols="80" rows="5" name="location" id="location2" class="span5"></textarea></span>
                    </p>
                    
                    <p>
                        <label>Select</label>
                        <span class="field"><select name="selection" id="selection2" class="uniformselect">
                            <option value="">Choose One</option>
                            <option value="1">Selection One</option>
                            <option value="2">Selection Two</option>
                            <option value="3">Selection Three</option>
                            <option value="4">Selection Four</option>
                        </select></span>
                    </p>
                                            
                    <p class="stdformbutton">
                        <button class="btn btn-primary">Submit Button</button>
                        <button type="reset" class="btn">Reset Button</button>
                    </p>
                </form>
            </div><!--widgetcontent-->
    </div><!--contentinner-->
</div><!--maincontent-->
<?php }elseif($i == 11){ echo $this->Html->script(array("admin/jquery.uniform.min","admin/jquery.smartWizard.min","admin/jquery.cookie","admin/custom"));?>
<div class="pagetitle">
	<h1>Wizard Form</h1> <span>This is a sample description for form styles page...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
    	<h4 class="widgettitle">Default Wizard</h4>
        <div class="widgetcontent">
        	<!-- START OF DEFAULT WIZARD -->
            <form class="stdform" method="post" action="#">
            <div id="wizard" class="wizard">
            	<br />
                <ul class="hormenu">
                    <li>
                    	<a href="#wiz1step1">
                        	<span class="h2">Step 1</span>
                            <span class="label">Basic Information</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#wiz1step2">
                        	<span class="h2">Step 2</span>
                            <span class="label">Account Information</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#wiz1step3">
                        	<span class="h2">Step 3</span>
                            <span class="label">Terms of Agreement</span>
                        </a>
                    </li>
                </ul>
                                        	
                <div id="wiz1step1" class="formwiz">
                	<h4 class="widgettitle">Step 1: Basic Information</h4>
                	
                        <p>
                            <label>First Name</label>
                            <span class="field"><input type="text" name="firstname" id="firstname" class="input-xxlarge" /></span>
                        </p>
                        
                        <p>
                            <label>Last Name</label>
                            <span class="field"><input type="text" name="lastname" id="lastname" class="input-xxlarge" /></span>
                        </p>
                                                        
                        <p>
                            <label>Gender</label>
                            <span class="field">
                            	<select name="selection" id="selection" class="uniformselect">
                                	<option value="">Choose One</option>
                                	<option value="1">Female</option>
                                	<option value="2">Male</option>
                            	</select>
                            </span>
                        </p>
                        
                	
                    
                </div><!--#wiz1step1-->
                
                <div id="wiz1step2" class="formwiz">
                	<h4 class="widgettitle">Step 2: Account Information</h4>
                    
                        <p>
                            <label>Account No</label>
                            <span class="field"><input type="text" name="lastname" class="input-xxlarge" /></span>
                        </p>
                        <p>
                            <label>Address</label>
                            <span class="field"><textarea cols="80" rows="5" name="location" class="span6"></textarea></span>
                        </p>
                                                                                       
                </div><!--#wiz1step2-->
                
                <div id="wiz1step3">
                	<h4 class="widgettitle">Step 3: Terms of Agreement</h4>
                    <div class="par terms" style="padding: 0 20px;">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                    </div>
                </div><!--#wiz1step3-->
                
            </div><!--#wizard-->
            </form>
            <!-- END OF DEFAULT WIZARD -->
        </div><!--widgetcontent-->	
        
        <h4 class="widgettitle">Tabbed Wizard</h4>
        <div class="widgetcontent">
        	
            <!-- START OF TABBED WIZARD -->
            <form class="stdform" method="post" action="#">
            <div id="wizard2" class="wizard tabbedwizard">
            	
                <ul class="tabbedmenu">
                    <li>
                    	<a href="#wiz1step2_1">
                        	<span class="h2">STEP 1</span>
                            <span class="label">Basic Information</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#wiz1step2_2">
                        	<span class="h2">STEP 2</span>
                            <span class="label">Account Information</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#wiz1step2_3">
                        	<span class="h2">STEP 3</span>
                            <span class="label">Terms of Agreement</span>
                        </a>
                    </li>
                </ul>
                
                	
                <div id="wiz1step2_1" class="formwiz">
                	<h4>Step 1: Basic Information</h4>
                	
                        <p>
                            <label>First Name</label>
                            <span class="field"><input type="text" name="firstname" class="input-xxlarge" /></span>
                        </p>
                        
                        <p>
                            <label>Last Name</label>
                            <span class="field"><input type="text" name="lastname" class="input-xxlarge" /></span>
                        </p>
                                                        
                        <p>
                            <label>Gender</label>
                            <span class="field"><select name="" class="uniformselect">
                                <option value="">Choose One</option>
                                <option value="1">Female</option>
                                <option value="2">Male</option>
                            </select></span>
                        </p>
                        
                	
                    
                </div><!--#wiz1step2_1-->
                
                <div id="wiz1step2_2" class="formwiz">
                	<h4>Step 2: Account Information</h4> 
                    
                        <p>
                            <label>Account No</label>
                            <span class="field"><input type="text" name="lastname" class="input-xxlarge" /></span>
                        </p>
                        <p>
                            <label>Address</label>
                            <span class="field"><textarea cols="80" rows="5" class="span6" name="location"></textarea></span>
                        </p>
                                                                                       
                </div><!--#wiz1step2_2-->
                
                <div id="wiz1step2_3">
                	<h4>Step 3: Terms of Agreement</h4>
                    <div class="par terms">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                    </div>
                </div><!--#wiz1step2_3-->
                
            </div><!--#wizard-->
            </form>
                                
            <!-- END OF TABBED WIZARD -->
            
        </div><!--widgetcontent-->
        
        <h4 class="widgettitle nomargin">Vertical Wizard</h4>
        <div class="widgetcontent bordered">
        
        	<!-- START OF VERTICAL WIZARD -->
            <form class="stdform" method="post" action="http://themepixels.com/main/themes/demo/webpage/katniss/wizards.html">
            <div id="wizard3" class="wizard verwizard">
            	
                <ul class="verticalmenu">
                    <li>
                    	<a href="#wiz1step3_1">
                            <span class="label">Step 1: Basic Information</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#wiz1step3_2">
                            <span class="label">Step 2: Account Information</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#wiz1step3_3">
                            <span class="label">Step 3: Terms of Agreement</span>
                        </a>
                    </li>
                </ul>
                                        	
                <div id="wiz1step3_1" class="formwiz">
                	<h4>Step 1: Basic Information</h4> 
                	
                        <p>
                            <label>First Name</label>
                            <span class="field"><input type="text" name="firstname" class="input-xlarge" /></span>
                        </p>
                        
                        <p>
                            <label>Last Name</label>
                            <span class="field"><input type="text" name="lastname" class="input-xlarge" /></span>
                        </p>
                                                        
                        <p>
                            <label>Gender</label>
                            <span class="field"><select name="selection" class="uniformselect">
                                <option value="">Choose One</option>
                                <option value="1">Female</option>
                                <option value="2">Male</option>
                            </select></span>
                        </p>
                        
                	
                    
                </div><!--#wiz1step3_1-->
                
                <div id="wiz1step3_2" class="formwiz">
                	<h4>Step 2: Account Information</h4> 
                    
                        <p>
                            <label>Account No</label>
                            <span class="field"><input type="text" name="lastname" class="input-xlarge" /></span>
                        </p>
                        <p>
                            <label>Address</label>
                            <span class="field"><textarea cols="80" rows="5" name="location" class="span4"></textarea></span>
                        </p>
                                                                                       
                </div><!--#wiz1step3_2-->
                
                <div id="wiz1step3_3">
                	<h4>Step 3: Terms of Agreement</h4>
                    <div class="par terms">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                    </div>
                </div><!--#wiz1step3_3-->
                
            </div><!--#wizard-->
            </form>
            <!-- END OF VERTICAL WIZARD -->
            
        </div><!--widgetcontent-->
        
    </div><!--contentinner-->
</div><!--maincontent-->
<script type="text/javascript">
	jQuery(document).ready(function(){
		// Smart Wizard 	
  		jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
      	jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});
		jQuery('#wizard3').smartWizard({onFinish: onFinishCallback});
		jQuery('#wizard4').smartWizard({onFinish: onFinishCallback});
		
		function onFinishCallback(){
			alert('Finish Clicked');
		} 
		
		jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
		
		jQuery('select, input:checkbox').uniform();
	});
</script>	
<?php }elseif($i == 12){ echo $this->Html->script(array("ckeditor/ckeditor","ckeditor/adapters/jquery","ckeditor/styles")); ?>
<div class="pagetitle">
	<h1>Editor</h1> <span>This is a sample description for text editor page...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
    	<form method="post" action="http://tinymce.moxiecode.com/dump.php?example=true">
            <div>
        
                <!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
                <div>
                    <span class="field">
			        	<?php echo $this->Form->input('recomendations',array("id"=>"recomendations","name"=>"recomendations", 'error' => false,"type"=>"textarea", "class"=>"span5", "style"=>"resize: vertical; height: 250px; width: 500px;","placeholder"=>"Text Editor",'label'=>false,'div'=>false, "tabindex"=>"1"));?>
			        	<script>CKEDITOR.replace('recomendations',{extraPlugins:'pastefromword'});</script>
			        </span>
                </div>
                <br />
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="reset" name="reset" class="btn">Reset</button>
            </div>
            <br /><br />
        </form>
    </div><!--contentinner-->
</div><!--maincontent-->
<?php }elseif($i == 13){ ?>
	<script type="text/javascript" src="prettify/prettify.js"></script>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.html"></script>
	<script type="text/javascript" src="js/modernizr.min.js"></script>
	<script type="text/javascript" src="js/detectizr.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->webroot;?>js/admin/fullcalendar.min.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
		
	<script type='text/javascript'>

	jQuery(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth()+1;
		var y = date.getFullYear();
		
		var calendar = jQuery('#calendar1').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			buttonText: {
				prev: '&laquo;',
				next: '&raquo;',
				prevYear: '&nbsp;&lt;&lt;&nbsp;',
				nextYear: '&nbsp;&gt;&gt;&nbsp;',
				today: 'today',
				month: 'month',
				week: 'week',
				day: 'day'
			},
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/'
				}
			]
		});
		
	});

</script>
<div class="pagetitle">
	<h1>Inspections &amp; Events</h1> <span>This is a sample demo for events and inspections...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
    	<div id='calendar1'></div>
    </div><!--contentinner-->
</div><!--maincontent-->
<?php }elseif($i == 14){ ?>
<div class="pagetitle">
	<h1>Detail</h1> <span>This is a sample description page...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
    	
    	<div class="row-fluid">
        
        <div class="span6">
        
          <div class="invoice_logo"><img src="<?php echo $this->webroot;?>img/admin/preview/comlogo.png" alt="" class="img-polaroid" /></div>
          
          <table class="table table-bordered table-invoice">
              <tr>
                  <td class="width30">Project Director</td>
                  <td class="width70"><strong>Engr. Abc Xyz</strong></td>
              </tr>
              <tr>
                <td>Project ID:</td>
                <td>HF12-23DFF</td>
            </tr>
                <tr>
                  <td>Project Name:</td>
                  <td>Test Project Title</td>
              </tr>
          </table>
        </div><!--span6-->
    
		<div class="span6">
        <table class="table table-bordered table-invoice">
              <tr>
                  <td class="width30">From:</td>
                  <td class="width70">
                    <strong>IMED</strong> <br />
                    Planning Comission, <br />
                    Begum Rokeya Sarani, <br />
                    Agargaon, Dhaka <br/>
                    Tel No: XXX-XXXX <br />
                    Email: info@imed.com
                  </td>
              </tr>
          </table>
       	  <br />
          <table class="table table-bordered table-invoice">
              <tr>
                  <td class="width30">Status:</td>
                  <td class="width70"><strong>Complete</strong></td>
              </tr>
              <tr>
                <td>Starting Date:</td>
                <td><strong>June 23, 2012</strong></td>
            </tr>
                <tr>
                  <td>Completion Date:</td>
                  <td><strong>November 01, 2013</strong></td>
              </tr>
          </table>
        </div><!--span6-->
        
    </div><!--row-fluid-->
    
    <div class="clearfix"><br /></div>
    
    <table class="table table-bordered table-invoice-full">
            <colgroup>
                <col class="con0" />
            </colgroup>
            
            <tbody>
                <tr>
                    <td>Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. Some Text here. </td>
                </tr>
            </tbody>
        </table>
    </div><!--contentinner-->
</div><!--maincontent-->
<?php }elseif($i == 15){ ?>
<div class="pagetitle">
	<h1>Grid Styles</h1> <span>This is a sample grid style page...</span>
</div><!--pagetitle-->

<div class="maincontent">
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span6">
            	<h4 class="widgettitle">Half Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span6-->
            <div class="span6">
            	<h4 class="widgettitle">Half Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span6-->
        </div><!--row-fluid-->
        
        <div class="row-fluid">
        	<div class="span4">
            	<h4 class="widgettitle">One Third Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span4-->
            <div class="span4">
            	<h4 class="widgettitle">One Third Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span4-->
            
            <div class="span4">
            	<h4 class="widgettitle">One Third Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span4-->
        </div><!--row-fluid-->
        
        <div class="row-fluid">
        	<div class="span4">
            	<h4 class="widgettitle">One Third Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span4-->
            <div class="span8">
            	<h4 class="widgettitle">Two Third Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span8-->
            
        </div><!--row-fluid-->
        
        <div class="row-fluid">
        	<div class="span3">
            	<h4 class="widgettitle">One Fourth Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span3-->
            <div class="span3">
            	<h4 class="widgettitle">One Fourth Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span3-->
            
            <div class="span3">
            	<h4 class="widgettitle">One Fourth Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span3-->
            
            <div class="span3">
            	<h4 class="widgettitle">One Fourth Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span3-->
        </div><!--row-fluid-->
        
        <div class="row-fluid">
        	<div class="span3">
            	<h4 class="widgettitle">One Fourth Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span3-->
            <div class="span9">
            	<h4 class="widgettitle">Three Fourth Column</h4>
                <div class="widgetcontent">
                	Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. 
                </div><!--widgetcontent-->
            </div><!--span9-->
        </div><!--row-fluid-->
        <div class="clearfix"></div>
  </div><!--contentinner-->
</div><!--maincontent-->
<?php }elseif($i == 16){ ?>
<div class="pagetitle">
	<h1>Frequently Asked Questions</h1></span>
</div><!--pagetitle-->

<div class="maincontent">
    <div class="contentinner content-faq">
		<div id="accordion2" class="accordion faq">
        	<h3><a href="#"><i class="icon-question-sign"></i>What is the first question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
            <h3><a href="#"><i class="icon-question-sign"></i>What is the second question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
            <h3><a href="#"><i class="icon-question-sign"></i>What is the third question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
            <h3><a href="#"><i class="icon-question-sign"></i>What is the fourth question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
            <h3><a href="#"><i class="icon-question-sign"></i>What is the fifth question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
            <h3><a href="#"><i class="icon-question-sign"></i>What is the sixth question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
            <h3><a href="#"><i class="icon-question-sign"></i>What is the seventh question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
            <h3><a href="#"><i class="icon-question-sign"></i>What is the eighth question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
            <h3><a href="#"><i class="icon-question-sign"></i>What is the ninth question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
            <h3><a href="#"><i class="icon-question-sign"></i>What is the tenth question?</a></h3>
            <div><p>Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here. Some text here.</p></div>
	</div><!--#accordion-->

    </div><!--contentinner-->
</div><!--maincontent-->
<?php } ?>
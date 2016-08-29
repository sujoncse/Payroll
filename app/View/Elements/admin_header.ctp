<div class="headerpanel animate3 fadeInUp">
	<a href="" class="showmenu"></a>
	<div class="headerright">
		<div style="float:left"><h1>PAYROLL MANAGEMENT SYSTEM, BARC</h1></div>
		<div class="dropdown notification">
			<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="<?php echo $this->webroot;?>">
				<span class="iconsweets-globe iconsweets-white"></span>
			</a>
		</div><!--dropdown-->
		
		<div class="dropdown userinfo">
			<a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="<?php echo $this->webroot."admins";?>">Hi, Admin! <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="#"><span class="icon-edit"></span> Edit Profile</a></li>
				<li><a href="#"><span class="icon-wrench"></span> Account Settings</a></li>
				<li><a href="#"><span class="icon-eye-open"></span> Privacy Settings</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo $this->webroot."admins/logout";?>"><span class="icon-off"></span> Sign Out</a></li>
			</ul>
		</div><!--dropdown-->
	
	</div><!--headerright-->
	
</div><!--headerpanel-->
<div class="breadcrumbwidget animate4 fadeInUp">
	<ul class="breadcrumb">
		<li><a href="<?php echo $this->webroot."admins";?>">Admin</a> <span class="divider">/</span></li>
		<li class="active">Dashboard</li>
	</ul>
</div><!--breadcrumbwidget-->
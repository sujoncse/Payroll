/*!
 * Katniss Premium Admin Template v1.0
 *
 * Author: ThemePixels (themepixels@gmail.com)
 * URL: http://www.themepixels.com/themes/demo/webpage/katniss
 */


@import url('../admin/bootstrap.min.css');
@import url('../admin/bootstrap-responsive.min.css');
@import url('../admin/uniform.tp.css');
@import url('../admin/jquery.ui.css');
@import url('../admin/colorpicker.css');
@import url('../admin/colorbox.css');
@import url('../admin/jquery.jgrowl.css');
@import url('../admin/jquery.alerts.css');
@import url('../admin/animate.min.css');
@import url('../admin/animate.delay.css');
@import url('../admin/font-awesome.css');
@import url('../admin/jquery.tagsinput.css');
@import url('../admin/ui.spinner.css');
@import url('../admin/jquery.chosen.css');
@import url('../admin/fullcalendar.css');
@import url('../admin/font-awesome-ie7.css');
@import url('../admin/fonts/roboto.css');


/***** RESET BROWSER STYLES *****/
/********************************/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	background: transparent;
	border: 0;
	margin: 0;
	padding: 0;
	vertical-align: baseline;
}

/***** MAIN WRAPPER *****/
/************************/

body { background: #bcbcbc; font-family: 'HelveticaNeue', Arial, Helvetica, sans-serif; font-size: 12px; line-height: 21px; color: #666; }
button, input, textarea, select, a, a:focus { outline: none; }
a { text-decoration: none; color: #546f8e; }
a:hover { text-decoration: underline; }
img { display: block; }
small { font-size: 11px; line-height: 18px; }
pre { font-size: 11px; }

input,select,textarea,button,label { color: #666; font-family: 'HelveticaNeue', Arial, sans-serif; font-size: 12px; outline: none; margin: 0; }

h1,h2,h3,h4 { color: #333; font-weight: normal; }
h1 { font-size: 28px; line-height: 38px; }
h2 { font-size: 24px; line-height: 30px; }
h3 { font-size: 18px; line-height: 28px; }
h4 { font-size: 16px; line-height: 26px; }

.mainwrapper { 
	width: 1280px; margin: auto; background: #f7f7f7 url(../../img/admin/mainbg.png) repeat-y 0 0; position: relative; 
	overflow: hidden; -moz-box-shadow: 0 0 5px rgba(0,0,0,0.1); 
	-webkit-box-shadow: 0 0 5px rgba(0,0,0,0.1); box-shadow: 0 0 5px rgba(0,0,0,0.1); padding-bottom: 60px; 
}
.fullwrapper { width: auto; border: 0; }


/***** LEFT PANEL *****/
/**********************/

.leftpanel { width: 260px; float: left; }
.floatleftpanel { float: left; position: relative; top: auto; left: auto; z-index: auto; }

.logopanel { min-height: 50px; border-right: 1px solid #023c70; }
.logopanel h1 { text-transform: uppercase; color: #fff; padding: 5px 0 0 10px; font-size: 24px; text-shadow: 1px 1px rgba(0,0,0,0.2); }
.logopanel h1 a { color: #fff; }
.logopanel h1 a:hover { text-decoration: none; }
.logopanel h1 a span { font-size: 11px; }

.datewidget { background: #232323; font-size: 11px; color: #999; padding: 5px 10px; border-right: 1px solid #1e1e1e; }

.searchwidget { padding: 10px; border-bottom: 1px solid #bbb; }
.searchwidget input.search-query { border: 1px solid #bbb; outline: none; padding: 7px 10px; width: 178px; }
.searchwidget .input-append { margin: 0; }
.searchwidget .btn { padding: 7px 12px; border-color: #bbb; }

.plainwidget { margin: 10px; background: #fcfcfc; border: 1px solid #bbb; padding: 5px 10px; }
.plainwidget .progress { margin: 5px 0; height: 10px; }

.leftmenu { margin: 10px 0; }
.leftmenu .nav-tabs li { border-bottom: 1px solid #bbb; margin: 0 1px 0 0; }
.leftmenu .nav-tabs li:first-child { border-top: 1px solid #bbb; }
.leftmenu .nav-tabs li a { border: 0; color: #666; text-shadow: 1px 1px rgba(255,255,255,0.3); }
.leftmenu .nav-tabs li a:hover { border: 0; }
.leftmenu .nav-tabs li a span { display: inline-block; vertical-align: top; margin: 2px 5px 0 0; opacity: 0.6; }
.leftmenu .nav-tabs > .active { margin-right: 0; font-weight: bold; background: #f7f7f7 url(../../img/admin/gray_jean.png); }
.leftmenu .nav-tabs.nav-stacked > li > a:hover { background: #eee; }
.leftmenu .nav-tabs.nav-stacked > li.active > a { background: #f7f7f7 url(../../img/admin/gray_jean.png); }
.leftmenu .nav-tabs > .active > a span { opacity: 0.8; }
.leftmenu .nav-tabs > .active ul li { font-weight: normal; }
.leftmenu .nav-tabs > .dropdown > a { background-image: url(../../img/admin/arrowdown.png); background-repeat: no-repeat; background-position: right center; }
.leftmenu .nav-tabs > .dropdown > a:hover { background: #eee url(../../img/admin/arrowdown.png) no-repeat right center !important; }
.leftmenu .nav-tabs.nav-stacked > .dropdown.active > a { background: transparent url(../../img/admin/arrowdown.png) no-repeat right center !important; }
.leftmenu .nav-tabs ul { list-style: none; background: #d3d3d3; display: none; }
.leftmenu .nav-tabs ul li { margin-right: 0; background: none; }
.leftmenu .nav-tabs ul li a { padding: 5px 10px; display: block; padding-left: 33px; }
.leftmenu .nav-tabs ul li a:hover { text-decoration: none; background: #d7d7d7; }
.leftmenu .nav-tabs ul li:last-child { border-bottom: 0; }


/***** RIGHT PANEL *****/
/***********************/

.rightpanel { margin-left: 260px; position: relative; background: url(../../img/admin/gray_jean.png); }
.rightpanel:after { display: block; clear: both; content: ''; }

.rightpanel-max { margin-left: 180px; position: relative; background: url(../../img/admin/gray_jean.png); }
.rightpanel-max:after { display: block; clear: both; content: ''; }

.headerpanel { min-height: 50px; border-left: 1px solid #45729e; }
.headerright { float: right; padding: 7px 10px 0 0; }
.headerright .dropdown { display: inline-block; margin-left: 7px; }

/* Notifications */
.notification .dropdown-toggle { }
.notification .dropdown-menu { left: auto; right: 0; min-width: 300px; }
.notification .dropdown-menu a { border-bottom: 1px dotted #eee; }
.notification .dropdown-menu li:last-child a { border-bottom: 0; }
.notification .dropdown-menu img { display: inline-block; margin: 2px 5px 2px 0; }
.notification [class^="icon-"], .notification [class*=" icon-"] { margin-right: 10px; vertical-align: middle; }
.notification .viewmore a { margin-top: 10px; font-size: 11px; text-transform: uppercase; font-weight: bold; color: #999; }

.notification .dropdown-toggle, .userinfo .dropdown-toggle { 
	display: inline-block; background: #0b4073; padding: 7px 10px; color: #ccc;
	-moz-box-shadow: inset 1px 1px 2px rgba(0,0,0,0.2), 1px 1px 0 rgba(255,255,255,0.2);
	-webkit-box-shadow: inset 1px 1px 2px rgba(0,0,0,0.2), 1px 1px 0 rgba(255,255,255,0.2);
	box-shadow: inset 1px 1px 2px rgba(0,0,0,0.2), 1px 1px 0 rgba(255,255,255,0.2); 
}

.userinfo .dropdown-toggle:hover { text-decoration: none; color: #fff; }
.userinfo .dropdown-menu { left: auto; right: 0; }
.userinfo .caret { border-top-color: #ccc; margin-left: 10px; }
.userinfo .dropdown-menu li > a { padding-left: 15px; }
.userinfo .dropdown-menu li > a span { margin-right: 5px; margin-top: -1px; }
.userinfo .dropdown-menu .divider { margin: 5px 0; }

/* Breadcrumbs */
.breadcrumbwidget { background: #333; min-height: 31px; border-left: 1px solid #3c3c3c; font-size: 11px; position: relative; }
.breadcrumbwidget .breadcrumb { background: none !important; margin: 0; border: 0; padding: 5px 10px; }
.breadcrumbwidget .breadcrumb li { text-shadow: none; }
.breadcrumbwidget .breadcrumb li.active { color: #ccc; }
.breadcrumbwidget .breadcrumb a { color: #999; }
.breadcrumbwidget .breadcrumb a:hover { color: #ccc; }
.breadcrumbwidget .breadcrumb .divider { color: #666; }

.showmenu { 
	display: inline-block; height: 35px; width: 40px; background: #0b4073 url(../../img/admin/menu.png) no-repeat center center; 
	margin: 7px 0 0 8px; -moz-box-shadow: inset 1px 1px 2px rgba(0,0,0,0.2), 1px 1px 0 rgba(255,255,255,0.2);
	-webkit-box-shadow: inset 1px 1px 2px rgba(0,0,0,0.2), 1px 1px 0 rgba(255,255,255,0.2);
	box-shadow: inset 1px 1px 2px rgba(0,0,0,0.2), 1px 1px 0 rgba(255,255,255,0.2); 
}
.showmenu:hover, .showmenu:active { background-color: #083865; }

/* Page Title */
.pagetitle { padding: 9px 12px; border-bottom: 1px solid #bbb; }
.pagetitle h1 { display: inline-block; font-size: 18px; vertical-align: middle; }
.pagetitle span { display: inline-block; margin-left: 10px; font-size: 11px; font-style: italic; color: #999; }


/* Main Content */
.maincontent { position: relative; padding-right: 30px; }
.contentinner { padding: 15px; min-height: 650px; float: left; width: 100%; }
.contentinner p { margin: 15px 0; }
.contentinner p:first-child { margin-top: 0; }
.contnetinner p:last-child { margin-bottom: 0; }
.wrapper404 ul { list-style: none; margin: 10px 0; }

.widgettitle { 
	color: #999; text-transform: uppercase; text-transform: uppercase; margin-bottom: 15px; 
	text-shadow: 1px 1px rgba(255,255,255,0.3); border: 1px solid #bbb; position: relative;
}
h4.widgettitle { font-size: 12px; padding: 2px 10px; font-weight: bold; }
h4.ctitle { border: 1px solid; color: #fff; text-shadow: 1px 1px rgba(0,0,0,0.2); }
h3.widgettitle { font-size: 14px; padding: 5px 10px; }
h3.ctitle { border: 1px solid; color: #fff; text-shadow: 1px 1px rgba(0,0,0,0.2); }

.showhide { 
	font-size: 10px; position: absolute; top: 0; right: 0; padding: 2px 10px; border-left: 1px solid #bbb; color: #999; 
	text-align: center; min-width: 75px; 
}
.showhide:hover { text-decoration: none; color: #777; background: #e7e7e7; }

.widgetcontent { margin-bottom: 30px; position: relative; }
.widgetcontent.bordered { padding: 15px; border: 1px solid #bbb; border-top: 0; background: #fcfcfc; }
.widgetcontent.nopadding { padding: 0; }
.widgetsource { display: none; }
.widgetsource.show { display: block; }

.pargroup { border: 1px solid #ccc; background: #fcfcfc; }
.pargroup .par { border-bottom: 1px solid #ddd; padding: 10px; }
.pargroup .par:last-child { border-bottom: 0; }
.pargroup .par p.pull-right { margin-top: -20px; font-size: 11px; }

/* Elements */
.sortlist { list-style: none; position: relative; }
.sortlist > li { display: block; margin-bottom: 7px;}
.sortlist > li.ui-sortable-helper { opacity: 0.5; }
.sortlist > li span { opacity: 0.3; margin: -1px 5px 0 0; }
.sortlist > li div.label { display: block; padding: 10px; border: 1px solid #bbb; text-shadow: none; color: #666; position: relative; }
.sortlist > li div.label .showcnt { 
	position: absolute; display: block; top: 12px; right: 5px; opacity: 0.3; }
.sortlist > li div.label .showcnt:hover { opacity: 0.6; cursor: pointer; }
.sortlist > li div.details { border: 1px solid #bbb; border-top: 0; padding: 10px; background: #fcfcfc; display: none; }
.sortlist > li div.details p { margin: 10px 0; }
.sortlist > li div.details p:first-child { margin-top: 0; }
.sortlist > li div.details p:last-child { margin-bottom: 0; }

.table-buttonlist tr td:first-child { width: 20%; text-align: center; vertical-align: middle; }
.table-buttonlist tr td:last-child { width: 80%; }
.table-buttonlist tr td ul li { text-align: left; }

.navsample .nav { margin-bottom: 0; }

.tooltipsample li { display: inline-block; margin-right: 5px; list-style: none; }
.popoversample li { display: inline-block; margin-right: 5px; list-style: none; }

.list-inline li { display: inline-block; margin: 0 5px 10px 0; }

.loaders img { float: left; margin-right: 10px; vertical-align: middle; }

/* Animations Sample */
.animatesample { position: absolute; top: 15px; left: 15px; width: 220px; z-index: 100; }
.animatesample li { padding: 7px 10px; border: 1px solid #bbb; background: #ddd; }
.animatebuttonlist li { list-style: none; display: inline-block; margin-right: 10px; margin-bottom: 10px; }

/* Typography */
ul.list-unordered, ol.list-ordered,
ul.list-unordered ul, ol.list-ordered ol { margin: 0 0 0 25px; padding: 0; }
ul.list-checked, ol.list-checked,
ul.list-checked2, ol.list-checked2 { list-style: none; margin: 0; }
ul.list-checked li, ol.list-checked li { background: url(../../img/admin/check.png) no-repeat 0 2px; padding-left: 25px; display: block; } 
ul.list-checked2 li, ol.list-checked2 li { background: url(../../img/admin/check2.png) no-repeat 0 2px; padding-left: 25px; display: block; } 
ul.list-nostyle ul, ol.list-style ol,
ul.list-nostyle ol, ol.list-style ul { margin: 0 0 0 25px; padding: 0; }
ul.list-nostyle li, ol.list-nostyle li { list-style: none; }
ul.list-nostyle li span, ol.list-nostyle li span { vertical-align: top; }

/* Tables */
.dataTables_wrapper { position: relative; }
.dataTables_length, .dataTables_info { background: #eee; padding: 10px; font-size: 11px; border: 1px solid #ddd; }
.dataTables_length { border-bottom: 0; }
.dataTables_info { border-top: 0; }
.dataTables_filter { position: absolute; top: 12px; right: 10px; }
.dataTables_filter input { width: 150px; margin-left: 10px; }
.dataTables_paginate { position: absolute; bottom: 10px; right: 10px; }
.dataTables_paginate .first, .dataTables_paginate .previous, .dataTables_paginate .paginate_active, 
.dataTables_paginate .paginate_button, .dataTables_paginate .next, .dataTables_paginate .last { 
	padding: 5px 10px; border: 1px solid #bbb; border-left: 0; font-size: 11px; background: #eee; cursor: pointer;
}
.dataTables_paginate span:hover { background-color: #ddd; }
.dataTables_paginate .first { border-left: 1px solid #bbb; }
.dataTables_paginate .paginate_active { background: #fff; }
.dataTables_paginate .paginate_button:hover { background: #eee; }
.dataTables_paginate .paginate_button_disabled { cursor: default; color: #bbb; background: #eee; }
.dataTables_length select { width: auto !important; }


/***** FORM STYLES *****/
/***********************/

.stdform input { padding: 7px 5px; border: 1px solid #bbb; }
.stdform textarea { padding: 6px 5px; border: 1px solid #bbb; }
.stdform select { border: 1px solid #bbb; padding: 5px 2px; }
.stdform p, .stdform div.par { margin: 20px 0; }
.stdform span.field, .stdform div.field { margin-left: 220px; display: block; position: relative; }
.stdform .formwrapper { display: block; padding-top: 5px; margin-left: 220px; line-height: 25px; }
.stdform label { float: left; width: 200px; text-align: right; padding: 5px 20px 0 0; }
.stdform label.error { float: none; display: block; font-size: 11px; color: #ff0000; text-align: left; padding: 0; width: auto; margin-left: 220px; }
.stdform label.valid { color: #468847; }
.stdform small.desc { font-size: 11px; color: #999; font-style: italic; display: block; margin: 5px 0 0 220px; }
.stdform .stdformbutton { margin-left: 220px; }

.stdform #spinner.input-small { width: 100px; }


/*** ANOTHER FORM STYLE ***/
.stdform2 p, .stdform2 div.par { border-top: 1px solid #ddd; background: #fcfcfc; margin: 0; clear: both; }
.stdform2 div.terms { border: 0; background: none; }
.stdform2 p:first-child, .stdform2 div.par:first-child { border-top: 0; }
.stdform2 label { display: inline-block; padding: 15px 0 0 15px; vertical-align: top; text-align: left; font-weight: bold; }
.stdform2 label.error { margin-left: 0; padding: 0; }
.stdform2 label small { font-size: 11px; color: #999; display: block; font-weight: normal; line-height: 16px; }
.stdform2 span.field, .stdform2 div.field { margin-left: 220px; display: block; background: #fff; padding: 15px; border-left: 1px solid #ddd; }
.stdform2 .stdformbutton { margin-left: 0; padding: 15px; background: #fff; }
.stdform2 input[type=checkbox], .stdform2 input[type=radio] { margin: 10px; }

/*** DUAL BOX ***/
.dualselect { margin-left: 220px; display: block; }
.dualselect select { height: 200px; width: 40%; }
.dualselect .ds_arrow { display: inline-block; vertical-align: top; padding-top: 60px; margin: 0 10px; }
.dualselect .ds_arrow button { margin-top: -1px; }

/* CHARACTER COUNT */
.counter { display: block; margin: 5px 0; font-size: 12px; font-weight: bold; }
.warning { color: #bb0000; }
.exceeded { color: #ff0000; }



/***** ICONS *****/
/*****************/

/*dashboard*/
.widgeticons { list-style: none; margin-bottom: 15px; }
.widgeticons li { margin-bottom: 15px; }
.widgeticons li a { display: block; border: 1px solid #ccc; background: #fcfcfc; text-align: center; }
.widgeticons li a:hover { text-decoration: none; background-color: #fff; }
.widgeticons li a span { display: block; padding: 2px; text-transform: uppercase; margin-bottom: 5px; }
.widgeticons li a img { margin: 15px auto 5px auto; }

[class^="iconsweets-"], [class*=" iconsweets-"] {
  display: inline-block;
  width: 16px;
  height: 16px;
  vertical-align: middle;
  background-image: url(../../img/admin/iconsweets-icons.png);
  background-position: -16px -16px;
  background-repeat: no-repeat;
}

/* White icons with optional class or on hover/active states of certain elements */
.iconsweets-white,
.nav-pills > .active > a > [class^="iconsweets-"],
.nav-pills > .active > a > [class*=" iconsweets-"],
.nav-list > .active > a > [class^="iconsweets-"],
.nav-list > .active > a > [class*=" iconsweets-"],
.navbar-inverse .nav > .active > a > [class^="iconsweets-"],
.navbar-inverse .nav > .active > a > [class*=" iconsweets-"],
.dropdown-menu > li > a:hover > [class^="iconsweets-"],
.dropdown-menu > li > a:hover > [class*=" iconsweets-"],
.dropdown-menu > .active > a > [class^="iconsweets-"],
.dropdown-menu > .active > a > [class*=" iconsweets-"],
.dropdown-submenu:hover > a > [class^="iconsweets-"],
.dropdown-submenu:hover > a > [class*=" iconsweets-"] {
  background-image: url(../../img/admin/iconsweets-icons-white.png);
}

.iconsweets-magnifying-glass { background-position: -16px -16px; }
.iconsweets-trashcan { background-position: -48px -16px; }
.iconsweets--trashcan2 { background-position: -80px -16px; }
.iconsweets-presentation { background-position: -112px -16px; }
.iconsweets-download { background-position: -144px -16px; }
.iconsweets-download2 { background-position: -176px -16px; }
.iconsweets-upload { background-position: -208px -16px; }
.iconsweets-flag { background-position: -240px -16px; }
.iconsweets-flag2 { background-position: -272px -16px; }
.iconsweets-finish-flag { background-position: -304px -16px; }
.iconsweets-podium { background-position: -16px -48px; }
.iconsweets-cup { background-position: -48px -48px; }
.iconsweets-home { background-position: -80px -48px; }
.iconsweets-home2 { background-position: -112px -48px; }
.iconsweets-link { background-position: -144px -48px; }
.iconsweets-link2 { background-position: -176px -48px; }
.iconsweets-notebook { background-position: -208px -48px; }
.iconsweets-book { background-position: -240px -48px; }
.iconsweets-book-large { background-position: -272px -48px; }
.iconsweets-books { background-position: -304px -48px; }
.iconsweets-tree { background-position: -16px -80px; }
.iconsweets-construction { background-position: -48px -80px; }
.iconsweets-umbrella { background-position: -80px -80px; }
.iconsweets-mail { background-position: -112px -80px; }
.iconsweets-help { background-position: -144px -80px; }
.iconsweets-rss { background-position: -176px -80px; }
.iconsweets-strategy { background-position: -208px -80px; }
.iconsweets-strategy2 { background-position: -240px -80px; }
.iconsweets-apartment { background-position: -272px -80px; }
.iconsweets-companies { background-position: -304px -80px; }
.iconsweets-ghost { background-position: -16px -112px; }
.iconsweets-pacman { background-position: -48px -112px; }
.iconsweets-vault { background-position: -80px -112px; }
.iconsweets-archive { background-position: -112px -112px; }
.iconsweets-cabinet { background-position: -144px -112px; }
.iconsweets-bandaid { background-position: -176px -112px; }
.iconsweets-postcard { background-position: -208px -112px; }
.iconsweets-alert { background-position: -240px -112px; }
.iconsweets-alert2 { background-position: -272px -112px; }
.iconsweets-alarm { background-position: -304px -112px; }
.iconsweets-alarm2 { background-position: -16px -144px; }
.iconsweets-robot { background-position: -48px -144px; }
.iconsweets-globe { background-position: -80px -144px; }
.iconsweets-globe2 { background-position: -112px -144px; }
.iconsweets-chemical { background-position: -144px -144px; }
.iconsweets-lightbulb { background-position: -176px -144px; }
.iconsweets-cloud { background-position: -208px -144px; }
.iconsweets-cloud-upload { background-position: -240px -144px; }
.iconsweets-cloud-download { background-position: -272px -144px; }
.iconsweets-lamp { background-position: -304px -144px; }
.iconsweets-preview { background-position: -16px -176px; }
.iconsweets-icecream { background-position: -48px -176px; }
.iconsweets-icecream2 { background-position: -80px -176px; }
.iconsweets-paperclip { background-position: -112px -176px; }
.iconsweets-footprints { background-position: -144px -176px; }
.iconsweets-firefox { background-position: -176px -176px; }
.iconsweets-chrome { background-position: -208px -176px; }
.iconsweets-safari { background-position: -240px -176px; }
.iconsweets-loadingbar { background-position: -272px -176px; }
.iconsweets-bullseye { background-position: -304px -176px; }
.iconsweets-folder { background-position: -16px -208px; }
.iconsweets-locked { background-position: -48px -208px; }
.iconsweets-locked2 { background-position: -80px -208px; }
.iconsweets-unlock { background-position: -112px -208px; }
.iconsweets-tag { background-position: -144px -208px; }
.iconsweets-tag2 { background-position: -176px -208px; }
.iconsweets-mac { background-position: -208px -208px; }
.iconsweets-windows { background-position: -240px -208px; }
.iconsweets-linux { background-position: -272px -208px; }
.iconsweets-create { background-position: -304px -208px; }
.iconsweets-expose { background-position: -16px -240px; }
.iconsweets-key { background-position: -48px -240px; }
.iconsweets-key2 { background-position: -80px -240px; }
.iconsweets-table { background-position: -112px -240px; }
.iconsweets-chair { background-position: -144px -240px; }
.iconsweets-denied { background-position: -176px -240px; }
.iconsweets-ballons { background-position: -208px -240px; }
.iconsweets-cat { background-position: -240px -240px; }
.iconsweets-airplane { background-position: -272px -240px; }
.iconsweets-track { background-position: -304px -240px; }
.iconsweets-car { background-position: -16px -272px; }
.iconsweets-info { background-position: -48px -272px; }
.iconsweets-alarmclock { background-position: -80px -272px; }
.iconsweets-stopwatch { background-position: -112px -272px; }
.iconsweets-timer { background-position: -144px -272px; }
.iconsweets-clock { background-position: -176px -272px; }
.iconsweets-day { background-position: -208px -272px; }
.iconsweets-month { background-position: -240px -272px; }
.iconsweets-dress { background-position: -272px -272px; }
.iconsweets-tshirt { background-position: -304px -272px; }
.iconsweets-sportshirt { background-position: -16px -304px; }
.iconsweets-sweater { background-position: -48px -304px; }
.iconsweets-sleeveless { background-position: -80px -304px; }
.iconsweets-pants { background-position: -112px -304px; }
.iconsweets-socks { background-position: -144px -304px; }
.iconsweets-trolly { background-position: -176px -304px; }
.iconsweets-medical { background-position: -208px -304px; }
.iconsweets-suitcase { background-position: -240px -304px; }
.iconsweets-suitcase2 { background-position: -272px -304px; }
.iconsweets-suitcase3 { background-position: -304px -304px; }
.iconsweets-shoppingbag { background-position: -16px -336px; }
.iconsweets-purse { background-position: -48px -336px; }
.iconsweets-bag { background-position: -80px -336px; }
.iconsweets-paypal { background-position: -112px -336px; }
.iconsweets-paypal2 { background-position: -144px -336px; }
.iconsweets-paypal3 { background-position: -176px -336px; }
.iconsweets-money { background-position: -208px -336px; }
.iconsweets-money2 { background-position: -240px -336px; }
.iconsweets-pricetag { background-position: -272px -336px; }
.iconsweets-pricetags { background-position: -304px -336px; }
.iconsweets-piggybank { background-position: -16px -368px; }
.iconsweets-lemonade { background-position: -48px -368px; }
.iconsweets-basket { background-position: -80px -368px; }
.iconsweets-basket2 { background-position: -112px -368px; }
.iconsweets-scan { background-position: -144px -368px; }
.iconsweets-cart { background-position: -176px -368px; }
.iconsweets-cart2 { background-position: -208px -368px; }
.iconsweets-cart3 { background-position: -240px -368px; }
.iconsweets-cart4 { background-position: -272px -368px; }
.iconsweets-digg { background-position: -304px -368px; }
.iconsweets-digg2 { background-position: -16px -400px; }
.iconsweets-buzz { background-position: -48px -400px; }
.iconsweets-delicious { background-position: -80px -400px; }
.iconsweets-twitter { background-position: -112px -400px; }
.iconsweets-twitter2 { background-position: -144px -400px; }
.iconsweets-tumblr { background-position: -176px -400px; }
.iconsweets-plixi { background-position: -208px -400px; }
.iconsweets-dribbble { background-position: -240px -400px; }
.iconsweets-dribbble2 { background-position: -272px -400px; }
.iconsweets-stumbleupon { background-position: -304px -400px; }
.iconsweets-lastfm { background-position: -16px -432px; }
.iconsweets-mobypicture { background-position: -48px -432px; }
.iconsweets-youtube { background-position: -80px -432px; }
.iconsweets-youtube2 { background-position: -112px -432px; }
.iconsweets-vimeo { background-position: -144px -432px; }
.iconsweets-vimeo2 { background-position: -176px -432px; }
.iconsweets-skype { background-position: -208px -432px; }
.iconsweets-facebook { background-position: -240px -432px; }
.iconsweets-like { background-position: -272px -432px; }
.iconsweets-ichat { background-position: -304px -432px; }
.iconsweets-myspace { background-position: -16px -464px; }
.iconsweets-dropbox { background-position: -48px -464px; }
.iconsweets-walking { background-position: -80px -464px; }
.iconsweets-running { background-position: -112px -464px; }
.iconsweets-exit { background-position: -144px -464px; }
.iconsweets-male { background-position: -176px -464px; }
.iconsweets-female { background-position: -208px -464px; }
.iconsweets-user { background-position: -240px -464px; }
.iconsweets-users { background-position: -272px -464px; }
.iconsweets-admin { background-position: -304px -464px; }
.iconsweets-malesymbol { background-position: -16px -496px; }
.iconsweets-femalesymbol { background-position: -48px -496px; }
.iconsweets-user2 { background-position: -80px -496px; }
.iconsweets-users2 { background-position: -112px -496px; }
.iconsweets-admin2 { background-position: -144px -496px; }
.iconsweets-usercomment { background-position: -176px -496px; }
.iconsweets-cog { background-position: -208px -496px; }
.iconsweets-cog2 { background-position: -240px -496px; }
.iconsweets-cog3 { background-position: -272px -496px; }
.iconsweets-cog4 { background-position: -304px -496px; }
.iconsweets-settings { background-position: -16px -528px; }
.iconsweets-settings2 { background-position: -48px -528px; }
.iconsweets-hd { background-position: -80px -528px; }
.iconsweets-hd2 { background-position: -112px -528px; }
.iconsweets-hd3 { background-position: -144px -528px; }
.iconsweets-sd { background-position: -176px -528px; }
.iconsweets-sd2 { background-position: -208px -528px; }
.iconsweets-sd3 { background-position: -240px -528px; }
.iconsweets-dvd { background-position: -272px -528px; }
.iconsweets-blueray { background-position: -304px -528px; }
.iconsweets-record { background-position: -16px -560px; }
.iconsweets-cd { background-position: -48px -560px; }
.iconsweets-cassette { background-position: -80px -560px; }
.iconsweets-image { background-position: -112px -560px; }
.iconsweets-image2 { background-position: -144px -560px; }
.iconsweets-image3 { background-position: -176px -560px; }
.iconsweets-image4 { background-position: -208px -560px; }
.iconsweets-sound { background-position: -240px -560px; }
.iconsweets-megaphone { background-position: -272px -560px; }
.iconsweets-film { background-position: -304px -560px; }
.iconsweets-film2 { background-position: -16px -592px; }
.iconsweets-headphone { background-position: -48px -592px; }
.iconsweets-microphone { background-position: -80px -592px; }
.iconsweets-printer { background-position: -112px -592px; }
.iconsweets-radio { background-position: -144px -592px; }
.iconsweets-television { background-position: -176px -592px; }
.iconsweets-imac { background-position: -208px -592px; }
.iconsweets-laptop { background-position: -240px -592px; }
.iconsweets-mightymouse { background-position: -272px -592px; }
.iconsweets-magicmouse { background-position: -304px -592px; }
.iconsweets-mousewire { background-position: -16px -624px; }
.iconsweets-camera { background-position: -48px -624px; }
.iconsweets-camera2 { background-position: -80px -624px; }
.iconsweets-monitor { background-position: -112px -624px; }
.iconsweets-ipod { background-position: -144px -624px; }
.iconsweets-ipodnano { background-position: -176px -624px; }
.iconsweets-ipad { background-position: -208px -624px; }
.iconsweets-filmcamera { background-position: -240px -624px; }
.iconsweets-calculator { background-position: -272px -624px; }
.iconsweets-cashregister { background-position: -304px -624px; }
.iconsweets-fax { background-position: -16px -656px; }
.iconsweets-frames { background-position: -48px -656px; }
.iconsweets-coverflow { background-position: -80px -656px; }
.iconsweets-list { background-position: -112px -656px; }
.iconsweets-list2 { background-position: -144px -656px; }
.iconsweets-list3 { background-position: -176px -656px; }
.iconsweets-list4 { background-position: -208px -656px; }
.iconsweets-wordpress { background-position: -240px -656px; }
.iconsweets-wordpress2 { background-position: -272px -656px; }
.iconsweets-joomla { background-position: -304px -656px; }
.iconsweets-expressionengine { background-position: -16px -688px; }
.iconsweets-drupal { background-position: -48px -688px; }
.iconsweets-arrowright { background-position: -80px -688px; }
.iconsweets-arrowleft { background-position: -112px -688px; }
.iconsweets-arrowdown { background-position: -144px -688px; }
.iconsweets-arrowup { background-position: -176px -688px; }
.iconsweets-refresh { background-position: -208px -688px; }
.iconsweets-refresh2 { background-position: -240px -688px; }
.iconsweets-repeat { background-position: -272px -688px; }
.iconsweets-shuffle { background-position: -304px -688px; }
.iconsweets-refresh3 { background-position: -16px -720px; }
.iconsweets-refresh4 { background-position: -48px -720px; }
.iconsweets-recycle { background-position: -80px -720px; }
.iconsweets-fullscreen { background-position: -112px -720px; }
.iconsweets-fitscreen { background-position: -144px -720px; }
.iconsweets-origscreen { background-position: -176px -720px; }
.iconsweets-bluetooth { background-position: -208px -720px; }
.iconsweets-bluetooth2 { background-position: -240px -720px; }
.iconsweets-wifi { background-position: -272px -720px; }
.iconsweets-wifi2 { background-position: -304px -720px; }
.iconsweets-iphone3 { background-position: -16px -752px; }
.iconsweets-iphone4 { background-position: -48px -752px; }
.iconsweets-blackberry { background-position: -80px -752px; }
.iconsweets-android { background-position: -112px -752px; }
.iconsweets-mobile { background-position: -144px -752px; }
.iconsweets-inbox { background-position: -176px -752px; }
.iconsweets-outgoing { background-position: -208px -752px; }
.iconsweets-incoming { background-position: -240px -752px; }
.iconsweets-speech { background-position: -272px -752px; }
.iconsweets-speech2 { background-position: -304px -752px; }
.iconsweets-speech3 { background-position: -16px -784px; }
.iconsweets-speech4 { background-position: -48px -784px; }
.iconsweets-phone { background-position: -80px -784px; }
.iconsweets-phone2 { background-position: -112px -784px; }
.iconsweets-battery { background-position: -144px -784px; }
.iconsweets-battery2 { background-position: -176px -784px; }
.iconsweets-battery3 { background-position: -208px -784px; }
.iconsweets-battery4 { background-position: -240px -784px; }
.iconsweets-batteryfull { background-position: -272px -784px; }
.iconsweets-power { background-position: -304px -784px; }
.iconsweets-electric { background-position: -16px -816px; }
.iconsweets-plug { background-position: -48px -816px; }
.iconsweets-brush { background-position: -80px -816px; }
.iconsweets-brush2 { background-position: -112px -816px; }
.iconsweets-pen { background-position: -144px -816px; }
.iconsweets-bigbrush { background-position: -176px -816px; }
.iconsweets-pencil { background-position: -208px -816px; }
.iconsweets-clipboard { background-position: -240px -816px; }
.iconsweets-scissor { background-position: -272px -816px; }
.iconsweets-eyedrop { background-position: -304px -816px; }
.iconsweets-abacus { background-position: -16px -848px; }
.iconsweets-ruler { background-position: -48px -848px; }
.iconsweets-ruler2 { background-position: -80px -848px; }
.iconsweets-map { background-position: -112px -848px; }
.iconsweets-maps { background-position: -144px -848px; }
.iconsweets-post { background-position: -176px -848px; }
.iconsweets-marker { background-position: -208px -848px; }
.iconsweets-document { background-position: -240px -848px; }
.iconsweets-documents { background-position: -272px -848px; }
.iconsweets-pdf { background-position: -304px -848px; }
.iconsweets-pdf2 { background-position: -16px -880px; }
.iconsweets-word { background-position: -48px -880px; }
.iconsweets-word2 { background-position: -80px -880px; }
.iconsweets-word3 { background-position: -112px -880px; }
.iconsweets-zip { background-position: -144px -880px; }
.iconsweets-zip2 { background-position: -176px -880px; }
.iconsweets-ppt { background-position: -208px -880px; }
.iconsweets-ppt2 { background-position: -240px -880px; }
.iconsweets-excel { background-position: -272px -880px; }
.iconsweets-excel2 { background-position: -304px -880px; }
.iconsweets-vcard { background-position: -16px -912px; }
.iconsweets-vcard2 { background-position: -48px -912px; }
.iconsweets-address { background-position: -80px -912px; }
.iconsweets-chart { background-position: -112px -912px; }
.iconsweets-chart2 { background-position: -144px -912px; }
.iconsweets-chart3 { background-position: -176px -912px; }
.iconsweets-chart4 { background-position: -208px -912px; }
.iconsweets-chart5 { background-position: -240px -912px; }
.iconsweets-chart6 { background-position: -272px -912px; }
.iconsweets-chart7 { background-position: -304px -912px; }
.iconsweets-chart8 { background-position: -16px -944px; }

.glyphicons { list-style: none;}
.glyphicons li { float: left; line-height: 25px; width: 25%; }

.fontawesomeicons ul { list-style: none; }
.fontawesomeicons ul li { line-height: 25px; }

.iconsweetslist { list-style: none; }
.iconsweetslist li { float: left; line-height: 26px; width: 25%; }


/***** WIZARD STYLES *****/
/*************************/

.wizard .hormenu { list-style: none; clear: both; margin-bottom: 75px; }
.wizard .hormenu li { float: left; width: 33.333%; }
.wizard .hormenu li a { display: block; padding: 10px; border: 1px solid #bbb; border-left: 0; }
.wizard .hormenu li:first-child a { border-left: 1px solid #bbb; }
.wizard .hormenu li a:hover { text-decoration: none; }
.wizard .hormenu li a span.h2 { font-size: 16px; color: #999; display: block; margin-bottom: 5px; }
.wizard .hormenu li span.label { display: block; color: #999; background: none; text-shadow: none; padding: 0; font-size: 12px; }
.wizard .hormenu li a span.dot span { width: 20px; height: 20px; display: inline-block; background: url(../../img/admin/steps.png) no-repeat 0 -40px; }
.wizard .hormenu li:first-child a span.dot { margin-left: 47%; text-align: left; }
.wizard .hormenu li:last-child a span.dot { margin-right: 47%; text-align: right; }
.wizard .hormenu li a.done { background: #fcfcfc; }
.wizard .hormenu li a.done span.label { color: #666; }
.wizard .hormenu li a.done span.h2 { color: #235688; }
.wizard .hormenu li a.done span.dot span { background-position: 0 -20px; }
.wizard .hormenu li:first-child a.done span.dot span { background-position: 0 0; }
.wizard .hormenu li a.selected { background: #fcfcfc; }
.wizard .hormenu li a.selected span.dot span { background-position: 0 -120px; }
.wizard .hormenu li:first-child a.selected span.dot span { background-position: 0 -100px; }
.wizard .hormenu li a.selected span.label { color: #666; }
.wizard .hormenu li a.selected span.h2 { color: #235688; }

.stepContainer { 
	background: #fcfcfc; width: auto !important; height: auto !important; border: 1px solid #bbb; 
	box-shadow: 0 0 5px rgba(0,0,0,0.15);
}
.stepContainer .content h4 { border: 0; border-bottom: 1px solid #bbb; }
.stepContainer p { margin: 20px 0; }
.stepContainer .par p { margin: 10px 0; line-height: 21px; }
.stepContainer .par p:last-child { border-bottom: 0; }
.actionBar { 
	padding: 15px 0; position: relative; overflow: hidden; clear: both; 
}
.actionBar .loader { float: left; display: none; }
.actionBar a { 
	float: right; display: inline-block; padding: 5px 15px; background: #3B6998; color: #fff; 
	margin-left: 5px; font-weight: bold; border: 1px solid #45729E;
}
.actionBar a:hover { text-decoration: none; background: #45729E; color: #fff; border-color: #45729E; }
.actionBar a:active { 
	-moz-box-shadow: inset 1px 1px 2px rgba(0, 0, 0, 0.3); -webkit-box-shadow: inset 1px 1px 2px rgba(0, 0, 0, 0.3); 
	box-shadow: inset 1px 1px 2px rgba(0, 0, 0, 0.3);
}
.actionBar a.buttonDisabled { background: #eee; border: 1px solid #ccc; color: #999; }
.actionBar a.buttonDisabled:hover { background: #eee; color: #999; cursor: default; }
.actionBar a.buttonDisabled:active { -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none; }
.actionBar .msgBox { margin: 40px 0 10px 0; position: relative; }
.actionBar .msgBox .content { padding: 7px 10px; background: #fffccc; color: #333; border: 1px solid #FEEA7A; }
.actionBar .msgBox .close { 
	padding: 0 2px 2px 2px; background: none; line-height: 10px; text-transform: lowercase; font-size: 10px; position: absolute; top: 5px; right: 7px; 
	color: #333; text-shadow: none; font-weight: bold; -moz-border-radius: 1px; -webkit-border-radius: 1px; border-radius: 1px; 
}
.actionBar .msgBox .close:hover { background: #333; color: #eee; }


/***** TABBED WIZARD *****/
.tabbedwizard .stepContainer { padding: 30px; }
.tabbedwizard .stepContainer h4 { font-size: 12px; font-weight: bold; border-bottom: 1px solid #ddd; color:#666; }

.wizard .tabbedmenu { list-style: none; background: #f7f7f7; padding: 10px; padding-bottom: 0; border: 1px solid #bbb; border-bottom: 0; }
.wizard .tabbedmenu li { display: inline-block; margin-right: 5px; position: relative; bottom: -1px; }
.wizard .tabbedmenu li a { display: block; padding: 10px 20px; color: #999; border: 1px solid #ddd; background: #eee; }
.wizard .tabbedmenu li a { -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; border-color: #bbb; }
.wizard .tabbedmenu li a span { text-shadow: none; padding: 0; background: none; color: #999; font-size: 12px; }
.wizard .tabbedmenu li a span.h2 { color: #999; display: block; font-size: 18px; font-weight: normal; }
.wizard .tabbedmenu li a:hover { text-decoration: none; }
.wizard .tabbedmenu li a.selected, .wizard .tabbedmenu li a.done { background: #fcfcfc; color: #333; border-bottom: 1px solid #fcfcfc; }
.wizard .tabbedmenu li a.selected span.h2, .wizard .tabbedmenu li a.selected span { color: #235688; }
.wizard .tabbedmenu li a.done span.h2, .wizard .tabbedmenu li a.done span { color: #235688; }


/***** VERTICAL WIZARD *****/
.verwizard .verticalmenu { list-style: none; float: left; width: 250px; }
.verwizard .verticalmenu li { margin-bottom: 2px; }
.verwizard .verticalmenu a { display: block; padding: 10px; color: #666; background: #f7f7f7; }
.verwizard .verticalmenu a:hover { text-decoration: none; }
.verwizard .verticalmenu a span { color: #666; background: none; text-shadow: none; font-size: 12px; }
.verwizard .verticalmenu a.selected { background: #235688; color: #fff; }
.verwizard .verticalmenu a.selected span { color: #fff; }
.verwizard .verticalmenu a.done { background: #999; color: #fff; }
.verwizard .stepContainer { margin-left: 280px; border: 0; }
.verwizard .stepContainer .content h4 { font-size: 12px; border-bottom: 1px solid #ddd; font-weight: bold; color: #666; }
.verwizard .actionBar { margin: 0 0 0 280px; border-top: 1px solid #ddd; }


/***** MESSAGES *****/
/********************/

.mailinbox tbody tr td { background: #fafafa; }
.mailinbox tbody tr.unread td { background: #fff; font-weight: bold; }
.mailinbox tbody tr.selected td { background: #fcfee4; }
.mailinbox thead th, .mailinbox tfoot th { border: 1px solid #ccc; border-right: 0; }
.mailinbox tfoot th { border-bottom: 1px solid #ccc !important; }
.mailinbox a.title { font-weight: normal; }
.mailinbox tbody tr.unread a.title { font-weight: bold; }
.mailinbox td.star, .mailinbox td.attachment { text-align: center; }
.msgstar { 
	display: inline-block; width: 16px; height: 16px; background: url(../../img/admin/unstar.png) no-repeat 0 0; 
	cursor: pointer; opacity: 0.5; 
}
.msgstar:hover { opacity: 1; }
.starred { background-image: url(../../img/admin/star.png); opacity: 1; }

.msghead { padding-bottom: 20px; }
 
.msghead_menu { list-style: none; position: relative; margin: 10px 0 !important; }
.msghead_menu > li { display: inline-block; float: left; }
.msghead_menu > li:first-child { padding-left: 0; }
.msghead_menu li.right { float: right; }
.msghead_menu .pageinfo { padding-right: 20px; display: block; margin-top: 5px; }


/***** CHAT STYLES *****/
/***********************/

.chatcontent .messagebox { background: #f7f7f7; border: 1px solid #ddd; border-top: 0; padding: 10px; position: relative; clear: both; }
.chatcontent .messagebox .inputbox { display: block; margin-right: 70px}
.chatcontent .messagebox input { padding: 5px 10px; }
.chatcontent .messagebox button.send { position: absolute; top: 10px; right: 10px; padding: 6px 15px 7px 15px; }
.chatmessage { height: 425px; border: 1px solid #ddd; background: #fdfdfd; overflow: auto; position: relative; }

#chatmessageinner p img { display: inline-block; vertical-align: middle; float: left; }
#chatmessageinner p { padding: 10px; margin: 0; }
#chatmessageinner .msgblock { 
	background: #fff; margin-left: 40px; padding: 10px; border: 1px solid #ddd; display: block; -moz-box-shadow: 1px 1px 2px rgba(0,0,0,0.05);
	-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,0.05); box-shadow: 1px 1px 2px rgba(0,0,0,0.05);
}
#chatmessageinner .time { font-size: 11px; color: #999; font-style: italic; }
#chatmessageinner .msg { margin-top: 10px; display: block; }

#chatmessageinner p.reply img { display: inline-block; vertical-align: middle; float: right; }
#chatmessageinner p.reply .msgblock { margin: 0 40px 0 0; }


/***** MEDIA STYLES *****/
/************************/

.mediamgr { position: relative; min-height: 400px; }
.mediamgr .mediamgr_right { position: absolute; width: 250px; top: 62px; right: 0; }
.mediamgr .mediamgr_rightinner { margin: 20px 0; padding-left: 20px; }
.mediamgr .mediamgr_rightinner h4 { 
	font-size: 12px; text-transform: uppercase; padding: 2px 10px; border: 1px solid #bbb; color: #666; margin-bottom: 5px; }

.mediamgr_head { padding: 10px; background: #fcfcfc; border: 1px solid #bbb; overflow: visible; margin-bottom: 20px; }
 
.mediamgr_menu { list-style: none; position: relative; overflow: hidden; }
.mediamgr_menu li { display: inline-block; float: left; }
.mediamgr_menu li.right { float: right; }
.mediamgr_menu li a { -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; font-weight: bold; }
.mediamgr_menu li a:hover { cursor: pointer; text-decoration: none; }
.mediamgr_menu li a.prev { border-right: 0; -moz-border-radius: 2px 0 0 2px; -webkit-border-radius: 2px 0 0 2px; border-radius: 2px 0 0 2px; }
.mediamgr_menu li a.prev_disabled { opacity: 0.6; }
.mediamgr_menu li a.next { -moz-border-radius: 0 2px 2px 0; -webkit-border-radius: 0 2px 2px 0; border-radius: 0 2px 2px 0; }
.mediamgr_menu li a.preview_disabled { opacity: 0.6; }
.mediamgr_menu form input.filekeyword { padding: 5px 7px; width: 200px; background: #fff; color: #999; font-style: italic; }
.mediamgr_content { padding: 20px 0; margin-right: 250px; }
.mediamgr_category { padding: 10px 0; border-bottom: 1px dashed #ddd; margin-right: 270px; }
.mediamgr_category ul { list-style: none; }
.mediamgr_category ul li { display: inline-block; margin-right: 5px; }
.mediamgr_category ul li.right { float: right; }
.mediamgr_category ul li a { display: block; padding: 3px 10px; font-weight: bold; }
.mediamgr_category ul li a:hover, .mediamgr_category ul li.current a { 
	background: #eee; -moz-box-shadow: inset 1px 1px 1px #ccc; -webkit-box-shadow: inset 1px 1px 1px #ccc; 
	box-shadow: inset 1px 1px 1px #ccc; text-decoration: none;
}
.mediamgr_category ul li .pagenuminfo { display: inline-block; margin-top: 5px; }
.mediamgr_menu li a.newfilebutton { 
	display: block; padding: 4px 10px 5px 10px; text-align: center; border: 1px solid #F0882C; background: #FB9337; color: #fff;
	font-weight: bold; font-size: 12px; -moz-box-shadow: inset 0 1px 0 rgba(250,250,250,0.3);
	-webkit-box-shadow: inset 0 1px 0 rgba(250,250,250,0.3); box-shadow: inset 0 1px 0 rgba(250,250,250,0.3);
}
.mediamgr_menu li a.newfilebutton:hover { background: #485B79; border: 1px solid #3f526f; }

.menuright { list-style: none; }
.menuright li { display: block; margin-bottom: 1px; }
.menuright li a { display: block; padding: 5px 10px; color: #666; }
.menuright li a:hover { background: #ddd; text-decoration: none; }
.menuright li.current a { background: #999; color: #fff; }

.listfile { list-style: none; }
.listfile li { display: inline-block; margin: 5px 10px 5px 0; border: 1px solid #ddd; padding: 10px; background: #fcfcfc; }
.listfile li:hover { border-color: #bbb; }
.listfile li a { display: block; }
.listfile li a:hover { cursor: pointer; }
.listfile li span.filename { display: block; margin-top: 5px; font-size: 11px; text-align: center; }
.listfile li.selected { border-color: #3493f5; background: #eaf3fd; }

.mediaWrapper { padding: 5px; width: 700px; min-height: 350px; }
.mediaWrapper p { margin: 10px 0; }
.mediaWrapper p:first-child { margin-top: 0; }

.imgpreview { width: 249px; max-width: none; height: 187px; }
.imginfo { background: #eee; padding: 10px 20px 10px 10px; border: 1px solid #ddd; }
.imgdetails label { display: block; margin-bottom: 2px; }
.imgdetails input, .imgdetails textarea { padding: 7px 5px; border: 1px solid #bbb; background: #fcfcfc; }


/***** EDIT PROFILE *****/
/************************/

.profile-left .taglist { list-style: none; }
.profile-left .taglist li { display: block; margin-bottom: 1px; }
.profile-left .taglist li a { color: #666; display: block; padding: 5px 10px; background: #eee; position: relative; }
.profile-left .taglist li a:hover { text-decoration: none; background: #ddd; }
.profile-left .taglist li a span { position: absolute; top: 8px; right: 10px; opacity: 0.3; }

.profilethumb { display: inline-block; position: relative; overflow: hidden; margin-bottom: 20px; }
.profilethumb a { display: none; font-size: 11px; position: absolute; top: 5px; right: 5px; padding: 2px 7px; background: #333; color: #fff; }
.profilethumb a:hover { text-decoration: none; background: #444; }

.editprofileform label { float: left; width: 100px; padding-top: 5px; }
.editprofileform input[type=checkbox] { margin: 0; margin-right: 10px; vertical-align: middle; }

.profile-left h4, .editprofileform h4 { 
	font-size: 12px; text-transform: uppercase; color: #999; padding-bottom: 2px; border-bottom: 1px solid #ddd; 
	margin-bottom: 20px; font-weight: bold; 
}
.editprofileform p { margin: 20px 0; }

/***** INVOICE STYLES *****/
/**************************/

.invoice_logo { margin-bottom: 30px; }
.table-invoice, .table-invoice-full { border-color: #ddd; }
.table-invoice tr td, .table-invoice-full tr td { border-color: #ddd; }
.table-invoice tr td:first-child { background: #eee; font-weight: bold; }
.table-invoice tr td:last-child { background: #fff; }
.table-invoice-full tr td { background: #f7f7f7; }
.table-invoice-full th.right, .table-invoice-full td.right { text-align: right; }
.invoice-table { width: 100%; border: 0; margin-top: 15px; }
.invoice-table tr td { line-height: 26px; border: 0; }
.invoice-table td.right { text-align: right; }

.amountdue { text-align: right; }
.amountdue h1 { 
	text-align: center; line-height: normal; border: 1px solid #ddd; background: #fcfcfc; 
	display: inline-block; padding: 10px 30px; width: 200px;
}
.amountdue h1 span { display: block; font-size: 12px; text-transform: uppercase; color: #666; }
.amountdue .btn { margin-top: 15px; width: 222px; }

.msg-invoice { padding: 0 !important; }
.msg-invoice h4 { font-size: 12px; text-transform: uppercase; font-weight: bold; }
.msg-invoice p { font-size: 11px; line-height: 18px; }


/***** SEARCH RESULTS LIST *****/
/*******************************/

.resultslist { list-style: none; margin: 10px; }
.resultslist li { display: block; margin-top: 20px; }
.resultslist li:first-child { margin-top: 0; }
.resultslist h3 { font-weight: normal; margin: 0; }
.resultslist .link { display: block; color: #999; }
.resultslist .link:hover { text-decoration: none; color: #666; }

.sidebarlabel { margin-bottom: 5px; }


/***** FAQ STYLES *****/
/*********************/

.faq h3 { font-size: 16px; font-weight: normal; line-height: 22px; }
.faq h3 i { vertical-align: middle; }


/***** FOOTER STYLES *****/
/*************************/


.footer { position: absolute; bottom: 0; left: 0; font-size: 11px; background: #333; color: #999; width: 100%; }
.footer a { color: #bbb; }
.footer .footerleft { padding: 10px 15px; width: 230px; float: left; background: #222; min-height: 20px; border-right: 1px solid #3c3c3c; }
.footer .footerright { padding: 10px 15px; margin-left: 260px; text-align: right; }

/***** USING ROBOTO FONT *****/
/****************************/

h1,h2,h3, .logopanel h1, h3.widgettitle,
.wizard .tabbedmenu li a span.h2,
.mediamgr .mediamgr_rightinner h4,
.fc-header-title h2, .widgeticons li a span, .logintitle { font-family: 'RobotoBold', 'HelveticaNeue', Arial, sans-serif; }

.pagetitle h1, .pagination-large li, .alert h4, .loginwrapper input { font-family: 'RobotoRegular', 'HelveticaNeue', Arial, sans-serif; }

/* Reset */
.ui-accordion-header { font-family: 'HelveticaNeue', Arial, Helvetica, sans-serif; }


/***** BORDER RADIUS *****/
/*************************/

.showmenu, .notification .dropdown-toggle, .progress, .tooltip-inner,
.userinfo .dropdown-toggle, .dropdown-menu, .label, .progress .bar,
.btn-group > .btn:first-child, .btn-group > .btn:last-child, 
.btn-group > .dropdown-toggle, .nav-pills > li > a, .modal, .popover,
.navbar-inverse .navbar-inner, .pager li > a, .pager li > span,
.verwizard .verticalmenu a, .chatcontent .messagebox button.send,
.mediamgr_category ul li a, .profile-left .taglist li, .tooltipflot,
.loginwrapper button.btn { -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px;}

/* Reset Border Radius */
.searchwidget input.search-query, .searchwidget .input-append .btn,
.plainwidget .progress, .leftmenu .nav-tabs > li:first-child > a, 
.table-bordered, pre, .btn, .sortlist > li div.label, .popover-title,
.nav-tabs > li > a, .nav-tabs.nav-stacked > li:first-child > a,
.nav-tabs.nav-stacked > li:last-child > a, .breadcrumb, .alert,
.tabs-below > .nav-tabs > li > a, .tabs-right > .nav-tabs > li > a,
.tabs-left > .nav-tabs > li > a, .navbar-inner, .navbar-search .search-query,
.pagination ul, .pagination ul > li:first-child > a, .pagination ul > li:first-child > span,
.pagination ul > li:last-child > a, .pagination ul > li:last-child > span,
.table-invoice tr td { 
	-moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0; 
}


/***** BOX SHADOW *****/
/**********************/

/* Inset White */
/* Opacity: 0.3 */
.leftmenu .nav-tabs li a, .widgettitle, .ui-accordion-header,
.pargroup .par, .mediamgr .mediamgr_rightinner h4, .logintitle { 
	-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.3); 
	-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.3); 
	box-shadow: inset 0 1px 0 rgba(255,255,255,0.3);
}
/* Opacity: 0.2 */
.ctitle { 
	-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2); 
	-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2); 
	box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
}

.accordion2.ui-accordion .ui-accordion-header {
	-moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.1); 
	-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.1); 
	box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
}

.alert {
	-moz-box-shadow: 0 1px 0 rgba(255,255,255,0.1), inset 0 1px 0 rgba(255,255,255,0.1);
	-webkit-box-shadow: 0 1px 0 rgba(255,255,255,0.1), inset 0 1px 0 rgba(255,255,255,0.1);
	box-shadow: 0 1px 0 rgba(255,255,255,0.75), inset 0 1px 0 rgba(255,255,255,0.2);
}

/* Inset Black */
.leftmenu .nav-tabs ul, .showhide:hover {
	-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);	
	box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);	
}

/* Shadows an element #000 */
.shadowed, .listfile li:hover,
.widgeticons li a { 
	-moz-box-shadow: 1px 1px 2px rgba(0,0,0,0.1); 
	-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,0.1); 
	box-shadow: 1px 1px 2px rgba(0,0,0,0.1);
}

form input, form textarea, form select { 
	-moz-box-shadow: 0 1px 0 rgba(255,255,255,1); 
	-webkit-box-shadow: 0 1px 0 rgba(255,255,255,1); 
	box-shadow: 0 1px 0 rgba(255,255,255,1);
}

/* Reset to no shadow */
.leftmenu .nav-tabs ul li a, .navbar .nav > .active > a, 
.navbar .nav > .active > a:hover, .navbar .nav > .active > a:focus,
.verwizard .stepContainer {
	-moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;	
}



/***** GRADIENT BACKGROUNDS *****/
/********************************/

.pagetitle, .leftmenu .nav-tabs li, .widgettitle, 
.ui-accordion-header, .ui-datepicker-header, #popup_title,
.sortlist > li div.label, .dataTables_paginate .paginate_button,
.dataTables_paginate .paginate_button_disabled:hover,
.nav-tabs.nav-stacked > li > a, .tabbable .nav-tabs,
.nav-list li.nav-header, .tabs-right .nav-tabs li a,
.tabs-left .nav-tabs li a, .breadcrumb, .animatesample li,
.pagination ul > li > a, .pagination ul > li > span,
.pager li > a, .pager li > span, .popover-title, 
.actionBar a.buttonDisabled, .actionBar a.buttonDisabled:hover,
.wizard .hormenu li a, .wizard .tabbedmenu,
.mailinbox thead th, .mailinbox tfoot th, .mediamgr_head,
.mediamgr .mediamgr_rightinner h4, .logintitle {
	background: rgb(237,237,237);
	background: -moz-linear-gradient(top, rgba(237,237,237,1) 0%, rgba(222,222,222,1) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(237,237,237,1)), color-stop(100%,rgba(222,222,222,1)));
	background: -webkit-linear-gradient(top, rgba(237,237,237,1) 0%,rgba(222,222,222,1) 100%);
	background: -o-linear-gradient(top, rgba(237,237,237,1) 0%,rgba(222,222,222,1) 100%);
	background: -ms-linear-gradient(top, rgba(237,237,237,1) 0%,rgba(222,222,222,1) 100%);
	background: linear-gradient(to bottom, rgba(237,237,237,1) 0%,rgba(222,222,222,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#dedede',GradientType=0 );
}

.leftmenu .nav-tabs.nav-stacked > li.active > a, .breadcrumb,
.leftmenu .nav-tabs ul li, .leftmenu .nav-tabs > .dropdown > a,
.ctitle, .accordion2.ui-accordion .ui-state-active a, .tabs2.ui-tabs .ui-tabs-nav,
.accordion2.ui-accordion .ui-accordion-header {
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}


/***** TRANSITIONS *****/
/***********************/

.leftmenu a, .ui-tabs-nav li a, .ui-accordion-header a,
.showhide, .dropdown-menu li a, .ui-slider-handle, .listfile li,
.nav.nav-list > li > a, .nav-pills > li > a, .navbar .nav > li > a,
.pagination ul > li > a, .pagination ul > li > span, .pager li > a,
.menuright li a, .profile-left .taglist li a, .widgeticons li a,
.loginwrapper input, .loginwrapper a { 
	-moz-transition: all 0.2s ease-out 0s; -webkit-transition: all 0.2s ease-out 0s; transition: all 0.2s ease-out 0s; 
}


/***** USING PRIMARY COLOR (#3b6998) *****/
/*****************************************/

.headerpanel  { background-color: #3b6998; position: relative; z-index: 100; }
.ctitle, .accordion2.ui-accordion .ui-state-active a,
.tabs2.ui-tabs .ui-tabs-nav { background: #3b6998 !important; }

.ctitle, .accordion2.ui-accordion .ui-state-active { border-color: #3b6998 !important; }

/***** USING SECONDARY COLOR (#235688) *****/
/*******************************************/

.logopanel, .ui-datepicker-calendar td.ui-datepicker-today a,
.tabs2.ui-tabs .ui-tabs-nav li a { background-color: #235688; }
.notification .dropdown-menu a:hover { border-color: #235688; }


/***** OVERRIDE BOOTSTRAP STYLES *****/
/*************************************/

[class^="icon-"], [class*=" icon-"] { margin-top: 0; }

pre.prettyprint, .accordion { margin-bottom: 0; }
dl { margin-bottom: 15px; }
.input-block-level { min-height: 37px; }
table td.center, table th.center { text-align: center; }

.btn { font-size: 12px; font-weight: bold; }
.btn-small { font-weight: normal; }
.btn-mini { font-size: 11px; font-weight: normal; }
.btn:focus { outline: none; }
.btn .caret { margin-left: 7px; }
.btn-group > .btn + .dropdown-toggle .caret { margin-left: 0; }
.btn-group > .btn, .btn-group > .dropdown-menu { font-size: 12px; }
.btn-circle { -moz-border-radius: 50px; -webkit-border-radius: 50px; border-radius: 50px; padding: 5px 8px; }
.btn-rounded { -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; }

.nav-tabs { border-color: #bbb; }
.nav-tabs > li > a:hover { border-color: #bbb #bbb #eee; }
.nav-tabs > .active > a, .nav-tabs > .active > a:hover { border-color: #bbb #bbb transparent; }
.nav-pills > li > a { font-weight: bold; }
.nav-pills > li > a:hover { background-color: #bbb; color: #fff; }
.nav-tabs.nav-stacked > li > a { border-color: #ccc; }
.nav-tabs.nav-stacked > li.active > a { background: #fff; }
.nav-tabs.nav-stacked > li > a:hover { border-color: #bbb; }

.nav-list { background: #fff; border: 1px solid #bbb; }
.nav-list li.nav-header { border-bottom: 1px solid #bbb; border-top: 1px solid #bbb; margin-bottom: 2px; margin-top: 2px; }
.nav-list li:first-child.nav-header { border-top: 0; margin-top: 0; }
.nav-list li:last-child { margin-bottom: 10px; }
.nav.nav-list > li > a { color: #666; }
.nav.nav-list > li.active > a { color: #fff; }

.tab-content { overflow: inherit; }
.tab-content > .tab-pane, .pill-content > .pill-pane { padding: 15px; border: 1px solid #bbb; background: #fff; }
.tabs-below .tab-content > .tab-pane, .pill-content > .pill-pane { border-bottom: 0; }

.tabbable > .nav-tabs { border: 1px solid #bbb; padding: 5px 5px 0 2px; margin: 0; }
.tabbable > .nav-tabs > li > a { 
	margin-left: 3px; -moz-border-radius: 2px 2px 0 0; -webkit-border-radius: 2px 2px 0 0; border-radius: 2px 2px 0 0;
}
.tabbable > .tab-content { margin-top: -1px; }

.tabs-below .nav-tabs { margin: 0; padding: 0; }
.tabs-below > .nav-tabs > li > a {
	-moz-border-radius: 0 0 2px 2px; -webkit-border-radius: 0 0 2px 2px; border-radius: 0 0 2px 2px; color: #666;
}
.tabs-below > .nav-tabs > li > a:hover { background: #eee; border-color: #bbb; }
.tabs-below > .nav-tabs > .active > a, .tabs-below > .nav-tabs > .active > a:hover { background: #fff; 	border-color: transparent #bbb #bbb; }
.tabs-below > .nav-tabs { border: 1px solid #bbb; padding: 0 5px 5px 5px; }

.tabs-right { border: 1px solid #bbb; background: #fff; }
.tabs-right .nav-tabs { margin: 0 0 0 5px; background: none; border: 0; padding: 0; }
.tabs-right .tab-content > .tab-pane { border: 0; background: none; }
.tabs-right .nav-tabs > li { display: block; margin-bottom: 0; border: 0; }
.tabs-right .nav-tabs li a { 
	border: 0; border: 1px solid #bbb; border-bottom: 0; border-right: 0; margin: 0; display: block; color: #666; 
	-moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0;
} 
.tabs-right .nav-tabs li a:hover { border: 1px solid #bbb; border-bottom: 0; border-right: 0; background: #eee; }
.tabs-right .nav-tabs li.active a, .tabs-right .nav-tabs li.active a:hover { 
	border: 0; border-top: 1px solid #bbb; border-left: 1px solid #fff; background: #fff; 
}
.tabs-right .nav-tabs li.active a:hover { border: 0; border-top: 1px solid #bbb; border-left: 1px solid #fff; }
.tabs-right .nav-tabs li:first-child a { border-top: 0; }
.tabs-right .nav-tabs li:first-child.active a { border-top: 0; }

.tabs-left { border: 1px solid #bbb; background: #fff; }
.tabs-left .nav-tabs { margin: 0 5px 0 0; background: none; border: 0; padding: 0; }
.tabs-left .tab-content { margin: 0; }
.tabs-left .tab-content > .tab-pane { border: 0; background: none; }
.tabs-left .nav-tabs > li { display: block; margin-bottom: 0; border: 0; }
.tabs-left .nav-tabs li a { 
	border: 0; border: 1px solid #bbb; border-bottom: 0; border-left: 0; margin: 0; display: block; color: #666; 
	-moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0;
} 
.tabs-left .nav-tabs li a:hover { border: 1px solid #bbb; border-bottom: 0; border-left: 0; background: #eee; }
.tabs-left .nav-tabs li.active a, .tabs-left .nav-tabs li.active a:hover { border: 0; border-top: 1px solid #bbb; background: #fff; }
.tabs-left .nav-tabs li.active a:hover { border: 0; border-top: 1px solid #bbb; }
.tabs-left .nav-tabs li:first-child a { border-top: 0; }
.tabs-left .nav-tabs li:first-child.active a { border-top: 0; }

.navbar { margin-bottom: 15px; }
.navbar-inner { border-color: #bbb; }
.navbar .brand { font-size: 16px; font-weight: bold; }
.navbar .nav > li { border-left: 1px solid #bbb; }
.navbar .nav > li:last-child { border-right: 1px solid #ccc; }
.navbar .nav > .active > a, .navbar .nav > .active > a:hover, .navbar .nav > .active > a:focus { background: #fff; }
.navbar .nav > li > a { padding: 11px 15px; font-weight: bold; } 
.navbar .nav > li > a:hover { background: #eee; }
.navbar .nav li.dropdown.open > .dropdown-toggle, 
.navbar .nav li.dropdown.active > .dropdown-toggle, 
.navbar .nav li.dropdown.open.active > .dropdown-toggle { background: #fff; }
.navbar .navbar-search.pull-right .search-query { margin-right: -15px; }
.navbar .navbar-search.pull-left .search-query { margin-left: -15px; }
.navbar .navbar-form.pull-right { margin-right: -15px; }
.navbar .navbar-form.pull-left { margin-left: -15px; }
.navbar .navbar-form input { width: 168px; }

.navbar-inverse .navbar-inner { background: #222; }
.navbar-inverse .nav > .active > a, .navbar-inverse .nav > .active > a:hover, .navbar-inverse .nav > .active > a:focus { background: #111; }
.navbar-inverse .nav > li, .navbar-inverse .nav > li:last-child { border-color: #373737; }
.navbar-inverse .nav > li > a:hover { background: #171717; }
.navbar-inverse .nav li.dropdown.open > .dropdown-toggle, 
.navbar-inverse .nav li.dropdown.active > .dropdown-toggle, 
.navbar-inverse .nav li.dropdown.open.active > .dropdown-toggle { background: #171717; }
 
.breadcrumb { border: 1px solid #bbb; font-size: 11px; padding: 5px 15px; }
.breadcrumb li.active { color: #666; }
.breadcrumb .divider { color: #999; }

.pagination { margin: 15px 0; }
.pagination ul > li > a, .pagination ul > li > span { border-color: #bbb; color: #666; }
.pagination ul > li > a:hover, .pagination ul > .active > a, .pagination ul > .active > span { background: #f7f7f7; }
.pagination ul > .disabled > span, .pagination ul > .disabled > a, .pagination ul > .disabled > a:hover { background: #e7e7e7; }

.pager { margin: 15px 0; }
.pager li > a { border-color: #bbb; color: #666; font-weight: bold; }
.pager li > a:hover { background: #f7f7f7; border-color: #ccc; }
.pager li > a span { font-size: 18px; }
.pager li.previous a span { margin-right: 5px; }
.pager li.next a span { margin-left: 5px; }
.pager .disabled > a, .pager .disabled > a:hover, .pager .disabled > span { background :#e7e7e7; border-color: #ccc; }

.label { padding: 3px 5px; font-size: 11px; font-weight: normal; }
.badge { font-size: 10px; -moz-border-radius: 50px; -webkit-border-radius: 50px; border-radius: 50px; line-height: 10px; padding: 3px 5px 2px 5px; }

.progress { height: 12px; background: #ddd; }

blockquote { 
	background: url(../../img/admin/blockquote.png) no-repeat 0 5px; font-family: 'PT Serif', Georgia, "Times New Roman", Times, serif; 
	font-style: italic; padding-left: 40px; 
}
blockquote p { margin: 0 !important; }
blockquote.pull-right { background-position: right 5px; padding: 0 40px 0 0; border-right: 0; }

.btn-default {
	background: #3b6998; color: #fff; text-shadow: 1px 1px rgba(0,0,0,0.1);
	background: -moz-linear-gradient(top,  #3b6998 0%, #0b4073 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#3b6998), color-stop(100%,#0b4073));
	background: -webkit-linear-gradient(top,  #3b6998 0%,#0b4073 100%);
	background: -o-linear-gradient(top,  #3b6998 0%,#0b4073 100%);
	background: -ms-linear-gradient(top,  #3b6998 0%,#0b4073 100%);
	background: linear-gradient(to bottom,  #3b6998 0%,#0b4073 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3b6998', endColorstr='#0b4073',GradientType=0 );
}
.btn-default:hover {
	background: #4e86b7; color: #fff; text-shadow: 1px 1px rgba(0,0,0,0.1);
	background: -moz-linear-gradient(top,  #4e86b7 0%, #035f9a 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#4e86b7), color-stop(100%,#035f9a));
	background: -webkit-linear-gradient(top,  #4e86b7 0%,#035f9a 100%);
	background: -o-linear-gradient(top,  #4e86b7 0%,#035f9a 100%);
	background: -ms-linear-gradient(top,  #4e86b7 0%,#035f9a 100%);
	background: linear-gradient(to bottom,  #4e86b7 0%,#035f9a 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4e86b7', endColorstr='#035f9a',GradientType=0 );
}

.alert { 
	border-color: #e4bf7f; color: #9c6c38; margin-bottom: 15px; 
	background: rgb(246,237,186);
	background: -moz-linear-gradient(top, rgba(246,237,186,1) 0%, rgba(245,224,168,1) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(246,237,186,1)), color-stop(100%,rgba(245,224,168,1)));
	background: -webkit-linear-gradient(top, rgba(246,237,186,1) 0%,rgba(245,224,168,1) 100%);
	background: -o-linear-gradient(top, rgba(246,237,186,1) 0%,rgba(245,224,168,1) 100%);
	background: -ms-linear-gradient(top, rgba(246,237,186,1) 0%,rgba(245,224,168,1) 100%);
	background: linear-gradient(to bottom, rgba(246,237,186,1) 0%,rgba(245,224,168,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f6edba', endColorstr='#f5e0a8',GradientType=0 );
}
.alert .close { top: 0; right: -23px; color: #937f0e; }
.alert h4 { color: #9c6c38; }

.alert-error {
	border-color: #e18d9a; color:#da5251; 
	background: rgb(246,216,216);
	background: -moz-linear-gradient(top,  rgba(246,216,216,1) 0%, rgba(245,197,197,1) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(246,216,216,1)), color-stop(100%,rgba(245,197,197,1)));
	background: -webkit-linear-gradient(top,  rgba(246,216,216,1) 0%,rgba(245,197,197,1) 100%);
	background: -o-linear-gradient(top,  rgba(246,216,216,1) 0%,rgba(245,197,197,1) 100%);
	background: -ms-linear-gradient(top,  rgba(246,216,216,1) 0%,rgba(245,197,197,1) 100%);
	background: linear-gradient(to bottom,  rgba(246,216,216,1) 0%,rgba(245,197,197,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f6d8d8', endColorstr='#f5c5c5',GradientType=0 );	
}
.alert-error .close, .alert-error h4 { color: #990000; }
.alert-success {
	border-color: #b4da95; color: #468847;
	background: rgb(223,240,216);
	background: -moz-linear-gradient(top,  rgba(223,240,216,1) 0%, rgba(208,242,195,1) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(223,240,216,1)), color-stop(100%,rgba(208,242,195,1)));
	background: -webkit-linear-gradient(top,  rgba(223,240,216,1) 0%,rgba(208,242,195,1) 100%);
	background: -o-linear-gradient(top,  rgba(223,240,216,1) 0%,rgba(208,242,195,1) 100%);
	background: -ms-linear-gradient(top,  rgba(223,240,216,1) 0%,rgba(208,242,195,1) 100%);
	background: linear-gradient(to bottom,  rgba(223,240,216,1) 0%,rgba(208,242,195,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dff0d8', endColorstr='#d0f2c3',GradientType=0 );
	
}
.alert-success .close, .alert-success h4 { color: #468847; }
.alert-info {
	border-color: #88c4e2; color: #3a87ad;
	background: rgb(217,237,247);
	background: -moz-linear-gradient(top,  rgba(217,237,247,1) 0%, rgba(186,230,252,1) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(217,237,247,1)), color-stop(100%,rgba(186,230,252,1)));
	background: -webkit-linear-gradient(top,  rgba(217,237,247,1) 0%,rgba(186,230,252,1) 100%);
	background: -o-linear-gradient(top,  rgba(217,237,247,1) 0%,rgba(186,230,252,1) 100%);
	background: -ms-linear-gradient(top,  rgba(217,237,247,1) 0%,rgba(186,230,252,1) 100%);
	background: linear-gradient(to bottom,  rgba(217,237,247,1) 0%,rgba(186,230,252,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d9edf7', endColorstr='#bae6fc',GradientType=0 );	
}
.alert-info .close, .alert-info h4 { color: #3a87ad; }

.popover { padding: 0; }
.popover-title { border-color: #bbb; }

textarea:focus, input[type="text"]:focus, input[type="password"]:focus, 
input[type="datetime"]:focus, input[type="datetime-local"]:focus, 
input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, 
input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, 
input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, 
input[type="color"]:focus, .uneditable-input:focus { 
	-moz-box-shadow: 0 0 5px rgba(103,173,245,0.5); 
	-webkit-box-shadow: 0 0 5px rgba(103,173,245,0.5); 
	box-shadow: 0 0 5px rgba(103,173,245,0.5); 
	-moz-border-radius: 0; -webkit-border-radius: 0;
	border-radius: 2px; border-color: #5c9fe4;
	background: #fff;
}

select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input { 
	-moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; margin-bottom: 0; font-size: 12px; color: #666;
	background: #fcfcfc;
}

.input-append input, .input-prepend input, .input-append select, 
.input-prepend select, .input-append .uneditable-input, .input-prepend 
.uneditable-input, .input-append .dropdown-menu, .input-prepend .dropdown-menu { font-size: 12px; }

.table-bordered caption + thead tr:first-child th:first-child, .table-bordered caption + tbody tr:first-child td:first-child, .table-bordered colgroup + thead tr:first-child th:first-child, .table-bordered colgroup + tbody tr:first-child td:first-child { border-top-left-radius: 0; }

.table-bordered caption + thead tr:first-child th:last-child, .table-bordered caption + tbody tr:first-child td:last-child, .table-bordered colgroup + thead tr:first-child th:last-child, .table-bordered colgroup + tbody tr:first-child td:last-child { border-top-right-radius: 0; }

.table-bordered thead:first-child tr:first-child th:first-child, 
.table-bordered tbody:first-child tr:first-child td:first-child,
.table-bordered thead:first-child tr:first-child th:last-child, 
.table-bordered tbody:first-child tr:first-child td:last-child,
.table-bordered thead:last-child tr:last-child th:first-child, 
.table-bordered tbody:last-child tr:last-child td:first-child, 
.table-bordered tfoot:last-child tr:last-child td:first-child { -moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0; }

[class^="icon-"], [class*=" icon-"] { opacity: 0.75; }

.dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover a { background: #546f8e; color: #fff; }

.table { margin-bottom: 0; }
.table th { background: #fcfcfc; }
.table tfoot th { border-bottom: 1px solid #ddd; }
.table th.centeralign, .table td.centeralign { text-align: center; }

.dropdown-menu { 
	-moz-box-shadow: 0 5px 10px rgba(0,0,0,0.2); -webkit--moz-box-shadow: 0 1px 5px rgba(0,0,0,0.3); box-shadow: 0 3px 5px rgba(0,0,0,0.2);
}

.input-prepend .add-on:first-child, .input-prepend .btn:first-child,
.input-prepend.input-append .add-on:first-child, .input-prepend.input-append .btn:first-child {
	-moz-border-radius: 2px 0 0 2px; -webkit-border-radius: 2px 0 0 2px; border-radius: 2px 0 0 2px; border-color: #bbb; font-size: 12px; 	
}
.input-append .add-on:last-child, .input-append .btn:last-child,
.input-prepend.input-append .add-on:last-child, .input-prepend.input-append .btn:last-child {
	-moz-border-radius: 0 2px 2px 0; -webkit-border-radius: 0 2px 2px 0; border-radius: 0 2px 2px 0; border-color: #bbb; font-size: 12px;
}
.input-append .add-on, .input-prepend .add-on { padding: 7px 5px; }
.input-append .btn, .input-prepend .btn { padding-top: 7px; padding-bottom: 7px; }

.input-append input, .input-append select, .input-append .uneditable-input { border-radius: 2px 0 0 2px; }
.fileupload .uneditable-input { padding: 7px 8px; }

/***** OTHER STYLES *****/
/************************/

.tooltipflot { background: #333; color: #fff; font-size: 11px; padding: 2px 10px; }
.widgetcalendar .ui-datepicker-header { border: 0; border-bottom: 1px solid #ddd; }

.separator { border-bottom: 1px solid #f1f1f1; border-top: 1px solid #c7c7c7; }
.nopadding { padding: 0; }
.divider30 { height: 30px; clear: both; }
.divider20 { height: 20px; clear: both; }
.divider15 { height: 15px; clear: both; }
.divider10 { height: 10px; clear: both; }
.dline15 { border-bottom: 1px solid #ddd; margin: 15px 0; }

.bordetop0 { border-top: 0; }
.borderbottom0 { border-bottom: 0; }

.margin1020 { margin: 10px 20px; }
.nomargin { margin: 0; }
.marginleft20 { margin-left: 20px; }
.marginleft15 { margin-left: 15px; }
.marginleft10 { margin-left: 10px; }
.marginleft5 { margin-left: 5px; }

.width4 { width: 4%; }
.width5 { width: 5%; }
.width10 { width: 10%; }
.width15 { width: 15%; }
.width20 { width: 20%; }
.width30 { width: 30%; }
.width45 { width: 45%; }
.width60 { width: 60%; }
.width63 { width: 63%; }
.width70 { width: 70%; }

.zindex100 { z-index: 100; }
.clearall { clear: both; }
.aligncenter { text-align: center; }


/***** SKINS *****/
/*****************/

.skins { list-style: none; position: absolute; top: 7px; right: 5px; }
.skins li { display: inline-block; margin-right: 3px; }
.skins li a { display: block; width: 13px; height: 13px; margin: 0; padding: 0; }
.skins li a.default { background: #3b6998; }
.skins li a.dark { background: #666; }
.skins li a.orange { background: #F60; }

.skins li.fixed { margin-right: 0; }
.skins li.fixed a { background: #333 url(../../img/admin/layout.png) no-repeat 3px 2px; border: 1px solid #666; height: 12px; }
.skins li.wide a { background: #333 url(../../img/admin/layout.png) no-repeat -22px 2px; border: 1px solid #666; height: 12px; }
.skins li.selected a { background-color: #666; border-color: #888; }


/***** LOGIN PAGE *****/
/************************/

body.loginbody { background: #f7f7f7 url(../../img/admin/gray_jean.png); }

.loginwrapper { width: 400px; margin: 80px auto 0 auto; }
.loginwrapper p { margin: 20px 0; }
.loginwrapper p:first-child { margin-top: 0; }
.loginwrapper p:last-child { margin-bottom: 0; }
.logintitle { 
	padding: 15px; text-transform: uppercase; line-height: 21px; border: 1px solid #bbb; font-size: 18px; border-bottom: 0;
	-moz-border-radius: 2px 2px 0 0; -webkit-border-radius: 2px 2px 0 0; border-radius: 2px 2px 0 0; color: #666;
}
.logintitle span.iconfa-lock { font-size: 48px; margin-top: 14px; float: left; margin-right: 10px; }
.logintitle span.subtitle { font-size: 12px; font-weight: normal; display: block; margin-left: 32px; text-transform: none; color: #999; }
.loginwrapperinner { 
	padding: 20px; background: #444; 
	-moz-border-radius: 0 0 2px 2px; -webkit-border-radius: 0 0 2px 2px; border-radius: 0 0 2px 2px;
}
.loginshadow { background: url(../../img/admin/loginshadow.png) no-repeat center center; height: 30px; }
.loginwrapper input { 
	width: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;
	padding: 10px; min-height: 44px; font-size: 14px !important; border: 0; color: #999;
	background: #eee; padding-left: 30px; 
}
.loginwrapper input#username { background: #eee url(../../img/admin/username.png) no-repeat 8px 12px; }
.loginwrapper input#password { background: #eee url(../../img/admin/password.png) no-repeat 8px 12px; }
.loginwrapper input#username.error,
.loginwrapper input#password.error { background-color: #ffeaea; color: #ff0000; }
.loginwrapper input:focus { 
	background-color: #fff;
	color: #666 !important; 
	box-shadow: 0 0 8px rgba(0,0,0,0.8) !important;
}
.loginwrapper button.btn { 
	padding: 12px 0; border: 0; text-transform: uppercase; font-size: 13px; text-shadow: 1px 1px rgba(0,0,0,0.2);
	box-shadow: 0 2px 3px rgba(0,0,0,0.3); 
}
.loginwrapper a { color: #999; }



/***** COLUMN STYLES *****/
/*************************/

.one_half{ width:48.5%; }
.one_third{ width:31.16%; }
.two_third{ width:65.83%; }
.one_fourth{ width:22.5%; }
.three_fourth{ width:74.5%; }
.one_fifth{ width:17.3%; }
.two_fifth{ width:38.1%; }
.three_fifth{ width:58.9%; }
.four_fifth{ width:67.7%; }
.one_sixth{ width:13.83%; }
.five_sixth{ width:83.17%; }

.one_half,.one_third,.two_third,.three_fourth,.one_fourth,.one_fifth,
.two_fifth,.three_fifth,.four_fifth,.one_sixth,.five_sixth{ position:relative; margin-right:3%; float:left; }

.last{ margin-right:0 !important; clear:right; }



/***** MEDIA QUERIES *****/
/*************************/

@media screen and (max-width: 1280px) {
	
	.mainwrapper { width: auto; }
	.skins li.fixed,.skins li.wide { display: none; }
	
	/* dashboard */
	.content-dashboard .row-fluid > .span8,
	.content-dashboard .row-fluid > .span4 { display: block; width: auto; float: none; }
	.content-dashboard .row-fluid > .span4 { margin-left: 0; }
	.widgeticons li.span2 { width: 18.2%; }
	
	/* media */
	.mediamgr_menu li.right { float: none; margin-top: 8px; }
	.mediamgr_category, .mediamgr_content { margin-right: 0; }
	.mediamgr .mediamgr_right { position: relative; top: auto; width: auto; }
	.mediamgr .mediamgr_rightinner { padding-left: 0; }
	
	/* elements/bootstrap/typography/charts */
	.content-elements .row-fluid .span6,
	.content-bootstrap .row-fluid .span6, 
	.content-typography .row-fluid .span6,
	.content-charts .row-fluid .span6 { width: auto; float: none; margin-left: 0; }
	
	/* buttons */
	#examples .row-fluid .span4 { width: auto; float: none; margin-left: 0; }
	
	/* forms */
	.input-xxlarge, .uneditable-input {
    	width: 100%;
    	min-height: 36px;
    	-webkit-box-sizing: border-box;
       	-moz-box-sizing: border-box;
        box-sizing: border-box;
  	}
	.stdform label { float: none; width: auto; display: block; text-align: left; }
	.stdform span.field, .stdform div.field { margin-left: 0; }
	.stdform small.desc, .dualselect, .stdform .formwrapper, .stdform .stdformbutton { margin-left: 0; }
	.stdform2 span.field, .stdform2 div.field { border-left: 0; }
	
	/* wizard */
	#wiz1step1 p, #wiz1step2 p { margin: 15px; }
	
	/* animations */
	.content-animations .row-fluid .span9 { margin-left: 40%; margin-top: -30px; width: 59%; }
	
	/* edit profile */
	.content-editprofile .row-fluid .span3 { float: none; display: block; width: auto; margin-bottom: 30px; }
	.content-editprofile .row-fluid .span9 { float: none; display: block; width: auto; margin-left: 0; }
	
}

/* iPad Portrait */
@media screen and (max-width: 959px) {
	
	.rightpanel, .footer .footerright { 
		width: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; 
	}
	.mediamgr_menu li.right { float: right; margin-top: 0; }
	
}

/* iPhone Landscape */
@media screen and (max-width: 767px) {
	
	.pagetitle h1 { line-height: normal; }
	.pagetitle span { display: block; margin-left: 0; }
	.widgeticons .one_third { width: 31.16%; }
	.searchwidget input.search-query { width: 200px; }
	
	/* media */
	.mediamgr_menu { overflow: inherit; min-height: 33px; }
	.newfilebtn .btn { position: absolute; top: -72px; right: -10px; }
	
	/* forms */
	.input-prepend input[class*="span"], 
	.input-append input[class*="span"] { min-height: 36px; }

	/* wizard */
	.verwizard .verticalmenu { width: 200px; }
	.verwizard .stepContainer { margin-left: 230px; }
}

@media screen and (max-width: 479px) {
	
	/* login */
	.loginwrapper { width: 280px; }
	.loginshadow { background-size: 100%; }
	
	/* dashboard */
	.content-dashboard .ui-tabs-nav li a span { display: none; }
	.content-dashboard .ui-tabs-nav li a { padding: 7px 10px; }
	.notification .dropdown-menu { right: -100px; }
	
	/* media */
	.mediamgr_menu li.filesearch { 
		clear: both; margin-left: 0; width: 100%; float: none; display: block; padding-top: 10px;
	}
	.mediamgr_menu li.filesearch input { 
		width: 100%; display:  block; min-height: 36px;  
		-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;
	}
	.mediamgr_category ul li.right { 
		float: none; margin: 10px 0 0 0; display: block; text-align: right; border-top: 1px dashed #ddd; padding-top: 5px; 
	}
	
	/* dynamic table */
	.dataTables_paginate { position: relative; bottom: 0; right: 0; left: 10px; top: -35px; }
	.dataTables_info { height: 50px; }
	
	/* messages */
	.msghead { padding-bottom: 0; }
	.msghead_menu { margin-bottom: 0 !important; }
	.msghead_menu li:last-child { float: none; padding: 10px 0 0 0; }
	
	/* wizard */
	.wizard .tabbedmenu li a { padding: 10px; }
	.wizard .tabbedmenu li a span.label { display: none; }
	.verwizard .verticalmenu { float: none; width: auto; margin-bottom: 20px; }
	.verwizard .stepContainer, .verwizard .actionBar { margin-left: 0; }
}

.rad_star{
	font-family:Verdana;
	font-weight:normal;
	font-size:15px;
	color:#FF6501;
}<?php
/**
 * @Developed By	:	Engr. Rajib Mahmud
 * @Start Date	  	:	2nd Sep 2013
 * @Last Update		:	17th Sep 2013
 * @Copyright     	:  	Bangladesh Agricultural Research Council
 * @Link          	:  	http://www.barc.gov.bd
 * 
 * */
 echo $this->Html->script(array("admin/jquery.dataTables","admin/toword"));
 ?>
<div class="maincontent">
	<div class="contentinner">
    	<div class="row-fluid">
        	<div class="span5">
				<table class="table table-bordered table-invoice">
              		<tr>
                  		<td class="width30">Pay Sleep For:</td>
                  		<td class="width70">
                  			<strong>
                  			<?php 
	          					if(!empty($salary["Employee"]["middle_name"])) 
	          						echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["middle_name"]." ".$salary["Employee"]["last_name"];
	          					else
	          						echo $salary["Employee"]["first_name"]." ".$salary["Employee"]["last_name"];
	          				?>
	          				</strong>
	          			</td>
              		</tr>
					<tr>
						<td>Designation:</td>
						<td><?php echo $designations[$salary["Salary"]["designation_id"]];?></td>
					</tr>
					<tr>
						<td>Employee ID:</td>
						<td><?php echo $salary["Employee"]["employee_code"];?></td>
					</tr>
					<tr>
						<td>For the month of:</td>
						<td> <?php echo date('F, Y', strtotime(date('Y-m')." -1 month")); ?></td>
					</tr>
				</table>
			</div>
			<div class="span5">
				<table class="table table-bordered table-invoice">
					<tr>
						<td class="width30">From:</td>
						<td class="width70"><strong>New Airport Road, Farmgate, Dhaka - 1215</strong></td>
					</tr>
					<tr>
						<td class="width30">Pay Slip #</td>
						<td class="width70"><strong><?php echo $salary["Salary"]["id"];?></strong></td>
					</tr>
					<tr>
						<td class="width30">Pay Scale</td>
						<td class="width70"><strong><?php echo $payScale["scale"]," - ".$payScale["increment"]." X ".$payScale["increment_iteration"]; if($payScale["eb"] > 0) echo " - EB - ".$payScale["eb"]." X ".$payScale["eb_iteration"];?></strong></td>
					</tr>
					<tr>
						<td>Issue Date:</td>
						<td> <?php echo date('d F, Y'); ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="clearfix"><br /></div>
		<table class="table table-bordered table-invoice-full">
			<colgroup>
				<col class="con0 width25" />
				<col class="con1 width25" />
				<col class="con0 width25" />
				<col class="con1 width25" />
			</colgroup>
			<thead>
				<tr>
					<th class="head0">Payable</th>
					<th class="head1">Amount</th>
					<th class="head0 right">Deduction</th>
					<th class="head1 right">Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Basic Salary</td>
					<td class="right"><?php echo $salary["Salary"]["basic"];?></td>
					<td>CPF Contribution</td>
					<td class="right"><?php echo $salary["Deduction"]["cpf1"];?></td>
				</tr>
				<tr>
					<td>House Rent</td>
					<td class="right"><?php echo $salary["Salary"]["house_rent"];?></td>
					<td>Aditional CPF Contribution</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf2"])) echo $salary["Deduction"]["cpf2"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Medical Allowance</td>
					<td class="right"><?php echo $salary["Salary"]["medical"];?></td>
					<td>1st CPF Loan</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan1"])) echo $salary["Deduction"]["cpf_loan1"]; else echo "-"; ?></td>
				</tr>
				<tr>
					<td>Personal Pay</td>
					<td class="right"><?php if(!empty($salary["Salary"]["pp"])) echo $salary["Salary"]["pp"]; else echo "-";?></td>
					<td>2nd CPF Loan</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_loan2"])) echo $salary["Deduction"]["cpf_loan2"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Educational Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["edu"])) echo $salary["Salary"]["edu"]; else echo "-";?></td>
					<td>House Loan</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["house_loan"])) echo $salary["Deduction"]["house_loan"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Charge Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["charge"])) echo $salary["Salary"]["charge"]; else echo "-";?></td>
					<td>Vehicle Loan</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["vehicle_loan"])) echo $salary["Deduction"]["vehicle_loan"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Dearness Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["dearness"])) echo $salary["Salary"]["dearness"]; else echo "-";?></td>
					<td>Total CPF Interest</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["cpf_interest"])) echo $salary["Deduction"]["cpf_interest"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Conveyance Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["conveyance"])) echo $salary["Salary"]["conveyance"]; else echo "-";?></td>
					<td>Total House & Vehicle Loan Interest</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["hv_interest"])) echo $salary["Deduction"]["hv_interest"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Tiffin Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["tiffin"])) echo $salary["Salary"]["tiffin"]; else echo "-";?></td>
					<td>Benevolent Fund</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["benevolent_fund"])) echo $salary["Deduction"]["benevolent_fund"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>House Rent Deduct</td>
					<td class="right"><?php if(!empty($salary["Salary"]["washing"])) echo $salary["Salary"]["washing"]; else echo "-";?></td>
					<td>CPF Contribution</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["house_rent_deduct"])) echo $salary["Deduction"]["house_rent_deduct"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Deputation Allowance</td>
					<td class="right"><?php if(!empty($salary["Salary"]["deputation"])) echo $salary["Salary"]["deputation"]; else echo "-";?></td>
					<td>Tranport Bill</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["transport_bill"])) echo $salary["Deduction"]["transport_bill"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Domestic Aid</td>
					<td class="right"><?php if(!empty($salary["Salary"]["aid"])) echo $salary["Salary"]["aid"]; else echo "-";?></td>
					<td>Personal Vehicle Used</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["personal_vehicle"])) echo $salary["Deduction"]["personal_vehicle"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Sumptuary</td>
					<td class="right"><?php if(!empty($salary["Salary"]["sumptuary"])) echo $salary["Salary"]["sumptuary"]; else echo "-";?></td>
					<td>Group Insurance</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["group_insurance"])) echo $salary["Deduction"]["group_insurance"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Arrear</td>
					<td class="right"><?php if(!empty($salary["Salary"]["arrear"])) echo $salary["Salary"]["arrear"]; else echo "-";?></td>
					<td>Water & Swerage</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["w_s"])) echo $salary["Deduction"]["w_s"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Miscellaneous</td>
					<td class="right"><?php if(!empty($salary["Salary"]["miscellaneous"])) echo $salary["Salary"]["miscellaneous"]; else echo "-";?></td>
					<td>Fuel Cost</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["fuel"])) echo $salary["Deduction"]["fuel"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>Fractional Increment</td>
					<td class="right"><?php if(!empty($salary["Salary"]["fraction_increment"])) echo $salary["Salary"]["fraction_increment"]; else echo "-";?></td>
					<td>Overdrawn</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["overdrawn"])) echo $salary["Deduction"]["overdrawn"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Telephone Bill</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["phone_bill"])) echo $salary["Deduction"]["phone_bill"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Income TAX</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["association"])) echo $salary["Deduction"]["association"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Income TAX</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["tax"])) echo $salary["Deduction"]["tax"]; else echo "-";?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td class="right">&nbsp;</td>
					<td>Miscellaneous</td>
					<td class="right"><?php if(!empty($salary["Deduction"]["miscellaneous_deduct"])) echo $salary["Deduction"]["miscellaneous_deduct"]; else echo "-";?></td>
				</tr>
			</tbody>
		</table>
		<table class="table invoice-table">
			<colgroup>
				<col class="con0 width60" />
				<col class="con0 width20" />
				<col class="con1 width20" />
			</colgroup>
			<tbody>
				<tr>
					<td class="msg-invoice">
						<h3><?php echo "IN WORD: ";?></h3><?php echo strtoupper($salary["Salary"]["in_word"]);?>
					</td>
					<td class="right">
						<strong>Gross Salary</strong> <br />
						<strong>Total Deduction</strong> <br />
					</td>
					<td class="right">
						<strong>
							<?php echo $salary["Salary"]["total_add"];?> <br />
							<?php echo $salary["Deduction"]["total_sub"];?> <br />
						</strong>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="amountdue">
			<h1><span>Net Payable:</span> <?php echo $salary["Salary"]["payable"];?></h1> <br />
		</div>
		<div class="clearfix">&nbsp;</div>
	</div>
</div>
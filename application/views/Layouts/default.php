<!DOCTYPE html  lang="da">
<head>
<meta charset=utf-8>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<Script type="text/javascript" src="<?php echo base_url();?>/assets/menu/jquery.js"></Script>
<Script type="text/javascript" src="<?php echo base_url();?>/assets/menu/menu.js"></Script>
<base href="<?php echo base_url();?>" />
<link type="text/css" href="<?php echo base_url();?>/assets/menu/menu.css" rel="stylesheet" />
<link type="text/css" href="<?php echo base_url();?>/assets/css/meall.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/js/slideshow.js"></script>
<link type="text/css" href="<?php echo base_url();?>/assets/menu/poll.css" rel="stylesheet" />


<script src="<?php echo base_url()?>/assets/js/site.js"></script>
   <script src="<?php echo base_url()?>/assets/js/ajaxfileupload.js"></script>


<title></title>
</head>
<body>
<table border="0" id="container" align="center">
  <tr>
    <td colspan="2" class="head" valign="bottom">
    	<div class="datetimeh">
    		<script>
	
	function gmod(n,m){
	return ((n%m)+m)%m;
}

function kuwaiticalendar(adjust){
	var today = new Date();
	if(adjust) {
		adjustmili = 1000*60*60*24*adjust; 
		todaymili = today.getTime()+adjustmili;
		today = new Date(todaymili);
	}
	day = today.getDate();
	month = today.getMonth();
	year = today.getFullYear();
	m = month+1;
	y = year;
	if(m<3) {
		y -= 1;
		m += 12;
	}

	a = Math.floor(y/100.);
	b = 2-a+Math.floor(a/4.);
	if(y<1583) b = 0;
	if(y==1582) {
		if(m>10)  b = -10;
		if(m==10) {
			b = 0;
			if(day>4) b = -10;
		}
	}

	jd = Math.floor(365.25*(y+4716))+Math.floor(30.6001*(m+1))+day+b-1524;

	b = 0;
	if(jd>2299160){
		a = Math.floor((jd-1867216.25)/36524.25);
		b = 1+a-Math.floor(a/4.);
	}
	bb = jd+b+1524;
	cc = Math.floor((bb-122.1)/365.25);
	dd = Math.floor(365.25*cc);
	ee = Math.floor((bb-dd)/30.6001);
	day =(bb-dd)-Math.floor(30.6001*ee);
	month = ee-1;
	if(ee>13) {
		cc += 1;
		month = ee-13;
	}
	year = cc-4716;

	if(adjust) {
		wd = gmod(jd+1-adjust,7)+1;
	} else {
		wd = gmod(jd+1,7)+1;
	}

	iyear = 10631./30.;
	epochastro = 1948084;
	epochcivil = 1948085;

	shift1 = 8.01/60.;
	
	z = jd-epochastro;
	cyc = Math.floor(z/10631.);
	z = z-10631*cyc;
	j = Math.floor((z-shift1)/iyear);
	iy = 30*cyc+j;
	z = z-Math.floor(j*iyear+shift1);
	im = Math.floor((z+28.5001)/29.5);
	if(im==13) im = 12;
	id = z-Math.floor(29.5001*im-29);

	var myRes = new Array(8);

	myRes[0] = day; //calculated day (CE)
	myRes[1] = month-1; //calculated month (CE)
	myRes[2] = year; //calculated year (CE)
	myRes[3] = jd-1; //julian day number
	myRes[4] = wd-1; //weekday number
	myRes[5] = id; //islamic date
	myRes[6] = im-1; //islamic month
	myRes[7] = iy; //islamic year

	return myRes;
}
function writeIslamicDate(adjustment) {
	var wdNames = new Array("یک شنبه","دوشنبه","سه شنبه","چهارشنبه","پنچ شنبه","جمعه","شنبه");
	var iMonthNames = new Array("محرم","صفر","ربیع الاول","ربیع الاخر",
	"جماد الاول","جماد الاخر","رجب","شعبان",
	"رمظان","شوال","ذولقعده","ذولحجه");
	var iDate = kuwaiticalendar(adjustment);
	var outputIslamicDate = wdNames[iDate[4]] + ", " 
	+ iDate[5] + " " + iMonthNames[iDate[6]] + " " + iDate[7] ;
	return outputIslamicDate;
}


	document.write(writeIslamicDate()); //without date adjustment

	
</script>||
	<?Php
 echo date("d/m/y"); 
?>
<?php echo date_default_timezone_set ("Asia/kabul"); ?>
    	</div>
    	
  </tr>
  <tr>
    <td colspan="2">
    	<div id="menu">
        <ul class="menu">
          <li class="last"><a href="<?php echo lang('lan'); ?>"><span><?php echo lang('contacts'); ?></span></a></li>
          <li class="last"><a href="#"><span><?php echo lang('discussion'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/porcurment"><span><?php echo lang('procurement'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/jobs"><span><?php echo lang('jobs'); ?></span></a></li>
          <li class="last"><a href="#"><span><?php echo lang('library'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/formate"><span><?php echo lang('bankformate'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/departments"><span><?php echo lang('department'); ?></span></a></li>
          <li class="last"><a href="#"><span><?php echo lang('publicaiton'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/news"><span><?php echo lang('news'); ?></span></a></li>
          <li class="last"><a href="<?php echo lang('lan'); ?>/welcome"><span><?php echo lang('home'); ?></span></a></li>
		
        </ul>
		
      </div>
  </tr>
  <tr>
    <td valign="top"><div id="main" role="main" class="content"> <br />
        {content} </div></td>
    <td class="side" valign="top"><?php echo $this->load->view('Layouts/exchange'); ?><br ?></td>
  </tr>
  <tr>
    <td colspan="2" class="footer">
    	<center><a href="#">Home1</a> || <a href="#">Jobs</a> || <a href="#">Publications</a> || <a href="#">Contact Us</a> || <a href="#">centralbank.gov.af</a></center>

    </td>
  </tr>
</table>
</html>
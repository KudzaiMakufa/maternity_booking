<head>

	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	 <!-- lets attach css files -->
	 <?php echo Asset::css(array(
    	'bootstrap.min.css',
    	'font-awesome/css/font-awesome.min.css',
    	//'custom/custom.min.css',
    	//'custom/libs-patch.css'
    )); ?>
	 <?php  echo Asset::js('jquery.min.js'); ?>
	 <?php echo Asset::css('bootstrap-datepicker3.standalone.min.css'); ?>
 	<?php echo Asset::js(array(
    	'bootstrap-datepicker.js',
    )); ?>



</head>
<?php


    list(, $userid) = Auth::get_user_id();
     //Debug::dump($userid);die;
    if($userid == 0){
        Session::set_flash('error', 'You must login First');
        Response::redirect('login');
    }

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php 

echo Asset::js('flatdash/dash.js');
echo Asset::css('flatdash/dash.css');

?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <!--a hef="home.html"><img src="http://jskrishna.com/work/merkury/images/logo.png" alt="merkery_logo" class="hidden-xs hidden-sm"-->
                        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <!-- populate fields based on who is logged in -->
                    <ul>

                            <?php 
                                //UNIVERAL USER
                            

                             $unis =Model_Menuitem::find(array('where'=>array(
                                'role'=>'ALL',

                            )));
                              ?>
                            <?php if ($unis): ?>
                            <?php foreach ($unis as $uni): ?>       

                                <li class="active"><a href="<?php echo Uri::base().$uni->url ; ?>"><i class="<?php echo $uni->class ; ?>" aria-hidden="true"></i><span class="hidden-xs hidden-sm"><?php echo $uni->name ;?></span></a></li>
                              

                            <?php endforeach; ?>  
                            <?php endif; ?>
                           


                            <?php 

                                //specific user
                                $rolename = Auth::get_profile_fields('role') ;

                             $lists =Model_Menuitem::find(array('where'=>array(
                                'role'=>$rolename,

                            )));
                              ?>
                            <?php if ($lists): ?>
                            <?php foreach ($lists as $list): ?>       

                                <li class="active"><a href="<?php echo Uri::base().$list->url ; ?>"><i class="<?php echo $list->class ; ?>" aria-hidden="true"></i><span class="hidden-xs hidden-sm"><?php echo $list->name ;?></span></a></li>
                              

                            <?php endforeach; ?>   
                        

                            <?php else: ?>
                            <p>No Doctors.</p>

                            <?php endif; ?><p>

                        </li>
                    </ul>
                   
                   
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="search hidden-xs hidden-sm">
                                <input type="text" placeholder="Search" id="search">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="hidden-xs"><a href="<?php echo Uri::base().'user/logout' ; ?>" class="add-project" data-toggle="modal">Logout</a></li>
                                     
                                    <li><a href="<?php echo Uri::base().'message' ; ?>"><i class="fa fa-envelope" aria-hidden="true"></i><?php 

                                            $sql = "select count(*) as rcrds from messages where user_id = $userid and isread = 0 ";
                                            $query = DB::query($sql)->execute()->as_array();
                                            $rcds = $query[0]['rcrds'] ;

                                          
                                            if($rcds === null || $rcds == 0){
                                                echo " 0 Messages";
                                            }
                                            else{
                                               echo "   ".$rcds." Unread messages" ; 

                                            }
                                            
                                    ?> </a></li>
                                    
                                    <li>
                                        <a href="<?php echo Uri::base().'appointment' ?>" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary"><?php 
                                            $id = 1 ;
                                            $sql = "select count(*) as rcrds from appointments where user_id = $userid and isread = 0 ";
                                            $query = DB::query($sql)->execute()->as_array();
                                            $rcds = $query[0]['rcrds'] ;

                                          
                                            if($rcds === null || $rcds == 0){
                                                echo " 0";
                                            }
                                            else{
                                               echo "   ".$rcds." " ; 

                                            }
                                            
                                    ?></span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo Asset::img('avatar5.png'); ?>
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span>JS Krishna</span>
                                                    <p class="text-muted small">
                                                        me@jskrishna.com
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="#" class="view btn-sm active">View Profile</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div align="center" width="50%">
                <!--section for success error messages -->

                        <?php if (Session::get_flash('success')): ?>
                        <div class="alert alert-success">
                        <strong>Success</strong>
                        <p>
                        <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                        </p>
                        </div>
                        <?php endif; ?>
                        <?php if (Session::get_flash('error')): ?>
                        <div class="alert alert-danger">
                        <strong>Error</strong>
                        <p>
                        <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                        </p>
                        </div>
                        <?php endif; ?>
               <?php echo $content ?>
               <div>

               	<!-- lets attach some javascript -->
    <?php echo Asset::js(array(
    	'bootstrap.min.js',
    	'fastclick.js',
    	'nprogress.js',
    	'custom.min.js'
    )); ?>

<script>
	$(function(){
		$(".datepicker").datepicker(
		{ 
			format: 'yyyy-mm-dd',
			autoclose: true,
			selectMonths: true, // Creates a dropdown to control month
    		selectYears: 15, // Creates a dropdown of 15 years to control year
		
		}
		
		);
		
	});
</script>
</body>
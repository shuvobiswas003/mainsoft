 <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="img/admin/1.jpg" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo htmlspecialchars($_SESSION["username"]); ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="dashboard.php" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

<!--School Setting and Login Part Start-->
    <li class="has_sub">
        <a href="#" class="waves-effect">
            <i class=" md-add-box"></i>
            <span>Libary Setting</span>
            <span class="pull-right">
                <i class="md md-add"></i>
            </span>
        </a>
        <ul class="list-unstyled">

            <li><a href="add_publisher.php"><i class="ion-person-add"></i>Add Publisher</a></li>
           <li><a href="add_author.php"><i class="ion-person-add"></i>Add Author</a></li>
            <li><a href="add_book.php"><i class="ion-person-add"></i>Add Book List</a></li>



        </ul>
    </li>

    <!--School Setting and Login Part END-->                  

<li>
    <a href="add_book_stock.php" class="waves-effect"><i class="md md-home"></i><span>Add Book Stock</span></a>
</li>

<li>
    <a href="issue_book.php" class="waves-effect"><i class="md md-home"></i><span>Issue Book</span></a>
</li>
<li>
    <a href="return_book.php" class="waves-effect"><i class="md md-home"></i><span>Return Book</span></a>
</li>



<!--School Setting and Login Part Start-->
    <li class="has_sub">
        <a href="#" class="waves-effect">
            <i class=" md-add-box"></i>
            <span>Libary Report</span>
            <span class="pull-right">
                <i class="md md-add"></i>
            </span>
        </a>
        <ul class="list-unstyled">

            <li><a href="report_book_stock.php" target="_blank"><i class="ion-person-add"></i>Book Stock</a></li>
           <li><a href="report_expary_date_book.php" target="_blank"><i class="ion-person-add"></i>Overdue Books Report</a></li>
           



        </ul>
    </li>

    <!--School Setting and Login Part END-->    




                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
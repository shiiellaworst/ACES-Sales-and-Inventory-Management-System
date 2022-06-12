
    <div class="logo-name">
        <div class="logo-image">
            <img src="../Admin/assets/Images/ACES.png" alt="">
        </div>

        <span class="logo_name">ACES</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="dashboard.php">
                <i class="uil uil-estate "></i>
                <span class="link-name">Dashboard</span>
            </a></li>
            <li><a href="inventory.php">
                <i class="fas fa-warehouse"></i>
                <span class="link-name">Inventory</span>                           
            </a></li>
            <li><a href="transactions.php">
                <i class="fas fa-exchange"></i>
                <span class="link-name">Orders & Transaction</span>
            </a></li>
            <li><a href="pending_design.php">
            <i class="fa-solid fa-shirt"></i>
                <span class="link-name">Pending Design</span>
            </a></li>

        </ul>
        
        <ul class="logout-mode">
            <li><a href="profile.php">
                <i class="uil uil-user"></i>
                <span class="link-name"><?php echo $_SESSION['admin_name'];?></span>
            </a></li>
            <li><a href="logout.php">
                <i class="uil uil-signout"></i>
                <span class="link-name">Logout</span>
            </a></li>

            
            <div class="mode-toggle">
                </div>
                
        </ul>
    </div>



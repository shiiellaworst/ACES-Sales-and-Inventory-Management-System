
    <div class="logo-name">
        <div class="logo-image">
            <img src="../ACESAdmin/assets/Images/ACES.png" alt="">
        </div>

        <span class="logo_name">ACES</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="dashboard.php">
                <i class="uil uil-estate "></i>
                <span class="link-name">Dashboard</span>
            </a></li>
            <li><a href="students.php">
                <i class="fas fa-users"></i>
                <span class="link-name">Students</span>
            </a></li>
            <li><a href="staff.php">
                <i class="fas fa-clipboard-user"></i>
                <span class="link-name">Staffs</span>
            </a></li>
            <li><a href="inventory.php">
                <i class="fas fa-warehouse"></i>
                <span class="link-name">Inventory</span>                           
            </a></li>
            <li><a href="products.php">
                <i class="fab fa-product-hunt"></i>
                <span class="link-name">Products</span>
            </a></li>
            <li><a href="transactions.php">
                <i class="fas fa-exchange"></i>
                <span class="link-name">Orders & Transaction</span>
            </a></li>
            <li><a href="salesreport.php">
            <i class="fa-solid fa-chart-column"></i>
                <span class="link-name">Sales</span>
            </a></li>
            <li><a href="audit_trail.php">
            <i class="fa-solid fa-sliders"></i>
                <span class="link-name">Audit Trail</span>
            </a></li>
            <li><a href="pending_design.php">
            <i class="fa-solid fa-shirt"></i>
                <span class="link-name">Pending Design</span>
            </a></li>
            <li><a href="supplier.php">
            <i class="fa-solid fa-building"></i>
                <span class="link-name">Supplier</span>
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



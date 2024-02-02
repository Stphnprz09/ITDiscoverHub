<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | IT Discover Hub</title>
    <link rel="stylesheet" href="css/adminHome.css" />
    <link rel="stylesheet" href=https://fonts.googleapis.com/css?family=Poppins:300,400,500,700 />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <img class="website-logo" src="css/images/IDH_logo.png" alt="Logo of ITDiscoverHub" />

        <nav class="header-nav">
            <ul>
                <li>
                    <div class="sign-in"><a href="admin-logout.php">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            <span class="hidden-text">Log out</span>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="navigation">
            <div class="admin-name">
                <h3>Admin</h3>
                <p id="adminName">
                    <?php echo isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : ''; ?>
                </p>
            </div>
            <div class="nav">
                <h2><i class="fa-solid fa-circle-info"></i>General Details</h2>
                <a href="adminHome.php"><i class="fa-solid fa-gauge"></i>Dashboard</a>
                <a href="adminLaptop.php"><i class="fa-solid fa-laptop"></i>Laptop</a><br>
                <a href="adminSmartphone.php"><i class="fa-solid fa-mobile"></i>SmartPhone</a><br>
                <a href="adminTablet.php"><i class="fa-solid fa-tablet"></i>Tablet</a><br>
            </div>
        </div>
        <div class="dashboard">
            <div class="card">
                <i class="fa-solid fa-user"></i>
                <span id="userCount"></span>
                <p>User</p>
            </div>
            <div class="card">
                <i class="fa-solid fa-user"></i>
                <span id="adminCount"></span>
                <p>Admin</p>
            </div>
            <div class="card">
                <i class="fa-solid fa-laptop"></i>
                <span id="laptopCount"></span>
                <p>Laptop</p>
            </div>
            <div class="card">
                <i class="fa-solid fa-mobile"></i>
                <span id="cpCount"></span>
                <p>Phone</p>
            </div>
            <div class="card">
                <i class="fa-solid fa-tablet"></i>
                <span id="tabletCount"></span>
                <p>Tablet</p>
            </div>
        </div>
    </main>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch counts from the server
        fetch('getCounts.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('userCount').textContent = data.userCount;
                document.getElementById('adminCount').textContent = data.adminCount;
                document.getElementById('laptopCount').textContent = data.laptopCount;
                document.getElementById('cpCount').textContent = data.phoneCount;
                document.getElementById('tabletCount').textContent = data.tabletCount;
            })
            .catch(error => {
                console.error('Error fetching counts:', error);
            });
    });
</script>

</html>
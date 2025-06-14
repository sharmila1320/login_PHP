<?php
session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';

// Only clear temporary session values
unset($_SESSION['alerts'], $_SESSION['active_form']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Full Stack Development</title>

  <!-- Style -->
  <link rel="stylesheet" href="style.css" />
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- Vanta & Three.js for background -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>

  <style>
    /* Ensures the effect spans full screen */
    #background-effect {
      width: 100%;
      height: 100vh;
      position: absolute;
      top: 0;
      left: 0;
      z-index: -1;
    }
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background-color: transparent;
    }
  </style>
</head>
<body>
  <!-- 3D Background Container -->
  <div id="background-effect"></div>

  <!-- Website Content -->
  <header>
    <a href="#" class="logo">Logo</a>
    <nav>
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Collection</a>
      <a href="#">Contact</a>
    </nav>
    <div class="user-auth">
      <?php if (!empty($name)): ?>
      <div class="profile-box">
        <div class="avatar-circle"><?= strtoupper($name[0]); ?></div> 
        <div class="dropdown">
          <a href="#">My Account</a>
          <a href="logout.php">Logout</a>
        </div>
      </div>
      <?php else: ?>
      <button type="button" class="login-btn-modal">Login</button>
      <?php endif; ?>
    </div>
  </header>

  <section>
    <h1>Welcome to Our Website <?= htmlspecialchars($name ?? 'Developer') ?>!</h1>
  </section>

  <?php if (!empty($alerts)): ?>
  <div class="alert-box show">
    <?php foreach($alerts as $alert): ?>
    <div class="alert <?= $alert['type']; ?>">
      <i class='bx <?= $alert['type'] === 'success' ? 'bxs-check-circle' : 'bxs-error' ?>'></i>
      <span><?= $alert['message'] ?></span>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <div class="auth-modal <?= $active_form === 'register' ? 'show slide' : ($active_form === 'login' ? 'show' : ''); ?>">
    <button type="button" class="close-btn-modal"><i class='bx bx-x'></i></button>

    <div class="form-box login">
      <h2>Login</h2>
      <form action="auth_process.php" method="POST">
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required>
          <i class='bx bxs-mail-open'></i> 
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class='bx bxs-lock-keyhole'></i>
        </div>
        <button type="submit" name="login_btn" class="btn">Login</button>
        <p>Don't have an account? <a href="#" class="register-link">Register now</a></p>
      </form> 
    </div>

    <div class="form-box register">
      <h2>Register</h2>
      <form action="auth_process.php" method="POST">
        <div class="input-box">
          <input type="text" name="name" placeholder="Name" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Email" required>
          <i class='bx bxs-mail-open'></i>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Password" required>
          <i class='bx bxs-lock-keyhole'></i>
        </div>
        <button type="submit" name="register_btn" class="btn">Register</button>
        <p>Already have an account? <a href="#" class="login-link">Login now</a></p>
      </form> 
    </div>
  </div>

  <!-- Scripts -->
  <script src="script.js"></script>
  <script>
    const authModal = document.querySelector(".auth-modal");
    const loginBtn = document.querySelector(".login-btn-modal");
    const closeBtn = document.querySelector(".close-btn-modal");

    loginBtn?.addEventListener("click", () => {
      authModal.classList.add("show");
    });

    closeBtn?.addEventListener("click", () => {
      authModal.classList.remove("show", "slide");
    });

    // Initialize Vanta 3D effect
    VANTA.NET({
      el: "#background-effect",
      mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 200.00,
      minWidth: 200.00,
      scale: 1.0,
      scaleMobile: 1.0,
      color: 0xffffff,
      backgroundColor: 0x0a0a0a,
      points: 10.00,
      maxDistance: 25.00,
      spacing: 18.00
    });
  </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    :root {
      --background: #1a1a2e;
      --color: #ffffff;
      --primary-color: #0f3460;
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      box-sizing: border-box;
      font-family: "poppins";
      background: var(--background);
      color: var(--color);
      letter-spacing: 1px;
      transition: background 0.2s ease;
      -webkit-transition: background 0.2s ease;
      -moz-transition: background 0.2s ease;
      -ms-transition: background 0.2s ease;
      -o-transition: background 0.2s ease;
    }

    a {
      text-decoration: none;
      color: var(--color);
    }

    h1 {
      font-size: 2.5rem;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      position: relative;
      width: 22.2rem;
    }

    .form-container {
      border: 1px solid hsla(0, 0%, 65%, 0.158);
      box-shadow: 0 0 36px 1px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
      backdrop-filter: blur(20px);
      z-index: 99;
      padding: 2rem;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      -ms-border-radius: 10px;
      -o-border-radius: 10px;
      box-shadow: inset 3px 3px 4px rgba(0,0,0,0.4);
      border: 1px solid white;
      
    }

    .login-container form input {
      display: block;
      padding: 14.5px;
      width: 100%;
      margin: 2rem 0;
      outline: none;
      background-color: #FAF0EE;
      border: none;
      border-radius: 5px;
      font-weight: 500;
      letter-spacing: 0.8px;
      font-size: 15px;
      backdrop-filter: blur(15px);
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
    }

    .login-container form input:focus {
      box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.2);
      animation: wobble 0.3s ease-in;
      -webkit-animation: wobble 0.3s ease-in;
    }

    .login-container form button {
      background-color: var(--primary-color);
      color: var(--color);
      display: block;
      padding: 13px;
      border-radius: 5px;
      outline: none;
      font-size: 18px;
      letter-spacing: 1.5px;
      font-weight: bold;
      width: 100%;
      cursor: pointer;
      margin-bottom: 2rem;
      transition: all 0.1s ease-in-out;
      border: none;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
      -webkit-transition: all 0.1s ease-in-out;
      -moz-transition: all 0.1s ease-in-out;
      -ms-transition: all 0.1s ease-in-out;
      -o-transition: all 0.1s ease-in-out;
    }

    .login-container form button:hover {
      box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.15);
      transform: scale(1.02);
      -webkit-transform: scale(1.02);
      -moz-transform: scale(1.02);
      -ms-transform: scale(1.02);
      -o-transform: scale(1.02);
    }

   
    .illustration {
      position: absolute;
      top: -14%;
      right: -2px;
      width: 90%;
    }

    
    

    .register-forget {
      margin: 1rem 0;
      display: flex;
      justify-content: space-between;
      
    }

    .opacity {
      opacity: .8;
      
    }

    .theme-btn-container {
      position: absolute;
      left: 0;
      bottom: 2rem;
    }

    .theme-btn {
      cursor: pointer;
      transition: all 0.3s ease-in;
    }

    .theme-btn:hover {
      width: 40px !important;
    }

    @keyframes wobble {
      0% {
        transform: scale(1.025);
        -webkit-transform: scale(1.025);
        -moz-transform: scale(1.025);
        -ms-transform: scale(1.025);
        -o-transform: scale(1.025);
      }

      25% {
        transform: scale(1);
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
      }

      75% {
        transform: scale(1.025);
        -webkit-transform: scale(1.025);
        -moz-transform: scale(1.025);
        -ms-transform: scale(1.025);
        -o-transform: scale(1.025);
      }

      100% {
        transform: scale(1);
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
      }
    }
  </style>
</head>

<body style=" background-image: url(img/zenless-zone-zero.jpg);">
  <section class="container">
    <div class="login-container">
      <div class="circle circle-one"></div>
      <div class="form-container">
        <!-- <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" /> -->
        <h1 class="opacity">REGISTER</h1>
        <form action="proses_register.php" method="POST">
          <input type="text" name="username" placeholder="USERNAME" />
          <input type="password" name="password" placeholder="PASSWORD" />
          <input type="email" name="email" placeholder="EMAIL"></td>
          <input type="text" name="namalengkap" placeholder="NAMA LENGKAP">
          <input type="text" name="alamat" placeholder="ALAMAT">
          <button class="opacity" type="submit">REGISTER</button>
        </form>
        <div class="register-forget opacity">
          <a href="register.php">REGISTER</a>
          <a href="">FORGOT PASSWORD</a>
        </div>
      </div>
      <div class="circle circle-two"></div>
    </div>
    <div class="theme-btn-container"></div>
  </section>
</body>
<script>
  const themes = [{
      background: "#1A1A2E",
      color: "#FFFFFF",
      primaryColor: "#0F3460"
    },
    {
      background: "#461220",
      color: "#FFFFFF",
      primaryColor: "#E94560"
    },
    {
      background: "#192A51",
      color: "#FFFFFF",
      primaryColor: "#967AA1"
    },
    {
      background: "#F7B267",
      color: "#000000",
      primaryColor: "#F4845F"
    },
    {
      background: "#F25F5C",
      color: "#000000",
      primaryColor: "#642B36"
    },
    {
      background: "#231F20",
      color: "#FFF",
      primaryColor: "#BB4430"
    }
  ];

  const setTheme = (theme) => {
    const root = document.querySelector(":root");
    root.style.setProperty("--background", theme.background);
    root.style.setProperty("--color", theme.color);
    root.style.setProperty("--primary-color", theme.primaryColor);
    root.style.setProperty("--glass-color", theme.glassColor);
  };

  const displayThemeButtons = () => {
    const btnContainer = document.querySelector(".theme-btn-container");
    themes.forEach((theme) => {
      const div = document.createElement("div");
      div.className = "theme-btn";
      div.style.cssText = `background: ${theme.background}; width: 25px; height: 25px`;
      btnContainer.appendChild(div);
      div.addEventListener("click", () => setTheme(theme));
    });
  };

  displayThemeButtons();
</script>

</html>
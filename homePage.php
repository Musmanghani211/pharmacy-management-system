<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apex Medicare</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url("./assets/img/background.avif");
      /* Change 'background.avif' to your image file */
      background-size: cover;
      background-position: center;
      height: 100vh;
      overflow: hidden;
      position: relative;
    }

    .container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 80%;
      /* Adjust container width */
      max-width: 800px;
      /* Set maximum width */
      background-color: rgba(255, 255, 255, 0.8);
      padding: 80px;
      border-radius: 10px;
      text-align: center;
    }

    h1 {
      margin-top: 58px;
      /* Add 'px' unit */
    }

    form {
      display: block;
      margin-top: 50px;
      unicode-bidi: isolate;
    }

    .search-bar {
      margin-top: 20px;
      text-align: center;
    }

    .button-container {
      position: absolute;
      top: 20px;
      right: 20px;
    }

    .button-container button {
      margin-left: 10px;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      background-color: #4caf50;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .button-container button:hover {
      background-color: #45a049;
    }

    .whatsapp-icon {
      position: fixed;
      bottom: 40px;
      right: 70px;
      z-index: 9999;
      border-radius: 50%;
      background-color: #25d366;
      padding: 10px;
      width: 50px;
      height: 50px;
    }

    .whatsapp-icon img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
    }

    /* Typing Animation */
    .typing-animation {
      display: inline-block;
      overflow: hidden;
      white-space: nowrap;
      position: relative;
      animation: typing 15s steps(50, end) infinite;
    }

    @keyframes typing {
      0% {
        width: 0;
      }

      100% {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <h1 style="text-align: center">Apex Medicare</h1>

  <div class="container">
    <div class="search-bar">
      <div class="typing-animation">
        <h2>
          Please search for the medicine you need here and confirm your order
          here!
        </h2>
      </div>

      <p>
        Medicines are vital for health, providing treatment, pain relief, and
        disease management. They enhance quality of life by addressing
        symptoms and preventing illnesses.
      </p>
      <p>
        Medicines are indispensable for health, offering treatment, pain
        relief, disease management, and illness prevention, ultimately
        improving quality of life.
      </p>
      <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Search..." />
        <input type="submit" value="Search" />
      </form>
    </div>
  </div>
  <div class="button-container">
    <button onclick="window.location.href='about.html'">About</button>
    <button onclick="window.location.href='register.html'">Register</button>
    <button onclick="window.location.href='login.php'">Login</button>
  </div>
  <a href="https://api.whatsapp.com/send?phone=923085948847" target="_blank" class="whatsapp-icon">
    <img src="./assets/img/whatsappIcon.png" alt="WhatsApp Icon" />
  </a>
</body>

</html>
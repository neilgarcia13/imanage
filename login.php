<?php

  $username = "admin";
  $password = "admin123456";

  $err = '';

  if (isset($_POST["submit"]) && empty($_POST["username"] && empty($_POST["password"]))) {

    $usernameInput = htmlspecialchars($_POST["username"]);
    $passwordInput = htmlspecialchars($_POST["password"]);

    if (!empty($usernameInput) && !empty($passwordInput)) {

      if ($usernameInput === $username && $passwordInput === $password) {

        header("Location: homepage.php");

      } else $err = "Username or password is incorrect.";

    }

  } else $err = "Username or password is empty.";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iManage</title>
  <link rel="stylesheet" href="index.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

  <div class="flex w-full h-screen justify-center items-center bg-[#e8ebed]">
    <div class="w-lg bg-[#ffffff] p-10 rounded-2xl shadow-lg">
      <p class="text-2xl text-[#333333] font-semibold mb-3">Log In</p>
      <p class="text-base text-[#6b7280] mt-0 mb-3">Enter admin's username and pasword</p>

      <div class="w-full h-[1px] mb-3 bg-[#6b7280]"></div>

      <form class="flex flex-col gap-3 py-3" method="post">

        <label class="text-[#333333] font-bold" for="username">Username</label>
        <input type="text" class="p-2 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl" name="username" id="username" placeholder="Enter username...">

        <label class="text-[#333333] font-bold" for="password">Password</label>
        <input type="password" class="p-2 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl" name="password" id="password" placeholder="Enter password...">

        <?php echo "<p class='text-red-500'>" . $err ?: $err . "</p>" ?>

        <div class="flex justify-end items-center gap-3 mt-3">
          <button class="px-4 py-2 rounded-xl shadow-sm cursor-pointer text-sm font-semibold transition ease-in hover:text-[#1e3a8a] hover:bg-[#d6e4f0]" type="button">Clear All</button>
          <button class="px-4 py-2 rounded-xl shadow-sm cursor-pointer text-sm font-semibold bg-[#e05d38] text-white transition ease-in hover:bg-[#DD4B22]" name="submit">Log In</button>
        </div>

      </form>

    </div>
  </div>

</body>
</html>
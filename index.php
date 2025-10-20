<?php

  $username = "admin";
  $password = "adminadmin";

  $err = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["username"]) && !empty($_POST["username"])) {

      $usernameInput = htmlspecialchars($_POST["username"]);
      $passwordInput = htmlspecialchars($_POST["password"]);

      if ($usernameInput === $username && $passwordInput === $password) {

        header("Location: homepage.php");

      } else $err = "Username or password is incorrect.";

    } else $err = 'Username or password is empty.';

  }

?>

<?php include "inc/header.php"; ?>

  <div class="flex w-full h-screen justify-center items-center bg-[#e8ebed]">
    <div class="w-xs sm:w-lg bg-[#ffffff] p-10 rounded-2xl shadow-lg">
      <p class="text-2xl text-[#333333] font-semibold mb-3">Log In</p>
      <p class="text-sm sm:text-base text-[#6b7280] mt-0 mb-3">Enter admin's username and pasword</p>

      <div class="w-full h-[1px] mb-3 bg-[#6b7280]"></div>

      <form class="flex flex-col gap-3 py-3" method="post">

        <label class="text-[#333333] font-bold" for="username">Username</label>
        <input type="text" name="username" id="username" class="p-2 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Enter username...">

        <label class="text-[#333333] font-bold" for="password">Password</label>
        <input type="password" name="password" id="password" class="p-2 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Enter password...">

        <p class="text-red-500"><?php echo $err ?: $err; ?></p>

        <div class="flex justify-end items-center gap-3 mt-3">
          <button type="reset" class="px-4 py-2 rounded-xl shadow-sm cursor-pointer text-sm font-semibold transition ease-in hover:text-[#1e3a8a] hover:bg-[#d6e4f0]">Clear All</button>
          <button class="px-4 py-2 rounded-xl shadow-sm cursor-pointer text-sm font-semibold bg-[#e05d38] text-white transition ease-in hover:bg-[#DD4B22]" type="submit">Log In</button>
        </div>

      </form>

    </div>
  </div>

<?php include "inc/footer.php"; ?>
<?php include "inc/header.php"; ?>

  <?php

    $results = [];
    $err = "";

    try {

      include "inc/dbh.php";

      $query = "SELECT * FROM employee_tbl;";

      $stmt = $pdo->prepare($query);
      $stmt->execute();

      global $results;
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $pdo = null;
      $stmt = null;

    } catch (PDOException $err) {
      die("Query failed: " . $err->getMessage()); 
    }

    if (isset($_GET["search"])) {

      $search = htmlspecialchars($_GET["search"]);

      if (empty($search)) {

        $err = "Please search an employee first.";

      } else {

        try {

          include "inc/dbh.php";

          $query = "SELECT * FROM employee_tbl WHERE id = :search OR first_name = :search OR last_name = :search;";

          $stmt = $pdo->prepare($query);
          $stmt->bindParam(":search", $search);
          $stmt->execute();

          global $results;
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

          $pdo = null;
          $stmt = null;

        } catch (PDOException $err) {
          die("Query failed: " . $err->getMessage());
        }

      }

    }

    if (isset($_POST["sort"])) {

      $selectedSort = $_POST["sort"];

      try {

        include "inc/dbh.php";

        $query = "SELECT * FROM employee_tbl ORDER BY $selectedSort ASC;";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        global $results;
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

      } catch (PDOException $err) {
        die("Query failed: " . $err->getMessage());
      }

    }
  ?>

  <header>
    <nav class="bg-[#e8ebed]">
      <div class="mx-8 px-10 py-5 flex justify-between items-center rounded-full bg-white">
        <a href="homepage.php" class="flex justify-center items-center gap-2">
          <img src="images/imanage-logo.png" alt="iManage" width="48px">
          <span class="font-bold text-3xl text-[#333333]">iManage</span>
        </a>    

        <div>
          <a href="add_employee.php">
            <button class="flex justify-center items-center gap-2 cursor-pointer bg-[#e05d38] w-full px-5 py-3 rounded-full shadow-lg transition ease-in hover:bg-[#DD4B22]">
              <img src="images/add-icon.png" class="text-white" alt="add-icon" width="24px">
              <span class="text-sm font-semibold text-white">Add Employee</span>
            </button>
          </a>
          
        </div>
      </div>
    </nav>
  </header>

  <div class="flex h-screen justify-center bg-[#e8ebed]">
    <div class="bg-white flex flex-col gap-6 w-full h-auto m-8 p-10 rounded-xl shadow-lg">

      <div class="flex justify-between">
        <div>
          <h1 class="font-bold text-[28px] text-[#333333] mb-2">List of Employees</h1>
          <h3 class="text-[16px] text-[#6B7280] font-semibold">See all employees information.</h3>
        </div>
        <div>
          <a onclick="return confirm('Are you sure you want to log out?');" href="login.php">
            <button type="reset" class="flex justify-center items-center gap-2 px-4 py-2 rounded-xl shadow-sm cursor-pointer text-sm font-semibold transition ease-in hover:text-[#1e3a8a] hover:bg-[#d6e4f0]">
              <img src="images/logout-icon.png" class="text-white" alt="logout-icon" width="24px">
              <span>Log Out</span>
            </button>
          </a>
        </div>
      </div>

      <div class="mt-5 flex justify-between items-center">
        
        <form action="homepage.php" class="flex gap-3 w-1/2" method="get">
          <input type="text" name="search" class="p-2 border border-[#e8ebed] w-1/2 focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Search by name or ID...">
          <button type="submit" class="flex justify-center items-center gap-1 cursor-pointer bg-[#e05d38] px-5 py-2 rounded-full shadow-lg transition ease-in hover:bg-[#DD4B22]">
            <img src="images/search-icon.png" alt="Search">
            <span class="text-sm font-semibold text-white">Search</span>
          </button>
        </form>

        <form action="homepage.php" class="flex gap-3 justify-end items-center w-1/2" method="post">
          <select name="sort" class="w-1/4 font-semibold h-8 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl">
            <option value="id">Employee ID</option>
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
          </select>
          <input type="submit" value="Sort" class="bg-[#e05d38] text-white rounded-lg font-semibold py-1 px-4 cursor-pointer">
        </form>
        
      </div>

      <p class="text-[#ef4444] text-sm"><?php echo $err ?: $err; ?></p>

      <div class="px-8 py-4 border border-[#e8ebed] rounded-xl shadow-sm">

        <table class="w-full">
          <tr class="text-left border-b border-[#e8ebed]">
            <th class="p-3">Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Job Position</th>
            <th>Gross Salary</th>
            <th class="text-center">Actions</th>
          </tr>

          <?php foreach($results as $dataRow): ?>
            <tr class="text-left border-b border-[#e8ebed]">
              <td class="p-3"><?php echo $dataRow['id']; ?></td>
              <td><?php echo $dataRow['first_name']; ?></td>
              <td><?php echo $dataRow['last_name']; ?></td>
              <td><?php echo $dataRow['position']; ?></td>
              <td><?php echo $dataRow['salary']; ?></td>
              <td>
                <div class="w-full flex justify-center gap-2">
                  <a href="edit_employee.php?id=<?php echo $dataRow['id']; ?>">
                    <button class="bg-[#d6e4f0] rounded-lg font-semibold py-1 px-4 cursor-pointer">Edit</button>
                  </a>

                  <a onclick="return confirm('Are you sure you want to delete this employee?');" href="delete_employee.php?id=<?php echo $dataRow['id']; ?>">
                    <button class="bg-[#ef4444] text-white rounded-lg font-semibold py-1 px-4 cursor-pointer">Delete</button>
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>    
        
        <!-- checking if $results is empty -->
        <?php if(empty($results)): ?>
          <p class="text-center text-[#333333] p-5">There is no listed employees yet.</p>
        <?php endif; ?>

      </div>

    </div>

  </div>

<?php include "inc/footer.php"; ?>

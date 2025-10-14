<?php include "inc/header.php"; ?>

  <?php 

    try {

      require_once "inc/dbh.php";

      $query = "SELECT * FROM employee_tbl";

      $stmt = $pdo->prepare($query);

      $stmt->execute();

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $pdo = null;
      $stmt = null;

    } catch (PDOException $err) {
      die("Query failed: " . $err->getMessage());
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

      <div>
        <h1 class="font-bold text-[28px] text-[#333333] mb-2">List of Employees</h1>
        <h3 class="text-[16px] text-[#6B7280] font-semibold">See all employees information.</h3>
      </div>

      <div class="mt-5 flex justify-between items-center">

        <div class="flex gap-3 w-1/2">
          <input type="text" class="p-2 border border-[#e8ebed] w-1/2 focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Search by name or ID...">
          <button class="flex justify-center items-center gap-1 cursor-pointer bg-[#e05d38] px-5 py-2 rounded-full shadow-lg transition ease-in hover:bg-[#DD4B22]">
            <img src="images/search-icon.png" alt="Search">
            <span class="text-sm font-semibold text-white">Search</span>
          </button>
        </div>

        <div class="flex gap-3 justify-end items-center w-1/2">
          <label class="font-semibold" for="sort">Sort by:</label>
          <select class="w-1/4 font-semibold h-8 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl" name="sort">
            <option value="empid">Employee ID</option>
            <option value="fname">First Name</option>
            <option value="lname">Last Name</option>
            <option value="job">Job Position</option>
            <option value="salary">Gross Salary</option>
          </select>
        </div>
        
      </div>

      <div class="px-8 py-4 border border-[#e8ebed] rounded-xl shadow-sm">
        <!-- checking if $results is empty -->
        <?php if(empty($results)): ?>
          <p class="text-center text-[#333333]">There is no listed employees yet.</p>
        <?php endif; ?>

        <table class="w-full">
          <tr class="text-left border-b border-[#e8ebed]">
            <th class="p-3">Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Job Position</th>
            <th>Gross Salary</th>
            <th class="text-center">Actions</th>
          </tr>

          <?php foreach($results as $dataRow ): ?>
            <tr class="text-left border-b border-[#e8ebed]">
              <td class="p-3"><?php echo $dataRow['id']; ?></td>
              <td><?php echo $dataRow['first_name']; ?></td>
              <td><?php echo $dataRow['last_name']; ?></td>
              <td><?php echo $dataRow['position']; ?></td>
              <td><?php echo $dataRow['salary']; ?></td>
              <td>
                <div class="w-full flex justify-center gap-2">
                  <a href="edit_employee.php?id=<?php echo $dataRow['id']; ?>">
                    <button class="bg-[#d6e4f0] rounded-lg font-semibold py-1 px-4 cursor-pointer duration-500 ease-out hover:grow">Edit</button>
                  </a>
                  <button class="bg-[#ef4444] text-white rounded-lg font-semibold py-1 px-4 cursor-pointer duration-500 ease-out hover:grow">Delete</button>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>      
      </div>

    </div>

  </div>

<?php include "inc/footer.php"; ?>

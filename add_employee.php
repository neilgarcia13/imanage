<?php include "inc/header.php"; ?>

  <?php 

    $firstName = $lastName = $jobPosition = $grossSalary = "";
    $firstNameErr = $lastNameErr = $jobPositionErr = $grossSalaryErr = "";
  
    if (isset($_POST["add"])) {

      if (empty($_POST["first_name"])) $firstNameErr = "First name is required.";
      else $firstName = htmlspecialchars($_POST["first_name"]);

      if (empty($_POST["last_name"])) $lastNameErr = "Last name is required.";
      else $lastName = htmlspecialchars($_POST["last_name"]);

      if (empty($_POST["position"])) $jobPositionErr = "Position is required.";
      else $jobPosition = htmlspecialchars($_POST["position"]);

      if (empty($_POST["salary"])) $grossSalaryErr = "First name is required.";
      else $grossSalary = htmlspecialchars($_POST["salary"]);

      if (empty($firstNameErr) && empty($lastNameErr) && empty($jobPositionErr) && empty($grossSalaryErr)) {

        try {

          require_once "inc/dbh.php";

          $query = "INSERT INTO employee_tbl (first_name, last_name, position, salary) VALUES (:firstName, :lastName, :jobPosition, :grossSalary);";

          $stmt = $pdo->prepare($query);

          $stmt->bindParam(":firstName", $firstName);
          $stmt->bindParam(":lastName", $lastName);
          $stmt->bindParam(":jobPosition", $jobPosition);
          $stmt->bindParam(":grossSalary", $grossSalary);

          $stmt->execute();

          $pdo = null;
          $stmt = null;

          header("Location: homepage.php");

          die();

        } catch (PDOException $err) {
          die("Query failed: " . $err->getMessage());
        }

      }

    }
  
  ?>

  <div class="flex h-screen justify-center bg-[#e8ebed]">
    <div class="bg-white flex flex-col gap-6 w-full h-[540px] m-8 p-10 rounded-xl shadow-lg">

      <div class="flex justify-between">
        <div>
          <h1 class="font-bold text-[22px] sm:text-[28px] text-[#333333] mb-2">Add Employee</h1>
          <h3 class="text-[14px] sm:text-[16px] text-[#6B7280] font-semibold">Enter details of an employee.</h3>
        </div>
        <div>
          <a href="homepage.php">
            <button type="reset" class="flex justify-center items-center gap-2 px-2 md:px-4 py-2 rounded-xl shadow-sm cursor-pointer text-sm font-semibold transition ease-in hover:text-[#1e3a8a] hover:bg-[#d6e4f0]">
              <img src="images/back-icon.png" class="text-white" alt="bavk-icon" width="24px">
              <span class="text-xs md:text-base">Back to Homepage</span>
            </button>
          </a>
        </div>
      </div>

      <div class="px-5 md:px-40 py-8 w-auto border border-[#e8ebed] rounded-xl shadow-sm">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="w-full" method="post">
          <div class="grid grid-cols-2 gap-10">

            <div class="flex flex-col gap-2">
              <label class="font-bold text-xs sm:text-base text-[#333333]" for="first_name">First Name</label>
              <input class="p-2 border border-[#e8ebed] text-xs sm:text-base w-full focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Enter first name..." type="text" id="first_name" name="first_name">
              <p class="text-[#ef4444] text-sm"><?php echo $firstNameErr ?: $firstNameErr; ?></p>
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-bold text-xs sm:text-base text-[#333333]" for="first_name">Last Name</label>
              <input class="p-2 border border-[#e8ebed] text-xs sm:text-base  w-full focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Enter last name..." type="text" id="last_name" name="last_name">
              <p class="text-[#ef4444] text-sm"><?php echo $lastNameErr ?: $lastNameErr; ?></p>
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-bold text-xs sm:text-base text-[#333333]" for="first_name">Job Position</label>
              <select class="h-10 border border-[#e8ebed] text-xs sm:text-base focus:outline-[#e05d38] shadow-sm rounded-xl" id="position" name="position">
                <optgroup label="Choose a position">
                  <option value="Senior Software Engineer">Senior Software Engineer</option>
                  <option value="Junior Software Engineer">Junior Software Engineer</option>
                  <option value="UI/UX Developer">UI/UX Developer</option>
                  <option value="Project Manager">Project Manager</option>
                  <option value="Database Administrator">Database Administrator</option>
                </optgroup>
              </select>
              <p class="text-[#ef4444] text-sm"><?php echo $jobPositionErr ?: $jobPositionErr; ?></p>
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-bold text-xs sm:text-base text-[#333333]" for="salary">Gross Salary</label>
              <select class="h-10 border border-[#e8ebed] text-xs sm:text-base focus:outline-[#e05d38] shadow-sm rounded-xl" id="salary" name="salary">
              <optgroup label="Choose salary">
                <option value="Under PHP 25K">Under PHP 25K</option>
                <option value="PHP 30K - 40K">PHP 30K - 40K</option>
                <option value="PHP 40K - 50K">PHP 40K - 50K</option>
                <option value="PHP 50K - 60K">PHP 50K - 60K</option>
                <option value="PHP 60K - 70K">PHP 60K - 70K</option>
                <option value="PHP 70K - 80K">PHP 70K - 80K</option>
                <option value="PHP 80K - 90K">PHP 80K - 90K</option>
                <option value="PHP 90K - 100K">PHP 90K - 100K</option>
                <option value="Over PHP 100K">Over PHP 100K</option>
              </optgroup>
              </select>
              <p class="text-[#ef4444] text-sm"><?php echo $grossSalaryErr ?: $grossSalaryErr; ?></p>
            </div>

            <div class="flex gap-3 justify-end col-2">
              <input class="bg-[#d6e4f0] rounded-lg shadow-lg text-xs sm:text-base font-semibold px-5 py-2 cursor-pointer" type="reset" value="Reset">
              <input class="cursor-pointer bg-[#e05d38] text-xs sm:text-base px-4 py-2 rounded-lg shadow-lg transition ease-in hover:bg-[#DD4B22] text-sm font-semibold text-white" type="submit" value="Insert to Table" name="add">
            </div>
            
          </div>
        </form>
      </div>

    </div>

  </div>

<?php include "inc/footer.php"; ?>
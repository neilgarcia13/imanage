<?php include "inc/header.php"; ?>

  <?php 

    if (isset($_GET["id"])) {

      try {

        require_once "inc/dbh.php";

        $id = $_GET["id"];
        $query = "SELECT * FROM employee_tbl WHERE id = :id;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);     
        
        $pdo = null;
        $stmt = null;

      } catch (PDOException $err) {
        die("Query failed: " . $err->getMessage());
      }
      
    }
  
  ?>

  <div class="flex h-screen justify-center bg-[#e8ebed]">
    <div class="bg-white flex flex-col gap-6 w-full h-[540px] m-8 p-10 rounded-xl shadow-lg">

      <div>
        <h1 class="font-bold text-[28px] text-[#333333] mb-2">Edit Employee</h1>
        <h3 class="text-[16px] text-[#6B7280] font-semibold">Edit details of an employee.</h3>
      </div>

      <div class="px-40 py-8 w-auto border border-[#e8ebed] rounded-xl shadow-sm">
        <form onsubmit="return confirm('Changes will be saved.');" action="inc/form_handler.php" class="w-full" method="post">
          <div class="grid grid-cols-2 gap-10">

           <!-- use to fetch id in database -->
            <input type="hidden" name="id" value="<?php echo $result["id"]; ?>">

            <div class="flex flex-col gap-2">
              <label class="font-bold text-[#333333]" for="first_name">First Name</label>
              <input class="p-2 border border-[#e8ebed] w-full focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Enter first name..." type="text" id="first_name" name="first_name" value="<?php echo $result["first_name"]; ?>">
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-bold text-[#333333]" for="last_name">Last Name</label>
              <input class="p-2 border border-[#e8ebed] w-full focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Enter last name..." type="text" id="last_name" name="last_name" value="<?php echo $result["last_name"]; ?>">
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-bold text-[#333333]" for="position">Job Position</label>
              <select class="h-10 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl" id="position" name="position">
                <optgroup label="Choose a position">
                  <option 
                    value="Senior Software Engineer"
                    <?php if ($result["position"] == "Senior Software Engineer") echo "selected"?>>
                    Senior Software Engineer
                  </option>
                  <option value="Junior Software Engineer"
                    <?php if ($result["position"] == "Junior Software Engineer") echo "selected"?>>
                    Junior Software Engineer
                  </option>
                  <option value="UI/UX Developer"
                    <?php if ($result["position"] == "UI/UX Developer") echo "selected"?>>
                    UI/UX Developer
                  </option>
                  <option value="Project Manager"
                    <?php if ($result["position"] == "Project Manager") echo "selected"?>>
                    Project Manager
                  </option>
                  <option value="Database Administrator"
                    <?php if ($result["position"] == "Database Administrator") echo "selected"?>>
                    Database Administrator
                  </option>
                </optgroup>
              </select>
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-bold text-[#333333]" for="salary">Gross Salary</label>
              <select class="h-10 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl" id="salary" name="salary">
                <optgroup label="Choose salary">
                  <option value="Under PHP 25K"
                    <?php if ($result["salary"] == "Under PHP 25K") echo "selected"?>>
                    Under PHP 25K
                  </option>
                  <option value="PHP 30K - 40K"
                    <?php if ($result["salary"] == "PHP 30K - 40K") echo "selected"?>>
                    PHP 30K - 40K
                  </option>
                  <option value="PHP 40K - 50K"
                    <?php if ($result["salary"] == "PHP 40K - 50K") echo "selected"?>>
                    PHP 40K - 50K
                  </option>
                  <option value="PHP 50K - 60K"
                    <?php if ($result["salary"] == "PHP 50K - 60K") echo "selected"?>>
                    PHP 50K - 60K
                  </option>
                  <option value="PHP 60K - 70K"
                    <?php if ($result["salary"] == "PHP 60K - 70K") echo "selected"?>>
                    PHP 60K - 70K
                  </option>
                  <option value="PHP 70K - 80K"
                    <?php if ($result["salary"] == "PHP 70K - 80K") echo "selected"?>>
                    PHP 70K - 80K
                  </option>
                  <option value="PHP 80K - 90K"
                    <?php if ($result["salary"] == "PHP 80K - 90K") echo "selected"?>>
                    PHP 80K - 90K
                  </option>
                  <option value="PHP 90K - 100K"
                    <?php if ($result["salary"] == "PHP 90K - 100K") echo "selected"?>>
                    PHP 90K - 100K
                  </option>
                  <option value="Over PHP 100K"
                    <?php if ($result["salary"] == "Over PHP 100K") echo "selected"?>>
                    Over PHP 100K
                  </option>
                </optgroup>
              </select>
            </div>

            <div class="flex gap-3 justify-end col-2">
              <input class="bg-[#d6e4f0] rounded-lg shadow-lg text-sm font-semibold px-5 py-2 cursor-pointer" type="reset" value="Reset">
              <input class="cursor-pointer bg-[#e05d38] px-4 py-2 rounded-lg shadow-lg transition ease-in hover:bg-[#DD4B22] text-sm font-semibold text-white" type="submit" value="Save Changes" name="edit">
            </div>
            
          </div>
        </form>
      </div>

    </div>

  </div>



<?php include "inc/footer.php"; ?>
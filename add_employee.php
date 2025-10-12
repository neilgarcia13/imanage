<?php include "inc/header.php"; ?>

  <div class="flex  justify-center bg-[#e8ebed]">
    <div class="bg-white flex flex-col gap-6 w-full h-[540px] m-8 p-10 rounded-xl shadow-lg">

      <div>
        <h1 class="font-bold text-[28px] text-[#333333] mb-2">Add Employee</h1>
        <h3 class="text-[16px] text-[#6B7280] font-semibold">Enter details of an employee.</h3>
      </div>

      <div class="px-40 py-8 w-auto border border-[#e8ebed] rounded-xl shadow-sm">
        <form class="w-full" method="post">
          <div class="grid grid-cols-2 gap-10">

            <div class="flex flex-col gap-2">
              <label class="font-bold text-[#333333]" for="first_name">First Name</label>
              <input class="p-2 border border-[#e8ebed] w-full focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Enter first name..." type="text" name="first_name">
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-bold text-[#333333]" for="first_name">Last Name</label>
              <input class="p-2 border border-[#e8ebed] w-full focus:outline-[#e05d38] shadow-sm rounded-xl" placeholder="Enter last name..." type="text" name="last_name">
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-bold text-[#333333]" for="first_name">Job Position</label>
              <select class="h-10 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl" name="position">
                <optgroup label="Choose a position">
                  <option value="senior_softeng">Senior Software Engineer</option>
                  <option value="junior_softeng">Junior Software Engineer</option>
                  <option value="ui_ux">UI/UX Developer</option>
                  <option value="pm">Project Manager</option>
                  <option value="db_admin">Database Administrator</option>
                </optgroup>
                
              </select>
            </div>

            <div class="flex flex-col gap-2">
              <label class="font-bold text-[#333333]" for="first_name">Gross Salary</label>
              <select class="h-10 border border-[#e8ebed] focus:outline-[#e05d38] shadow-sm rounded-xl" name="salary">
              <optgroup label="Choose salary">
                <option value="Under PHP 50K">Under PHP 25K</option>
                <option value="PHP 50K - 60K">PHP 30K - 40K</option>
                <option value="PHP 60K - 70K">PHP 40K - PHP 50K</option>
                <option value="PHP 70K - 80K">PHP 50K - PHP 60K</option>
                <option value="PHP 80K - 90K">PHP 60K - PHP 70K</option>
                <option value="PHP 90K - 100K">PHP 70K - PHP 80K</option>
                <option value="PHP 100K - 125K">PHP 80K - PHP 90K</option>
                <option value="PHP 125K - 150K">PHP 90K - PHP 100K</option>
                <option value="Over PHP 200K">Over PHP 100K</option>
              </optgroup>
              </select>
            </div>

            <div class="flex gap-3 justify-end col-2">
              <input class="bg-[#d6e4f0] rounded-lg shadow-lg text-sm font-semibold px-5 py-2 cursor-pointer" type="reset" value="Reset">
              <input class="cursor-pointer bg-[#e05d38] px-4 py-2 rounded-lg shadow-lg transition ease-in hover:bg-[#DD4B22] text-sm font-semibold text-white" type="submit" value="Insert to Table">
            </div>
            
          </div>
        </form>
      </div>

    </div>

  </div>



<?php include "inc/footer.php"; ?>
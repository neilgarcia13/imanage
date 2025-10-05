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

  <header>
    <nav class="bg-[#e8ebed]">
      <div class="mx-8 px-10 py-5 flex justify-between items-center rounded-full bg-white">
        <a href="homepage.php" class="flex justify-center items-center gap-2">
          <img src="images/imanage-logo.png" alt="iManage" width="48px">
          <span class="font-bold text-3xl text-[#333333]">iManage</span>
        </a>    

        <div>
          <button class="flex justify-center items-center gap-2 cursor-pointer bg-[#e05d38] w-full px-5 py-3 rounded-full shadow-lg transition ease-in hover:bg-[#DD4B22]">
            <img src="images/add-icon.png" class="text-white" alt="add-icon" width="24px">
            <span class="text-sm font-semibold text-white">Add Employee</span>
          </button>
        </div>
      </div>
    </nav>
  </header>

  <div class="flex h-screen justify-center bg-[#e8ebed]">
    <div class="bg-white flex flex-col gap-6 w-full h-1/2 m-8 p-10 rounded-xl shadow-lg">

      <div>
        <h1 class="font-bold text-[28px] text-[#333333] mb-2">List of Employees</h1>
        <h3 class="text-[16px] text-[#6B7280] font-semibold">See all employees information.</h3>
      </div>

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
          <tr class="text-left border-b border-[#e8ebed]">
            <td class="p-3">001</td>
            <td>Maria</td>
            <td>Anders</td>
            <td>UI/UX Designer</td>
            <td>$1,450</td>
            <td>
              <div class="w-full flex justify-center gap-2">
                <button class="bg-[#d6e4f0] rounded-lg font-semibold py-1 px-4 cursor-pointer duration-500 ease-out hover:grow">Edit</button>
                <button class="bg-[#ef4444] text-white rounded-lg font-semibold py-1 px-4 cursor-pointer duration-500 ease-out hover:grow">Delete</button>
              </div>
            </td>
          </tr>
          <tr class="text-left">
            <td class="p-3">002</td>
            <td>Francisco</td>
            <td>Chang</td>
            <td>Senior Software Engineer</td>
            <td>$1,900</td>
            <td>
              <div class="w-full flex justify-center gap-2">
                <button class="bg-[#d6e4f0] rounded-lg font-semibold py-1 px-4 cursor-pointer duration-500 ease-out hover:grow">Edit</button>
                <button class="bg-[#ef4444] text-white rounded-lg font-semibold py-1 px-4 cursor-pointer duration-500 ease-out hover:grow">Delete</button>
              </div>
            </td>
          </tr>
        </table>
      </div>

    </div>

  </div>

  <footer class="bg-[#e8ebed] text-center font-semibold p-3">
      <span>iManage &copy; 2025 | All rights reserved.</span>
  </footer>

</body>
</html>
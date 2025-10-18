<?php
if (isset($_POST['color'])) {
    $selectedColor = $_POST['color'];
    echo "You selected: " . $selectedColor; // Output: You selected: red (if Red was chosen)
}
?>

<form method="POST">
    <label for="color">Choose a color:</label>
    <select name="color" id="color">
        <option value="red">Red</option>
        <option value="green" >Green</option>
        <option value="blue" selected>Blue</option>
    </select>
    <button type="submit">Submit</button>
</form>
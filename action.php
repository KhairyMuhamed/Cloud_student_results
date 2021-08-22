<?php
$dbhost = "project_database";
$dbuser = "root";
$dbpass = "secret";
$db = "project";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
if($conn->connect_error){
   die("connection field");
}
//echo "connection succcesfully";
$ser = $_GET['studentsID'];
$sql = "SELECT * FROM students WHERE studentsID =$ser"; 
$result = $conn->query($sql);
?>
<?php if ($result->num_rows > 0) { ?>

<?php  while($row = $result->fetch_assoc()) { ?>
  <div class="container">
    <div class="row">
  <div class="col-lg-6 col-xs-6" style="text-align: left;">
      <div style="margin-bottom: 20px; font-size: 1.1em;"><span style="font-weight: bolder;" > ID: </span><?php echo $row["studentsID"] ?></div>
      <div style="margin-bottom: 20px; font-size: 1.1em;"><span style="font-weight: bolder;"> Name:</span> <?php echo $row["name"] ?></div>
      <div style="margin-bottom: 20px; font-size: 1.1em;"><span style="font-weight: bolder;"> GPA:</span> <?php echo $row["GPA"] ?></div>
      <img src="<?php  echo "./" . ($row["picture"]); ?>" height="250"></div>
   <?php } ?>


<?php } else { ?>
<?php  echo "0 results"; ?>
<?php } ?>


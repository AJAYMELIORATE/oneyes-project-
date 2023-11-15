<?php
session_start();
include "db_connection.php";

$q = "SELECT * FROM 'chat_message'";
if ($rq = mysqli_query($conn,$q)) {

  if (mysqli_num_rows($rq) > 0) {

    while ($data = mysqli_fetch_assoc($rq)) {
      if($data["user_phone"]==$_SESSION["user_phone"])
    {
        ?>
  <p class="sender">
    <span><?= $data["user_phone"] ?></span>
    <?= $data["messages"] ?>
</p>

<?php
      }else{
?>
  <p>
    <span><?= $data["user_phone"] ?></span>
    <?= $data["messages"] ?>
</p>

<?php
      }
    }
  } else {

    echo "<h3> Chat is empty at this moment!!</h3>";
  }
}




?>

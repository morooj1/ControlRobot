<!DOCTYPE html>
<html>

<script>
 var sum=0;
 var sum2=0;
 var sum3=0;
 var dest1=0;
 var dest2=0;
 var dest3=0;


 function myFunction() {
  var dright = document.getElementById("myText").value;
  var x = document.createElement("TABLE");
  var table = document.getElementById("myTable");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "Right";
  cell2.innerHTML = dright;

  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  ctx.beginPath();
  dest1=parseFloat(dright);
  //ctx.strokeRect((150+sum2),(400-sum),20, 0);
  ctx.strokeRect(150+sum2,(400-sum),dest1, 0);
  sum2=sum2+dest1;
  ctx.stroke();
}

  var sum=0;
function myFunction2() {
  var dForward = document.getElementById("myText2").value;
  var x = document.createElement("TABLE");
  var table = document.getElementById("myTable");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "Forward";
  cell2.innerHTML = dForward;
  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  ctx.beginPath();
  dest2=parseFloat(dForward);
  sum=sum + dest2;
  //document.getElementById("my").innerHTML=sum+"/" +(400-sum);
  ctx.strokeRect((150+sum2),(400-sum),0, dest2);
  //ctx.moveTo(20, 20);
  //ctx.lineTo(20, dForward);
  ctx.stroke();
}


function myFunction3() {
  var dLeft = document.getElementById("myText3").value;
  var x = document.createElement("TABLE");
  var table = document.getElementById("myTable");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "Left";
  cell2.innerHTML = dLeft;

  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  ctx.beginPath();
  dest3=parseFloat(dLeft);
  sum2=sum2-dest3;
  ctx.strokeRect(150+sum2,(400-sum),dest3, 0);
  sum3=sum3+dest3;
  ctx.stroke();
}



/*function DeleteFunction(id) {
  document.getElementById("myForm1").reset();
  var tbl = document.getElementById(id);
  if(tbl) tbl.parentNode.removeChild(tbl);
  //location.reload();

}*/

</script>
<head> <title> control panel </title>
<style>
 body {background-color:#7B68EE;
 }

input[type=text], select {
  width: 90%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
p {
    font-family: "montserrat";
    font-weight: bold;
}

input[type=submit] ,button {
  width: 100px;
  background-color: #483D8B;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}


input[type=submit]:hover , button:hover {
  background-color: #6A5ACD;
}

div {
  border-radius: 5px;
  padding: 20px;

}

table {
    width: 400px;
  text-align: center;
   border: 1px solid black;
   border-color:  #483D8B;


}
 .t {

   border-width: 0px;}


td  {
  height: 50px;
  border: 1px solid black;
  border-color:  #483D8B;
}
</style></head>
<body>
   <center><canvas id="myCanvas" width="500" height="400" style="border:1px solid #483D8B; "></canvas></center>



     <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
   <center><table class="t"><tr><td class="t">
  <form id="myForm1" method="post" target="dummyframe"  $_SERVER['REQUEST_METHOD'] == 'POST' >
    <label for="Right"><button type="submit" id="input1"  name="Right" onclick="myFunction()" >  Right  </button></label></td>
    <td class="t"><input type="text" id="myText" name="des1" placeholder=""></td></tr> </br>

    <tr><td class="t"><label for="Forward"><button type="submit" name="Forward"  id="updateButton" onclick="myFunction2()">  Forward  </button></label></td>
    <td class="t"><input type="text" id="myText2" name="des2" placeholder=""></td></tr></br>

    <tr><td class="t"><label for="Left"><button type="submit" id="updateButton"  name="Left"  onclick="myFunction3()">  Left  </button></label></td>
    <td  class="t"><input type="text" id="myText3" name="des3" placeholder=""></td></tr></br>

    <tr><td class="t"><button name="button1" id="ss" onclick="location.reload();">  Delete  </button></td>
  <!--  <td class="t">  <button type="submit" name="save" >save </button> </td> -->
  <td class="t"><button type="button" id="updateButton" class="btn btn-primary" onclick="productUpdate();">  Start  </button></td></tr></table></center>
  </form>


</br>

   <center><table  id="myTable" class="myTable"> </table></center>


    <?php
    // Create connection
    $conn3 = new mysqli("localhost","root","","control");
    // Check connection
    if ($conn3->connect_error) {
      die("Connection failed: " . $conn3->connect_error);
    }


        if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

        if(isset($_POST['Right']) ) {
           $des = $_POST['des1'];
          $sql3 = "INSERT INTO remote2 (id,direction,distance)
          VALUES ('', 'Right',$des)";
        }

        if(isset($_POST['Forward'])) {
           $des2 = $_POST['des2'];
          $sql3 = "INSERT INTO remote2 (id,direction,distance)
          VALUES ('', 'Forward',$des2)";
        }
        if(isset($_POST['Left']) ) {
           $des3 = $_POST['des3'];
          $sql3 = "INSERT INTO remote2 (id,direction,distance)
          VALUES ('', 'Left',$des3)";
        }

    }

      if ($conn3->query($sql3) === TRUE) {
           echo "New record created successfully";
         } else {
           echo "Error: " . $sql3 . "<br>" . $conn3->error;
         }
      $conn3->close();
  ?>
</body>
</html>

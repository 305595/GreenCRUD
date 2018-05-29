<HTML>
    <head></head>
    <body>
<?php
//update_delete.php
if ($_GET['action'] == 'Go Back') 
    {
             //action for No
        header('Location: template.html');
        exit;   
    }
else
    {
        echo $studentID;
        echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
    
        require_once 'login.php';
        $conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
            if ($conn->connect_error) 
            {
             die("Connection failed: " . $conn->connect_error);
            }

	
        $sql = "SELECT * FROM student WHERE studentID='" . $_POST['update'] . "'";
        $result = $conn->query($sql);

        $studentID = $row[0];
        $studentName = $row[1];
        $class = $row[2];
        $year = $row[3];
        
        if ($result->num_rows > 0)//will only do this if there is something to be returned from the above line
	        {
                while($row = $result->fetch_assoc())
		            {
                        // HTML to display the form on this page.
                        echo"Edit the information for".$row['studentName'].".";
	                    echo "<TABLE><TR><TH>Student ID</TH><TH>Student Name</TH><TH>Class</TH><TH>Grade</TH></TR>";
                        echo "<TR>";
	                    echo "<TD>".$row['studentID']. "</TD><TD>". $row['studentName']. "</TD><TD>". $row['class']. "</TD><TD>".$row['year'] ."</TD></TR>";
	                    echo "<form action='changeItem.php' method = 'post'>";
	                    echo "<TR><TD><input type='text' name = studentID value=".$row['studentID']." class='field left' readonly></TD>";
                        echo "<TD><input type='text' placeholder='Full Name' name='Name' class='advancedSearchTextBox'></TD>";
                        echo "<TD><select id='select' name='game'>";
                        echo "<option value='PUBG' >PUBG</option>";
                        echo "<option value='Darwin Project' >Darwin Project</option>";
                        echo "<option value='Fortnite' >Fortnite</option>";
                        echo "<option value='H1Z1' >H1Z1</option>";
                        echo "<option value='Minecraft: Survival Games' >Minecraft: Survival Games</option>";
                        echo "<option value='RoS' >RoS</option>";
                        echo "</select></TD>";
                        echo "<TD><select id='select' name='year'>";
                        echo "<option value='9' >9</option>";
                        echo "<option value='10' >10</option>";
                        echo "<option value='11' >11</option>";
                        echo "<option value='12' >12</option>";
                        echo "</select></TD></TR></TABLE>";
                        echo "<input name = 'create' type = 'submit' value = 'Submit Changes'>";
                        echo "</form>";
	                    
	                    
                    } 
                 echo "</body>";   
	        }
    }
?>
</HTML>
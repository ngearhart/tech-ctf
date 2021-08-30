<!DOCTYPE html>
<html>
	<head>
		<title>Ping Test</title>
        <script>
            console.log("Hint: add ?debug to the query string :)")
        </script>
        <!-- 
            Hint: The blacklisted characters / words are:
            space, &, @, %, ^, ~, `, <, >, ,, \, /, ls, cat, less, tail, more, whoami, pwd, busybox, echo
        -->
	</head>
	<body>
        <h1>Ping Test</h1>
        <h2>Enter the IP address to ping</h2>
        <form method="POST">
            <input type="text" name="ip" />
            <input type="submit" value="Ping me" />
        </form>

        <?php
            if (isset($_POST["ip"])) {
                $input = $_POST["ip"];
                echo "<hr /><br />";

                $blacklist = array(" ", "&", "@", "%", "^", "~", "`", "<", ">", ",", "\\", "/");
                $input = str_replace($blacklist, "", $input);
                
                $blacklist = array("ls", "cat", "less", "tail", "more", "whoami", "pwd", "busybox", "echo");
                $input = str_replace($blacklist, "", $input);

                $output = shell_exec("ping -c 1 " . $input);
                
                if (isset($_GET["debug"]) == true) {
                    echo "<div>Command run: ping -c 1 " . $input . "</div>";
                }
                
                echo "<pre>" . $output . "</pre>";
            }
        ?>
	</body>
</html>

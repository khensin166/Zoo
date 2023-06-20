<?php
    include_once('navbar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
</head>
<body>
    <h1>Report</h1>
    <br><br><br><br>
        <fieldset>
            <h3>Report Form</h3>
			<article>
				<textarea cols="20" rows="10" readonly style="overflow: hidden; float: center;"></textarea>
			</article>
            <br>
            <div style="justify-content: center; display: flex;">
			<input type="submit" value="Submit">
			<input type="reset" value="Reset">
		    </div>
            <br><br>
            Insert Photo : <input type="file" name="image" value="Choose file" style="margin-left: 35px;"><br><br><br>
            <fieldset>
            <a>Anda harus <a href="login.php">login</a> untuk membuat laporan</a><br><br>
            </fieldset>
        </fieldset>
			</form>
	</fieldset>
</body>
</html>
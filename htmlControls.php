<HTML>
<meta charset="utf-8">
<BODY>

  //con método get se ve en url, con Post se esconde
<form action="pagina.php" method="POST" oninput="x.value=parseInt(range.value)">
  Texto: <input type="text" name="texto1", size="10"><br>
  Password: <input type="password" name="password1" maxlength="8"><br>
  Radio:
	<input type="radio" name="radio1" value="1" CHECKED> Opción 1
	<input type="radio" name="radio1" value="2"> Opción 2
	<input type="radio" name="radio1" value="3"> Opción 3 <br>
Checkbox:
<input type="checkbox" name="items1[]" value="1"> Item 1
<input type="checkbox" name="items1[]" value="2" CHECKED> Item 2
<input type="checkbox" name="items1[]" value="3"> Item 3 <br>
<input type="hidden" name="hidden1" VALUE='123'><br>
File: <input type="file" name="file1"><br>
Button: <input type="button" value="Click me" onclick="alert('Hola mundo')"><br>
Color: <input type="color" name="color1"><br>
Date: <input type="date" name="date1"><br>
Time: <input type="time" name="time1"><br>
Datetime <input type="datetime-local" name="datetime1"><br>
E-mail: <input type="email" name="email1"><br>
Month <input type="month" name="month1"><br>
Number: <input type="number" name="number1" min="1" max="100"><br>
Range: <input type="range" name="range1"  id="range" min="0" max="100"><br>
<output name="x" for="range"></output><br>
Search: <input type="search" name="search1"><br>
Telephone: <input type="tel" name="tel1"><br>
URL: <input type="url" name="url1"><br>
Week: <input type="week" name="week1"><br>
<input type="submit" value="Submit">
<input type="reset">
</form>

<?PHP
?>
</BODY>
</HTML>

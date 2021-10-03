<?php
echo "<html><style>
	.bookContainer img {
	box-shadow: 0px 0px 18px 0px #666666;
	margin-bottom:5px;
}
.upper {

	font-family: 'Quicksand', sans-serif;
	background-color: #eeeeee;
}.bookContainer{left: 40px;

	transition: all .3s ease-in-out;
	transform: scale(0.9);
}

.bookContainer:hover, .bookContainer:focus {
	transform: scale(1);
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
	<style>
a {
    color: black;
}
</style><body><table>\n\n";
$f = fopen("rec.txt", "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
}
fclose($f);
echo "\n</table></body></html>";
?>
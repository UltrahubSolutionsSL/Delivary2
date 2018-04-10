<?php
/**
 * Created by IntelliJ IDEA.
 * User: UltraHub Solutions Pvt. Ltd.
 * Date: 3/2/18
 * Time: 5:50 PM
 */
include_once '../../connection/config.php';

// get all of the tables
$tables = array();
$result = mysqli_query($conn, 'SHOW TABLES');
while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

// cycle through the list of tables
foreach ($tables as $table) {
    $result = mysqli_query($conn, 'SELECT * FROM ' . $table);
    $num_fields = mysqli_num_fields($result);

    $return .= 'DROP TABLE ' . $table . ';';
    $create_table_statement = mysqli_fetch_row(mysqli_query($conn, 'SHOW CREATE TABLE ' . $table));
    $return .= "\n\n" . $create_table_statement[1] . ";\n\n";

    for ($i = 0; $i < $num_fields; $i++) {
        while ($row = mysqli_fetch_row($result)) {
            $return .= 'INSERT INTO ' . $table . ' VALUES(';
            for ($j = 0; $j < $num_fields; $j++) {
                $row[$j] = addslashes($row[$j]);
                $row[$j] = preg_replace("#\n#", "\\n", $row[$j]);
                if (isset($row[$j])) {
                    $return .= '"' . $row[$j] . '"';
                } else {
                    $return .= '""';
                }
                if ($j < ($num_fields - 1)) {
                    $return .= ',';
                }
            }
            $return .= ");\n";
        }
    }
    $return .= "\n\n\n";
}

// download the file
$filename = 'db-backup-' . date("Y-m-d H:i:s") . '.sql';
$header_string = "Content-Disposition: attachment; filename=" . $filename;
header("Content-type: text/plain");
header($header_string);
print $return;
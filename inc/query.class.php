<?php

class query
{
    public static function insert($table, $values)
    {
        if (!empty($db = db::conn())) {
            try {
                $sql = "INSERT INTO " . $table . " (" . implode(", ", array_keys($values)) . ") VALUES (";
                $i = 0;
                foreach ($values as $value) {
                    $i++;
                    if ($i == 1) {
                        $sql .= "?";
                    } else {
                        $sql .= ", ?";
                    }
                }
                $sql .= ")";
                $stmt = $db->prepare($sql);

                $i = 0;
                foreach ($values as $value) {
                    $i++;
                    $stmt->bindValue($i, $value, PDO::PARAM_STR);
                }
                $stmt->execute();
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        $db = null;
    }
}
<?php
    session_start();
    require("connect.php");

// echo "DB:Online<br>";

function tt($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}


// Проверяем выполнение запроса к БД (получаем либо ошибку с остановкой, либо TRUE - если ошибки нет)
function dbCheckError($query) {
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo '<br><b>ОШИБКА:</b> '.$errInfo[0].', '.$errInfo[1].', '.$errInfo[2].'<br>';
        // echo tt($errInfo).'<br> ОШИБКА!';
        exit(); // Есть ошибка! Выходим...
    }
    return true; // Ошибок нет, на всякий случай возвращаем TRUE
}






// ЗАПРОС на получение всех данных какой-то одной таблицы (table)
function selectAll($table, $params = []) {
    global $conn;
    // echo ("<i>FUNC:</i> <b>SELECT ALL</b><br>");
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) { // ФОРМИРУЕМ ЗАПРОС НА ОСНОВАНИИ $params
            // echo ("<i>REQUEST ".$i.":</i>  ".$sql.'<br>'); // Контролька запроса...
            if (!is_numeric($value)) {     //Если в $value НЕ ЧИСЛО тогда, оборачиваем значение в
                $value = "'".$value."'";   //одинарные кавычки
            }
            if ($i === 0) { // В этом условии мы формируем строку запроса
                $sql = $sql . " WHERE $key = $value"; // Первый параметр получает WHERE
            } else {
                $sql = $sql . " AND $key = $value"; // Все последующие AND
            }
            $i++;
        }
        // echo ("<i>REQUEST ".$i.":</i>  ".$sql.'<br>'); // Контролька запроса...
    }
    
    $query = $conn->prepare($sql);
    $query->execute();

    dbCheckError($query);
    // echo "<br><b>selectAll:</b>OK<br>";
    return $query->fetchAll();
}







// ЗАПРОС на получение одной строки из какой-то одной, выбранной, таблицы (table)
function selectOne($table, $params = []) { // Ф-я почти полностью аналогична функции selectAll
    global $conn;
    // echo ("FUNC: <b>SELECT ONE</b><br>");
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            // echo ("<i>REQUEST ".$i.":</i>  ".$sql.'<br>'); // Контролька запроса...
            if (!is_numeric($value)) {
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
        // echo ("<i>REQUEST ".$i.":</i>  ".$sql.'<br>'); // Контролька запроса...
    }

    // $sql = $sql . " LIMIT 1"; // оставим на всякий случай)
    
    $query = $conn->prepare($sql);
    $query->execute();

    dbCheckError($query);
    // echo "<br><b>selectOne:</b>OK<br>";
    return $query->fetch();
}







// ДОБАВЛЕНИЕ записи в выбранную таблицу БД 
function insert($table, $params) {
    global $conn;
    $sql = "INSERT INTO $table (";
    $secondPartSql = "(";

    if (!empty($params)) {
        $i = 0;
        $j = count($params); // Узнаём размер массива
        foreach ($params as $key => $value) {
            // echo ("<i>REQUEST ".$i.":</i>  sql=".$sql.'   sql2='.$secondPartSql.'<br>'); // Контролька запроса...

            $value = "'".$value."'";

            if ($i+1 !== $j) {
                $sql = $sql."$key,";
                $secondPartSql = $secondPartSql."$value,";
            } else {
                $sql = $sql."$key";
                $secondPartSql = $secondPartSql."$value";
            }

            $i++;
        }
        
    } else {
        echo ("<b>insert_ОШИБКА:</b> Передан пустой массив!");
        exit();
    }

    $sql = $sql.") VALUES ".$secondPartSql.")";
    // echo $sql; // Контролька сформированного запроса!
    // echo ("<i>REQUEST ".$i.":</i>  ".$sql.'<br>'); // Контролька запроса (пошагово)...

    $query = $conn->prepare($sql);
    $query->execute();

    dbCheckError($query);
    // Возвращаем id только что созданной записи
    return $conn->lastInsertId();
    // echo "<br><b>insert:</b>OK<br>";
}










// ОБНОВЛЕНИЕ выбранной записи в выбранной таблице БД 
function update($table, $params, $Mkey="id") {
    global $conn;
    // UPDATE `users` SET `username` = 'samali256' WHERE `users`.`id` = 3           //СИНТАКСИС
   
    if (!empty($params)) {
        $i = 0;
        $pars='';
        $mainKey = '';
        $j = count($params);

        foreach ($params as $key => $value) {
            if ($key != $Mkey) {
                if ($i+1 !== $j) {
                    $pars = $pars.$key." = '".$value."', ";
                } else {
                    $pars = $pars.$key." = '".$value."' ";
                }
            } else { $mainKey = $key." = ".$value; }
            $i++;
        }
        if ($mainKey === '') {
            echo "<b>update_ОШИБКА:3:</b> В массиве отсутствует главный(опорный) ключ!";
            exit();
        }
    } else {
        echo ("<b>update_ОШИБКА:2:</b> Передан пустой массив!");
        exit();
    }

    $sql = "UPDATE $table SET $pars WHERE $table.$mainKey"; // Формируем итоговый запрос
    // Контролька сформированного запроса
    // echo $sql; 

    $query = $conn->prepare($sql);
    $query->execute();

    dbCheckError($query);
    // echo "<br><b>update:</b>OK<br>";
}












// ОБНОВЛЕНИЕ выбранной записи в выбранной таблице БД 
function delete($table, $params=[], $withID=true) {
    global $conn;
    // DELETE FROM `users` WHERE `admin` = '1' AND id = 1            //СИНТАКСИС
    if (!empty($params)) {
        $i = 0;
        $where='';
        if ($withID) {$withID="=";} else {$withID="!=";}
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'".$value."'";
            }
            if ($i === 0) {
                $where = $where ."WHERE $key $withID $value";
            } else {
                $where = $where ." AND $key = $value";
            }
            $i++;
        }
    } else {
        echo ("<b>delete_ОШИБКА:2:</b> Передан пустой массив!");
        exit();
    }

    $sql = "DELETE FROM $table $where"; // Формируем итоговый запрос
    // Контролька сформированного запроса
    // echo $sql; 

    $query = $conn->prepare($sql);
    $query->execute();

    dbCheckError($query);
    // echo "<br><b>delete:</b>OK<br>";
}















// ЗОНА ТЕСТИРОВАНИЯ (ИСПОЛНЕНИЯ) - МОЖНО УДАЛИТЬ ПОСЛЕ
// Добавление строки записи в таблицу БД
// $params = [
//     'admin' => 0,
//     'username' => 'Dimon2',
//     'password' => '65482333f5',
//     'email' => 'dem1o1no1vs@inbox.ru'
// ];
// $data = insert("users", $params);
// echo $data;











// Ф-я возвращает массив идентификаторов опубликованных записей (published)
// из указанной таблицы базы данных, в обратном порядке (более свежие сверху)
function getArrayofIdPublishedPosts($table) {
    $tempARR=[];
    $resARR=[];
    
    $ARRfirst = selectAll($table, ['published' => '1']);
    foreach ($ARRfirst as $key => $item) {
        array_push($tempARR, strtotime($item['published_date']));
    }
    rsort($tempARR);
    foreach ($tempARR as $key => $val) {
        foreach ($ARRfirst as $key2 => $val2) {
            $temp = strtotime($val2['published_date']);
            if ($temp === $val) {
                array_push($resARR, $val2['id']);
            }
        }
    }
    return $resARR;
}
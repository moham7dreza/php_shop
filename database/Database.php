<?php

namespace Database;

use PDO;
use PDOException;

class Database
{

    private $connection;
    private $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
    private $dbHost = DB_HOST;
    private $dbPassword = DB_PASSWORD;
    private $dbUsername = DB_USERNAME;
    private $dbName = DB_NAME;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUsername, $this->dbPassword, $this->options);
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            exit;
        }
    }

    // select("select * from user");
    // select("select * from user where id = ?", [2]);
    public function select($sql, $values = null)
    {
        try {
            $stmt = $this->connection->prepare($sql);
            if ($values == null) {
                $stmt->execute();
            } else {
                $stmt->execute($values);
            }
            $result = $stmt;
            return $result;
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            exit;
        }
    }

    // insert('users', ['email', 'password'], ['hassan@yahoo.com', '1234']);
    // insert('posts', ['title', 'description'], ['hassan@yahoo.com', '1234']);
    public function insert($tableName, $fields, $values)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO " . $tableName . "(" . implode(', ', $fields) . " , created_at) VALUES ( :" . implode(', :', $fields) . " , now() );");
            $stmt->execute(array_combine($fields, $values));
            $id = $this->connection->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            exit;
        }
    }

    // update('users', 2, ['username', 'token'], ['hassank2', '1234']);
    public function update($tableName, $id, $fields, $values)
    {
        $sql = "UPDATE " . $tableName . " SET ";
        foreach (array_combine($fields, $values) as $field => $value) {
            if ($value) {
                $sql .= " `" . $field . "` = ?, ";
            } else {
                $sql .= " `" . $field . "` = NULL, ";
            }
        }
        $sql .= ' updated_at = now()';
        $sql .= " WHERE id = ?";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_merge(array_filter(array_values($values)), [$id]));
            return true;
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            exit;
        }
    }

    // delete('users', 2)
    public function delete($tableName, $id)
    {
        try {
            $sql = "DELETE FROM " . $tableName . " WHERE id = ? ;";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            exit;
        }
    }

    public function createTable($query)
    {
        try {
            $this->connection->exec($query);
            return true;
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            exit;
        }
    }
}

<?php 

class BaseModel {
    protected $table;
    protected $pdo;

    // Kết nối CSDL
    public function __construct()
    {
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8', DB_HOST, DB_PORT, DB_NAME);

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OBTIONS);
        } catch (PDOException $e) {
            // Xử lý lỗi kết nối
            die("Kết nối cơ sở dữ liệu thất bại: ".$e->getMessage().". Vui lòng thử lại sau.");
        }
    }

    // Huỷ kết nối cơ sở dữ liệu
    public function __destruct()
    {
        $this->pdo = null;
    }

    public function select($columns = '*', $conditions = null, $params = []){
        $sql = "SELECT $columns FROM {$this->table}";

        if($conditions){
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare(($sql));

        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    public function find($columns = '*', $conditions = null, $params = []){
        $sql = "SELECT $columns FROM {$this->table}";

        if($conditions){
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare(($sql));

        $stmt->execute($params);

        return $stmt->fetch();
    }

    public function insert($data){
        $keys = array_keys($data);

        $columns = implode(', ', $keys);

        $placehoders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placehoders)";

        $stmt = $this->pdo->prepare(($sql));

        $stmt->execute($data);

        return $this->pdo->lastInsertId();
    }

    public function update($data, $conditions = null, $params = [])
    {
        $sets = implode(', ', array_map(fn($key) => "$key = :set_$key", array_keys($data)));

        $sql = "UPDATE {$this->table} SET $sets";

        if($conditions){
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare(($sql));

        // BindParam trong set
        foreach($data as $key => &$value){
            $stmt->bindParam(":set_$key", $value);
        }

        // BindParam trong where
        foreach($params as $key => &$value){
            $stmt->bindParam(":$key", $value);
        }

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete($conditions = null, $params = []){
        $sql = "DELETE FROM {$this->table}";

        if($conditions){
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare(($sql));

        $stmt->execute($params);

        return $stmt->rowCount();
    }


}


?>
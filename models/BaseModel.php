<?php

class BaseModel
{
    protected $table;
    protected $pdo;

    // Kết nối CSDL
    public function __construct()
    {
        // Dùng hàm sprintf() vì khi CONST viết vào trong chuỗi, chuỗi sẽ không hiểu, nên dùng sprintf() để có thể dùng các ký tự đại diện, từ đó truyền CONST vào
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8', DB_HOST, DB_PORT, DB_NAME);

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OBTIONS);
        } catch (PDOException $e) {
            // Xử lý lỗi kết nối
            die("Kết nối cơ sở dữ liệu thất bại: {$e->getMessage()}. Vui lòng thử lại sau.");
        }
    }

    // Huỷ kết nối cơ sở dữ liệu
    public function __destruct()
    {
        $this->pdo = null;
    }

    // Hàm lấy danh sách
    public function select($columns = '*', $conditions = null, $params = [])
    {
        $sql = "SELECT $columns FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    // Hàm đếm bản ghi
    public function count($conditions = null, $params = [])
    {
        $sql = "SELECT COUNT(*) FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchColumn();
    }

    // Hàm lấy danh sách có phân trang
    public function paginate($page = 1, $perPage = 5, $columns = '*', $conditions = null, $params = [])
    {
        $sql = "SELECT $columns FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $offset = ($page - 1) * $perPage;

        // PDO không hỗ trợ trực tiếp bindParam cho LIMIT và OFFSET, 
        // vì vậy ta phải sử dụng bindValue or truyền thẳng giá trị luôn cũng được.
        $sql .= " LIMIT $perPage OFFSET $offset";

        $stmt = $this->pdo->prepare($sql);

        // Chỉ dùng cách này được khi KHÔNG CÓ param của limit và offset
        // Nếu có param của limit và offset thì phải dùng hàm bindParam cho từng param 1.
        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    // Hàm lấy 1 bản ghi
    public function find($columns = '*', $conditions = null, $params = [])
    {
        $sql = "SELECT $columns FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetch();
    }

    // Hàm thêm dữ liệu
    public function insert($data)
    {
        $keys = array_keys($data);

        $columns = implode(', ', $keys);

        $placehoders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placehoders)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($data);

        return $this->pdo->lastInsertId();
    }

    // Hàm cập nhật dữ liệu
    public function update($data, $conditions = null, $params = [])
    {
        $keys = array_keys($data);

        $arraySets = array_map(fn($key) => "$key = :set_$key", $keys);

        $sets = implode(', ', $arraySets);

        $sql = "UPDATE {$this->table} SET $sets";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare(($sql));

        // BindParam trong set
        foreach ($data as $key => &$value) {
            $stmt->bindParam(":set_$key", $value);
        }

        // BindParam trong where
        foreach ($params as $key => &$value) {
            $stmt->bindParam(":$key", $value);
        }

        $stmt->execute();

        return $stmt->rowCount();
    }

    // Hàm xóa theo điều kiện
    public function delete($conditions = null, $params = [])
    {
        $sql = "DELETE FROM {$this->table}";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare(($sql));

        $stmt->execute($params);

        // rowCount() trả về số lượng bản ghi bị tác động
        return $stmt->rowCount();
    }
}


?>

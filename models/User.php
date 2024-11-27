<?php

class User extends BaseModel
{
    protected $table = 'users';
    public function getAll($page = 1, $perPage = 5, $columns = '*', $conditions = null, $params = [])
    {
        $sql = "
        SELECT 
         u.id                   u_id,
         u.name                 u_name,
         u.password             u_password,
         u.tel                  u_tel,
         u.email                u_email,
         u.address              u_address,
         u.points               u_points,
         u.role_id              u_role_id,
         u.rank_id              u_rank_id,
         u.imageURL             u_imageURL,
         ro.id                  ro_id,
         ro.name                ro_name,
         ra.id                  ra_id,
         ra.name                ra_name
         
         FROM 
         users u
        JOIN roles ro ON ro.id = u.role_id
        JOIN ranks ra ON ra.id = u.rank_id";
        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $offset = ($page - 1) * $perPage;

        // PDO không hỗ trợ trực tiếp bindParam cho LIMIT và OFFSET, 
        // vì vậy ta phải sử dụng bindValue or truyền thẳng giá trị luôn cũng được.
        $sql .= " LIMIT $perPage OFFSET $offset";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getID($id)
    {
        $sql = "
        SELECT 
         u.id                   u_id,
         u.name                 u_name,
         u.tel                  u_tel,
         u.password             u_password,
         u.email                u_email,
         u.address              u_address,
         u.points               u_points,
         u.role_id              u_role_id,
         u.rank_id              u_rank_id,
         u.imageURL             u_imageURL,
         ro.id                  ro_id,
         ro.name                ro_name,
         ra.id                  ra_id,
         ra.name                ra_name,
         ra.benefits            ra_benefits
         
        FROM users u
        JOIN roles ro ON ro.id = u.role_id
        JOIN ranks ra ON ra.id = u.rank_id
        WHERE u.id = :id;
    ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insertUser($data)
    {
        $keys = array_keys($data);

        $columns = implode(', ', array_map(function ($keys) {
            return "`$keys`";
        }, $keys));


        $placehoders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placehoders)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($data);

        return $this->pdo->lastInsertId();
    }
    public function updateUser($data, $conditions = null, $params = [])
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
    public function updatePassword($data,$id) 
    {
        $sql = "
        UPDATE users 
        SET users.password = $data 
        WHERE users.id = :id;
        ";

        $stmt = $this->pdo->prepare(($sql));
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount();
    }
}

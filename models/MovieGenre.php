<?php

class MovieGenre extends BaseModel
{
    protected $table = 'movie_genres';

    public function getAll($page = 1, $perPage = 5, $columns = '*', $conditions = null, $params = [])
    {
        $sql = "
            SELECT
                mg.id mg_id,
                m.name  m_name,
                g.name  g_name
            FROM movie_genres mg
            JOIN movies m ON m.id = mg.movie_id
            JOIN genres g ON g.id = mg.genre_id
        ";
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

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "
            SELECT
                mg.id mg_id,
                m.id    m_id,
                m.name  m_name,
                g.id    g_id,
                g.name  g_name
            FROM movie_genres mg
            JOIN movies m ON m.id = mg.movie_id
            JOIN genres g ON g.id = mg.genre_id
            WHERE mg.id = :id;
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }
}

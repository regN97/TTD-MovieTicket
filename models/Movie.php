<?php

class Movie extends BaseModel
{
    protected $table = 'movies';

    public function getAll($page = 1, $perPage = 5, $columns = '*', $conditions = null, $params = [])
    {
        $sql = "
            SELECT
                m.id            m_id,
                m.name          m_name,
                m.release_date  m_release_date,
                m.imageURL      m_imageURL,
                mg.id           mg_id,
                mg.genre_id     mg_genre_id,
                mg.movie_id     mg_movie_id
            FROM movies m
            JOIN movie_genres mg ON mg.movie_id = m.id
        ";
        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $offset = ($page - 1) * $perPage;

        // PDO không hỗ trợ trực tiếp bindParam cho LIMIT và OFFSET, 
        // vì vậy ta phải sử dụng bindValue or truyền thẳng giá trị luôn cũng được.
        $sql .= " LIMIT :limit OFFSET :offset";

    $stmt = $this->pdo->prepare($sql);

    // Bind giá trị cho LIMIT và OFFSET
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    // Bind các tham số điều kiện
    foreach ($params as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countMovies($conditions = null, $params = [])
    {
        $sql = "SELECT COUNT(*)  FROM movies m
            JOIN movie_genres mg ON mg.movie_id = m.id";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchColumn();
    }


    public function getMovieGenre($id)
    {
        $sql = "
            SELECT
                g.id    g_id,
                g.name  g_name
            FROM movie_genres mg
            JOIN movies m ON m.id = mg.movie_id
            JOIN genres g ON g.id = mg.genre_id
            WHERE m.id = :id;
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll();
    }

    public function getMovieArtist($id)
    {
        $sql = "
            SELECT
                a.name  a_name,
                a.roles a_roles
            FROM movie_artists ma
            JOIN movies m ON m.id = ma.movie_id
            JOIN artists a ON a.id = ma.artist_id
            WHERE m.id = :id;
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll();
    }
}

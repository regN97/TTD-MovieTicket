<?php

class MovieArtist extends BaseModel
{
    protected $table = 'movie_artists';

    public function getAll()
    {
        $sql = "
            SELECT
                ma.id ma_id,
                m.name  m_name,
                a.name  a_name,
                a.roles a_roles
            FROM movie_artists ma
            JOIN movies m ON m.id = ma.movie_id
            JOIN artists a ON a.id = ma.artist_id
            ORDER BY ma.id DESC;
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "
            SELECT
                ma.id ma_id,
                m.id    m_id,
                m.name  m_name,
                a.id    a_id,
                a.name  a_name,
                a.roles a_roles
            FROM movie_artists ma
            JOIN movies m ON m.id = ma.movie_id
            JOIN artists a ON a.id = ma.artist_id
            WHERE ma.id = :id;
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }
}

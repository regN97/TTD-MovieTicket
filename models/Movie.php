<?php

class Movie extends BaseModel
{
    protected $table = 'movies';

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

<?php 

class Schedule extends BaseModel {

    public $table = 'schedules';

    public function getAll()
    {
        $sql = "
            SELECT
                s.id            s_id,
                r.id            r_id,
                m.id            m_id,
                s.start_at    s_start_at,
                s.end_at      s_end_at,
                r.name          r_name,
                m.name          m_name
            FROM schedules s
            JOIN rooms r ON r.id = s.room_id
            JOIN movies m ON m.id = s.movie_id
            ORDER BY s.id DESC
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "
            SELECT
                s.id            s_id,
                r.id            r_id,
                m.id            m_id,
                s.start_at    s_start_at,
                s.end_at      s_end_at,
                r.name          r_name,
                m.name          m_name
            FROM schedules s
            JOIN rooms r ON r.id = s.room_id
            JOIN movies m ON m.id = s.movie_id
            WHERE s.id = :id;
        ";

        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }
}

?>
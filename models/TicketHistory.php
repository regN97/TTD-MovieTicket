<?php 

class TicketHistory extends BaseModel
{
    protected $table = 'tickets';

    public function getAll($page = 1, $perPage = 5, $columns = '*', $conditions = null, $params = [])
    {
        $sql = "
        SELECT 
        t.id                   t_id,
        t.created_at           t_created_at,
        t.updated_at           t_updated_at,
        t.seat_id              t_seat_id,
        t.schedule_id          t_schedule_id,
        t.movie_id             t_movie_id,
        se.id                  se_id,
        sch.id                 sch_id,
        m.id                   m_id,
        m.name                 m_name,
        sch.start_at           sch_start_at,
        sch.end_at             sch_end_at,
        se.room_id             se_room_id,
        se.seat_row            se_seat_row,
        se.seat_column         se_seat_column
         FROM 
         tickets t
        JOIN seats se ON se.id = t.seat_id
        JOIN schedules sch ON sch.id = t.schedule_id
        JOIN movies m ON m.id = t.movie_id";

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
        t.id                   t_id,
        t.created_at           t_created_at,
        t.updated_at           t_updated_at,
        t.seat_id              t_seat_id,
        t.schedule_id          t_schedule_id,
        t.movie_id             t_movie_id,
        se.id                  se_id,
        sch.id                 sch_id,
        m.id                   m_id,
        m.name                 m_name,
        sch.start_at           sch_start_at,
        sch.end_at             sch_end_at,
        se.room_id             se_room_id,
        se.seat_row            se_seat_row,
        se.seat_column         se_seat_column
         FROM 
         tickets t
        JOIN seats se ON se.id = t.seat_id
        JOIN schedules sch ON sch.id = t.schedule_id
        JOIN movies m ON m.id = t.movie_id
        WHERE t.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

}

?>
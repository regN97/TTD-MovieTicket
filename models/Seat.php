<?php 

class Seat extends BaseModel
{
    protected $table = 'seats';

    public function getAll()
    {
        $sql = "
            SELECT
                s.id            s_id,
                s.seat_row      s_seat_row,
                s.seat_column   s_seat_column,
                s.status        s_status,
                r.id            r_id,
                r.name          r_name,
                st.id           st_id,
                st.type         st_type
            FROM seats s
            JOIN rooms r ON r.id = s.room_id
            JOIN seat_types st ON st.id = s.type_id
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
                s.seat_row      s_seat_row,
                s.seat_column   s_seat_column,
                s.status        s_status,
                r.id            r_id,
                r.name          r_name,
                st.id           st_id,
                st.type         st_type
            FROM seats s
            JOIN rooms r ON r.id = s.room_id
            JOIN seat_types st ON st.id = s.type_id
            WHERE s.id = :id;
        ";

        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }
}
?>
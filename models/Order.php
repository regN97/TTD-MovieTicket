<?php

class Order extends BaseModel
{
    protected $table = 'orders';

    public function getTicketDetail($conditions = null)
    {
        $sql = "
        SELECT 
            t.id                t_id,
            t.schedule_id       t_schedule_id,
            t.movie_id          t_movie_id,
            t.seat_id           t_seat_id,
            t.created_at        t_created_at
        FROM
            order_details od
        JOIN orders o ON o.id = od.order_id
        JOIN tickets t ON t.id = od.ticket_id
        ";


        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllOrderById($id)
    {
        $sql = "
        SELECT 
            *
        FROM
            orders
        WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    public function getScheduleId($conditions = null)
    {
        $sql = "
        SELECT 
            t.schedule_id       t_schedule_id,
            o.id                o_id
        FROM
            order_details od
        JOIN orders o ON o.id = od.order_id
        JOIN tickets t ON t.id = od.ticket_id
        ";

        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

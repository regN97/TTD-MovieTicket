<?php 

class Order extends BaseModel
{
    protected $table = 'orders';

    public function getAll()
    {
        $sql = "
        SELECT 
        o.id                   o_id,
        o.status               o_status,
        o.total_price          o_total_price,
        o.created_at           o_created_at,
        o.updated_at           o_updated_at,
        o.paymentMethod	       o_paymentMethod,
        o.user_id              o_user_id,
        u.name                 u_name,
        ofnd.id                ofnd_id,
        ofnd.fnd_id            ofnd_fnd_id
        FROM 
        orders o
        JOIN users u ON u.id = o.user_id
        JOIN order_fnds ofnd ON ofnd.id = o.id
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>
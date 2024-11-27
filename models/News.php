<?php
class News extends BaseModel
{
   protected $table = 'news';

   public function getAll($page = 1, $perPage = 5, $columns = '*', $conditions = null, $params = [])
   {



      $sql = "
      SELECT 
         n.id           n_id,
         n.title        n_title,
         n.content      n_content,
         n.imageURL     n_imageURL,
         n.created_at   n_created_at,
         u.name         u_name
      FROM  news n
      JOIN users u ON u.id = n.user_id
      ORDER BY  n.id DESC ";
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
         n.id           n_id,
         n.title        n_title,
         n.content      n_content,
         n.imageURL     n_imageURL,
         n.created_at   n_created_at,
         u.name         u_name,
         u.id           u_id
      FROM  news n
      JOIN users u ON u.id = n.user_id
      WHERE n.id = :id;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(['id' => $id]);
      return $stmt->fetch();
   }
   public function hotnews()
   {
      $sql = "
      SELECT 
         n.id           n_id,
         n.title        n_title,
         n.content      n_content,
         n.imageURL     n_imageURL,
         n.created_at   n_created_at,
         u.name         u_name,
         u.id           u_id
      FROM  news n
      JOIN users u ON u.id = n.user_id
      ORDER BY created_at DESC
      LIMIT 1";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
   }
}

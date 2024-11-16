<?php 

class User extends BaseModel
{
    protected $table = 'users';
    public function getAll()
    {
        $sql = "
        SELECT 
         u.id                   u_id,
         u.name                 u_name,
         u.password             u_password,
         u.tel                  u_tel,
         u.email                u_email,
         u.address              u_address,
         u.points               u_points,
         u.role_id              u_role_id,
         u.rank_id              u_rank_id,
         u.imageURL             u_imageURL,
         ro.id                  ro_id,
         ro.name                ro_name,
         ra.id                  ra_id,
         ra.name                ra_name
         
         FROM 
    users u
JOIN roles ro ON ro.id = u.role_id
JOIN ranks ra ON ra.id = u.rank_id
ORDER BY  u.id DESC 
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt -> fetchAll();
    
    }

    public function getID($id){
        $sql = "
        SELECT 
         u.id                   u_id,
         u.name                 u_name,
         u.password             u_password,
         u.tel                  u_tel,
         u.email                u_email,
         u.address              u_address,
         u.points               u_points,
         u.role_id              u_role_id,
         u.rank_id              u_rank_id,
         u.imageURL             u_imageURL,
         ro.id                  ro_id,
         ro.name                ro_name,
         ra.id                  ra_id,
         ra.name                ra_name
         
         FROM 
    users u
JOIN roles ro ON ro.id = u.role_id
JOIN ranks ra ON ra.id = u.rank_id
WHERE u.id = :id;
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id'=> $id]);
    return $stmt -> fetch();
    
    }



}

?>
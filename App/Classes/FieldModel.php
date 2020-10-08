<?php



class FieldModel extends Model
{

    protected $table = 'main';


    // public function getInfield($parent_id)
    // {
    //     //$sql = "SELECT * FROM ".$this->table." WHERE parent_id = ".$parent_id;
    //     $sql = "SELECT * FROM (SELECT * FROM {$this->table} WHERE `parent_id` < `id`) main_sorted,(SELECT @pv :=".$parent_id.") initialisation WHERE find_in_set(`parent_id` ,@pv) AND length ( @pv := concat(@pv, ',' ,`id`));";
       
    //     $rows = $this->connect->query($sql)->fetchAll(PDO::FETCH_OBJ);
        
        
    //     return $rows;
    // }



    /**
     * 
     */
    public function getChilds($parent_id=0)
    {
        $sql = "SELECT * FROM ".$this->table." WHERE `parent_id` = ".$parent_id;
        $rows = $this->connect->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return $rows;
    }

    /**
     * recursiv make tree
     */
    public function makeTree($id=0)
    {

        $rows = $this->getChilds($id);
       
        foreach($rows as $row)
        {          
            $row->child = $this->makeTree($row->id);
  
        }
        
       return $rows;

    }

    public function getTree()
    {
        $tree = $this->makeTree();
       
        return $tree;
    }
        
    



    



}
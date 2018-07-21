<?php
require_once('../const.php');
require_once(ROOT . '/db.php');

  // The base Model class extemded from db class ...
	/**
	 * The basic Model class
	 */
class model extends db{

    public static $fields;

    function __construct(){
        parent::__construct();
    }
    
    // selecting methd from tables ...
	/**
	 * selects data from database table based on conditions provided
	 * @param {?string} $table - name of table
     * @param {?string} $rows - list of rows sepersted by commas (default is * to select all)
     * @param {?string} $where - where condition(default is null)
     * @param {?string} $order - coluimn to be sorted based on
	 */
    public function select($table, $rows = '*', $where = null, $order = null)
    {
        $this->result = null;
        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
        if($order != null)
            $q .= ' ORDER BY '.$order;
        if($this->isTableExists($table))
        {
            $query = @mysql_query($q);
            if($query)
            {
                $this->numResults = mysql_num_rows($query);
                for($i = 0; $i < $this->numResults; $i++)
                {
                    $r = mysql_fetch_array($query);
                    $key = array_keys($r); 
                    for($x = 0; $x < count($key); $x++)
                    {
                        if(!is_int($key[$x]))
                        {
                            if(mysql_num_rows($query) > 1)
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            else if(mysql_num_rows($query) < 1)
                                $this->result = null;
                            else
                                $this->result[$key[$x]] = $r[$key[$x]]; 
                        }
                    }
                }            
                return true; 
            }
            else
            {
                return false; 
            }
        }
    else
        return false; 
    }

    // selecting methd from tables ...
	/**
	 * update entry of database table based on conditions provided
	 * @param {?string} $table - name of table
     * @param {?string} $rows - list of rows sepersted by commas (default is * to select all)
     * @param {?string} $where - where condition
     * @param {?string} $order - coluimn to be sorted based on
	 */
    public function update($table, $set, $where)
    {
        $this->result = null;
        $q = 'UPDATE '. $table;
        if($set != null)
            $q .= ' SET ' . $set;
        if($where != null)
            $q .= ' WHERE '.$where;
        if($this->isTableExists($table))
        {
            $query = @mysql_query($q);
            if($query)
            {           
                return true; 
            }
            else
            {
                return false; 
            }
        }
    else
        return false; 
    }

    public function insert($table, $fields, $values)
    {
        $this->result = null;
        $q = "INSERT INTO `". $table . "`";
        $fields = implode("`, `", $fields);
        $values = implode("','", $values);
        if($fields != null) {
            $q .= " ( `" . $fields . "` ) ";
        }
        if($values != null)
            $q .= " VALUES ( '" . $values . "' );";
        if($this->isTableExists($table))
        { 
            $query = @mysql_query($q);
            if($query)
            {           
                return @mysql_insert_id($this->conn); 
            }
            else
            {
                return false; 
            }
        }
    else
        return false; 
    }

    public function map($res_obj) {
        //$res_class = new \stdClass();
        foreach(self::$fields as $field) {
            $this->{$field} = $res_obj[$field];
        }
        /*$user->user_id = $res_obj['user_id'];
        $user->f_name = $res_obj['f_name'];
        $user->m_name = $res_obj['m_name'];
        $user->l_name = $res_obj['l_name'];
        $user->email = $res_obj['email'];
        $user->gender = $res_obj['gender'];
        $user->dob = $res_obj['dob'];*/
        //return $res_class;
    }
}
?>
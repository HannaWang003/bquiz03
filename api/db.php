<?php
date_default_timezone_set('Asia/Taipei');
session_start();
function dd($ary){
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
}
function to($url){
    header("location:$url");
}
class DB{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db20";
    protected $pdo;
    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }
    private function a2s($ary){
        foreach($ary as $col => $val){
            $tmp[]="`$col`='$val'";
        }
        return $tmp;
    }
private function sql_all($sql,$where,$other){
    if(isset($this->table) && !empty($this->table)){
        if(is_array($where)){
            if(!empty($where)){
                $sql.=" where ".join(" && ",$this->a2s($where));
            }
        }else{
            $sql.=" $where";
        }
        $sql.=" $other";
        return $sql;
    }
}
private function math($math,$col,$where,$other){
    $sql = "select $math(`$col`) from `$this->table` ";
    $sql = $this->sql_all($sql,$where,$other);
    return $this->pdo->query($sql)->fetchColumn();
}
function all($where='',$other=''){
    $sql="select * from `$this->table` ";
    $sql = $this->sql_all($sql,$where,$other);
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
function count($where='',$other=''){
    $sql = "select count(*) from `$this->table` ";
    $sql = $this->sql_all($sql,$where,$other);
    return $this->pdo->query($sql)->fetchColumn();
}
function find($id){
    $sql = "select * from `$this->table` ";
    if(is_array($id)){
        $sql.=" where ".join(' && ',$this->a2s($id));
    }elseif($id){
        $sql.=" where `id`=$id";
    }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}
function sum($col='',$where='',$other=''){
    return $this->math('sum',$col,$where,$other);
}
function avg($col='',$where='',$other=''){
    return $this->math('avg',$col,$where,$other);
}
function max($col='',$where='',$other=''){
    return $this->math('max',$col,$where,$other);
}
function min($col='',$where='',$other=''){
    return $this->math('min',$col,$where,$other);
}
function save($ary){
    if(isset($ary['id'])){
        if(!empty($ary)){
            $sql = "update `$this->table` set ";
            $sql.=join(',',$this->a2s($ary));
            $sql.=" where `id`={$ary['id']}";
        }
    }else{
        $sql = "insert into `$this->table` ";
        $cols = "(`".join("`,`",array_keys($ary))."`)";
        $vals = "('".join("','",$ary)."')";
        $sql.=$cols." values ".$vals;
    }
    return $this->pdo->exec($sql);
}
function del($id){
    $sql = "delete from `$this->table` ";
    if(is_array($id)){
        $sql.=" where ".join(' && ',$this->a2s($id));
    }elseif(is_numeric($id)){
        $sql.=" where `id`='$id'";
    }
    return $this->pdo->exec($sql);
}
function q($sql){
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
}
$Poster = new DB('poster');
$Movie = new DB('movie');
?>
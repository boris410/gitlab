<?php 
    class applyaction extends load{
        private $db;
        function __construct(){
            $this->db = $this->model("database");
        }
        
        function show_action(){//顯示活動於index
            $result = $this->db->select("SELECT action_name,action_id FROM applyaction");
            return $result;
        }
        function show_single_action($ac){// 點擊活動後 顯示活動單頁
            
            $result =  $this->db->select("SELECT `action_id`,`action_name`,`action_partner`,`action_people`,`action_nowpeoples` FROM applyaction WHERE `action_id`='$ac'");;
            return $result;
        }
        function build_action($build_name,$partner,$build_people,$takepart_type,$applytime_start,$applytime_end,$partpeopletype){//儲存申請活動的限制項目到DB
            $reuslt = $this->db->insert("INSERT INTO `applyaction`(`action_name`, `action_partner`, `action_people`, `action_takepart_type`, `action_applytime_start`, `action_applytime_end`,`action_nowpeoples`,`action_partpeopletype`) 
                                      VALUES ('$build_name',$partner,$build_people,'$takepart_type','$applytime_start','$applytime_end',$build_people,'$partpeopletype')");
            
            return $reuslt;
        }
        function get_into_action($takepeople,$action_id){//參加成功後 對applyaction欄位 人數作刷新
            try{
                $this->db->transaction();
                $result = $this->db->select("SELECT `action_nowpeoples` FROM `applyaction` WHERE `action_id` = '$action_id' FOR UPDATE");
                $action_nowpeoples = $result[0][action_nowpeoples];
                $this->db->update("UPDATE `applyaction` SET `action_nowpeoples`=(`action_nowpeoples`-$takepeople) WHERE `action_id` = '$action_id'");
                
                $this->db->commit();
                 return true;
            }catch(Exception $e){
                $this->db->rollBack();
                 return false;
            }
                
                
        }
    }
?>
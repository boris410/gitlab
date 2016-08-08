<?php

class HomeController extends load {
        
        function index(){//首頁
                $show_action  = $this->model("applyaction");
                $result = $show_action->show_action();
                $this->view("head");
                $this->view("index",$result);
                $this->view("foot");
        }
        
        function build(){//建立活動
                $applyaction = $this->model("applyaction");
                if(isset($_POST['submit'])){
                        /*傳入活動限制項目*/
                        $reuslt = $applyaction->build_action($_POST['build_name'],$_POST['partner'],$_POST['build_people'],$_POST['takepart_type'],$_POST['applytime_start'],$_POST['applytime_end'],$_POST['partpeopletype']);
                        header("location: index");
                }
                $this->view("head");
                $this->view("build");
                $this->view("foot");
        }
        
        function accending(){//報名
                $applyaction  = $this->model("applyaction");
                $result = $applyaction->show_single_action($_GET['ac']);
                if($_POST['submit']){
                        $account = $this->model("account");
                        if($account->check_account($_POST['employ'],$_POST['action_id'])){//檢查員工參加類型
                             if($applyaction->get_into_action($_POST['takepeople'],$_POST['action_id'])){
                                    header("location: accending?ac=$_POST[action_id]");
                             }
                        }
                }
                $this->view("head");
                $this->view("accending",$result);
                $this->view("foot");
        }
        
        // function ajax(){//報名
        //         $applyaction  = $this->model("applyaction");
        //         $result = $applyaction->show_single_action($_GET['ac']);
        //                 $account = $this->model("account");
        //                 if($account->check_account($_POST['employ'],$_POST['action_id'])){//檢查員工參加類型
        //                      if($applyaction->get_into_action($_POST['takepeople'],$_POST['action_id'])){
        //                         $data = "ok";
        //                         $this->view("head");
        //                         $this->view("accending",$data);
        //                         $this->view("foot");
        //                      }
        //                 }
                
               
                
        // }
     
        
}

?>
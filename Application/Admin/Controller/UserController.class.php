<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {

    public function qrcode(){
        Vendor('phpqrcode.phpqrcode');
        $id=$_GET['id'];
        //生成二维码图片 http://localhost/index.php/Home/Login/reg
        $object = new \QRcode();
        $url="http://402231.ouyouhui.com".'/index.php/Home/Login/reg/fid/'.$id;

        $level=3;
        $size=5;
        $errorCorrectionLevel =intval($level) ;//容错级别
        $matrixPointSize = intval($size);//生成图片大小
        $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
    }

	public function login(){
        if(IS_POST){
            $name = I('post.name');
            $pwd = I('post.pwd');
            $user = M('user');
            $result= $user->where(array('name'=>$name,'password'=>$pwd))->select();
            if($result[0]){
                $_SESSION['uname']=$name;
                echo "<script>window.location.href = '".__ROOT__."/index.php/Admin/Index/main';</script>";
            }else{
                    echo "<script>alert('用户名或密码不存在');";
                    echo "window.history.go(-1);";
                    echo "</script>";
                }
        }
        $this->display();
    }

    public function logOut(){
        session('uname',null);
        cookie('is_login',null);
        echo "<script>window.location.href = '".__ROOT__."/index.php/Admin/User/login';</script>";
    }

    /**
     * 静态收益 ok
     */
    public function crontab(){  //我的团队
        $incomelog =M('incomelog');
        $res = $incomelog->where(array('addymd'=>date('Y-m-d'),'type'=>10))->select();

//        if($res[0]){
//            print_r('今日受益已结算');die;
//        }
        $menber = M("menber");
        $income = M("incomelog");
        $huogui = M('huogui');
        //所有
        $allorderlog = $menber->select();

        if(!$allorderlog[0]){
            print_r('no data');die;
        }

        $configobj =M('config')->where(array('id'=>21))->select();
        $config =$configobj[0]['value'];

        $configobj =M('config')->where(array('id'=>22))->select();
        $configfid =$configobj[0]['value'];

        foreach($allorderlog as $key=>$val) {
            //自己受益
//            $res_own = $this->getusernums($val['userid'], $val['logid'], $val['num']);
//            if (!$res_own) {
//                echo $val['logid']."<br>";
//                continue;
//            }

            $huoguis =$huogui->where(array('uid'=>$val['uid'],'state'=>1))->select();

            foreach ($huoguis as $k=>$v){

                if($v['curlnum']){
                    $incomess= bcmul($config,$v['curlnum'],2);
                    $curlincome = bcdiv($incomess,100);

                    $data['state'] = 0;
                    $data['reson'] = "货品静态收益";
                    $data['type'] = 12;
                    $data['addymd'] = date('Y-m-d', time());
                    $data['addtime'] = time();
                    $data['orderid'] = 0 ;
                    $data['cont'] = $v['num'];
                    $data['userid'] = $val['uid'];
                    $data['income'] = $curlincome;
                    if ($curlincome > 0) {
                        // 更新货柜收益
                        $curlincomehuo =bcadd($v['curlincome'] ,$curlincome);
                        $huogui->where(array('id'=>$v['id']))->save(array('curlincome'=>$curlincomehuo));
                        $logid= $this->savelog($data);

                        // 上级触发
                        if($val['fuid']){
                            $incomesfid= bcmul($configfid,$curlincome,2);
                            $incomefid =  bcdiv($incomesfid,100,2);
                            $data1['state'] = 0;
                            $data1['reson'] = "下级拆分收益";
                            $data1['type'] = 10;
                            $data1['addymd'] = date('Y-m-d', time());
                            $data1['addtime'] = time();
                            $data1['orderid'] = $val['tel'];
                            $data1['cont'] =$val['name'];
                            $data1['userid'] = $val['fuid'];
                            $data1['income'] = $incomefid;
                            if ($incomefid > 0) {
                                $this->savelog($data1);
                            }
                        }

                    }
                }

            }

        }
        echo 'success';
    }

    /**
     * @return int ok
     * 是否有每日收益
     */
    public function getusernums($userid,$orderid,$num){
        $income =M('incomelog');
        $daycomelogs = $income->where(array('type'=>10,'userid'=>$userid,'orderid'=>$orderid))->select();

        $daycome =0;
        foreach($daycomelogs as $k=>$v){
            $daycome=bcadd($daycome,$v['income'],2);
        }

        $config = M('config')->where(array('id'=>1))->select();
        $endmoney = bcmul(1.6,$config[0]['value']);
        $endmoney = bcmul($endmoney,$num);
        if($daycome>=$endmoney){
            M('orderlog')->where(array('logid'=>$orderid))->save(array('states'=>2));
            return 0;
        }else{
            return 1;
        }
    }

    private function savelog($data){
        $incomelog =M('incomelog');
        return $incomelog->add($data);
    }


    public function getUserHuo($userid){
        $huogui = M("huogui")->where(array('uid'=>$userid,'state'=>1))->sum('curlnum');
        return $huogui;
    }


    function crontabRite(){
        $today = date('m-d',time());
        $isdate = M("Rite")->where(array('date'=>$today))->select();
        if($isdate[0]){
//            $config= M("Config")->where(array('name'=>'daily_income'))->select();
//            M("Rite")->where(array('date'=>$today))->save(array('cont'=>$config[0]['val'],'date'=>$today));
            echo 2;exit();
        }else{
            $config= M("Config")->where(array('id'=>2))->select();
            M("Rite")->add(array('cont'=>$config[0]['value'],'date'=>$today));
            echo 1;exit();
        }
    }
}



 ?>
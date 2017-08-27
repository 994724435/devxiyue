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
        $orderlog =M('orderlog');
        //所有
        $allorderlog = $orderlog->where(array('states'=>1,'productid'=>1))->select();

        $menber = M("menber");

        if(!$allorderlog[0]){
            print_r('暂无收益');die;
        }

        foreach($allorderlog as $key=>$val) {
            //自己受益
            $res_own = $this->getusernums($val['userid'], $val['logid'], $val['num']);
            if (!$res_own) {
                echo $val['logid']."<br>";
                continue;
            }
            $configobj =M('config')->where(array('id'=>2))->select();
            $config =$configobj[0]['value'];
            $mif = M('config')->where(array('id'=>1))->select();

            $base = bcmul ($mif[0]['value'], $config,2);

            $income = bcmul($base, $val['num'], 2);
            $data['state'] = 1;
            $data['reson'] = "静态收益";
            $data['type'] = 10;
            $data['addymd'] = date('Y-m-d', time());
            $data['addtime'] = time();
            $data['orderid'] = $val['logid'];
            $data['userid'] = $val['userid'];
            $data['income'] = $income;
            if ($income > 0) {
                $userinfo = $menber->where(array('uid'=>$val['userid']))->select();
                $afterincom = bcadd($userinfo[0]['jingbag'],$income);
                $menber->where(array('uid'=>$val['userid']))->save(array('jingbag'=>$afterincom));
                $this->savelog($data);
            }

        }
        echo '成功';
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


    public function crantabUserIncome(){
        $menber =M('menber');
        $income =M('incomelog');
        if($_GET['uid']){
            $map['uid']  = $_GET['uid'];
        }else{
            $map['uid']  = array('gt',9);
        }
        $result_user = $menber->where($map)->select();
        foreach($result_user as $k=>$v){
            $chargebag = $v['chargebag'];
            $incomebag = $v['incomebag'];
            $allIncome =bcadd($chargebag,$incomebag,2);  // 所有钱包

            $daycomelogs = $income->where(array('state'=>1,'userid'=>$v['uid']))->select();
            $userIncome = 0;
            foreach($daycomelogs as $k1=>$v1){         // 收益
                $userIncome =bcadd($userIncome,$v1['income'],2);
            }
            if($_GET['uid']){
                print_r("每日收益==》".$userIncome);
            }
            $dayoutlogs = $income->where(array('state'=>2,'userid'=>$v['uid']))->select();

            $userOut = 0;                              // 支出
            foreach($dayoutlogs as $k2=>$v2){
                $userOut =bcadd($userOut,$v2['income'],2);
            }
            if($_GET['uid']){
                print_r("<br>总支出==》".$userOut);
            }
            $allIncomesUser =bcsub($userIncome,$userOut,2);      // 总收入
            if($allIncomesUser < 0){
                print_r("userID".$v['uid']."收入日志异常");
            }
            $layout =$allIncomesUser-$allIncome;
            if($layout!=0){
               print_r("用户ID：".$v['uid']."<br>");
               print_r("钱包总额：".$allIncome."<br>");
               print_r("收入总额：".$allIncomesUser."<br><br><br>");
            }
        }
//        print_r($result_user);die;
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
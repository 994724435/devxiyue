<?php

namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class UserController extends CommonController{

    public function my(){
        $this->display();
    }

    /*
     * 积分充值
     */
    public function recharge(){
        $money = $_GET['money'];
        date_default_timezone_set('Asia/Shanghai');
        header("Content-type: text/html; charset=utf-8");
        $pay_memberid = "10071";   //商户ID
        $pay_orderid = date("YmdHis").rand(1000,9999);    //订单号
        $pay_amount = $money;    //交易金额
        $pay_applydate = date("Y-m-d H:i:s");  //订单时间
        $pay_bankcode = "WXZF";   //银行编码
        $uid = session('uid');

        $order = M("incomelog");
        $data['state'] = 0;
        $data['type'] = 0;
        $data['reson'] = "充值";
        $data['addymd'] = date("Y-m-d H:i:s",time());
        $data['addtime'] = time();
        $data['userid'] = session('uid');
        $data['income'] = $money;
        $data['orderid'] = $pay_orderid;
        $data['cont'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
        $logid= $order->add($data);


        $pay_notifyurl = "http://www.898tj.com/index.php/Home/Login/pay/token/admin123/id/$logid";   //服务端返回地址
        $pay_callbackurl = "http://www.898tj.com/index.php/Home/Login/login";  //页面跳转返回地址
        $Md5key = "4ql4b2k6y534476d3xjztd9t3k8avc";   //密钥
        $tjurl = "http://www.zhizhufu.com.cn/Pay_Index.html";   //网关提交地址
        $jsapi = array(
            "pay_memberid" => $pay_memberid,
            "pay_orderid" => $pay_orderid,
            "pay_amount" => $pay_amount,
            "pay_applydate" => $pay_applydate,
            "pay_bankcode" => $pay_bankcode,
            "pay_notifyurl" => $pay_notifyurl,
            "pay_callbackurl" => $pay_callbackurl,
        );

        ksort($jsapi);
        $md5str = "";
        foreach ($jsapi as $key => $val) {
            $md5str = $md5str . $key . "=" . $val . "&";
        }
//echo($md5str . "key=" . $Md5key."<br>");
        $sign = strtoupper(md5($md5str . "key=" . $Md5key));
        $jsapi["pay_md5sign"] = $sign;
        $jsapi["pay_tongdao"] = 'Ucwxscan'; //通道
        $jsapi["pay_tradetype"] = 900021; //通道类型   900021 微信支付，900022 支付宝支付
        $jsapi["pay_productname"] = '会员服务'; //商品名称
// print_r($jsapi);die;
        $data=http_build_query($jsapi);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $data,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($tjurl, false, $context);
        $result =json_decode($result);

        $this->assign("img",$result->code_img_url);

        $this->display();
    }

    /*
     * 个人资料
     */
    public function my_data(){
        $this->display();
    }

    /*
    * 完善资料
     */
    public function washan_data(){
        if($_POST['pwd'] && $_POST['pwd2'] ){
            $data = $_POST;
            M("menber")->where(array('uid'=>session('uid')))->save($data);
            echo "<script>";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/washan_data';";
            echo "</script>";
            exit;
        }
        $this->display();
    }

    /*
    * 退本
     */
    public function tuiben(){
        if($_POST){
            if($_POST['num']<=0){
                echo "<script>alert('请输入正确金额在');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/tuiben';";
                echo "</script>";
                exit;
            }
            $menber =M('menber');
            $res_user = $menber->where(array('uid'=>session('uid')))->select();
            $left = bcsub($res_user[0]['dongbag'],$_POST['num'],2);

            if($left > 0){

                $re = $menber->where(array('uid'=>session('uid')))->save(array('dongbag'=>$left));
                if($re){
                    $income =M('incomelog');
                    $data['type'] =7;
                    $data['state'] =0;
                    $data['reson'] ='退本';
                    $data['addymd'] =date('Y-m-d',time());
                    $data['addtime'] =time();
                    $data['orderid'] =session('uid');
                    $data['userid'] =session('uid');
                    $data['income'] =$_POST['num'];
                    $income->add($data);
                    $resreson ="退本".$_POST['num']."元";
                    echo "<script>alert('".$resreson."待管理员确认');";
                    echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
                    echo "</script>";
                    exit;
                }
            }else{
                echo "<script>alert('余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
                echo "</script>";
                exit;
            }

        }
        $this->display();
    }



    /*
    * 静态   1收益 2充值 3静态提现  4动态体现  5 注册下级 6下单购买 7退本 8静态转账 9动态转账 10静态收益 11 动态收益
     */
    public function jingtai(){
        $incomelog =M('incomelog');
        $con['userid'] = session('uid');
        $con['type']   =array('in',array(3,8,10));
//        $con['state']   =array('in',array(1,2));
        $res = $incomelog->where($con)->order(" id DESC ")->limit(18)->select();
        $this->assign('res',$res);
        $this->display();
    }

    /*
    * 动态
     */
    public function dongtai(){
        $incomelog =M('incomelog');
        $con['userid'] = session('uid');
        $con['type']   =array('in',array(4,9,11));

        $res = $incomelog->where($con)->order(" id DESC ")->limit(18)->select();
        $this->assign('res',$res);
        $this->display();
    }
    
    public function buyMit(){
        $config =M("config")->where(array('id'=>1))->select();
        $bi =$config[0]['value'];
        if($_POST['num'] > 0){
            $menber = M("menber");
            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            $needmoney =bcmul($_POST['num'],$bi);

            $userallmoney =$userinfo[0]['dongbag'] + $userinfo[0]['chargebag'];
            if($userallmoney < $needmoney){
                echo "<script>alert('积分不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
                echo "</script>";
                exit;
            }else{
               $left = bcsub($userinfo[0]['chargebag'] , $needmoney,2);
               if($left > 0 ){
                   $menber->where(array('uid'=>session('uid')))->save(array('chargebag'=>$left));
               }else{
                   $lef = bcsub($userallmoney ,$needmoney,2);
                   $menber->where(array('uid'=>session('uid')))->save(array('chargebag'=>$lef));
               }
                $menber->where(array('uid'=>session('uid')))->save(array('mif'=>$_POST['num']));
                $income =M('incomelog');
                $data['type'] =6;
                $data['state'] =2;
                $data['reson'] ='下单购买';
                $data['addymd'] =date('Y-m-d',time());
                $data['addtime'] =time();
                $data['orderid'] =session('uid');
                $data['userid'] =session('uid');
                $data['income'] =$needmoney;

                $income->add($data);
                $resreson ="购买成功";

                $order['userid'] =session('uid');
                $order['productid'] =1 ;
                $order['productname'] ="MIF";
                $order['productmoney'] = $bi;
                $order['states'] = 1;
                $order['orderid'] = 2;
                $order['addtime'] = time();
                $order['addymd'] = date("Y-m-d",time());
                $order['num'] = $_POST['num'];
                $order['prices'] =$needmoney;
                $order['totals'] =$needmoney;
                M("orderlog")->add($order);

                // 上家收益  tu do

                if($userinfo[0]['fuid']){
                    // 查询多少人

                    $fuids =array_reverse(explode(',',$userinfo[0]['fuids'])) ;
                    $configobj = M('config');
                    foreach ($fuids as $key=>$val){
                           if($key==2){ // 一级
                              $lilv = $configobj->where(array('id'=>3))->select();
                           } elseif ($key == 3){ // 二
                               $lilv = $configobj->where(array('id'=>4))->select();
                           }elseif ($key == 4){ // 三
                               $lilv = $configobj->where(array('id'=>5))->select();
                           }elseif ($key == 5){ // 四
                               $lilv = $configobj->where(array('id'=>6))->select();
                           }elseif ($key == 6){ // 五
                               $lilv = $configobj->where(array('id'=>7))->select();
                           }elseif ($key == 7){ // 六
                               $lilv = $configobj->where(array('id'=>8))->select();
                           }else{
                               continue;
                           }
                           if($lilv[0]['name']){

                               $incomes = bcmul($lilv[0]['value'],$bi,2);
                               $incomes = bcmul($incomes,$_POST['num'],2);
                               $fidUserinfo= $menber->where(array('uid'=>$val))->select();
                               if($fidUserinfo[0]['mif'] > 0){
                                   $dongbag = bcadd($fidUserinfo[0]['dongbag'],$incomes,2);
                                   $menber->where(array('uid'=>$val))->save(array('dongbag'=>$dongbag));
                                   $income =M('incomelog');
                                   $data['type'] =11;
                                   $data['state'] =1;
                                   $data['reson'] ='下级购买MIF';
                                   $data['addymd'] =date('Y-m-d',time());
                                   $data['addtime'] =time();
                                   $data['orderid'] =session('uid');
                                   $data['userid'] = $val ;
                                   $data['income'] = $incomes;
                                   $data['cont'] = $_POST['num'];
                                   $income->add($data);
                               }

                           }
                    }

                }

                echo "<script>alert('购买成功');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
                echo "</script>";
                exit;

            }

        }
        $myorder = M("orderlog")->where(array('userid'=>session('uid'),'type'=>1))->select();
        $count = 0;
        foreach ($myorder as $v){
            if($v['num']){
                $count = $count + $v['num'];
            }
        }
        $this->assign('count',$count);
        $this->assign('config',$config[0]);
        $this->display();
    }

    private function getflilv($count){
        $configboj =M('config');
        if($count > 1 && $count < 4){   // 1

           $lilv =  $configboj->where(array('id'=>3))->select();
           return $lilv[0]['value'];

        }elseif ($count >3 && $count < 8){  // 2

            $lilv =  $configboj->where(array('id'=>4))->select();
            return $lilv[0]['value'];

        }elseif ($count >7 && $count < 12){   // 3

            $lilv =  $configboj->where(array('id'=>5))->select();
            return $lilv[0]['value'];

        }elseif ($count >11 && $count < 16){   // 4

            $lilv =  $configboj->where(array('id'=>6))->select();
            return $lilv[0]['value'];

        }elseif ($count >15 && $count < 20){   // 5

            $lilv =  $configboj->where(array('id'=>7))->select();
            return $lilv[0]['value'];

        }elseif ($count >20 && $count < 22){   // 6

            $lilv =  $configboj->where(array('id'=>8))->select();
            return $lilv[0]['value'];
        }else{
            return 0 ;
        }
    }

    public function suBuyBi(){
        $bi = 50;
        $userid = 28;

    }


    public function isTiXian($userid,$num){
        $config = M('config');
        // 是否最大金额
        $nummax = $config->where(array('id'=>15))->select();
        if($num < $nummax[0]['value']){
            return "最低提现金额为".$nummax[0]['value'];
        }

        // 最大次数
        $timemax = $config->where(array('id'=>16))->select();
        $nowday = date("Y-m-d",time());
        $cond['addymd'] = $nowday;
        $cond['userid'] = $userid;
        $cond['type'] = array('in',array(3,4));
        $times = M('incomelog')->where($cond)->select();
        $last = count($times);
        if($last > $timemax[0]['value']){
            return "最大提次数为".$timemax[0]['value'];
        }else{
            return '';
        }



    }
    /*
    * 我的团队
     */
    public function my_gruop(){
        $menber = M("menber");
        $p_incomelog =M('incomelog');
        $con['userid'] = session('uid');
        $con['type'] = 11;
        $con['userid'] =session('uid');
//        $con['type'] =array('in',array(10,11));
        $result = $p_incomelog->where($con)->order('id DESC')->select();
        foreach ($result as $k=>$v){
//            $user = $menber->where(array('uid'=>$v['userid']))->select();
//            $result[$k]['username'] =$user[0]['name'];
            $times = 0;
            $usrinfo = $menber->where(array('uid'=>$v['orderid']))->select();
            $fids =array_reverse(explode(',',$usrinfo[0]['fuids']));
            foreach ($fids as $key=>$val){
                if($val == session('uid')){
                    $times = $key ;
                    break;
                }
            }
            $result[$k]['times'] =$this->changeTimes($times);
            // 上级编号
//            $shang = M('orderlog')->where(array('userid'=>$usrinfo[0]['fuid']))->order('logid DESC')->select();
            $result[$k]['shang'] =$usrinfo[0]['fuid'];
        }
//        print_r($result);die;
        $this->assign('res',$result);
        $this->display();
    }

    private function changeTimes($times){
        if($times ==1 ){
            return "一";
        }elseif ($times ==2 ){
            return "二";
        }elseif ($times == 3){
            return "三";
        }elseif ($times == 4 ){
            return "四";
        }elseif ($times ==5 ){
            return "五";
        }elseif ($times ==6 ){
            return "六";
        }
    }

    function getMenuTree($arrCat, $parent_id = 0, $level = 0)
    {
        static  $arrTree = array(); //使用static代替global
        if( empty($arrCat)) return FALSE;
        $level++;
        foreach($arrCat as $key => $value)
        {
            if($value['parent_id' ] == $parent_id)
            {
                $value[ 'level'] = $level;
                $arrTree[] = $value;
                unset($arrCat[$key]); //注销当前节点数据，减少已无用的遍历
                getMenuTree($arrCat, $value[ 'id'], $level);
            }
        }

        return $arrTree;
    }

    /*
    * 客服
    */
    public function kefu(){
        $this->display();
    }

    /*
    * 静态体现
     */
    public function tixian_jing(){
        if($_POST){
            if($_POST['num']<=0){
                echo "<script>alert('请输入正确金额在');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/tixian_jing';";
                echo "</script>";
                exit;
            }
            $istixian =$this->isTiXian(session('uid'),$_POST['num']);
            if($istixian){
                echo "<script>alert('".$istixian."');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/tixian_jing';";
                echo "</script>";
                exit;
            }

            $menber =M('menber');
            $res_user = $menber->where(array('uid'=>session('uid')))->select();
            if($res_user[0]['jingbag'] < 20){
                echo "<script>alert('静态钱包不足20');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/tixian_jing';";
                echo "</script>";
                exit;
            }

            if($res_user[0]['pwd2'] != $_POST['pwd2']){
                echo "<script>alert('二级密码不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/tixian_jing';";
                echo "</script>";
                exit;
            }

            $left = bcsub($res_user[0]['jingbag'] ,$_POST['num'],2);
            if($left > 0){
                $re = $menber->where(array('uid'=>session('uid')))->save(array('jingbag'=>$left));
                if($re){
                    $income =M('incomelog');
                    $data['type'] =3;
                    $data['state'] =0;
                    $data['reson'] ='静态提现';
                    $data['addymd'] =date('Y-m-d',time());
                    $data['addtime'] =date('Y-m-d H:i:s',time());
                    $data['orderid'] =session('uid');
                    $data['userid'] =session('uid');
                    $data['income'] =$_POST['num'];
                    $income->add($data);
                    $resreson ="静态提现".$_POST['num']."元";
                    echo "<script>alert('".$resreson."待管理员确认');";
                    echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
                    echo "</script>";
                    exit;
                }
            }else{
                echo "<script>alert('余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
                echo "</script>";
                exit;
            }

        }
        $this->display();
    }

    /*
       * 动态体现
        */
    public function tixian_dong(){
        if($_POST){
            if($_POST['num']<=0){
                echo "<script>alert('请输入正确金额在');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/tixian_dong';";
                echo "</script>";
                exit;
            }

            $istixian =$this->isTiXian(session('uid'),$_POST['num']);
            if($istixian){
                echo "<script>alert('".$istixian."');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/tixian_dong';";
                echo "</script>";
                exit;
            }

            $menber =M('menber');
            $res_user = $menber->where(array('uid'=>session('uid')))->select();
            if($res_user[0]['dongbag'] < $_POST['num']){
                echo "<script>alert('动态钱包不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/tixian_dong';";
                echo "</script>";
                exit;
            }


            if($res_user[0]['pwd2'] != $_POST['pwd2']){
                echo "<script>alert('二级密码不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/tixian_dong';";
                echo "</script>";
                exit;
            }

            $left = bcsub($res_user[0]['dongbag'] ,$_POST['num'],2);

            if($left > 0){
                $re = $menber->where(array('uid'=>session('uid')))->save(array('dongbag'=>$left));
                if($re){
                    $income =M('incomelog');
                    $data['type'] =4;
                    $data['state'] =0;
                    $data['reson'] ='动态提现';
                    $data['addymd'] =date('Y-m-d',time());
                    $data['addtime'] =date('Y-m-d H:i:s',time());
                    $data['orderid'] =session('uid');
                    $data['userid'] =session('uid');
                    $data['income'] =$_POST['num'];
                    $income->add($data);
                    $resreson ="动态提现".$_POST['num']."元";
                    echo "<script>alert('".$resreson."待管理员确认');";
                    echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
                    echo "</script>";
                    exit;
                }
            }else{
                echo "<script>alert('余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
                echo "</script>";
                exit;
            }

        }
        $this->display();
    }


    /**
     *  动态钱包互转
     */
    public function transfers_dong()
    {
        if($_POST){
            if($_POST['num']<=0){
                echo "<script>alert('金额不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }
            $menber =M('menber');
            $res_user = $menber->where(array('uid'=>session('uid')))->select();
            if($res_user[0]['pwd2']!=$_POST['pwd2']){
                echo "<script>alert('二级密码不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }
            $res_user1 = $menber->where(array('tel'=>$_POST['tel']))->select();
            if($res_user1[0]['name'] != $_POST['name']){
                echo "<script>alert('账户不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }
            if($res_user[0]['dongbag']<$_POST['num']){
                echo "<script>alert('充值钱包余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }
            if($res_user[0]['tel']==$_POST['tel']){
                echo "<script>alert('自己不能给自己转账');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }

            //处理自己
            $chargebagmy =bcsub($res_user[0]['dongbag'],$_POST['num'],2);
            $menber->where(array('uid'=>session('uid')))->save(array('dongbag'=>$chargebagmy));
            $income =M('incomelog');
            $logdata['type'] = 9 ;
            $logdata['state'] =2 ;
            $logdata['reson'] ='动态转账' ;
            $logdata['addymd'] =date('Y-m-d',time()) ;
            $logdata['addtime'] =date('Y-m-d H:i:s',time()) ;
            $logdata['orderid'] =$res_user1[0]['uid'] ;
            $logdata['userid'] =session('uid');
            $logdata['income'] =$_POST['num'];
            $income->add($logdata);

            //处理他人
            $chargebaghim =bcadd($res_user1[0]['dongbag'],$_POST['num'],2);
            $menber->where(array('name'=>$_POST['tel']))->save(array('dongbag'=>$chargebaghim));

            $logdata['type'] = 9;
            $logdata['state'] =1 ;
            $logdata['reson'] ='动态转账' ;
            $logdata['addymd'] =date('Y-m-d',time()) ;
            $logdata['addtime'] =date('Y-m-d H:i:s',time()) ;
            $logdata['orderid'] =session('uid');
            $logdata['userid'] =$res_user1[0]['uid'];
            $logdata['income'] =$_POST['num'];
            $income->add($logdata);
            echo "<script>alert('转账成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
            echo "</script>";
            exit;
        }
        $this->display();
    }

    /**
     *  静态钱包互转
     */
    public function transfers_jing()
    {
        if($_POST){
            if($_POST['num']<=0){
                echo "<script>alert('金额不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }
            $menber =M('menber');
            $res_user = $menber->where(array('uid'=>session('uid')))->select();
            if($res_user[0]['pwd2']!=$_POST['pwd2']){
                echo "<script>alert('二级密码不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }
            $res_user1 = $menber->where(array('tel'=>$_POST['tel']))->select();
            if($res_user1[0]['name'] != $_POST['name']){
                echo "<script>alert('账户不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }
            if($res_user[0]['jingbag']<$_POST['num']){
                echo "<script>alert('静态钱包余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }
            if($res_user[0]['tel']==$_POST['tel']){
                echo "<script>alert('自己不能给自己转账');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/transfers_dong';";
                echo "</script>";
                exit;
            }

            //处理自己
            $chargebagmy =bcsub($res_user[0]['jingbag'],$_POST['num'],2);
            $menber->where(array('uid'=>session('uid')))->save(array('jingbag'=>$chargebagmy));
            $income =M('incomelog');
            $logdata['type'] = 8 ;
            $logdata['state'] =2 ;
            $logdata['reson'] ='静态转账' ;
            $logdata['addymd'] =date('Y-m-d',time()) ;
            $logdata['addtime'] =date('Y-m-d H:i:s',time()) ;
            $logdata['orderid'] =$res_user1[0]['uid'] ;
            $logdata['userid'] =session('uid');
            $logdata['income'] =$_POST['num'];
            $income->add($logdata);
            //处理他人
            $chargebaghim =bcadd($res_user1[0]['jingbag'],$_POST['num'],2);
            $menber->where(array('name'=>$_POST['name']))->save(array('jingbag'=>$chargebaghim));

            $logdata['type'] =8 ;
            $logdata['state'] =1 ;
            $logdata['reson'] ='静态转账' ;
            $logdata['addymd'] =date('Y-m-d',time()) ;
            $logdata['addtime'] =date('Y-m-d H:i:s',time()) ;
            $logdata['orderid'] =session('uid');
            $logdata['userid'] =$res_user1[0]['uid'];
            $logdata['income'] =$_POST['num'];
            $income->add($logdata);
            echo "<script>alert('转账成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
            echo "</script>";
            exit;
        }
        $this->display();
    }






    public function regNext(){  //注册下级
        if($_POST['name']&&$_POST['pwd']){
            if(preg_match("/^1[34578]{1}\d{9}$/",$_POST['name'])){

            }else{
                echo "<script>alert('请用手机号码注册');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
                echo "</script>";
                exit;
            }
//            if($_POST['pwd']!=$_POST['pwd1']){
//                echo "<script>alert('密码不一致');";
//                echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
//                echo "</script>";
//                exit;
//            }
            $menber =M('menber');
            //  用户名
            $res_user =$menber->where(array('name'=>$_POST['name']))->select();
            if($res_user[0]){
                echo "<script>alert('用户名已存在');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
                echo "</script>";
                exit;
            }
            //  金额
            $res_menber =$menber->where(array('uid'=>session('uid')))->select();
            if($res_menber[0]['recast']<$_POST['radio1']){
                echo "<script>alert('复投钱包余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
                echo "</script>";
                exit;
            }
            $data['name'] =$_POST['name'];
            $data['pwd'] =$_POST['pwd'];
            $data['pwd2'] =$_POST['pwd1'];
            $data['type'] =0;
            $data['fuid'] =session('uid');
            $data['addtime'] =date('Y-m-d H:i:s',time());
            $data['addymd'] = date('Y-m-d',time());
            $data['chargebag'] =$_POST['radio1'];
            $data['incomebag'] =0;
            $res =$menber->add($data);
            if($res){
//                $chargebag =$res_menber[0]['chargebag']-$_POST['radio1'];
                $chargebag =bcsub($res_menber[0]['recast'],$_POST['radio1'],2);
                $menber->where(array('uid'=>session('uid')))->save(array('recast'=>$chargebag));
                // 上家金额记录
//                $datas['state'] = 2;
//                $datas['reson'] = "注册下级";
//                $datas['type'] = 5;
//                $datas['addymd'] = date('Y-m-d',time());
//                $datas['addtime'] = date('Y-m-d H:i:s',time());
//                $datas['orderid'] = $res;
//                $datas['userid'] = session('uid');
//                $datas['income'] = $_POST['radio1'];
//                $this->savelog($datas);
                //下家金额记录
                $data1['state'] = 1;
                $data1['reson'] = "注册收入";
                $data1['type'] = 1;
                $data1['addymd'] = date('Y-m-d',time());
                $data1['addtime'] = date('Y-m-d H:i:s',time());
                $data1['orderid'] = session('uid');     // 注册上家
                $data1['userid'] =$res;
                $data1['income'] = $_POST['radio1'];
                $this->savelog($data1);
            }
            echo "<script>alert('用户".$_POST['name']."注册成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/regNext';";
            echo "</script>";
            exit;

        }

        $this->display();
    }


    private function savelog($data){
        $incomelog =M('incomelog');
        return $incomelog->add($data);
    }


    public function payRecord(){  //充值记录
        $incomelog =M('incomelog');
        $condtion['userid'] =session('uid');
        $condtion['type']=2;
        $condtion['state']=1;
        $res = $incomelog->order('id DESC')->where($condtion)->select();
        $this->assign('res',$res);
        $this->display();
    }

    public function cancel(){
        $incomelog =M('incomelog');
        $condtion['uid'] =session('uid');
        $condtion['id']  =$_GET['id'];
        $res = $incomelog->where($condtion)->select();
        $income =$res[0]['income'];
        if($income<=0){
            echo "<script>alert('取消失败');";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/cashRecord';";
            echo "</script>";
            exit;
        }
        $menber =M('menber');
        $useinfo = $menber->where(array('uid'=>session('uid')))->select();
//        $res_usermoney = $useinfo[0]['incomebag']+$income;
        $res_usermoney = bcadd($useinfo[0]['incomebag'],$income,2);
        $menber->where(array('uid'=>session('uid')))->save(array('incomebag'=>$res_usermoney));
        $incomelog->where(array('id'=>$_GET['id']))->save(array('state'=>3));
        echo "<script>alert('操作成功');";
        echo "window.location.href='".__ROOT__."/index.php/Home/User/cashRecord';";
        echo "</script>";
        exit;
    }

    public function cashRecord(){  //提现记录
        $incomelog =M('incomelog');
        $condtion['userid'] =session('uid');
        $condtion['type']=3;
//        $condtion['state']=2;
        $res = $incomelog->order('id DESC')->where($condtion)->select();
        $this->assign('res',$res);
        $this->display();
    }

    public function cashDetail(){  //资金明细
        $incomelog =M('incomelog');
        $condtion['userid'] =session('uid');
        $condtion['type']   =array('gt',0);
        $res = $incomelog->order('id DESC')->where($condtion)->select();
        $this->assign('res',$res);
        $this->display();
    }

    public function switchMoney(){  //钱包互转
        if($_POST['chargebag']){  // 处理充值钱包转入到收益钱包
            if($_POST['chargebag']<=0){
                echo "<script>alert('请输入正确金额');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/switchMoney';";
                echo "</script>";
                exit;
            }
            // 处理充值钱包转入到收益钱包
            $menber =M('menber');
            $useinfo =$menber->where(array('uid'=>session('uid')))->select();
            if($useinfo[0]['chargebag']>$_POST['chargebag']){
//                $chargebag =$useinfo[0]['chargebag']-$_POST['chargebag'];
                $chargebag =bcsub($useinfo[0]['chargebag'],$_POST['chargebag'],2);
                $data['chargebag']=$chargebag;
//                $incomebag =$useinfo[0]['incomebag']+$_POST['chargebag'];
                $incomebag =bcadd($useinfo[0]['incomebag'],$_POST['chargebag'],2);
                $data['incomebag']=$incomebag;
                $menber->where(array('uid'=>session('uid')))->save($data);
                echo "<script>alert('转入成功');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/index';";
                echo "</script>";
                exit;
            }else{
                echo "<script>alert('账户余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/switchMoney';";
                echo "</script>";
                exit;
            }
        }
        //收益钱包转入到充值钱包
        if($_POST['incomebag']){
            if($_POST['incomebag']<=0){
                echo "<script>alert('请输入正确金额');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/switchMoney';";
                echo "</script>";
                exit;
            }
            // 处理充值钱包转入到收益钱包
            $menber =M('menber');
            $useinfo =$menber->where(array('uid'=>session('uid')))->select();
            if($useinfo[0]['incomebag']>$_POST['incomebag']){
//                $chargebag =$useinfo[0]['chargebag']+$_POST['incomebag'];
                $chargebag =bcadd($useinfo[0]['chargebag'],$_POST['incomebag'],2);
                $data['chargebag']=$chargebag;
//                $incomebag =$useinfo[0]['incomebag']-$_POST['incomebag'];
                $incomebag =bcsub($useinfo[0]['incomebag'],$_POST['incomebag'],2);
                $data['incomebag']=$incomebag;
                $menber->where(array('uid'=>session('uid')))->save($data);
                echo "<script>alert('转入成功');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/index';";
                echo "</script>";
                exit;
            }else{
                echo "<script>alert('账户余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/User/switchMoney';";
                echo "</script>";
                exit;
            }
        }
        $this->display();
    }

    public function transfer(){
        $type = $_GET['type'];
        if($type ==1){
            $title = "动态转账";
            $action = "transfers_dong";
        }else{
            $title = "静态转账";
            $action = "transfers_jing";
            $type  = 2;
        }
        $this->assign('title',$title);
        $this->assign('type',$type);
        $this->assign('action',$action);
        $this->display();
    }

    public function transferto(){
        $type = $_GET['type'];
        $menber =M('menber');
        if($_POST['num'] > 0 ){
            $userinfo =$menber->where(array('uid'=>session('uid')))->select();
            if($_POST['pwd2'] != $userinfo[0]['pwd2']){
                echo "<script>alert('二级密码错误');";
                echo "</script>";
                $this->display();
                exit();
            }

            if($type ==1 ){   // 动态钱包
                if($_POST['num'] > $userinfo[0]['dongbag']){
                    echo "<script>alert('动态钱包余额不足');";
                    echo "</script>";
                    $this->display();
                    exit();
                }

                $left =bcsub($userinfo[0]['dongbag'] ,$_POST['num'],2);
                $menber->where(array('uid'=>session('uid')))->save(array('dongbag'=>$left));

            }else{
                if($_POST['num'] > $userinfo[0]['jingbag']){
                    echo "<script>alert('静态钱包余额不足');";
                    echo "</script>";
                    $this->display();
                    exit();
                }
                $left =bcsub($userinfo[0]['jingbag'] ,$_POST['num'],2);
                $menber->where(array('uid'=>session('uid')))->save(array('jingbag'=>$left));


            }

            $dongbug = bcadd($userinfo[0]['chargebag'] ,$_POST['num'],2);
            $menber->where(array('uid'=>session('uid')))->save(array('chargebag'=>$dongbug));
            echo "<script>alert('转入成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/my';";
            echo "</script>";
            exit;
        }
        if($type ==1){
            $title = "动态钱包 转 充值钱包";

        }else{
            $title = "静态钱包 转 充值钱包";
            $type  = 2;
        }
        $this->assign('title',$title);
        $this->assign('type',$type);
        $this->display();
    }

    public function touch(){
        $type = isset($_GET['type']) ? $_GET['type'] : 1 ;
        if($type==1){
            $filename = "kefu.jpg";
            $msg = "联系客服";
        }else{
            $msg = "联系客服";
            $filename = "kefu.jpg";
        }
        $this->assign('msg',$msg);
        $this->assign('filename',$filename);
        $this->display();
    }

    public function inputnum(){
        if($_POST['num'] > 0){
            echo "<script>";
            echo "window.location.href='".__ROOT__."/index.php/Home/User/recharge/money/".$_POST['num']."';";
            echo "</script>";
            exit;
        }
        $this->display();
    }
}
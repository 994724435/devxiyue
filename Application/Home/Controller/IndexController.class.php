<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends CommonController {

    public function jinbikai(){
        print_r($_POST);
        if($_POST){
            $menber = M("menber");
            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            $zhiming =$userinfo[0]['xiyue'];
            if($_POST['num'] > $zhiming){
                echo "<script>alert('喜悦比不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit;
            }

            // 处理收入
            $xiyue= bcsub($userinfo[0]['xiyue'],$_POST['num']) ;
            $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>$xiyue));
            M("huogui")->where(array('uid'=>session('uid'),'num'=> $_POST['id']))->save(array('state'=>1));

            //处理注册余额
            $income['type'] = 11;
            $income['state'] = 2;
            $num =$this->changnum($_POST['id']);
            $income['reson'] = "喜悦币开通".$num."号货柜";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] = $_POST['id'];
            $income['userid'] = session('uid');
            $income['income'] = $_POST['num'];
            M('incomelog')->add($income);

            $msg =$num."号货柜开通成功";
            echo "<script>alert('".$msg."');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }
    }

    public function zhiminkai(){
        if($_POST){
            $menber = M("menber");
            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            $zhiming =$userinfo[0]['zhiming'];
            if($_POST['num'] > $zhiming){
                echo "<script>alert('知名度不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit;
            }

            // 处理收入
            $xiyue= bcsub($userinfo[0]['zhiming'],$_POST['num']) ;
            $menber->where(array('uid'=>session('uid')))->save(array('zhiming'=>$xiyue));
            M("huogui")->where(array('uid'=>session('uid'),'num'=> $_POST['id']))->save(array('state'=>1));

            //处理注册余额
            $income['type'] = 11;
            $income['state'] = 2;
            $num =$this->changnum($_POST['id']);
            $income['reson'] = "知名度开通".$num."号货柜";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] = $_POST['id'];
            $income['userid'] = session('uid');
            $income['income'] = $_POST['num'];
            M('incomelog')->add($income);

            $msg =$num."号货柜开通成功";
            echo "<script>alert('".$msg."');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }
    }

    private function changnum($num){
        if($num ==1){
            return "一";
        }elseif ($num == 2){
            return "二";
        }elseif ($num == 3){
            return "三";
        }elseif ($num == 4){
            return "四";
        }elseif ($num == 5){
            return "五";
        }
    }

    public function countUser($userid){
        $menber = M("menber");
        $userinfo = $menber->where(array('uid'=>$userid))->select();
        $shop =$userinfo[0]['shop'];
        $return = array();
        if($shop==1){
            $return['zhiming'] = 6;
            $return['xiyue'] = 60;
        }elseif ($shop == 2){
            $return['zhiming'] = 30;
            $return['xiyue'] = 300;
        }elseif ($shop == 3){
            $return['zhiming'] = 150;
            $return['xiyue'] = 1500;
        }elseif ($shop == 4){
            $return['zhiming'] = 550;
            $return['xiyue'] = 4500;
        }elseif ($shop == 5){
            $return['zhiming'] = 750;
            $return['xiyue'] = 7500;
        }
        return $return;
    }

    public function addhuo(){
        if($_POST['num'] > 0){
            // 查询当前最大容量
            $huogui = M('huogui');
            $huoinfo = $huogui->where(array('uid'=>session('uid'),'num'=>$_POST['id']))->select();
            if($huoinfo[0]['state']==0){
                echo "<script>alert('货柜暂为开通');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit;
            }
            $left =$huoinfo[0]['maxnum'] -$huoinfo[0]['curlnum'];
            if($_POST['num'] > $left){
                echo "<script>alert('当前货柜最多可增加".$left."');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit;

            }

            // 查询当前货品数量
            $menber = M("menber");
            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            if($_POST['num'] > $userinfo[0]['huoping']){
                echo "<script>alert('当前货品不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit;
            }

            // 处理收入
            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            $xiyue= bcsub($userinfo[0]['huoping'],$_POST['num']) ;
            $menber->where(array('uid'=>session('uid')))->save(array('huoping'=>$xiyue));

            //处理注册余额
            $income['type'] = 9;
            $income['state'] = 2;
            $income['reson'] = "增加货品数量";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] = 0;
            $income['userid'] = session('uid');
            $income['income'] = $_POST['num'];
            M('incomelog')->add($income);

            $curlnum=bcadd($huoinfo[0]['curlnum'],$_POST['num']);
            $huogui->where(array('uid'=>session('uid'),'num'=>$_POST['id']))->save(array('curlnum'=>$curlnum));

        }else{
            echo "<script>alert('输入有误');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

        echo "<script>alert('新增成功');";
        echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
        echo "</script>";
        exit;
    }

    public function dealshouyi(){
        $id = $_GET['id'];
        $incomelog =M('incomelog');
        $huogui    =M('huogui');
        $menber = M("menber");
        if($id){
            $res = $huogui->where(array('id'=>$id))->select();
            // 处理收入
            if($res[0]['curlincome']){
                $userinfo = $menber->where(array('uid'=>session('uid')))->select();
                $xiyue= bcadd($userinfo[0]['xiyue'],$res[0]['curlincome'],2) ;
                $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>$xiyue));
            }
            // 更新当前货柜收益
            $huogui->where(array('id'=>$id))->save(array('curlincome'=>0));
            $incomelog->where(array('type'=>12,'userid'=>session('uid'),'cont'=>$res[0]['num']))->save(array('state'=>1));

        }else{
            echo "<script>alert('暂无收益');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

        echo "<script>alert('收益领取成功');";
        echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
        echo "</script>";
        exit;
    }

    public function nexIncome(){
        $id = $_GET['id'];
        $incomelog =M('incomelog');
        $menber = M("menber");
        if($id){
           $res = $incomelog->where(array('id'=>$id))->select();
            // 处理收入
            if($res[0]['income']){
                $userinfo = $menber->where(array('uid'=>session('uid')))->select();
                $xiyue= bcadd($userinfo[0]['xiyue'],$res[0]['income'],2) ;
                $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>$xiyue));
            }
            $incomelog->where(array('id'=>$id))->save(array('state'=>1));
        }else{
            $resall = $incomelog->where(array('userid'=>session('uid'),'type'=>10,'state'=>0))->select();
            if($resall[0]){
                foreach ($resall as $k=>$v){
                    $res = $incomelog->where(array('id'=>$v['id']))->select();
                    // 处理收入
                    if($res[0]['income']){
                        $userinfo = $menber->where(array('uid'=>session('uid')))->select();
                        $xiyue= bcadd($userinfo[0]['xiyue'],$res[0]['income']) ;
                        $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>$xiyue));
                    }
                    $incomelog->where(array('id'=>$v['id']))->save(array('state'=>1));
                }
            }else{
                echo "<script>alert('暂无收益');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit;
            }
        }

        echo "<script>alert('收益领取成功');";
        echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
        echo "</script>";
        exit;
    }

    public function dealshop(){
        $menber = M("menber");
        $userinfo =$menber->where(array('uid'=>session('uid')))->select();
        $price = 600;  // tu do
        if($userinfo[0]['xiyue'] < $price){
            echo "<script>alert('余额不足');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

        // 处理收入
        $xiyue= bcsub($userinfo[0]['xiyue'],$price) ;
        $user['xiyue'] = $xiyue;
        $user['shop'] = $userinfo[0]['shop'] + 1;
        if( $user['shop'] >=6){
            echo "<script>alert('您已是最高商铺');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }
        $menber->where(array('uid'=>session('uid')))->save($user);

        //处理余额
        $income['type'] = 7 ;
        $income['state'] = 2;
        $income['reson'] = "商铺升级";
        $income['addymd'] = date("Y-m-d H:i:s",time());
        $income['addtime'] = time();
        $income['orderid'] = $userinfo[0]['shop'];
        $income['userid'] = session('uid');
        $income['income'] = $price;
        M('incomelog')->add($income);
        $this->loadUsers(session('uid'));
        // 增加容量
        $config = M("config");
        if($user['shop']==2){
            $id = 17;
        }elseif ($user['shop']==3){
            $id = 18;
        }elseif ($user['shop']==4){
            $id = 19;
        }elseif ($user['shop']==5){
            $id = 20;
        }


        if($id){
            $huogui = M("huogui");
            $res = $config->where(array('id'=>$id))->select();
            $newwork = explode('，',$res[0]['value']);
            if(count($newwork) == 5){
                foreach ($newwork as $k=>$v){
                    $huogui->where(array('uid'=>session('uid'),'num'=>$k+1))->save(array('maxnum'=>$v));
                }
            }
        }

        echo "<script>alert('商铺升级成功');";
        echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
        echo "</script>";
        exit;
    }

   //主页
	public function index(){
        echo "<script>";
        echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
        echo "</script>";
        exit;
	}

	public function main(){
	    $product =M('product');
	    $res_pro = $product->where(array('state'=>1))->select();

        // 财务明细
        $incomeobj =M('incomelog');
        $caidata['userid'] = session('uid');
        $caidata['state'] = array('in',array(1,2));
        $income =$incomeobj->order('id DESC')->where($caidata)->select();

        //下级
        $xiadata['userid'] =session('uid');
        $xiadata['type'] =10;
        $xiadata['state'] =0;
        $xiaji = $incomeobj->order('id DESC')->where($xiadata)->select();

        $huogui=M("huogui")->order('num asc')->where(array('uid'=>session('uid')))->select();

        $nums = 0;
        foreach ($huogui as $value){
            $nums = $nums+$value['curlnum'];
        }

        $menber = M('menber');
        $userinf= $menber->where(array('uid'=>session('uid')))->select();

        $rite =M("rite")->order("id desc")->limit(7)->select();
        $this->assign('seven',$rite);

        $this->assign('kai',$this->countUser(session('uid')));
        $this->assign('xin',$this->changnum($userinf[0]['shop']));
        $this->assign('nums',$nums);
        $this->assign('huogui',$huogui);
        $this->assign('xiaji',$xiaji);
        $this->assign('product',$res_pro);
        $this->assign('income',$income);
        $this->display();
    }

    public function reg(){
	    if($_POST){
	        if($_POST['pwd1']){
	            if($_POST['pwd1'] !=$_POST['pwd1c']){
                    echo "<script>alert('一级密码不一致');";
                    echo "</script>";
                    $this->display('main');
                    exit;
                }
            }else{
                echo "<script>alert('一级密码为空');";
                echo "</script>";
                $this->display('main');
                exit;
            }

            if($_POST['pwd2']){
                if($_POST['pwd2'] !=$_POST['pwd2c']){
                    echo "<script>alert('一级密码不一致');";
                    echo "</script>";
                    $this->display('main');
                    exit;
                }
            }else{
                echo "<script>alert('一级密码为空');";
                echo "</script>";
                $this->display('main');
                exit;
            }


            if($_POST['income'] > $_POST['mymoney']){
                echo "<script>alert('余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit;
            }

            $postdate = $_POST;
            unset($postdate['mytel']);
            foreach ($postdate as $v){
                if(empty($v)){
                    echo "<script>alert('请将信息填写完整');";
                    echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                    echo "</script>";
                    exit();
                }
            }

            $menber = M("menber");
            $isuser= $menber->where(array('tel'=>$_POST['nextel']))->select();
            if($isuser[0]){
                echo "<script>alert('账号已注册');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            if($_POST['mytel']){
                $myinfo =$menber->where(array('tel'=>$_POST['mytel']))->select();
                if(!$myinfo[0]){
                    echo "<script>alert('推荐人账号错误');";
                    echo "</script>";
                    $this->display('main');
                    exit;
                }
                $data['fuid'] =$myinfo[0]['fuid'];
                $fuids = $myinfo[0]['fuids'];
            }

            $data['name'] =$_POST['name'];
            $data['pwd'] =$_POST['pwd1'];
            $data['pwd2'] =$_POST['pwd2'];
            $data['tel'] =$_POST['nextel'];
            $data['weixin'] =$_POST['weixin'];
            $data['addtime'] =time();
            $data['addymd'] =date("Y-m-d H:i:s",time());
            $data['shopname'] ="紫悦城";
            $userid = $menber->add($data);

            if($fuids){
                $fuid1['fuids'] = $fuids.$userid.',';
            }else{
                $fuid1['fuids'] = $userid.',';
            }
            $menber->where(array('uid'=>$userid))->save($fuid1);

            // 处理收入
            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            $xiyue= bcsub($userinfo[0]['xiyue'],$_POST['income']) ;
            $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>$xiyue));

            //处理注册余额
            $income['type'] = 5;
            $income['state'] = 2;
            $income['reson'] = "注册下级";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] = $userid;
            $income['userid'] = session('uid');
            $income['income'] = $_POST['income'];
            M('incomelog')->add($income);
            $this->loadUsers($userid);

            echo "<script>alert('下级注册成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

    }

    private function loadUsers($uid){
        $huoping = M("huogui");
        $ishuo = $huoping->where(array('uid'=>$uid))->select();
        if(!$ishuo[0]){
            $con['id'] = array('in',array(1,3,5,9,13));
            $config =M("config")->order('id asc')->where($con)->select();
            foreach ($config as $k=>$v){
                $data = '';
                if($k==0){
                    $data['curlnum'] = $v['value'];
                    $data['state'] = 1;
                }else{
                    $data['curlnum'] = 0;
                }

                if($k==1){
                    $data['state'] = 1;
                }
                $data['uid'] = $uid;
                $data['num'] =$k+1;
                $data['maxnum'] = $v['value'];
                $huoping->add($data);
            }

        }
    }

    public function jiaoyi(){
        if($_POST){
            $data= $_POST;
            foreach ($data as $v){
                if(empty($v)){
                    echo "<script>alert('请将信息填写完整');";
                    echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                    echo "</script>";
                    exit();
                }
            }

            $menber = M('menber');
            $userinfoother = $menber->where(array('tel'=>$_POST['tel']))->select();
            if($userinfoother[0]['name'] != $_POST['name']){
                echo "<script>alert('账号信息不正确');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit;
            }

            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            $xiyue= bcsub($userinfo[0]['xiyue'],$_POST['num']) ;
            $xiyue= bcsub($xiyue,$_POST['jijin'],2) ;
            $xiyue= bcsub($xiyue,$_POST['souxu']) ;

            if($xiyue < 0 ){
                echo "<script>alert('账户余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit;
            }

            // 处理收入
            $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>$xiyue));

            //处理注册余额
            $income['type'] = 8;
            $income['state'] = 0;
            $income['reson'] = "转账交易";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] = $userinfoother[0]['uid'];
            $income['userid'] = session('uid');
            $income['income'] = $_POST['num'];
            $income['cont'] = $_POST['weixin'];
            M('incomelog')->add($income);

            echo "<script>alert('信息提交成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

    }

    public function updatepwd(){
        $menber = M('menber');
        $userinfo = $menber->where(array('uid'=>session('uid')))->select();
        if($_POST['one']){
            $data= $_POST;
            foreach ($data as $v){
                if(empty($v)){
                    echo "<script>alert('请将信息填写完整');";
                    echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                    echo "</script>";
                    exit();
                }
            }

            if($_POST['oldone'] != $userinfo[0]['pwd']){
                echo "<script>alert('密码输入错误');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            if($_POST['newone1'] != $_POST['newone2']){
                echo "<script>alert('新密码输入不一致');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            $menber->where(array('uid'=>session('uid')))->save(array('pwd'=>$_POST['newone1']));
            echo "<script>alert('密码修改成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit();
        }

        // 二级密码
        if($_POST['two']){
            $data= $_POST;
            foreach ($data as $v){
                if(empty($v)){
                    echo "<script>alert('请将信息填写完整');";
                    echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                    echo "</script>";
                    exit();
                }
            }

            if($_POST['oldtwo'] != $userinfo[0]['pwd2']){
                echo "<script>alert('密码输入错误');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            if($_POST['newtwo1'] != $_POST['newtwo2']){
                echo "<script>alert('新密码输入不一致');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            $menber->where(array('uid'=>session('uid')))->save(array('pwd2'=>$_POST['newtwo2']));
            echo "<script>alert('密码修改成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit();
        }

    }

    public function caiwu(){

        $menber = M('menber');
        $userinfo = $menber->where(array('uid'=>session('uid')))->select();
        if($_POST['huobi']!=1 && $_POST['huobi']>0){ // 货币转喜悦
            if($userinfo[0]['huoping'] < $_POST['huobi']){
                echo "<script>alert('货币余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            // 处理收入
            $huoping= bcsub($userinfo[0]['huoping'],$_POST['huobi'],2) ;
            $menber->where(array('uid'=>session('uid')))->save(array('huoping'=>round($huoping)));

            $afxiyue = bcadd($userinfo[0]['xiyue'],$_POST['huobilv'],2);
            $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>round($afxiyue)));

            //处理日志
            $income['type'] = 4;
            $income['state'] = 1;
            $income['reson'] = "货品兑换喜悦币";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] =round($_POST['huobilv']);
            $income['userid'] = session('uid');
            $income['income'] = $_POST['huobi'];
            M('incomelog')->add($income);

            echo "<script>alert('互转成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

        if($_POST['xiyuebi1']!=1 && $_POST['xiyuebi1']>0){ // 喜悦币兑换货品
            if($userinfo[0]['xiyue'] < $_POST['xiyuebi1']){
                echo "<script>alert('喜悦币余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            // 处理收入
            $xiyue= bcsub($userinfo[0]['xiyue'],$_POST['xiyuebi1'],2) ;
            $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>round($xiyue)));

            $huoping = bcadd($userinfo[0]['huoping'],$_POST['xiyuebi1lv'],2);
            $menber->where(array('uid'=>session('uid')))->save(array('huoping'=>round($huoping)));

            //处理日志
            $income['type'] = 4;
            $income['state'] = 1;
            $income['reson'] = "喜悦币兑换货品";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] =round($_POST['xiyuebi1lv']);
            $income['userid'] = session('uid');
            $income['income'] = $_POST['xiyuebi1'];
            M('incomelog')->add($income);

            echo "<script>alert('互转成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

        // 货品兑换商城积分

        if($_POST['huobi2']!=1 && $_POST['huobi2']>0){
            if($userinfo[0]['huoping'] < $_POST['huobi2']){
                echo "<script>alert('货品余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            // 处理收入
            $xiyue= bcsub($userinfo[0]['huoping'],$_POST['huobi2'],2) ;
            $menber->where(array('uid'=>session('uid')))->save(array('huoping'=>round($xiyue)));

            $huoping = bcadd($userinfo[0]['jifeng'],$_POST['huobi2lv'],2);
            $menber->where(array('uid'=>session('uid')))->save(array('jifeng'=>round($huoping)));

            //处理日志
            $income['type'] = 4;
            $income['state'] = 1;
            $income['reson'] = "货品兑换商城积分";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] =round($_POST['huobi2lv']);
            $income['userid'] = session('uid');
            $income['income'] = $_POST['huobi2'];
            M('incomelog')->add($income);

            echo "<script>alert('互转成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

        // 喜悦币兑换商城积分
        if($_POST['xiyuebi2']!=1 && $_POST['xiyuebi2']>0){
            if($userinfo[0]['xiyue'] < $_POST['xiyuebi2']){
                echo "<script>alert('喜悦币余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            // 处理收入
            $xiyue= bcsub($userinfo[0]['xiyue'],$_POST['xiyuebi2'],2) ;
            $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>round($xiyue)));

            $huoping = bcadd($userinfo[0]['jifeng'],$_POST['xiyuebi2lv'],2);
            $menber->where(array('uid'=>session('uid')))->save(array('jifeng'=>round($huoping)));

            //处理日志
            $income['type'] = 4;
            $income['state'] = 1;
            $income['reson'] = "喜悦币兑换商城积分";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] =round($_POST['xiyuebi2lv']);
            $income['userid'] = session('uid');
            $income['income'] = $_POST['xiyuebi2'];
            M('incomelog')->add($income);

            echo "<script>alert('互转成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

        echo "<script>";
        echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
        echo "</script>";
        exit;

    }

    public function buy(){
        if($_POST){
            print_r($_POST);die;
            $data= $_POST;
            foreach ($data as $v){
                if(empty($v)){
                    echo "<script>alert('请将信息填写完整');";
                    echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                    echo "</script>";
                    exit();
                }
            }

            $menber = M("menber");
            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            if($userinfo[0]['xiyue'] < $data['price']){
                echo "<script>alert('余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            $product =M('product')->where(array('id'=>$_POST['productid']))->select();

            // 订单增加
            $data['userid'] =session('uid');
            $data['state'] =1;
            $data['productname'] =$product[0]['name'];
            $data['num'] =1;
            $data['totals'] =$data['price'];
            $data['orderid'] =date("YmdHis",time());
            $data['addtime'] =time();
            $data['addymd'] =date("Y-m-d H:i:s",time());
            $orderid = M("orderlog")->add($data);

            // 处理收入
            $xiyue= bcsub($userinfo[0]['xiyue'],$data['price']) ;
            $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>$xiyue));

            //处理注册余额
            $income['type'] = 6;
            $income['state'] = 2;
            $income['reson'] = "下单购买";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] = $orderid;
            $income['userid'] = session('uid');
            $income['income'] = $data['price'];
            M('incomelog')->add($income);

            echo "<script>alert('下单成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

    }

    public function K(){
        $rite =M("rite")->order("id desc")->limit(7)->select();
        $this->assign('seven',$rite);
        $this->display();
    }

    public function qrcode(){
        Vendor('phpqrcode.phpqrcode');
        $id=I('get.id');
        //生成二维码图片
        $object = new \QRcode();
        $url="http://".$_SERVER['HTTP_HOST'].'/index.php/Admin/Article/editearticle/id/'.$id;//网址或者是文本内容

        $level=3;
        $size=5;
        $errorCorrectionLevel =intval($level) ;//容错级别
        $matrixPointSize = intval($size);//生成图片大小
        $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);
    }

    public function gongPai(){
        $orderlog = M('orderlog');
        $allorder = $orderlog->where(array('type'=>2,'userid'=>session('uid')))->order('logid ASC')->select();
//        print_r($allorder);die;
        $this->assign('res',$allorder[0]);
        $this->display();
    }

    public function gongpai_buy(){
        if($_POST['num']){
            $menber = M('menber');
            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            if($_POST['num'] > $userinfo[0]['chargebag']){
                echo "<script>alert('充值钱包余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/gongpai_buy';";
                echo "</script>";
                exit;
            }
            $left =bcsub( $userinfo[0]['chargebag'],$_POST['num'],2);
            $menber->where(array('uid'=>session('uid')))->save(array('chargebag'=>$left));

            $orderlog = M('orderlog');
            $allorder = $orderlog->where(array('type'=>2))->order('logid DESC')->select();
            $allcount =count($allorder);
            if($allorder[0]){
                $bianhao = $allorder[0]['bianhao'] + 1;
                $num = $allorder[0]['num'] + 1;
                $ceng = $this->getceng($allcount) ;

                // 处理层级关系
                $isaddcen = $this->isaddceng($allcount);
                if($isaddcen){
                    foreach ($allorder as $k=>$v){
                        $afterceng =$v['ceng']+1;
                        $orderlog->where(array('logid'=>$v['logid']))->save(array('ceng'=>$afterceng));
                        $fengs = bcpow(2,$afterceng) ;
                        if($v['userid']){   // 积分增加
                            $newuser = $menber->where(array('uid'=>$v['userid']))->select();
                            $newfeng = $newuser[0]['jifeng'] + $fengs;
                            $dongbag = $newuser[0]['dongbag'] + $fengs;
                            $menber->where(array('uid'=>$v['userid']))->save(array('jifeng'=>$newfeng,'dongbag'=>$dongbag));

                            // 收入日志
                            $income =M('incomelog');
                            $data['type'] = 11 ;
                            $data['state'] = 1 ;
                            $data['reson'] ='公排收益';
                            $data['addymd'] =date('Y-m-d',time());
                            $data['addtime'] =time();
                            $data['orderid'] =session('uid');
                            $data['userid'] = $v['userid'];
                            $data['income'] = $fengs;
                            $income->add($data);

                        }
                    }
                }
            }else{
                $ceng = 1;
                $bianhao = 10000;
                $num =1;
            }

            // 下单
            $orderdata['userid'] =session('uid');
            $orderdata['productname'] ='购买公排';
            $orderdata['productmoney'] =$_POST['num'];
            $orderdata['states'] = 1 ;
            $orderdata['orderid'] =$bianhao;
            $orderdata['addtime'] =time();
            $orderdata['num'] = $num ;
            $orderdata['prices'] =$_POST['num'];
            $orderdata['addymd'] =date('Y-m-d',time());
            $orderdata['type'] =  2;
            $orderdata['ceng'] = 0;
            $orderdata['bianhao'] = $bianhao;
            $orderdata['totals'] =$_POST['num'];
            $logid = $orderlog->add($orderdata);

            // 收入日志
            $income =M('incomelog');
            $data['type'] =6;
            $data['state'] =2;
            $data['reson'] ='购买公排';
            $data['addymd'] =date('Y-m-d',time());
            $data['addtime'] =time();
            $data['orderid'] =$logid;
            $data['userid'] = session('uid');
            $data['income'] = $_POST['num'];
            $income->add($data);

            echo "<script>alert('购买成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/gongpai';";
            echo "</script>";
            exit;
        }

        $config = M('config')->where(array('id'=>17))->select();
        $this->assign('config',$config[0]['value']);
        $this->display();
    }

    private function isaddceng($cen){
        if(in_array($cen,array(1,3,7,15,31,63,127,255,511))){
            return 1;
        }else{
            return 0;
        }
    }



    private function getceng($count){
        if($count ==0 ){     // 1
            return 1;
        }elseif ($count >=1 && $count <3){   // 2
            return 2;
        }elseif ($count >=3 && $count <7){   // 3
            return 3;
        }elseif ($count >=7 && $count <15){  // 4
            return 4;
        }elseif ($count >=15 && $count <31){  // 5
            return 5;
        }elseif ($count >=31 && $count <63){   // 6
            return 6;
        }elseif ($count >=63 && $count <127 ){  // 7
            return 7;
        }elseif ($count >=127 && $count <255){  // 8
            return 8;
        }elseif ($count >=255 && $count <511){  // 9
            return 9;
        }elseif ($count >=511 && $count <1024){     // 10
            return 10;
        }
    }

    /**
	 * 获取当前页面完整URL地址
	 */
	private function get_url() {
		$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
		$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
		$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
		$relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
		return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
	}


	private function getlists($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result, true);
	}

	private function curlget($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
//		执行并获取HTML文档内容
		$output = curl_exec($ch);
		//释放curl句柄
		curl_close($ch);
		return json_decode($output, true);
	}
}
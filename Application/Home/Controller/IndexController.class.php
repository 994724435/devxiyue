<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends CommonController {

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
        $income =M('incomelog')->select();

        //下级
        $xiaji = M("menber")->where(array('fid'=>session('uid'),'isling'=>0))->select();

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

            echo "<script>alert('下级注册成功');";
            echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
            echo "</script>";
            exit;
        }

    }

    public function jiaoyi(){
        print_r($_POST);die;
    }


    public function buy(){
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

            $menber = M("menber");
            $userinfo = $menber->where(array('uid'=>session('uid')))->select();
            if($userinfo[0]['xiyue'] < $data['price']){
                echo "<script>alert('余额不足');";
                echo "window.location.href='".__ROOT__."/index.php/Home/Index/main';";
                echo "</script>";
                exit();
            }

            // 订单增加
            $data['userid'] =session('uid');
            $data['state'] =1;
            $data['num'] =1;
            $data['totals'] =$data['price'];
            $data['addtime'] =time();
            $data['addymd'] =date("Y-m-d H:i:s",time());
            M("orderlog")->add($data);

            // 处理收入
            $xiyue= bcsub($userinfo[0]['xiyue'],$data['price']) ;
            $menber->where(array('uid'=>session('uid')))->save(array('xiyue'=>$xiyue));

            //处理注册余额
            $income['type'] = 6;
            $income['state'] = 2;
            $income['reson'] = "注册下级";
            $income['addymd'] = date("Y-m-d H:i:s",time());
            $income['addtime'] = time();
            $income['orderid'] = 0;
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
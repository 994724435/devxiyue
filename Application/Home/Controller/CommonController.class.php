<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
	public function _initialize(){

		$function = explode('/',__ACTION__);
		$curfunction =$function[count($function)-1];
//        session('uid',1);
		if(!session('uid')){
			echo "<script>alert('请登录');";
			echo "window.location.href='".__ROOT__."/index.php/Home/Login/login';";
			echo "</script>";
			exit;
		}
		$menber =M('menber');
		$res_user =$menber->where(array('uid'=>session('uid')))->select();
        $res_user[0]['shangpu'] = $this->changeshop($res_user[0]['shop']);
        $curlurl = 'http://'.$_SERVER['SERVER_NAME'];
        $this->assign('curlurl',$curlurl);
		$this->assign('username',$res_user[0]);

	}

    private function changeshop($shop){
        if($shop==1){
            return "升级二星商铺";
        }elseif ($shop==2){
            return "升级三星商铺";
        }elseif ($shop==3){
            return "升级四星商铺";
        }elseif ($shop==4){
            return "升级五星商铺";
        }else{
            return "已为最高商铺";
        }
    }

	private function getfunction($curfunction){
		if($curfunction=='index'){
			return 1;
		}elseif($curfunction=='financial'){
			return 2;
		}elseif($curfunction=='product'){
			return 3;
		}elseif($curfunction=='user'){
			return 4;
		}else{
			return 1;
		}
	}

	private function chanefortype($type){
		if($type==1){
			return "普卡会员";
		}elseif($type==2){
			return "银卡会员";
		}elseif($type==3){
			return "金卡会员";
		}elseif($type==4){
			return "钻卡会员";
		}else{
			return "未知";
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

}
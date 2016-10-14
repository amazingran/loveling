<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
    // asset资源配置，引入css或js今天文件
	private $_assets = array();
	private $_paths = array(); 
        // 初始化
	public function init()
	{
        // 发布 app 的 views 目录下的资源文件
		$folder = dirname( Yii::app()->layoutPath ).DIRECTORY_SEPARATOR."layouts/assets";
		$this->publish( array("app" => $folder) );

        // 发布 当前模块 的 views 目录下的资源文件
		if( !empty($this->module) && isset($this->module->id) ){                                   
			$folder = dirname( $this->viewPath ).DIRECTORY_SEPARATOR."layouts/assets";
            //$this->publish( array("module" => $folder) );
			$this->publish( "module",$folder);   
		}

	}
        // 发布静态资源
	public function publish($name, $value="")
	{
		if( !is_array( $name ) )
			$arr = array($name => $value);
		else
			$arr = $name;

		foreach( $arr as $k => $v ){
			$folder = realpath($v);

			if( !empty($folder) ){
				if( Yii::app()->params["assets"]["publish"] )
					Yii::app()->assetManager->publish( $folder, false, -1, true );

				$folder = Yii::app()->params["assets"]["domain"] . Yii::app()->assetManager->getPublishedUrl( $folder );
			}
			$arr[$k] = $folder;
		}

		$this->_assets = array_merge( $this->_assets, $arr );
	}

    // 获取资源路径
	public function getAssets() {
		return $this->_assets;
	}

    // 注册静态资源代码
	public function register($filepath, $attr=array()){
		$arr = array();
		$ext = strtolower(substr($filepath, strrpos($filepath, ".") + 1));
		if( !in_array($ext, array("js","css")) )
			return;

		if(  is_numeric($attr) )
			$attr = array("version"=>$attr);
		$version = isset($attr["version"]) ? "?ver=".$attr["version"] : "";

		if( $ext == "js" ){
			$arr["tag"] = "script";
			$arr["language"] = "javascript";
			$arr["src"] = $filepath . $version;
		}            
		if( $ext == "css" ){
			$arr["tag"] = "link";
			$arr["rel"] = "stylesheet";
			$arr["href"] = $filepath . $version;
		}

		$arr = array_merge($attr, $arr);  

		$this->_paths[]=$arr;        
	} 
	    // 重载渲染后的方法
    public function afterRender($view, &$output){

        // 加载资源文件
        if( !empty($this->_paths) ){
            $html = "";
            foreach( $this->_paths as $arr ){
                $tag = $arr["tag"];
                unset($arr["tag"]);
                $attr = ""; 
                foreach($arr as $k => $v){
                    $attr .=" {$k}='{$v}'";
                }
                $html .= "<".$tag.$attr."></".$tag.">\r\n";     
            }  
            $output = preg_replace('/(<\\/head\s*>)/is', "<###code###>$1", $output, 1, $rtn);
            if($rtn)
                $output = str_replace('<###code###>', $html, $output);
            else
                $output = $html . $output;
        }    

        // 替换资源文件路径        
        $assets_app =  isset($this->assets["app"]) ? $this->assets["app"] : "";
        $assets_module =  isset($this->assets["module"]) ? $this->assets["module"] : "";         
        $pattern = array(
        "|([=\(\s]+)(['\"]+)(\\.\\./assets)|is",
        "|([=\(\s]+)(['\"]+)(\\.\\./layouts/assets)|is",
        );
        $replace = array(
        "\$1 \$2".$assets_app,
        "\$1 \$2".$assets_module,
        );
        $output = preg_replace($pattern, $replace, $output);

    }

}
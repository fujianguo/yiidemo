<?php


class Menu  {
	
	public $menu;
	static private $_instance;
	
	private function __construct() {
		if (!$this->menu)
			$this->init();
	}
	
 	public static function getInstance() {
        if( ! (self::$_instance instanceof self) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	private function init() 
	{
		$this->menu = array('items'=>array());
		
		$this->addMenuItem("0",new MenuItem('Home',array('/site/index')));
		
		$this->addMenuItem(0,  new MenuItem('About', array('/site/page','view'=>'about')));
		
		$this->addMenuItem(0, new MenuItem('demo'));
		
		
		$this->addMenuItem(0, new MenuItem('Contact',array('/site/contact')));
		
		$this->addMenuItem("0_2", new MenuItem('ActiveRecord'));
		
		$this->addMenuItem("0_2", new MenuItem('UI'));
		
		$this->addMenuItem("0_2_0",new MenuItem('Relations',array('/demo/relations')));
		
		$this->addMenuItem("0_2_1",new MenuItem('JUI Dialog',array('/demo/page','view'=>'juidialog')));
		
		$this->addMenuItem("0_2_1",new MenuItem('MultiFileUpload',array('/demo/multiupload')));
		
// 		CVarDumper::dump($this->menu,10,true);//Yii::app()->end();
	}
	
	
	public function addMenuItem($path,MenuItem $menuitem)
	{
// 		//分解Path
		$arr = explode("_", $path);
		$menu = &$this->menu['items'];
		
		for ($i = 1;$i<count($arr);$i++)
		{
			if (!isset($menu[$arr[$i]]['items'])) 
			{
				
				$menu[$arr[$i]]['items'] = array();
			}
			$menu = &$menu[$arr[$i]]['items'];
		}

		$menu[] = $menuitem->toArray();
	}
	
}

class MenuItem {
	public $label;
	public $url = array();
	public $items = null;
	
	public function __construct($label,$url=null,$items = null)
	{
		$this->label = $label;
		$this->url = $url;
		$this->items = $items;
	}
	
	public function toArray()
	{
		
		$urlarr = ($this->url)?array('url' =>$this->url):null;
		
		$labelarr = array('label'=>$this->label);
		
		$arr = ($urlarr)?CMap::mergeArray($labelarr, $urlarr):$labelarr;
		return $arr;
	}
	
}

?>
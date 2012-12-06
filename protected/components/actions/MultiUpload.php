<?php
class MultiUpload extends \CAction {
	private $title;
	public function __construct($controller,$id)
	{
		parent::__construct($controller,$id);
		$this->title = "MultiFileUpload Demo";
		Menu::getInstance()->addMenuItem('0', new MenuItem('Multi File Upload',array('/demo/multiupload')));
	}
	public function run() {
		//根据get传递的id判断新增还是修改。
		$id = (isset($_GET['id']))?$_GET['id']:0;
				
		if ($id)
		{
			$user = Author::model()->findByPk($id);
			if (!$user)
			{
				$user = new Author();
			}
	
			
		} else {
			$user = new Author();
		}

		$error_msg = array();
		$picattr = array();
		if (isset($_POST['Author'])) {
			$user->setAttributes($_POST['Author']);
			$files = CUploadedFile::getInstancesByName('avatar'); 
			foreach ($files as $file) {
				$filename = 'upload/'.$file->name;
				$file->saveAs($filename);
				$picattr[] = $filename;
			}
			$user->avatar = implode(",", $picattr);
			
			if ($user->save()) {
				$this->getController()->redirect($this->getController()->createUrl('/demo/multiupload',array('id'=>$user->id)));
			} else {
				$error_msg = $user->getErrors();
			}
		}
			
		$this->getController()->render('multiupload',array('title'=>$this->title,'User'=>$user,'msg'=>$error_msg));
	}


}

?>
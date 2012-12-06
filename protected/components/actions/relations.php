<?php


/**
 *ActiveRecord Relation Demo
 * @author fg
 *        
 */
class relations extends CAction  {
	
	public function run() {
		$model = new Post();
		$error_msg = array();
		if (isset($_POST['Post'])) {
			$model->setAttributes($_POST['Post']);
			if ($model->save()) {
				Yii::app()->user->setFlash("relations","保存成功！");
				$this->getController()->refresh();
			} else {
				$error_msg = $model->getErrors();
			}
		}
		$this->getController()->render("relations",array('model'=>$model,'error_msg'=>$error_msg));
	}
}

?>
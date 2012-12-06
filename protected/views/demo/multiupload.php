<?php
$this->pageTitle=Yii::app()->name . ' - ' . $title;
$this->breadcrumbs=array(
		$title,
);
?>
<H2>录入会员信息</H2>
<div class="form">
	
		<div class = "hint"><?php echo CHtml::errorSummary($User); 
		if (Yii::app()->user->hasFlash('Author'))
		{
			echo Yii::app()->user->getFlash('Author');
		}
			
			?></div>
        <?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
        <div class="row">
        	<?php 
        		echo CHtml::activeLabelEx($User, "uname");
        		echo CHtml::activeTextField($User, "uname");
        		echo CHtml::error($User, "uname");
        	
        	?>
        </div>
            <div class="row">
                <?php echo CHtml::activeLabelEx($User,'avatar'); ?>
                <?php //echo CHtml::activeFileField($User, 'image');
         			 $this->widget('CMultiFileUpload', array(
                		'name' => 'avatar',
                		'max' => 2,
                		'accept' => 'jpg|gif|png',
             		 ));
                ?>  
                </div>
    <div class="row buttons">
                <?php echo CHtml::submitButton( '提交'); ?>
            </div>

        <?php echo CHtml::endForm(); ?>
        </div><!-- form -->
        <?php 
        	$avatars = $User->getAvatar();
        	foreach ($avatars as $a) :  ?>
        	 <span class="image"><img  src = "<?php echo Yii::app()->getBaseUrl()."/".$a; ?>" /></span>
		<?php endforeach; ?>
       
        
        

<?php

$title = 'JUI Dialoge Demo';
$this->pageTitle = Yii::app ()->name . ' - ' . $title;
$this->breadcrumbs = array (
		$title 
);

?>

<h1>
	<?php echo $title;?>
</h1>
    <style>
        .toggler { width: 500px; height: 200px; position: relative; }
        #button { padding: .5em 1em; text-decoration: none; }
        #effect { width: 240px; height: 135px; padding: 0.4em; position: relative; }
        #effect h3 { margin: 0; padding: 0.4em; text-align: center; }
        .ui-effects-transfer { border: 2px dotted gray; }
    </style>
    <script>
    $(function() {
        // run the currently selected effect
        function runEffect() {
            // get effect type from
            var selectedEffect = $( "#effectTypes" ).val();
 
            // most effect types need no options passed by default
            var options = {};
            // some effects have required parameters
            if ( selectedEffect === "scale" ) {
                options = { percent: 0 };
            } else if ( selectedEffect === "transfer" ) {
                options = { to: "#opendialog", className: "ui-effects-transfer" };
            } else if ( selectedEffect === "size" ) {
                options = { to: { width: 200, height: 60 } };
            }
 
            // run the effect
            $( ".ui-dialog" ).effect( selectedEffect, options, 500, callback );
        };
 
        // callback function to bring a hidden box back
        function callback() {
            setTimeout(function() {
                $( "#mydialog" ).dialog("close");
            }, 1000 );
        };
 
        // set effect from select menu value
        $( "#button" ).click(function() {
            runEffect();
            return false;
        });
    });
    </script>
<?php
$con = <<<EOC
<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
<select name="effects" id="effectTypes">
<option value="blind">Blind</option>
<option value="bounce">Bounce</option>
<option value="clip">Clip</option>
<option value="drop">Drop</option>
<option value="explode">Explode</option>
<option value="fade">Fade</option>
<option value="fold">Fold</option>
<option value="highlight">Highlight</option>
<option value="puff">Puff</option>
<option value="pulsate">Pulsate</option>
<option value="scale">Scale</option>
<option value="shake">Shake</option>
<option value="size">Size</option>
<option value="slide">Slide</option>
<option value="transfer">Transfer</option>
</select>

<a href="#" id="button" class="ui-state-default ui-corner-all">Run Effect</a>
EOC;

$this->beginWidget ( 'zii.widgets.jui.CJuiDialog', array (
		'id' => 'mydialog', // 弹窗ID
		                  // additional javascript options for the dialog plugin
		'options' => array ( // 传递给JUI插件的参数
				'title' => '弹窗标题',
				'autoOpen' => false, // 是否自动打开
				'show' => 'blind',  //显示效果
				//'hide' => 'explode', //隐藏效果
				'modal' => true,    //模式窗口
				'width' => 'auto', // 宽度
				'height' => 'auto', // 高度
				'buttons' => array (
						"Delete all items" =>  'js:function() { $(this).dialog("close");}',
						'关闭' => 'js:function(){ $(this).dialog("close");}'  // 关闭按钮
				 
		)
	)
		 
 ));
echo $con;
//echo $con;

$this->endWidget ( 'zii.widgets.jui.CJuiDialog' );

// 这是弹窗链接,
echo "<H2>弹出窗口</H2><br/>";
echo CHtml::link ( 'open dialog', '#', array (
		'onclick' => '$("#mydialog").dialog("open"); return false;','id' => "opendialog",  // 点击打开弹窗
 ));

echo "<H2></H2><br/>";

echo "<pre>";
$content = <<<EOD
<pre>\$this->beginWidget ( 'zii.widgets.jui.CJuiDialog', array (
		'id' => 'mydialog', // 弹窗ID
		                  // additional javascript options for the dialog plugin
		'options' => array ( // 传递给JUI插件的参数
				'title' => '弹窗标题',
				'autoOpen' => false, // 是否自动打开
				'show' => 'blind',    //显示动画效果
				'hide' => 'explode',  //隐藏动画效果
				'modal' => true,     //模式窗口
				'width' => 'auto', // 宽度
				'height' => 'auto', // 高度
				'buttons' => array (
						'关闭' => 'js:function(){ $(this).dialog("close");}'  // 关闭按钮
				 
		)
	)
		 
 ));
</pre>
EOD;
echo $content;
echo "</pre>";

?>

<?php
 $this->beginContent('//layouts/main'); 

 ?>
<?php if(Yii::app()->controller->action->id!="index"){;?>
	<?php if(!empty($this->breadcrumbs)):?>
	<section class="crumb list-crumb">
		<?php 
		$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>'<a href="/site/index">首页</a>',

			)); 
		?>
	</section>
<?php endif;?>
<section class="mg-t20 zm">
	<article class="w680 border-r fl-lf">
		<?php echo $content; ?>
	</article>		
	<aside class="w300 fl-rt">
		<section><script>show_ny_r1();</script></section>
		<section class="mg-t10 zm">
			<header class="mod-two">
				<h2>精彩推荐</h2>
			</header>
			<ul class="list-four">
				<li>
					<a href="http://www.ixiumei.com/a/20160921/217205.shtml" target="_blank">
						<img width="147" height="147" src="http://www.ixiumei.com/statics/images/bg/grey.gif" data-original="http://img.ixiumei.com/uploadfile/2016/0921/thumb_147_147_20160921013954458.jpg" alt="从春夏穿到秋天最好搭配的衣服原来是它" />
						<p>从春夏穿到秋天最好搭配的衣服原来是它</p>
					</a>
				</li>
				<li>
					<a href="http://www.ixiumei.com/a/20160921/217179.shtml" target="_blank">
						<img width="147" height="147" src="http://www.ixiumei.com/statics/images/bg/grey.gif" data-original="http://img.ixiumei.com/uploadfile/2016/0921/thumb_147_147_20160921094634284.jpg" alt="今年秋天潮女必备：长袖条纹T穿搭" />
						<p>今年秋天潮女必备：长袖条纹T穿搭</p>
					</a>
				</li>
				<li>
					<a href="http://www.ixiumei.com/a/20160920/217171.shtml" target="_blank">
						<img width="147" height="147" src="http://www.ixiumei.com/statics/images/bg/grey.gif" data-original="http://img.ixiumei.com/uploadfile/2016/0920/thumb_147_147_20160920065628882.jpg" alt="Michael Kors Collection 2017春夏系列" />
						<p>Michael Kors Collection 2017春夏系列</p>
					</a>
				</li>
				<li>
					<a href="http://www.ixiumei.com/a/20160919/217131.shtml" target="_blank">
						<img width="147" height="147" src="http://www.ixiumei.com/statics/images/bg/grey.gif" data-original="http://img.ixiumei.com/uploadfile/2016/0919/thumb_147_147_20160919060226847.jpg" alt="王菲蒋欣 女明星都蒂凡尼珠宝" />
						<p>王菲蒋欣 女明星都蒂凡尼珠宝</p>
					</a>
				</li>
			</ul>
		</section>
		<section class="mg-t10"><script>show_ny_r3();</script></section>
		<section class="ranking ranking-one mg-t10 zm">
			<header class="mod-two">
				<h2>热点排行</h2>
			</header>
			<ul class="addclass-one">
				<li class="hover">
					<i>1</i>
					<a href="http://www.ixiumei.com/a/20160817/214870.shtml" class="title" target="_blank">连衣裙配短靴 秋天来了就这么穿</a>
					<a href="http://www.ixiumei.com/a/20160817/214870.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" data-original="http://img.ixiumei.com/uploadfile/2016/0817/thumb_115_115_20160817023109891.jpg" />
						<span>短靴今年存在感很强，夏季的短靴街拍真不少，...</span>
					</a>
				</li>
				<li >
					<i>2</i>
					<a href="http://www.ixiumei.com/a/20160902/216253.shtml" class="title" target="_blank">高圆圆林允儿 学学这些会穿小西装的女人</a>
					<a href="http://www.ixiumei.com/a/20160902/216253.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" original="http://img.ixiumei.com/uploadfile/2016/0902/thumb_115_115_20160902043404521.jpg" />
						<span>早秋什么外套最受欢迎？当然是各种小西装啦，...</span>
					</a>
				</li>
				<li >
					<i>3</i>
					<a href="/a/20130406/83240.shtml" class="title" target="_blank">胖人穿衣搭配图片 8种穿法最显瘦</a>
					<a href="/a/20130406/83240.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" original="http://img.ixiumei.com/uploadfile/2013/0322/thumb_115_115_20130322050145551.jpg" />
						<span>胖人如何穿衣搭配呢？想必是每个身材胖胖的女...</span>
					</a>
				</li>
				<li >
					<i>4</i>
					<a href="http://www.ixiumei.com/a/20160817/214894.shtml" class="title" target="_blank">衬衫配长裤利落有型 早秋气质look</a>
					<a href="http://www.ixiumei.com/a/20160817/214894.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" original="http://img.ixiumei.com/uploadfile/2016/0817/thumb_115_115_20160817042131555.jpg" />
						<span>夏季到早秋的转变，穿什么好呢？衬衫配长裤就...</span>
					</a>
				</li>
				<li >
					<i>5</i>
					<a href="http://www.ixiumei.com/a/20160902/216238.shtml" class="title" target="_blank">九月份穿什么 小外套混搭短裤时髦</a>
					<a href="http://www.ixiumei.com/a/20160902/216238.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" original="http://img.ixiumei.com/uploadfile/2016/0902/thumb_115_115_20160902024416394.jpg" />
						<span>舒适宜人的九月，穿搭上有了更多的选择，秋天...</span>
					</a>
				</li>
				<li >
					<i>6</i>
					<a href="http://www.ixiumei.com/a/20160909/216630.shtml" class="title" target="_blank">学会这些时髦搭配 美足一个秋天</a>
					<a href="http://www.ixiumei.com/a/20160909/216630.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" original="http://img.ixiumei.com/uploadfile/2016/0909/thumb_115_115_20160909012719212.jpg" />
						<span>秋高气爽的季节，心情也变得轻快起来，是时候...</span>
					</a>
				</li>
				<li >
					<i>7</i>
					<a href="http://www.ixiumei.com/a/20160914/216921.shtml" class="title" target="_blank">早秋长袖衬衫当道 明星教你搭配</a>
					<a href="http://www.ixiumei.com/a/20160914/216921.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" original="http://img.ixiumei.com/uploadfile/2016/0914/thumb_115_115_20160914040549334.jpg" />
						<span>早秋时节，一件简约大方的长袖衬衫就能帮你凹...</span>
					</a>
				</li>
				<li >
					<i>8</i>
					<a href="/a/20131227/112557.shtml" class="title" target="_blank">胖人冬天怎么穿衣好看 8款显瘦搭配突显气质</a>
					<a href="/a/20131227/112557.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" original="http://img.ixiumei.com/uploadfile/2013/1227/thumb_115_115_20131227030710552.jpg" />
						<span>胖人最怕过夏天和冬天了，夏天穿衣少露出难看...</span>
					</a>
				</li>
				<li >
					<i>9</i>
					<a href="/a/20150618/176760.shtml" class="title" target="_blank">荷叶袖夏装显瘦 把麒麟臂藏起来</a>
					<a href="/a/20150618/176760.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" original="http://img.ixiumei.com/uploadfile/2015/0618/thumb_115_115_20150618064646919.jpg" />
						<span>荷叶袖夏装每年夏季都很流行，设计师们格外偏...</span>
					</a>
				</li>
				<li >
					<i>10</i>
					<a href="http://www.ixiumei.com/a/20160911/216708.shtml" class="title" target="_blank">秋天怎么穿衣服 这样搭舒服好看</a>
					<a href="http://www.ixiumei.com/a/20160911/216708.shtml" class="text" target="_blank">
						<img width="115" height="115" src="http://www.ixiumei.com/statics/images/bg/grey.gif" original="http://img.ixiumei.com/uploadfile/2016/0911/thumb_115_115_20160911033220137.jpg" />
						<span>秋天这个让人倍感舒适的季节，穿搭上自然也是...</span>
					</a>
				</li>
			</ul>
		</section>
		<div id="div_fixed">
			<section class="mg-t10"><script>show_ny_r4();</script></section>
			<section class="mg-t10"><script>show_ny_r5();</script></section>
		</div>
	</aside>
</section>
<?php }else{;?>
	<section class="mg-t20 clear">
		<?php echo $content; ?>
	</section>

	<?php };?>
	<?php $this->endContent(); ?>

	<script>show_ny_b2();</script><script>show_ny_b3();</script>
	<script type="text/javascript">
		$(function(){
		//延迟加载
		$(".layout img").lazyload({
			failure_limit :10
		});
		//选项卡
		$('.tab-list').TabList();
		//排行
		$('.ranking').AddClass();
	})

		
		/**js翻页**/
		var lastpage=$('.page-bd .next').attr('href');
		var nextpage=$('.page-bd .prev').attr('href');
		function keyUp(e) {
			if(navigator.appName == "Microsoft Internet Explorer"){
				var keycode = event.keyCode;var realkey = String.fromCharCode(event.keyCode);
			}else{
				var keycode = e.which;var realkey = String.fromCharCode(e.which);
			}
			
			if(keycode==39){window.location.href=lastpage;}
			if(keycode==37){window.location.href=nextpage;}
		}
		document.onkeyup = keyUp;
	</script>
	<script type="text/javascript">
		$(function(){
			var $fixed_div = $('#div_fixed'),div_top = $fixed_div.offset().top;
			$(window).scroll(function(){
				var ts_top = $(this).scrollTop();
				(ts_top>=div_top)?$fixed_div.addClass('div_fixed'):$fixed_div.removeClass('div_fixed');
			})
		})
	</script>
(function($){
		/*Tab选项卡切换*/
		$.fn.TabList = function(options){
			var defaults = {
				ClassName:'.tab-one',
				Current:'hover',
				Event:'mouseenter'
			};
			var ops = $.extend(defaults,options);
			return this.each(function(){
				var $tab_hd = $(ops.ClassName).find('.tab-hd'),$tab_bd = $(ops.ClassName).find('.tab-bd'),$tab_li = $tab_hd.find('li'),$tab_div = $tab_bd.children('article');
				$tab_li.each(function(i){
					var _this = $(this);
					_this.on(ops.Event,function(){
						_this.addClass(ops.Current).siblings().removeClass(ops.Current);
						$tab_div.eq(i).show().siblings().hide();
						$tab_div.eq(i).addClass('on').siblings().removeClass('on');
						$tab_bd.find('.on img').each(function(){ 
							$(this).attr('src',$(this).attr('original'))
						});
						return false;
					}).filter('.hover').trigger(ops.Event)
				})
			})
		};
		/*焦点图切换*/
		$.fn.BannerBox = function(options){
			var defaults = {
				ClassName:'.banner-one',
				Box :'.banner-img ul',
				BoxChild : '.banner-img li',
				BannerBox:'.banner-img',
				Label:'li',
				Current:'on',
				BannerTime:'3000',
				Event:'click'
			};
			var ops = $.extend(defaults,options);
			return this.each(function(){
				var t,$len = $(ops.BoxChild).length-2,$num = $(ops.ClassName).find('.banner-number'),$num_ul = '<ul>',
					$prev = $(ops.ClassName).find('.prev'),$next = $(ops.ClassName).find('.next'),
					$li_w = $(ops.BoxChild).width();
				for (i=0;i<$len;i++){
					$num_ul+='<li></li>'
				};
				$num_ul+='</ul>';
				$num.append($num_ul);
				$num_li = $(ops.ClassName).find('.banner-number ul').children('li');
				$num_li.first().addClass('on');
				var $first = $(ops.BoxChild).first().html(),$last = $(ops.BoxChild).last().html();
				//$(ops.Box).append('<'+ops.Label+'>'+$first+'</'+ops.Label+'>');
				//$(ops.Box).prepend('<'+ops.Label+'>'+$last+'</'+ops.Label+'>');
			 	function play(){
			 	  	var index = $curr.index();
			 	 	$curr.addClass(ops.Current).siblings().removeClass(ops.Current);
			 	 	$(ops.BannerBox).stop(true,true).animate({left:-index*$li_w},500);
			 	 	$(ops.BannerBox).find('li img').each(function(){ 
			 	 		$(this).attr('src',$(this).attr('original'))
			 	 	})
			 	};
			 	function next() {
			 		$curr = $num_li.filter('.on').next();
	                play();
	                if($curr.length == 0){
	                	$num_li.first().addClass(ops.Current).siblings().removeClass(ops.Current);
	                	$(ops.BannerBox).stop().animate({left:-$len*$li_w},500,function(){ 
	                		$(this).css('left','0')
	                	});
	                };
			 	};
				$num_li.on(ops.Event,function(){
			 	 	$curr = $(this);	
		            play();
		            return false;
			 	 });
			 	 $(ops.ClassName).hover(function(){
					clearInterval(t);
			 	 },function(){
			 	 	t = setInterval(function(){
							next();
						},ops.BannerTime);
			 	 }).trigger('mouseleave');
			 	 $prev.click(function(){
			 	 	$curr = $num_li.filter('.on').prev();
			 	 	play();
			 	 	if($curr.length == 0){
			           $num_li.last().addClass(ops.Current).siblings().removeClass(ops.Current);
			           $(ops.BannerBox).stop().animate({left:$li_w},500,function(){ 
	                		$(this).css('left',-($len-1)*$li_w)
	                   });
			        };
			 	 });		 	 
			 	 $next.click(function(){
			 	 	next();
			 	 });
			});
		};
		/*左右滚动图片*/
		$.fn.Imgbox= function(options){
			var defaults = {
				Content :'.img-one',
				Box :'.img-show ul',
				BoxChild : '.img-show li',
				BannerTime:'3000'
			};
			var ops = $.extend(defaults,options);
			return this.each(function(){
				var $box = $(ops.Box),$prev = $(ops.Content).find('.prev'),
					$next = $(ops.Content).find('.next'),$width = $(ops.BoxChild).width(),t;
				if($(ops.Content).find($(ops.BoxChild)).length>1){
					$(ops.Content).hover(function(){
						clearInterval(t);
						$(this).children('.img-arrow').show()
				 	},function(){
				 	 	t = setInterval(function(){
							  img_show()
							},ops.BannerTime);
				 	 	$(this).children('.img-arrow').hide()
				 	}).trigger('mouseleave');
				 	$prev.click(function(){
						$(ops.Content).find($(ops.Box)).find($(ops.BoxChild)).last().prependTo($(ops.Content).find($(ops.Box)));
						$(ops.Content).find($(ops.Box)).css('left',-$width);
						$(ops.Content).find($(ops.Box)).stop().animate({left:'0'},300);
					});
					$next.click(function(){
						img_show()
					});	
					function img_show(){
						$(ops.Content).find($(ops.Box)).stop().animate({left:-$width},300,function(){
							$(this).css('left','0').find($(ops.BoxChild)).first().appendTo($(this))
						})		
					}
				}
			})
		};
		/*增加样式并移除同辈样式*/
		$.fn.AddClass = function(options){
			var defaults = {
				ClassName:'.addclass-one',
				Current:'hover',
				Event:'mouseenter'
			};
			var ops = $.extend(defaults,options);
			return this.each(function(){
				var $li = $(ops.ClassName).find('li');
				$li.on(ops.Event,function(){
					var $img = $(this).find('img');
					$(this).addClass(ops.Current).siblings().removeClass(ops.Current);
					$img.attr('src',$img.attr('original'))
				}).filter(':nth-child(1)').trigger(ops.Event)
			})
		};
		/*换一组*/
		$.fn.ChangeImg = function(options){
			var defaults = {
				ClassName:'.change-one'
			};
			var ops = $.extend(defaults,options);
			return this.each(function(){
				var $ul = $(ops.ClassName).find('ul'),$btn = $(ops.ClassName).find('.change-btn'),$ul_i = 0,$ul_len = $ul.length;
				$ul.first().show().addClass('on');
				$btn.click(function(){ 
					$ul_i++;
					var number = $ul_i;
					play_show(number);
					if(($ul_i+1)>$ul_len){ 
						var number = 0;
						play_show(number);
						$ul_i =0
					};
					change_show($(ops.ClassName).find('.on'));
					return false;
				});
				function play_show(number){ 
					$ul.eq(number).show().addClass('on').siblings('ul').hide().removeClass('on');
				};
				function change_show(classname){ 
					classname.find('img').each(function(){ 
						$(this).attr('src',$(this).attr('original'))
					})
				};
			})
		};
		/*浮动侧边滚动选中*/
		var ie6=!-[1,]&&!window.XMLHttpRequest;
		$.fn.FixedNav = function(options){
			var defaults = {
				FixedName:'.fixed-nav',
				FixedBox:'.fixed-box',
				FixedBoxHd:'h2'
			};
			var ops = $.extend(defaults,options);
			return this.each(function(){
				var $fixed_id = $(ops.FixedName),len = $(ops.FixedBox).length,top ='var ie6=!-[1,]&&!window.XMLHttpRequest;'+'\n',$li = '',
					scroll = '$(window).scroll(function(){\nvar $ts_top = parseInt($(this).scrollTop());'+
					'\n'+'($ts_top>=top0)?$("'+ops.FixedName+'").fadeIn():$("'+ops.FixedName+'").fadeOut();'+'\n',
					current = function nav_curr(classname){
							  	$(classname).addClass('current').siblings().removeClass('current')
							  };
				for (i=0;i<len;i++){
					top+='var top'+i+' = Math.floor($("'+ops.FixedBox+'").eq('+i+').offset().top)'+';'+'\n';
					scroll+='if($ts_top>=top'+i+') nav_curr(".top'+i+'")'+';'+'\n';
					var $text = $(ops.FixedBox).eq(i).find(ops.FixedBoxHd).text();
					$li+='<a name="top'+i+'" class="top'+i+'" href="javascript:void(0)">'+$text+'</a>'
				};
				scroll+='if(ie6) $("'+ops.FixedName+'").animate({"top":$ts_top+350},10)});';
				$('#footer').after("<div id='scroll-js'><script language='javascript'>"+top+scroll+current+ie6+"<\/script><\/div>");
				$(ops.FixedBox).each(function(i){
					$(this).attr('id','top'+i)
				});
				$fixed_id.find('.top').before($li);
				$fixed_id.find('a').click(function(){
					var $name = $(this).attr('name');
					$('body,html').animate({scrollTop:$('#'+$name).offset().top},500)
				});
			})
		};
		/*公共JS*/
		$(document).ready(function(){
 			//顶部搜索
            $('.search .btn').click(function(){
                if($.trim($(this).prev('input').val())==''){
                    alert('请输入搜索关键词');
                    return false;
                }
            });
            //关注热点
            $('.hotspot a').each(function(){ 
            	var rand = parseInt(Math.random()*(4-1+1)+1);
            	$(this).addClass('text'+rand)
            });
	        //图库
			$('.gallery-one li').hover(function(){
				$('.textbg',this).stop().animate({bottom:'0'},300)
			},function(){
				$('.textbg',this).stop().animate({bottom:'-34px'},300)
			});
		})
})(jQuery)
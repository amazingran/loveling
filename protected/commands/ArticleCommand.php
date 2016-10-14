<?php
/**
* 采集文章
*/
class ArticleCommand extends Command
{
	private $article_type=array(
		"with"=>0,
		"single"=>1,
		"dress"=>2,
		"street"=>3,
		"ext"=>4,
		"show"=>5
		);

	function actionIndex($type)
	{
		$command=Yii::app()->db->createCommand();
		$proxy = @file_get_contents("http://api.pithy.cn/perfect/proxy?ha=1");
		$pages=0;
		$next_page=true;
		do{
			if($pages>=100)
				break;
			$url=$pages==0?"http://www.ixiumei.com/fashion/with/":"http://www.ixiumei.com/fashion/{$type}/{$pages}.shtml";
			$response = HTTP::get( $url,$proxy);
			if(empty($response)){
				echo "not data";
				continue;
			}
			//文章列表
			$pre_match_list="/article([\s\S]*)<\/article/iU";
			preg_match_all($pre_match_list, $response, $article_list);

			if(empty($article_list)){
				echo "not data";
				continue;
			}

			//文章标题
			$pre_match_title="/<h2><a\s*href=[\"\s]*([\s\S]*)\"\s*target=\"_blank\">([\s\S]*)<\/a><\/h2>/iU";
			preg_match_all($pre_math_title,$article_list,$url_titles);
			$detail_urls=$url_title[1];
			$titles=$url_title[2];

			//文章描述
			$pre_match_detail="/<p\s*class=\"text\">([\s\S]*?)<\/p>/iU";
			preg_match_all($pre_match_detail, $article_list, $details);

			//缩略图
			$pre_match_litimg="/<img[\s\S]*src=\"(.*)\"[\s\S]*<\/h1>/iU";
			preg_match_all($pre_match_litimg,$$article_list,$litimgs);

			//内容页
			$pre_match_contents="/<section\s+class=\"zm\">([\s\S]*)<div\s+class=\"page\s+textct\">/iU";

			// 作者
			$pre_match_author="/编辑：([\s\S]*)<span\s+id=\"hits\"/iU";

			//来源
			$pre_match_comefrom="/来源：[\s\S]*target=\"_blank\">([\s\S]*)<\/a><span>/iU";

			//详情
			$pre_match_desc="/<div\s+class=\"details-bd\">([\s\S]*)</div>\s*<div\s+class=\"wx-text\s+mg-t5\s+zm\"/iU";

			$num=(int)count($detail_urls);
			for($i=0;$i<$num;$i++){
				$detail_url=$detail_urls[$i];

				$contents=Http::get($detail_url,$prexy);
				preg_match($pre_match_contents,$contents,$detail);

				preg_match($pre_match_author,$detail,$author);

				preg_match($pre_match_comefrom,$detail,$comefrom);

				preg_match($pre_match_desc,$detail,$desc);

				$article_sql="insert ignore into article(`title`,`type`,`createDate`,`modifyDate`,`come_from`,`author`) values('".$titles[$i]."','".$article_type[$type]."','".time()."','".time()."','".$comefrom[1]."','".$author[1]."')";

				$command->setText($article_sql)->execute();
				$aid=Yii::app()->db->getLastInsertID();
				$article_desc['aid']=(int)$aid;
				$article_sql="insert ignore into article_desc(`aid`,`a_detail`,`a_desc`) values('".$aid."','".$details[$i]."','".$desc[1]."')";
				$command->setText($article_sql)->execute();
				

			}






		}while ($next_page)



	}

}
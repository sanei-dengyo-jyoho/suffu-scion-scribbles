<?php
/* Additional Shortcodes */
/**
 * note
 */
function sc_note($atts, $content = null) {
	return '<div class="note-wrap"><div class="noteclassic">'.do_shortcode($content).'</div></div>';
}
add_shortcode('note', 'sc_note');

function sc_tip($atts, $content = null) {
	return '<div class="note-wrap"><div class="notetip">'.do_shortcode($content).'</div></div>';
}
add_shortcode('tip', 'sc_tip');

function sc_important($atts, $content = null) {
	return '<div class="note-wrap"><div class="noteimportant">'.do_shortcode($content).'</div></div>';
}
add_shortcode('important', 'sc_important');

function sc_warning($atts, $content = null) {
	return '<div class="note-wrap"><div class="notewarning">'.do_shortcode($content).'</div></div>';
}
add_shortcode('warning', 'sc_warning');

function sc_help($atts, $content = null) {
	return '<div class="note-wrap"><div class="notehelp">'.do_shortcode($content).'</div></div>';
}
add_shortcode('help', 'sc_help');


/**
 * Icon
 */
// アイキャッチ
function sc_catch_icon($atts) {
	extract(shortcode_atts(array(
			'name' => '',
	), $atts));
	return '<img class="img-short-icon" src="'.get_bloginfo('stylesheet_directory').'/images/shortcode/catch_icon/'.$name.'.png" />';
}
add_shortcode('catch_icon', 'sc_catch_icon');

// 県名
function sc_japan_icon($atts) {
	extract(shortcode_atts(array(
			'name' => '',
	), $atts));
	$basename = $name;
	//県名をファイル名に対応させる辞書
	$dic = array(
			'北海道' => 'hokkai-do',
			'青森県' => 'aomori-ken',
			'岩手県' => 'iwate-ken',
			'宮城県' => 'miyagi-ken',
			'秋田県' => 'akita-ken',
			'山形県' => 'yamagata-ken',
			'福島県' => 'fukushima-ken',
			'茨城県' => 'ibaraki-ken',
			'栃木県' => 'tochigi-ken',
			'群馬県' => 'gunma-ken',
			'埼玉県' => 'saitama-ken',
			'千葉県' => 'chiba-ken',
			'東京都' => 'tokyo-to',
			'神奈川県' => 'kanagawa-ken',
			'新潟県' => 'niigata-ken',
			'富山県' => 'toyama-ken',
			'石川県' => 'ishikawa-ken',
			'福井県' => 'fukui-ken',
			'山梨県' => 'yamanashi-ken',
			'長野県' => 'nagano-ken',
			'岐阜県' => 'gofu-ken',
			'静岡県' => 'shizuoka-ken',
			'愛知県' => 'aichi-ken',
			'三重県' => 'mie-ken',
			'滋賀県' => 'shiga-ken',
			'京都府' => 'kyoto-fu',
			'大阪府' => 'osaka-fu',
			'兵庫県' => 'hyogo-ken',
			'奈良県' => 'nara-ken',
			'和歌山県' => 'wakayama-ken',
			'鳥取県' => 'tottori-ken',
			'島根県' => 'shimane-ken',
			'岡山県' => 'okayama-ken',
			'広島県' => 'hiroshima-ken',
			'山口県' => 'yamaguchi-ken',
			'徳島県' => 'tokushima-ken',
			'香川県' => 'kagawa-ken',
			'愛媛県' => 'ehime-ken',
			'高知県' => 'kochi-ken',
			'福岡県' => 'fukuoka-ken',
			'佐賀県' => 'saga-ken',
			'長崎県' => 'nagasaki-ken',
			'熊本県' => 'kumamoto-ken',
			'大分県' => 'oita-ken',
			'宮崎県' => 'miyazaki-ken',
			'鹿児島県' => 'kagoshima-ken',
			'沖縄県' => 'okinawa-ken',
			);
	if ( isset( $dic[$name]) ) {
    	$basename = $dic[$name];
	} else {
    	$basename = $name;
	}
	return '<img class="img-short-icon" src="'.get_bloginfo('stylesheet_directory').'/images/shortcode/japan_icon/'.$basename.'.png" />';

	unset($dic);
	unset($basename);
}
add_shortcode('japan_icon', 'sc_japan_icon');


/**
 * List with Icon
 */
function sc_arrowlist($atts, $content = null) {
	extract(shortcode_atts(array(
			'color' => '',
	), $atts));
	return '<div class="arrowlist arrowlist'.$color.'">'.do_shortcode($content).'</div>';
}
add_shortcode('arrow_list', 'sc_arrowlist');

function sc_checklist($atts, $content = null) {
	extract(shortcode_atts(array(
			'color' => '',
	), $atts));
	return '<div class="checklist checklist'.$color.'">'.do_shortcode($content).'</div>';
}
add_shortcode('check_list', 'sc_checklist');

function sc_starlist($atts, $content = null) {
	extract(shortcode_atts(array(
			'color' => '',
	), $atts));
	return '<div class="starlist starlist'.$color.'">'.do_shortcode($content).'</div>';
}
add_shortcode('star_list', 'sc_starlist');


/**
 * Dropcap
 */
function sc_dropcap1($atts, $content = null) {
	return '<span class="dropcap1">'.$content.'</span>';
}
add_shortcode('dropcap1', 'sc_dropcap1');

function sc_dropcap2($atts, $content = null) {
	return '<span class="dropcap2">'.$content.'</span>';
}
add_shortcode('dropcap2', 'sc_dropcap2');


/**
 * Highlight
 */
function sc_highlight_dark($atts, $content = null) {
	return '<span class="highlight_dark">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight_dark', 'sc_highlight_dark');

function sc_highlight_light($atts, $content = null) {
	return '<span class="highlight_light">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight_light', 'sc_highlight_light');

function sc_highlight_red($atts, $content = null) {
	return '<span class="highlight_red">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight_red', 'sc_highlight_red');

function sc_highlight_green($atts, $content = null) {
	return '<span class="highlight_green">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight_green', 'sc_highlight_green');

function sc_highlight_blue($atts, $content = null) {
	return '<span class="highlight_blue">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight_blue', 'sc_highlight_blue');

function sc_highlight_yellow($atts, $content = null) {
	return '<span class="highlight_yellow">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight_yellow', 'sc_highlight_yellow');


/**
 * [gist id="ID" file="FILE"]
 */
function gist_shortcode($atts) {
	return sprintf(
		'<script src="https://gist.github.com/%s.js%s"></script>',$atts['id'],$atts['file']?'?file='.$atts['file']:''
	);
}
add_shortcode('gist','gist_shortcode');

function gist_shortcode_filter($content) {
	return preg_replace('/https:\/\/gist.github.com\/([\d]+)[\.js\?]*[\#]*file[=|_]+([\w\.]+)(?![^<]*<\/a>)/i', '[gist id="${1}" file="${2}"]', $content );
}
add_filter( 'the_content', 'gist_shortcode_filter', 9);


/**
 * Timeliner
 */
function sc_timeline($atts, $content = null) {
	extract(shortcode_atts(array(
			'style' => '',
	), $atts));
	return '<div id="timelineContainer" style="'.$style.'">
				<div class="timelineToggle">
					<small><a class="expandAll expandAllclosed">すべて展開する<small></small></a></small>
				</div>
				<br class="clear" />'.do_shortcode($content).'<br class="clear" />
			</div>';
}
add_shortcode('timeline', 'sc_timeline');

function sc_timelineGroup($atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => '',
			'tag' => 'h2',
	), $atts));
	return '<div class="timelineMajor">
				<'.$tag.' class="timelineMajorMarker"><span><a>'.$title.'</a></span></'.$tag.'>
				'.do_shortcode($content).'
			</div>';
}
add_shortcode('timelineGroup', 'sc_timelineGroup');

function sc_timelineEvent($atts, $content = null) {
	extract(shortcode_atts(array(
			'id' => '',
			'title' => '',
			'event' => '',
			'tag' => '',
			'clear' => 1,
	), $atts));
	if ($tag == '') {
		$eventTag = '';
	} else {
		$eventTag = '<'.$tag.'>'.$event.'</'.$tag.'>';
	}
	$clearTag = '';
	if ($clear > 0) {
		for ($i = 0; $i <= $clear; $i++) {
			$clearTag = $clearTag.'<br class="clear" />';
		}
	}
	return '<dl class="timelineMinor">
				<dt id="'.$id.'"><a>'.$title.'</a><small id="'.$id.'DT" class="timelineEventDT">'.$event.'</small></dt>
				<dd id="'.$id.'EX" class="timelineEvent" style="display: none;">'.$eventTag.do_shortcode($content).$clearTag.'</dd>
			</dl>';
	
	unset($eventTag);
	unset($i);
	unset($clearTag);
}
add_shortcode('timelineEvent', 'sc_timelineEvent');

function sc_timelineEventSingle($atts, $content = null) {
	extract(shortcode_atts(array(
			'event' => '',
			'tag' => 'h3',
			'desc' => '',
			'clear' => 1,
	), $atts));
	if ($tag == '') {
		$eventTag = '';
	} else {
		$eventTag = '<'.$tag.'>'.$event.'</'.$tag.'>';
	}
	if ($desc == '') {
		$descTag = '';
	} else {
		$descTag = '<p class="desc">'.$desc.'</p>';
	}
	$clearTag = '';
	if ($clear > 0) {
		for ($i = 0; $i <= $clear; $i++) {
			$clearTag = $clearTag.'<br class="clear" />';
		}
	}
	return '<dl class="timelineMinor">
				<dd>'.$eventTag.do_shortcode($content).$descTag.'</dd>
			</dl>'.$clearTag;
	
	unset($eventTag);
	unset($descTag);
	unset($i);
	unset($clearTag);
}
add_shortcode('timelineEventSingle', 'sc_timelineEventSingle');

function sc_timelineMedia($atts, $content = null) {
	extract(shortcode_atts(array(
			'style' => '',
	), $atts));
	return '<div class="media" style="'.$style.'">'.do_shortcode($content).'</div>';
}
add_shortcode('timelineMedia', 'sc_timelineMedia');

function sc_timelineGallery($atts) {
	extract(shortcode_atts(array(
			'url' => '',
			'title' => '',
			'cred' => '',
			'desc' => '',
			'rel' => 'shadowbox[album]',
	), $atts));
	if ($url == '') {
		return '';
	} else {
		if ($cred == '') {
			$credTag = '';
		} else {
			$credTag = '<p class="cred"><small>'.$cred.'</small></p>';
		}
		if ($desc == '') {
			$descTag = '';
		} else {
			$descTag = '<p class="desc">'.$desc.'</p>';
		}
		return '<div class="gallery default gallery-icon">
					<a href="'.$url.'" rel="'.$rel.'"><img title="'.$title.'" src="'.$url.'" alt="" /></a>
				</div>'.$credTag.$descTag;
	}
	unset($credTag);
	unset($descTag);
}
add_shortcode('timelineGallery', 'sc_timelineGallery');

function sc_timelineEmbed($atts, $content = null) {
	extract(shortcode_atts(array(
			'cred' => '',
			'desc' => '',
	), $atts));
	if ($cred == '') {
		$credTag = '';
	} else {
		$credTag = '<p class="cred"><small>'.$cred.'</small></p>';
	}
	if ($desc == '') {
		$descTag = '';
	} else {
		$descTag = '<p class="desc">'.$desc.'</p>';
	}
	return '<div>'.do_shortcode($content).'</div>'.$credTag.$descTag;

	unset($credTag);
	unset($descTag);
}
add_shortcode('timelineEmbed', 'sc_timelineEmbed');

function sc_timelineInfoList($atts) {
	extract(shortcode_atts(array(
			'list' => '',
			'delim' => '::::',
	), $atts));
	if ($list == '') {
		$liTag = '';
	} else {
		$liTag = '';
		$array = explode($delim, $list);
		$count = count($array);
		for ($i = 0; $i < $count; $i++) {
			$liTag = $liTag.'<li>'.$array[$i].'</li>';
		}
	}
	return '<ul class="moreInfo">'.$liTag.'</ul>';
	
	unset($liTag);
	unset($i);
	unset($array);
}
add_shortcode('timelineInfoList', 'sc_timelineInfoList');


/**
 * jqFloating Clouds
 */
function sc_jqfloat_clouds($atts) {
	return '<div id="jqfloat-cloud1" class="jqfloat-cloud"></div>
			<div id="jqfloat-cloud2" class="jqfloat-cloud"></div>
			<div id="jqfloat-cloud3" class="jqfloat-cloud"></div>
			<div id="jqfloat-cloud4" class="jqfloat-cloud"></div>
			<div id="jqfloat-sun"></div>';
}
add_shortcode('jqfloat_clouds', 'sc_jqfloat_clouds');


/**
 * Cloud with content
 */
function sc_moving_cloud($atts, $content = null) {
	extract(shortcode_atts(array(
			'style' => 'height: auto;',
	), $atts));
	return '<div class="moving-cloud" style="'.$style.';">
				<div id="moving-cloud-canvas">
					<div id="moving-clouds">
						<div class="moving-cloud1"><span class="moving-shadow1"></span></div>
						<div class="moving-cloud2"><span class="moving-shadow2"></span></div>
						<div class="moving-cloud3"><span class="moving-shadow3"></span></div>
					</div>
					<div id="moving-clouds2">
						<div class="moving-cloud1"><span class="moving-shadow1"></span></div>
						<div class="moving-cloud2"><span class="moving-shadow2"></span></div>
						<div class="moving-cloud3"><span class="moving-shadow3"></span></div>
					</div>
				</div>
				<div id="moving-cloud-content">'.do_shortcode($content).'</div>
			</div>';
}
add_shortcode('moving_cloud', 'sc_moving_cloud');


/**
 * Dancing Erika Style
 */
function sc_erika_style($atts) {
	extract(shortcode_atts(array(
			'background' => 'rgba(192, 208, 240, .6)',
			'button' => '',
			'cap' => 'ダンスやめる？',
	), $atts));
	if ($button == 'true') {
		$tag = '<a class="erika-trigger" href="#">'.$cap.'</a><div>　</div>';
	} else {
		$tag = '';
	}
	return '<div id="erika-style" style="background: '.$background.';">
			<div id="erika-csscanvas">
				<div id="erika-corebody"><!-- 基準座標 -->
					<div id="erika-waist">
						<div id="erika-waist_r1"></div>
						<div id="erika-waist_r2"></div>
						<div id="erika-waist_l2"></div>
						<div id="erika-waist_l1"></div>
						<div id="erika-bust">
							<div id="erika-bust_r"></div>
							<div id="erika-bust_l"></div>
							<div id="erika-sholder_r">
								<div id="erika-upperarm_r">
									<div id="erika-lowerarm_r">
										<div id="erika-lowerarm_r_r"></div>
										<div id="erika-lowerarm_r_l"></div>
										<div id="erika-hand_r">
											<div id="erika-hand_r_l"></div>
										</div>
									</div>
								</div>
							</div>
							<div id="erika-scarf_r"></div>
							<div id="erika-sholder_l">
								<div id="erika-scarf_l"></div>
								<div id="erika-upperarm_l">
									<div id="erika-lowerarm_l">
										<div id="erika-lowerarm_l_r"></div>
										<div id="erika-lowerarm_l_l"></div>
										<div id="erika-hand_l">
											<div id="erika-hand_l_l"></div>
										</div>
									</div>
								</div>
							</div>
							<div id="erika-button_r_upper"></div>
							<div id="erika-button_l_upper"></div>
							<div id="erika-ribbon">
								<div id="erika-ribbon_r_upper">
									<div id="erika-ribbon_r_upper_1"></div>
									<div id="erika-ribbon_r_upper_2"></div>
								</div>
								<div id="erika-ribbon_r_lower">
									<div id="erika-ribbon_r_lower_1"></div>
									<div id="erika-ribbon_r_lower_2"></div>
								</div>
								<div id="erika-ribbon_c"></div>
								<div id="erika-ribbon_l_upper">
									<div id="erika-ribbon_l_upper_1"></div>
									<div id="erika-ribbon_l_upper_2"></div>
								</div>
								<div id="erika-ribbon_l_lower">
									<div id="erika-ribbon_l_lower_1"></div>
									<div id="erika-ribbon_l_lower_2"></div>
								</div>
							</div>
							<div id="erika-neck">
								<div id="erika-backhair">
									<div id="erika-backhair_r_0"></div>
									<div id="erika-backhair_r_1"></div>
									<div id="erika-backhair_c"></div>
									<div id="erika-backhair_l_1"></div>
									<div id="erika-backhair_l_0"></div>
								</div>
								<div id="erika-neck_tohead"></div>
								<div id="erika-neckline_upper"></div>
								<div id="erika-neckline_lower"></div>
								<div id="erika-head">
									<div id="erika-hair">
										<div id="erika-fronthair">
											<div id="erika-fronthair_r0"></div>
											<div id="erika-fronthair_r1"></div>
											<div id="erika-fronthair_l1"></div>
											<div id="erika-fronthair_l0"></div>
										</div>
									</div>
									<div id="erika-eye_r">
										<div id="erika-eye_r_outline">
											<div id="erika-eye_r_core"></div>
											<div id="erika-eye_r_upperwhite"></div>
											<div id="erika-eye_r_lowerwhite"></div>
										</div>
										<div id="erika-eye_r_upperline"></div>
									</div>
									<div id="erika-eye_l">
										<div id="erika-eye_l_outline">
											<div id="erika-eye_l_core"></div>
											<div id="erika-eye_l_upperwhite"></div>
											<div id="erika-eye_l_lowerwhite"></div>
										</div>
										<div id="erika-eye_l_upperline"></div>
									</div>
									<div id="erika-brow_r"></div>
									<div id="erika-brow_l"></div>
									<div id="erika-mouth"></div>
									<div id="erika-sideburns">
										<div id="erika-sideburns_r">
											<div id="erika-sideburns_r_0">
												<div id="erika-sideburns_r_1">
													<div id="erika-sideburns_r_2">
														<div id="erika-sideburns_r_3">
															<div id="erika-sideburns_r_4">
																<div id="erika-sideburns_r_5">
																	<div id="erika-sideburns_r_6"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="erika-sideburns_l">
											<div id="erika-sideburns_l_0">
												<div id="erika-sideburns_l_1">
													<div id="erika-sideburns_l_2">
														<div id="erika-sideburns_l_3">
															<div id="erika-sideburns_l_4">
																<div id="erika-sideburns_l_5">
																	<div id="erika-sideburns_l_6"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="erika-button_r_lower"></div>
						<div id="erika-button_l_lower"></div>
						<div id="erika-skirt">
							<div id="erika-skirt_r0"></div>
							<div id="erika-skirt_r1"></div>
							<div id="erika-skirt_r2"></div>
							<div id="erika-skirt_c"></div>
							<div id="erika-skirt_l2"></div>
							<div id="erika-skirt_l1"></div>
							<div id="erika-skirt_l0"></div>
						</div>
						<div id="erika-crotch">
							<div id="erika-thigh_r">
								<div id="erika-thigh_r_r"></div>
								<div id="erika-thigh_r_l"></div>
								<div id="erika-shin_r">
									<div id="erika-shin_r_r"></div>
									<div id="erika-foot_r">
										<div id="erika-foot_r_socks"></div>
									</div>
								</div>
							</div>
							<div id="erika-thigh_l">
								<div id="erika-thigh_l_r"></div>
								<div id="erika-thigh_l_l"></div>
								<div id="erika-shin_l">
									<div id="erika-shin_l_l"></div>
									<div id="erika-foot_l">
										<div id="erika-foot_l_socks"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>'.$tag.'</div>';

	unset($tag);
}
add_shortcode('erika_style', 'sc_erika_style');
?>
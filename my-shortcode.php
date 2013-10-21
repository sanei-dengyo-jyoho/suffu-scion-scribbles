<?php
/**
 * Additional Shortcodes
 */
//******************************************************************************
// Timeliner
//******************************************************************************
function sc_timeline($atts, $content = null) {
	extract(shortcode_atts(array(
			'style' => '',
	), $atts));
	return '
		<div id="timelineContainer" style="'.$style.'">
			<div class="timelineToggle">
				<small><a class="expandAll expandAllclosed"></a></small>
			</div>
			<br class="clear" />'.do_shortcode($content).'<br class="clear" />
		</div>
	';
}
add_shortcode('timeline', 'sc_timeline');

function sc_timelineGroup($atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => '',
			'tag' => 'h2',
	), $atts));
	return '
		<div class="timelineMajor">
			<'.$tag.' class="timelineMajorMarker"><span><a>'.$title.'</a></span></'.$tag.'>
			'.do_shortcode($content).'
		</div>
	';
}
add_shortcode('timelineGroup', 'sc_timelineGroup');

function sc_timelineEvent($atts, $content = null) {
	extract(shortcode_atts(array(
			'id' => '',
			'title' => '',
			'event' => '',
			'tag' => '',
	), $atts));
	if ($tag == '') {
		$eventTag = '';
	} else {
		$eventTag = '<'.$tag.'>'.$event.'</'.$tag.'>';
	}
	return '
		<dl class="timelineMinor">
			<dt id="'.$id.'"><a>'.$title.'</a><small id="'.$id.'DT" class="timelineEventDT">'.$event.'</small></dt>
			<dd id="'.$id.'EX" class="timelineEvent" style="display: none;">'.$eventTag.do_shortcode($content).'</dd>
		</dl>
	';
}
add_shortcode('timelineEvent', 'sc_timelineEvent');

function sc_timelineEventSingle($atts, $content = null) {
	extract(shortcode_atts(array(
			'event' => '',
			'tag' => 'h3',
			'desc' => '',
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
	return '
		<dl class="timelineMinor">
			<dd>'.$eventTag.do_shortcode($content).$descTag.'</dd>
		</dl>
	';
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
		return '
			<div class="gallery default">
				<div class="gallery-icon">
					<a href="'.$url.'" rel="'.$rel.'">
						<img title="'.$title.'" src="'.$url.'" alt="" />
					</a>
				</div>
			</div>'.$credTag.$descTag
		;
	}
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
}
add_shortcode('timelineInfoList', 'sc_timelineInfoList');


//******************************************************************************
// Cloud with content
//******************************************************************************
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


//******************************************************************************
// WikiUp Tooltip
//******************************************************************************
function sc_wikiup($atts, $content = null) {
	extract(shortcode_atts(array(
			'id' => '',
			'style' => '',
			'wiki' => '',
			'lang' => 'ja',
	), $atts));
	// idを追加
	$dataid = '';
	if ($id != '') {
		$dataid = ' id="'.$id.'"';
	}
	// styleを追加
	$datastyle = '';
	if ($style != '') {
		$datastyle = ' style="'.$style.'"';
	}
	$ret  = '';
	$ret .= '<data';
	$ret .= $dataid;
	$ret .= $datastyle;
	$ret .= ' data-wiki="'.$wiki.'"';
	$ret .= ' data-lang="'.$lang.'">';
	$ret .= do_shortcode($content);
	$ret .= '</data>';
	return $ret;
}
add_shortcode('wikiup', 'sc_wikiup');


//******************************************************************************
// jqFloating Clouds
//******************************************************************************
function sc_jqfloat_sky($atts, $content = null) {
	return '<div id="jqfloat-sky">'.do_shortcode($content).'</div>';
}
add_shortcode('jqfloat_sky', 'sc_jqfloat_sky');


function sc_jqfloat_holder($atts, $content = null) {
	return '<div id="jqfloat-holder" style="padding: 0;">'.do_shortcode($content).'</div>';
}
add_shortcode('jqfloat_holder', 'sc_jqfloat_holder');


function sc_jqfloat_clouds($atts) {
	return '<div id="jqfloat-cloud1" class="jqfloat-cloud"></div>
			<div id="jqfloat-cloud2" class="jqfloat-cloud"></div>
			<div id="jqfloat-cloud3" class="jqfloat-cloud"></div>
			<div id="jqfloat-cloud4" class="jqfloat-cloud"></div>
			<div id="jqfloat-sun"></div>';
}
add_shortcode('jqfloat_clouds', 'sc_jqfloat_clouds');


//******************************************************************************
// Dancing Erika Style
//******************************************************************************
function sc_erika_style($atts) {
	extract(shortcode_atts(array(
			'background' => 'rgba(192, 208, 240, .6)',
			'button' => 'false',
			'cap' => 'ダンスやめる？',
			'id' => 'erika-style',
	), $atts));
	$tag = '';
	if ($button == 'true') {
		$tag = '<a class="erika-trigger" href="#'.$id.'">'.$cap.'</a><div>　</div>';
	}
	return '<div id="erika-style" style="background: '.$background.';">
			<div id="erika-csscanvas">
				<div id="erika-corebody">
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
}
add_shortcode('erika_style', 'sc_erika_style');
?>
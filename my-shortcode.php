<?php
/********************************************************************************/
/* Timeliner */
/********************************************************************************/
function sc_timeline( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'style'	=>	'',
	), $atts ) );

	$styledata = '';
	if ( $style != '' ) {
		$styledata = ' style="' . $style . '"';
	}

	$content = do_shortcode( $content );
	$ret  = '';
	$ret .= '<div id="timelineContainer"' . $styledata . '>';
	$ret .= '<div class="timelineToggle">';
	$ret .= '<small><a class="expandAll expandAllclosed"></a></small>';
	$ret .= '</div>';
	$ret .= '<br class="clear" />' . $content . '<br class="clear" />';
	$ret .= '</div>';
	return $ret;
}

add_shortcode( 'timeline', 'sc_timeline' );


function sc_timeline_group( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'title'	=>	'',
			'tag'	=>	'h2',
	), $atts ) );

	$content = do_shortcode( $content );
	$ret  = '';
	$ret .= '<div class="timelineMajor">';
	$ret .= '<' . $tag . ' class="timelineMajorMarker"><span><a>' . $title . '</a></span></' . $tag . '>';
	$ret .= $content;
	$ret .= '</div>';
	return $ret;
}

add_shortcode( 'timeline_group', 'sc_timeline_group' );


function sc_timeline_event( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'id'	=>	'',
			'title'	=>	'',
			'event'	=>	'',
			'tag'	=>	'',
	), $atts ) );

	$eventTag = '';
	if ( $tag != '' ) {
		$eventTag = '<' . $tag . '>' . $event . '</' . $tag . '>';
	}

	$content = do_shortcode( $content );
	$ret  = '';
	$ret .= '<dl class="timelineMinor">';
	$ret .= '<dt id="' . $id . '">';
	$ret .= '<a>' . $title . '</a>';
	$ret .= '<small id="' . $id . 'DT" class="timelineEventDT">' . $event . '</small>';
	$ret .= '</dt>';
	$ret .= '<dd id="' . $id . 'EX" class="timelineEvent" style="display: none;">';
	$ret .= $eventTag;
	$ret .= $content;
	$ret .= '</dd>';
	$ret .= '</dl>';
	return $ret;
}

add_shortcode( 'timeline_event', 'sc_timeline_event' );


function sc_timeline_event_single( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'event'	=>	'',
			'tag'	=>	'h3',
			'desc'	=>	'',
	), $atts ) );

	$eventTag = '';
	if ( $tag != '' ) {
		$eventTag = '<' . $tag . '>' . $event . '</' . $tag . '>';
	}
	$descTag = '';
	if ( $desc != '' ) {
		$descTag = '<p class="desc">' . $desc . '</p>';
	}

	$content = do_shortcode( $content );
	$ret  = '';
	$ret .= '<dl class="timelineMinor">';
	$ret .= '<dd>';
	$ret .= $eventTag;
	$ret .= $content;
	$ret .= $descTag;
	$ret .= '</dd>';
	$ret .= '</dl>';
	return $ret;
}

add_shortcode( 'timeline_event_single', 'sc_timeline_event_single' );


function sc_timeline_media( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'style'	=>	'',
	), $atts ) );

	$styledata = '';
	if ( $style != '' ) {
		$styledata = ' style="' . $style . '"';
	}

	$content = do_shortcode( $content );
	$ret  = '';
	$ret .= '<div class="media"' . $styledata . '>';
	$ret .= $content;
	$ret .= '</div>';
	return $ret;
}

add_shortcode( 'timeline_media', 'sc_timeline_media' );


function sc_timeline_gallery( $atts ) {
	extract( shortcode_atts( array(
			'url'	=>	'',
			'title'	=>	'',
			'cred'	=>	'',
			'desc'	=>	'',
			'rel'	=>	'shadowbox[timeline]',
	), $atts ) );

	$ret = '';
	if ( $url != '' ) {
		$credTag = '';
		if ( $cred != '' ) {
			$credTag = '<p class="cred"><small>' . $cred . '</small></p>';
		}
		$descTag = '';
		if ( $desc != '' ) {
			$descTag = '<p class="desc">' . $desc . '</p>';
		}

		$ret = '';
		$ret .= '<div class="gallery default">';
		$ret .= '<div class="gallery-icon">';
		$ret .= '<a href="' . $url . '" rel="' . $rel . '">';
		$ret .= '<img title="' . $title . '" src="' . $url . '" alt="" />';
		$ret .= '</a>';
		$ret .= '</div>';
		$ret .= '</div>';
		$ret .= $credTag;
		$ret .= $descTag;
	}
	return $ret;
}

add_shortcode( 'timeline_gallery', 'sc_timeline_gallery' );


function sc_timeline_embed( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'cred'	=>	'',
			'desc'	=>	'',
	), $atts ) );

	$credTag = '';
	if ( $cred != '' ) {
		$credTag = '<p class="cred"><small>' . $cred . '</small></p>';
	}
	$descTag = '';
	if ( $desc != '' ) {
		$descTag = '<p class="desc">' . $desc . '</p>';
	}

	$content = do_shortcode( $content );
	$ret  = '';
	$ret .= '<div>';
	$ret .= $content;
	$ret .= '</div>';
	$ret .= $credTag;
	$ret .= $descTag;
	return $ret;
}

add_shortcode( 'timeline_embed', 'sc_timeline_embed' );


function sc_timeline_infolist( $atts ) {
	extract( shortcode_atts( array(
			'list'	=>	'',
			'delim'	=>	'::::',
	), $atts ) );

	$liTag = '';
	if ( $list != '' ) {
		$array = explode( $delim, $list );
		$count = count( $array );
		for ( $i = 0; $i < $count; $i++ ) {
			$liTag .= '<li>' . $array[ $i ] . '</li>';
		}
	}

	$ret  = '';
	$ret .= '<ul class="moreInfo">';
	$ret .= $liTag;
	$ret .= '</ul>';
	return $ret;
}

add_shortcode( 'timeline_infolist', 'sc_timeline_infolist' );


/********************************************************************************/
/* Cloud with content */
/********************************************************************************/
function sc_moving_cloud( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'style'	=>	'height:auto',
	), $atts ) );

	$styledata = '';
	if ( $style != '' ) {
		$styledata = ' style="' . $style . '"';
	}

	$content = do_shortcode( $content );
	$ret  = '';
	$ret .= '<div class="moving-cloud"' . $styledata . '>';
		$ret .= '<div id="moving-cloud-canvas">';
		for ( $i = 1; $i <= 2; $i++ ) {
			$ret .= '<div id="moving-clouds' . $i . '">';
			for ( $j = 1; $j <= 3; $j++ ) {
				$ret .= '<div class="moving-cloud' . $j . '">';
				$ret .= '<span class="moving-shadow' . $j . '"></span>';
				$ret .= '</div>';
			}
			$ret .= '</div>';
		}
		$ret .= '</div>';
		$ret .= '<div id="moving-cloud-content">' . $content . '</div>';
	$ret .= '</div>';
	return $ret;
}

add_shortcode( 'moving_cloud', 'sc_moving_cloud' );


/********************************************************************************/
/* jqFloating Clouds */
/********************************************************************************/
function sc_jqfloat_sky( $atts, $content = null ) {
	$content = do_shortcode( $content );
	$ret  = '';
	$ret .= '<div id="jqfloat-sky">';
	$ret .= $content;
	$ret .= '</div>';
	return $ret;
}

add_shortcode( 'jqfloat_sky', 'sc_jqfloat_sky' );


function sc_jqfloat_holder( $atts, $content = null ) {
	$content = do_shortcode( $content );
	$ret  = '';
	$ret .= '<div id="jqfloat-holder" style="padding: 0;">';
	$ret .= $content;
	$ret .= '</div>';
	return $ret;
}

add_shortcode( 'jqfloat_holder', 'sc_jqfloat_holder' );


function sc_jqfloat_clouds( $atts ) {
	$ret  = '';
	for ( $i = 1; $i <= 4; $i++ ) {
		$ret .= '<div id="jqfloat-cloud' . $i . '" class="jqfloat-cloud"></div>';
	}
	$ret .= '<div id="jqfloat-sun"></div>';
	return $ret;
}

add_shortcode( 'jqfloat_clouds', 'sc_jqfloat_clouds' );


/********************************************************************************/
/* Dancing Erika Style */
/********************************************************************************/
function sc_erika_style( $atts ) {
	extract( shortcode_atts( array(
			'background'	=>	'',
			'button'		=>	'true',
			'id'			=>	'erika-style',
	), $atts ) );

	$playbutton = '';
	if ( $button == 'true' ) {
		$playbutton = '<a type="button" class="button player-pause" id="player-button" href="#' . $id . '"></a>';
	}
	$datastyle = '';
	if ( $background != '' ) {
		$datastyle = ' style="background:' . $background . ';"';
	}

	$ret  = '';
	$ret .= '<div id="erika-style"' . $datastyle . '>';
		$ret .= '<div id="erika-canvas">';
			$ret .= '<div id="erika-corebody">';
				$ret .= '<div id="erika-waist">';
					$ret .= '<div id="erika-waist_r1"></div>';
					$ret .= '<div id="erika-waist_r2"></div>';
					$ret .= '<div id="erika-waist_l2"></div>';
					$ret .= '<div id="erika-waist_l1"></div>';
					$ret .= '<div id="erika-bust">';
						$ret .= '<div id="erika-bust_r"></div>';
						$ret .= '<div id="erika-bust_l"></div>';
						$ret .= '<div id="erika-sholder_r">';
							$ret .= '<div id="erika-upperarm_r">';
								$ret .= '<div id="erika-lowerarm_r">';
									$ret .= '<div id="erika-lowerarm_r_r"></div>';
									$ret .= '<div id="erika-lowerarm_r_l"></div>';
									$ret .= '<div id="erika-hand_r">';
										$ret .= '<div id="erika-hand_r_l"></div>';
									$ret .= '</div>';
								$ret .= '</div>';
							$ret .= '</div>';
						$ret .= '</div>';
						$ret .= '<div id="erika-scarf_r"></div>';
						$ret .= '<div id="erika-sholder_l">';
							$ret .= '<div id="erika-scarf_l"></div>';
							$ret .= '<div id="erika-upperarm_l">';
								$ret .= '<div id="erika-lowerarm_l">';
									$ret .= '<div id="erika-lowerarm_l_r"></div>';
									$ret .= '<div id="erika-lowerarm_l_l"></div>';
									$ret .= '<div id="erika-hand_l">';
										$ret .= '<div id="erika-hand_l_l"></div>';
									$ret .= '</div>';
								$ret .= '</div>';
							$ret .= '</div>';
						$ret .= '</div>';
						$ret .= '<div id="erika-button_r_upper"></div>';
						$ret .= '<div id="erika-button_l_upper"></div>';
						$ret .= '<div id="erika-ribbon">';
							$ret .= '<div id="erika-ribbon_r_upper">';
								$ret .= '<div id="erika-ribbon_r_upper_1"></div>';
								$ret .= '<div id="erika-ribbon_r_upper_2"></div>';
							$ret .= '</div>';
							$ret .= '<div id="erika-ribbon_r_lower">';
								$ret .= '<div id="erika-ribbon_r_lower_1"></div>';
								$ret .= '<div id="erika-ribbon_r_lower_2"></div>';
							$ret .= '</div>';
							$ret .= '<div id="erika-ribbon_c"></div>';
							$ret .= '<div id="erika-ribbon_l_upper">';
								$ret .= '<div id="erika-ribbon_l_upper_1"></div>';
								$ret .= '<div id="erika-ribbon_l_upper_2"></div>';
							$ret .= '</div>';
							$ret .= '<div id="erika-ribbon_l_lower">';
								$ret .= '<div id="erika-ribbon_l_lower_1"></div>';
								$ret .= '<div id="erika-ribbon_l_lower_2"></div>';
							$ret .= '</div>';
						$ret .= '</div>';
						$ret .= '<div id="erika-neck">';
							$ret .= '<div id="erika-backhair">';
								$ret .= '<div id="erika-backhair_r_0"></div>';
								$ret .= '<div id="erika-backhair_r_1"></div>';
								$ret .= '<div id="erika-backhair_c"></div>';
								$ret .= '<div id="erika-backhair_l_1"></div>';
								$ret .= '<div id="erika-backhair_l_0"></div>';
							$ret .= '</div>';
							$ret .= '<div id="erika-neck_tohead"></div>';
							$ret .= '<div id="erika-neckline_upper"></div>';
							$ret .= '<div id="erika-neckline_lower"></div>';
							$ret .= '<div id="erika-head">';
								$ret .= '<div id="erika-hair">';
									$ret .= '<div id="erika-fronthair">';
										$ret .= '<div id="erika-fronthair_r0"></div>';
										$ret .= '<div id="erika-fronthair_r1"></div>';
										$ret .= '<div id="erika-fronthair_l1"></div>';
										$ret .= '<div id="erika-fronthair_l0"></div>';
									$ret .= '</div>';
								$ret .= '</div>';
								$ret .= '<div id="erika-eye_r">';
									$ret .= '<div id="erika-eye_r_outline">';
										$ret .= '<div id="erika-eye_r_core"></div>';
										$ret .= '<div id="erika-eye_r_upperwhite"></div>';
										$ret .= '<div id="erika-eye_r_lowerwhite"></div>';
									$ret .= '</div>';
									$ret .= '<div id="erika-eye_r_upperline"></div>';
								$ret .= '</div>';
								$ret .= '<div id="erika-eye_l">';
									$ret .= '<div id="erika-eye_l_outline">';
										$ret .= '<div id="erika-eye_l_core"></div>';
										$ret .= '<div id="erika-eye_l_upperwhite"></div>';
										$ret .= '<div id="erika-eye_l_lowerwhite"></div>';
									$ret .= '</div>';
									$ret .= '<div id="erika-eye_l_upperline"></div>';
								$ret .= '</div>';
								$ret .= '<div id="erika-brow_r"></div>';
								$ret .= '<div id="erika-brow_l"></div>';
								$ret .= '<div id="erika-mouth"></div>';
								$ret .= '<div id="erika-sideburns">';
									$ret .= '<div id="erika-sideburns_r">';
										$ret .= '<div id="erika-sideburns_r_0">';
											$ret .= '<div id="erika-sideburns_r_1">';
												$ret .= '<div id="erika-sideburns_r_2">';
													$ret .= '<div id="erika-sideburns_r_3">';
														$ret .= '<div id="erika-sideburns_r_4">';
															$ret .= '<div id="erika-sideburns_r_5">';
																$ret .= '<div id="erika-sideburns_r_6"></div>';
															$ret .= '</div>';
														$ret .= '</div>';
													$ret .= '</div>';
												$ret .= '</div>';
											$ret .= '</div>';
										$ret .= '</div>';
									$ret .= '</div>';
									$ret .= '<div id="erika-sideburns_l">';
										$ret .= '<div id="erika-sideburns_l_0">';
											$ret .= '<div id="erika-sideburns_l_1">';
												$ret .= '<div id="erika-sideburns_l_2">';
													$ret .= '<div id="erika-sideburns_l_3">';
														$ret .= '<div id="erika-sideburns_l_4">';
															$ret .= '<div id="erika-sideburns_l_5">';
																$ret .= '<div id="erika-sideburns_l_6"></div>';
															$ret .= '</div>';
														$ret .= '</div>';
													$ret .= '</div>';
												$ret .= '</div>';
											$ret .= '</div>';
										$ret .= '</div>';
									$ret .= '</div>';
								$ret .= '</div>';
							$ret .= '</div>';
						$ret .= '</div>';
					$ret .= '</div>';
					$ret .= '<div id="erika-button_r_lower"></div>';
					$ret .= '<div id="erika-button_l_lower"></div>';
					$ret .= '<div id="erika-skirt">';
						$ret .= '<div id="erika-skirt_r0"></div>';
						$ret .= '<div id="erika-skirt_r1"></div>';
						$ret .= '<div id="erika-skirt_r2"></div>';
						$ret .= '<div id="erika-skirt_c"></div>';
						$ret .= '<div id="erika-skirt_l2"></div>';
						$ret .= '<div id="erika-skirt_l1"></div>';
						$ret .= '<div id="erika-skirt_l0"></div>';
					$ret .= '</div>';
					$ret .= '<div id="erika-crotch">';
						$ret .= '<div id="erika-thigh_r">';
							$ret .= '<div id="erika-thigh_r_r"></div>';
							$ret .= '<div id="erika-thigh_r_l"></div>';
							$ret .= '<div id="erika-shin_r">';
								$ret .= '<div id="erika-shin_r_r"></div>';
								$ret .= '<div id="erika-foot_r">';
									$ret .= '<div id="erika-foot_r_socks"></div>';
								$ret .= '</div>';
							$ret .= '</div>';
						$ret .= '</div>';
						$ret .= '<div id="erika-thigh_l">';
							$ret .= '<div id="erika-thigh_l_r"></div>';
							$ret .= '<div id="erika-thigh_l_l"></div>';
							$ret .= '<div id="erika-shin_l">';
								$ret .= '<div id="erika-shin_l_l"></div>';
								$ret .= '<div id="erika-foot_l">';
									$ret .= '<div id="erika-foot_l_socks"></div>';
								$ret .= '</div>';
							$ret .= '</div>';
						$ret .= '</div>';
					$ret .= '</div>';
				$ret .= '</div>';
			$ret .= '</div>';
		$ret .= '</div>';
		$ret .= $playbutton;
	$ret .= '</div>';
	return $ret;
}
add_shortcode( 'erika_style', 'sc_erika_style' );

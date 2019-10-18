<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2018 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('Restricted access');

class SppagebuilderAddonTab extends SppagebuilderAddons {

	public function render() {

		$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';
		$style = (isset($this->addon->settings->style) && $this->addon->settings->style) ? $this->addon->settings->style : '';
		$title = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
		$nav_icon_postion = (isset($this->addon->settings->nav_icon_postion) && $this->addon->settings->nav_icon_postion) ? $this->addon->settings->nav_icon_postion : '';
		$heading_selector = (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';
		$nav_text_align = (isset($this->addon->settings->nav_text_align) && $this->addon->settings->nav_text_align) ? $this->addon->settings->nav_text_align : 'sppb-text-left';

		//Output
		$output  = '<div class="sppb-addon sppb-addon-tab ' . $class . '">';
		$output .= ($title) ? '<'.$heading_selector.' class="sppb-addon-title">' . $title . '</'.$heading_selector.'>' : '';
		$output .= '<div class="sppb-addon-content sppb-tab ' . $style . '-tab">';

		//Tab Title
		$output .='<ul class="sppb-nav sppb-nav-' . $style . '">';
		foreach ($this->addon->settings->sp_tab_item as $key => $tab) {
            $icon_top ='';
            $icon_bottom = '';
            $icon_right = '';
            $icon_left = '';
            $icon_block = '';
            if(isset($tab->icon)){
                if($tab->icon && $nav_icon_postion == 'top'){
                    $icon_top = '<span class="sppb-tab-icon tab-icon-block"><i class="fa ' . $tab->icon . '"></i></span>';
                } elseif ($tab->icon && $nav_icon_postion == 'bottom') {
                    $icon_bottom = '<span class="sppb-tab-icon tab-icon-block"><i class="fa ' . $tab->icon . '"></i></span>';
                } elseif ($tab->icon && $nav_icon_postion == 'right') {
                    $icon_right = '<span class="sppb-tab-icon"><i class="fa ' . $tab->icon . '"></i></span>';
                } else {
                    $icon_left = '<span class="sppb-tab-icon"><i class="fa ' . $tab->icon . '"></i></span>';
                }
            }
            if($nav_icon_postion == 'top' || $nav_icon_postion == 'bottom'){
                $icon_block = 'tab-icon-block-wrap';
            }
            $title = (isset($tab->title) && $tab->title) ? ' '. $tab->title . ' ' : '';
            $output .='<li class="'. ( ($key==0) ? "active" : "").'">';
            $output .= '<a data-toggle="sppb-tab" class="'.$nav_text_align.' '.$icon_block.'" href="#sppb-tab-'. ($this->addon->id + $key) .'">'. $icon_top . $icon_left . $title . $icon_right . $icon_bottom .'</a>';
            $output .='</li>';
		}
		$output .='</ul>';

		//Tab Contnet
		$output .='<div class="sppb-tab-content sppb-tab-' . $style . '-content">';
		foreach ($this->addon->settings->sp_tab_item as $key => $tab) {
            $output .='<div id="sppb-tab-'. ($this->addon->id + $key) .'" class="sppb-tab-pane sppb-fade'. ( ($key==0) ? " active in" : "").'">' . $tab->content .'</div>';
		}
		$output .='</div>';
		$output .= '</div>';
		$output .= '</div>';

		return $output;

	}

	public function css() {
		$addon_id = '#sppb-addon-' . $this->addon->id;
		$tab_style = (isset($this->addon->settings->style) && $this->addon->settings->style) ? $this->addon->settings->style : '';
		$style = (isset($this->addon->settings->active_tab_color) && $this->addon->settings->active_tab_color) ? 'color: ' . $this->addon->settings->active_tab_color . ';': '';
                
		$font_style = (isset($this->addon->settings->nav_fontsize) && $this->addon->settings->nav_fontsize) ? 'font-size: ' . $this->addon->settings->nav_fontsize . 'px;': '';
		$font_style .= (isset($this->addon->settings->nav_border) && $this->addon->settings->nav_border) ? 'border: ' . $this->addon->settings->nav_border . 'px solid;': '';
		$font_style .= (isset($this->addon->settings->nav_border_color) && $this->addon->settings->nav_border_color) ? 'border-color: ' . $this->addon->settings->nav_border_color . ';': '';
		$font_style .= (isset($this->addon->settings->nav_color) && $this->addon->settings->nav_color) ? 'color: ' . $this->addon->settings->nav_color . ';': '';
		$font_style .= (isset($this->addon->settings->nav_bg_color) && $this->addon->settings->nav_bg_color) ? 'background-color: ' . $this->addon->settings->nav_bg_color . ';': '';
		$font_style .= (isset($this->addon->settings->nav_border_radius) && $this->addon->settings->nav_border_radius) ? 'border-radius: ' . $this->addon->settings->nav_border_radius . 'px;': '';
		$font_style .= (isset($this->addon->settings->nav_margin) && $this->addon->settings->nav_margin) ? 'margin: ' . $this->addon->settings->nav_margin . ';': 'margin: 0px 0px 5px 0px;';
		$font_style .= (isset($this->addon->settings->nav_padding) && $this->addon->settings->nav_padding) ? 'padding: ' . $this->addon->settings->nav_padding . ';': '';
		
        $font_style_sm = (isset($this->addon->settings->nav_fontsize_sm) && $this->addon->settings->nav_fontsize_sm) ? 'font-size: ' . $this->addon->settings->nav_fontsize_sm . 'px;': '';
		$font_style_sm .= (isset($this->addon->settings->nav_margin_sm) && $this->addon->settings->nav_margin_sm) ? 'margin: ' . $this->addon->settings->nav_margin_sm . ';': '';
        $font_style_sm .= (isset($this->addon->settings->nav_padding_sm) && $this->addon->settings->nav_padding_sm) ? 'padding: ' . $this->addon->settings->nav_padding_sm . ';': '';
        
        $font_style_xs = (isset($this->addon->settings->nav_fontsize_xs) && $this->addon->settings->nav_fontsize_xs) ? 'font-size: ' . $this->addon->settings->nav_fontsize_xs . 'px;': '';
		$font_style_xs .= (isset($this->addon->settings->nav_margin_xs) && $this->addon->settings->nav_margin_xs) ? 'margin: ' . $this->addon->settings->nav_margin_xs . ';': '';
        $font_style_xs .= (isset($this->addon->settings->nav_padding_xs) && $this->addon->settings->nav_padding_xs) ? 'padding: ' . $this->addon->settings->nav_padding_xs . ';': '';
        
        $nav_width = (isset($this->addon->settings->nav_width) && $this->addon->settings->nav_width) ? $this->addon->settings->nav_width : 30;
        $nav_width_sm = (isset($this->addon->settings->nav_width_sm) && $this->addon->settings->nav_width_sm) ? $this->addon->settings->nav_width_sm : 30;
        $nav_width_xs = (isset($this->addon->settings->nav_width_xs) && $this->addon->settings->nav_width_xs) ? $this->addon->settings->nav_width_xs : 30;
        
        $nav_gutter_right = (isset($this->addon->settings->nav_gutter) && $this->addon->settings->nav_gutter) ? 'padding-right: ' . $this->addon->settings->nav_gutter . 'px;': 'padding-right: 15px;';
        $nav_gutter_right_sm = (isset($this->addon->settings->nav_gutter_sm) && $this->addon->settings->nav_gutter_sm) ? 'padding-right: ' . $this->addon->settings->nav_gutter_sm . 'px;': 'padding-right: 15px;';
        $nav_gutter_right_xs = (isset($this->addon->settings->nav_gutter_xs) && $this->addon->settings->nav_gutter_xs) ? 'padding-right: ' . $this->addon->settings->nav_gutter_xs . 'px;': 'padding-right: 15px;';
        
        $nav_gutter_left = (isset($this->addon->settings->nav_gutter) && $this->addon->settings->nav_gutter) ? 'padding-left: ' . $this->addon->settings->nav_gutter . 'px;': 'padding-left: 15px;';
        $nav_gutter_left_sm = (isset($this->addon->settings->nav_gutter_sm) && $this->addon->settings->nav_gutter_sm) ? 'padding-left: ' . $this->addon->settings->nav_gutter_sm . 'px;': 'padding-left: 15px;';
        $nav_gutter_left_xs = (isset($this->addon->settings->nav_gutter_xs) && $this->addon->settings->nav_gutter_xs) ? 'padding-left: ' . $this->addon->settings->nav_gutter_xs . 'px;': 'padding-left: 15px;';
        
        $content_style = '';
        $content_style .= (isset($this->addon->settings->content_backround) && $this->addon->settings->content_backround) ? 'background-color: ' . $this->addon->settings->content_backround . ';': '';
        $content_style .= (isset($this->addon->settings->content_border) && $this->addon->settings->content_border) ? 'border: ' . $this->addon->settings->content_border . 'px solid;': '';
        $content_style .= (isset($this->addon->settings->content_color) && $this->addon->settings->content_color) ? 'color: ' . $this->addon->settings->content_color . ';': '';
        $content_style .= (isset($this->addon->settings->content_border_color) && $this->addon->settings->content_border_color) ? 'border-color: ' . $this->addon->settings->content_border_color . ';': '';
        $content_style .= (isset($this->addon->settings->content_border_radius) && $this->addon->settings->content_border_radius) ? 'border-radius: ' . $this->addon->settings->content_border_radius . 'px;': '';
        
        $content_style .= (isset($this->addon->settings->content_margin) && $this->addon->settings->content_margin) ? 'margin: ' . $this->addon->settings->content_margin . ';': '';
        $content_style .= (isset($this->addon->settings->content_padding) && $this->addon->settings->content_padding) ? 'padding: ' . $this->addon->settings->content_padding . ';': '';
        
        $content_style_sm = (isset($this->addon->settings->content_margin_sm) && $this->addon->settings->content_margin_sm) ? 'margin: ' . $this->addon->settings->content_margin_sm . ';': '';
        $content_style_sm .= (isset($this->addon->settings->content_padding_sm) && $this->addon->settings->content_padding_sm) ? 'padding: ' . $this->addon->settings->content_padding_sm . ';': '';
        
        $content_style_xs = (isset($this->addon->settings->content_margin_xs) && $this->addon->settings->content_margin_xs) ? 'margin: ' . $this->addon->settings->content_margin_xs . ';': '';
        $content_style_xs .= (isset($this->addon->settings->content_padding_xs) && $this->addon->settings->content_padding_xs) ? 'padding: ' . $this->addon->settings->content_padding_xs . ';': '';
        
        $box_shadow = '';
        $box_shadow .= (isset($this->addon->settings->shadow_horizontal) && $this->addon->settings->shadow_horizontal) ?  $this->addon->settings->shadow_horizontal . 'px ' : '0 ';
        $box_shadow .= (isset($this->addon->settings->shadow_vertical) && $this->addon->settings->shadow_vertical) ?  $this->addon->settings->shadow_vertical . 'px ' : '0 ';
        $box_shadow .= (isset($this->addon->settings->shadow_blur) && $this->addon->settings->shadow_blur) ?  $this->addon->settings->shadow_blur . 'px ' : '0 ';
        $box_shadow .= (isset($this->addon->settings->shadow_spread) && $this->addon->settings->shadow_spread) ?  $this->addon->settings->shadow_spread . 'px ' : '0 ';
        $box_shadow .= (isset($this->addon->settings->shadow_color) && $this->addon->settings->shadow_color) ?  $this->addon->settings->shadow_color : 'rgba(0, 0, 0, .5)';
        
        $icon_style = (isset($this->addon->settings->icon_fontsize) && $this->addon->settings->icon_fontsize) ?  'font-size: ' . $this->addon->settings->icon_fontsize .'px;' : '';
        $icon_style .= (isset($this->addon->settings->icon_margin) && $this->addon->settings->icon_margin) ?  'margin: ' . $this->addon->settings->icon_margin . ';' : '';
        
        $icon_style_sm = (isset($this->addon->settings->icon_fontsize_sm) && $this->addon->settings->icon_fontsize_sm) ?  'font-size: ' . $this->addon->settings->icon_fontsize_sm .'px;' : '';
        $icon_style_sm .= (isset($this->addon->settings->icon_margin_sm) && $this->addon->settings->icon_margin_sm) ?  'margin: ' . $this->addon->settings->icon_margin_sm . ';' : '';
        
        $icon_style_xs = (isset($this->addon->settings->icon_fontsize_xs) && $this->addon->settings->icon_fontsize_xs) ?  'font-size: ' . $this->addon->settings->icon_fontsize_xs .'px;' : '';
        $icon_style_xs .= (isset($this->addon->settings->icon_margin_xs) && $this->addon->settings->icon_margin_xs) ?  'margin: ' . $this->addon->settings->icon_margin_xs . ';' : '';
                    
                
		$css = '';
		if($tab_style == 'pills') {
            $style .= (isset($this->addon->settings->active_tab_bg) && $this->addon->settings->active_tab_bg) ? 'background-color: ' . $this->addon->settings->active_tab_bg . ';': '';
            if($style) {
                $css .= $addon_id . ' .sppb-nav-pills > li.active > a,' . $addon_id . ' .sppb-nav-pills > li.active > a:hover,' . $addon_id . ' .sppb-nav-pills > li.active > a:focus {';
                $css .= $style;
                $css .= '}';
            }
		} else if ($tab_style == 'lines') {
            $style .= (isset($this->addon->settings->active_tab_bg) && $this->addon->settings->active_tab_bg) ? 'border-bottom-color: ' . $this->addon->settings->active_tab_bg . ';': '';
            if($style) {
                $css .= $addon_id . ' .sppb-nav-lines > li.active > a,' . $addon_id . ' .sppb-nav-lines > li.active > a:hover,' . $addon_id . ' .sppb-nav-lines > li.active > a:focus {';
                $css .= $style;
                $css .= '}';
            }
		} else if ($tab_style == 'custom') {
            $style .= (isset($this->addon->settings->active_tab_bg) && $this->addon->settings->active_tab_bg) ? 'background-color: ' . $this->addon->settings->active_tab_bg . ';': '';
            if($style) {
                $css .= $addon_id . ' .sppb-nav-custom > li.active > a,' . $addon_id . ' .sppb-nav-custom > li.active > a:hover,' . $addon_id . ' .sppb-nav-custom > li.active > a:focus {';
                $css .= $style;
                $css .= '}';
            }
            $css .= $addon_id . ' .sppb-nav-custom {';
            $css .= 'width: ' . $nav_width . '%;';
            $css .= $nav_gutter_right;
            $css .= '}';
            $css .= $addon_id . ' .sppb-tab-custom-content {';
            $css .= 'width:'. (100-$nav_width) .'%;';
            $css .= $nav_gutter_left;
            $css .= '}';
            $css .= $addon_id . ' .sppb-tab-custom-content > div {';
            $css .= $content_style;
            $css .= 'box-shadow:'.$box_shadow.';';
            $css .= '}';
            $css .= $addon_id . ' .sppb-nav-custom a {';
            $css .= $font_style;
            $css .= 'box-shadow:'.$box_shadow.';';
            $css .= '}';
            $css .= $addon_id . ' .sppb-tab-icon {';
            $css .= $icon_style;
            $css .= '}';
        }
        if (!empty($font_style_sm) || !empty($nav_width_sm) || !empty($content_style_sm)) {
            $css .= '@media (min-width: 768px) and (max-width: 991px) {';
            
            $css .= $addon_id . ' .sppb-nav-custom {';
            if(!empty($nav_width_sm)){
                $css .= 'width: ' . $nav_width_sm . '%;';
            }
            $css .= $nav_gutter_right_sm;
            $css .= '}';
            $css .= $addon_id . ' .sppb-tab-custom-content {';
            if(!empty($nav_width_sm) && $nav_width_sm != 100){
                $css .= 'width:'. (100 - $nav_width_sm) .'%;';
            } else {
                $css .= 'width: 100%;';    
            }
            $css .= $nav_gutter_left_sm;
            $css .= '}';
            $css .= $addon_id . ' .sppb-tab-custom-content > div {';
            $css .= $content_style_sm;
            $css .= '}';
            $css .= $addon_id . ' .sppb-nav-custom a {';
            $css .= $font_style_sm;
            $css .= '}';
            $css .= $addon_id . ' .sppb-tab-icon {';
            $css .= $icon_style_sm;
            $css .= '}';
            
            $css .= '}';
        }
        if (!empty($font_style_xs) || !empty($nav_width_xs) || !empty($content_style_xs)) {
            $css .= '@media (max-width: 767px) {';
            
            $css .= $addon_id . ' .sppb-nav-custom {';
            if(!empty($nav_width_xs)){
            $css .= 'width: ' . $nav_width_xs . '%;';
            }
            $css .= $nav_gutter_right_xs;
            $css .= '}';
            $css .= $addon_id . ' .sppb-tab-custom-content {';
            if(!empty($nav_width_xs) && $nav_width_xs != 100){
                $css .= 'width:'. (100 - $nav_width_xs) .'%;';
            } else {
                $css .= 'width: 100%;';    
            }
            $css .= $nav_gutter_left_xs;
            $css .= '}';
            $css .= $addon_id . ' .sppb-tab-custom-content > div {';
            $css .= $content_style_xs;
            $css .= '}';
            $css .= $addon_id . ' .sppb-nav-custom a {';
            $css .= $font_style_xs;
            $css .= '}';
            $css .= $addon_id . ' .sppb-tab-icon {';
            $css .= $icon_style_xs;
            $css .= '}';
            
            $css .= '}';
        }

		return $css;
	}

	public static function getTemplate(){
		$output = '
		<style type="text/css">
			<# 
                var box_shadow = "";
                box_shadow += (!_.isEmpty(data.shadow_horizontal) && data.shadow_horizontal) ?  data.shadow_horizontal + \'px \' : "0 ";
                box_shadow += (!_.isEmpty(data.shadow_vertical) && data.shadow_vertical) ?  data.shadow_vertical + \'px \' : "0 ";
                box_shadow += (!_.isEmpty(data.shadow_blur) && data.shadow_blur) ?  data.shadow_blur + \'px \' : "0 ";
                box_shadow += (!_.isEmpty(data.shadow_spread) && data.shadow_spread) ?  data.shadow_spread + \'px \' : "0 ";
                box_shadow += (!_.isEmpty(data.shadow_color) && data.shadow_color) ?  data.shadow_color : "rgba(0, 0, 0, .5)";

                if(data.style == "pills"){ #>
                    #sppb-addon-{{ data.id }} .sppb-nav-pills > li.active > a,
                    #sppb-addon-{{ data.id }} .sppb-nav-pills > li.active > a:hover,
                    #sppb-addon-{{ data.id }} .sppb-nav-pills > li.active > a:focus{
                        color: {{ data.active_tab_color }};
                        background-color: {{ data.active_tab_bg }};
                    }
			<# } #>

			<# if(data.style == "lines"){ #>
                #sppb-addon-{{ data.id }} .sppb-nav-lines > li.active > a,
                #sppb-addon-{{ data.id }} .sppb-nav-lines > li.active > a:hover,
                #sppb-addon-{{ data.id }} .sppb-nav-lines > li.active > a:focus{
                    color: {{ data.active_tab_color }};
                    border-bottom-color: {{ data.active_tab_bg }};
                }
			<# } #>
            <# if (data.style == "custom") { #>
                #sppb-addon-{{ data.id }} .sppb-nav-custom > li.active > a,
                #sppb-addon-{{ data.id }} .sppb-nav-custom > li.active > a:hover,
                #sppb-addon-{{ data.id }} .sppb-nav-custom > li.active > a:focus{
                    color: {{ data.active_tab_color }};
                    background-color: {{ data.active_tab_bg }};
                }
                #sppb-addon-{{ data.id }} .sppb-nav-custom li a {
                    <# if(_.isObject(data.nav_fontsize)){ #>
                        font-size: {{data.nav_fontsize.md}}px;
                    <# } else { #>
                        font-size: {{data.nav_fontsize}}px;
                    <# } #>
                    border: {{data.nav_border}}px solid;
                    border-color: {{data.nav_border_color}};
                    color: {{data.nav_color}};
                    background-color: {{data.nav_bg_color}};
                    border-radius: {{data.nav_border_radius}}px;
                    <# if(_.isObject(data.nav_margin)){ #>
                        margin: {{data.nav_margin.md}};
                    <# } else { #>
                        margin: {{data.nav_margin}};
                    <# } #>
                    <# if(_.isObject(data.nav_padding)){ #>
                        padding: {{data.nav_padding.md}};
                    <# } else { #>
                        padding: {{data.nav_padding}};
                    <# } #>
                    box-shadow: {{box_shadow}};
                }
                #sppb-addon-{{ data.id }} .sppb-tab-icon {
                    <# if(_.isObject(data.icon_fontsize)){ #>
                        font-size: {{data.icon_fontsize.md}}px;
                    <# } else { #>
                        font-size: {{data.icon_fontsize}}px;
                    <# } #>
                    <# if(_.isObject(data.icon_margin)){ #>
                        margin: {{data.icon_margin.md}};
                    <# } else { #>
                        margin: {{data.icon_margin}};
                    <# } #>
                }
                <# if(_.isObject(data.nav_width)){ #>
                    #sppb-addon-{{ data.id }} .sppb-nav-custom {
                        width: {{data.nav_width.md}}%;
                        <# if(_.isObject(data.nav_gutter)){ #>
                            padding-right: {{data.nav_gutter.md}}px;
                        <# } else { #>
                            padding-right: {{data.nav_gutter}}px;
                        <# } #>
                    }
                    #sppb-addon-{{ data.id }} .sppb-tab-custom-content {
                        width: {{100-data.nav_width.md}}%;
                        <# if(_.isObject(data.nav_gutter)){ #>
                            padding-left: {{data.nav_gutter.md}}px;
                        <# } else { #>
                            padding-left: {{data.nav_gutter}}px;
                        <# } #>
                    }
                    #sppb-addon-{{ data.id }} .sppb-tab-custom-content > div {
                        background-color: {{data.content_backround}};
                        border: {{data.content_border}}px solid;
                        border-color: {{data.content_border_color}};
                        border-radius: {{data.content_border_radius}}px;
                        color: {{data.content_color}};
                        <# if(_.isObject(data.content_padding)){ #>
                            padding: {{data.content_padding.md}};
                        <# } else { #>
                            padding: {{data.content_padding}};
                        <# } #>
                        <# if(_.isObject(data.content_margin)){ #>
                            margin: {{data.content_margin.md}};
                        <# } else { #>
                            margin: {{data.content_margin}};
                        <# } #>
                        box-shadow: {{box_shadow}};
                    }
                <# } else { #>
                    #sppb-addon-{{ data.id }} .sppb-nav-custom {
                        width: {{data.nav_width}}%;
                    }
                    #sppb-addon-{{ data.id }} .sppb-tab-custom-content {
                        width: {{100-data.nav_width}}%;
                    }
                <# } #>
                @media (min-width: 768px) and (max-width: 991px) {
                    #sppb-addon-{{ data.id }} .sppb-nav-custom li a {
                        <# if(_.isObject(data.nav_fontsize)){ #>
                            font-size: {{data.nav_fontsize.sm}}px;
                        <# } #>
                        <# if(_.isObject(data.nav_margin)){ #>
                            margin: {{data.nav_margin.sm}};
                        <# } #>
                        <# if(_.isObject(data.nav_padding)){ #>
                            padding: {{data.nav_padding.sm}};
                        <# } #>
                    }
                    #sppb-addon-{{ data.id }} .sppb-tab-icon {
                        <# if(_.isObject(data.icon_fontsize)){ #>
                            font-size: {{data.icon_fontsize.sm}}px;
                        <# } #>
                        <# if(_.isObject(data.icon_margin)){ #>
                            margin: {{data.icon_margin.sm}};
                        <# } #>
                    }
                    <# if(_.isObject(data.nav_width)){ #>
                        #sppb-addon-{{ data.id }} .sppb-nav-custom {
                            width: {{data.nav_width.sm}}%;
                            <# if(_.isObject(data.nav_gutter)){ #>
                                padding-right: {{data.nav_gutter.sm}}px;
                            <# } #>
                        }
                        #sppb-addon-{{ data.id }} .sppb-tab-custom-content {
                            <# if(data.nav_width.sm !== "100"){ #>
                                width: {{100-data.nav_width.sm}}%;
                            <# } else { #>
                                width: 100%;
                            <# } #>
                            <# if(_.isObject(data.nav_gutter)){ #>
                                padding-left: {{data.nav_gutter.sm}}px;
                            <# } #>
                        }
                    <# } #>
                    #sppb-addon-{{ data.id }} .sppb-tab-custom-content > div {
                        <# if(_.isObject(data.content_padding)){ #>
                            padding: {{data.content_padding.sm}};
                        <# } #>
                        <# if(_.isObject(data.content_margin)){ #>
                            margin: {{data.content_margin.sm}};
                        <# } #>
                    }
                }
                @media (max-width: 767px) {
                    #sppb-addon-{{ data.id }} .sppb-nav-custom li a {
                        <# if(_.isObject(data.nav_fontsize)){ #>
                            font-size: {{data.nav_fontsize.xs}}px;
                        <# } #>
                        <# if(_.isObject(data.nav_margin)){ #>
                            margin: {{data.nav_margin.xs}};
                        <# } #>
                        <# if(_.isObject(data.nav_padding)){ #>
                            padding: {{data.nav_padding.xs}};
                        <# } #>
                    }
                    #sppb-addon-{{ data.id }} .sppb-tab-icon {
                        <# if(_.isObject(data.icon_fontsize)){ #>
                            font-size: {{data.icon_fontsize.xs}}px;
                        <# } #>
                        <# if(_.isObject(data.icon_margin)){ #>
                            margin: {{data.icon_margin.xs}};
                        <# } #>
                    }
                    <# if(_.isObject(data.nav_width)){ #>
                        #sppb-addon-{{ data.id }} .sppb-nav-custom {
                            width: {{data.nav_width.xs}}%;
                            <# if(_.isObject(data.nav_gutter)){ #>
                                padding-right: {{data.nav_gutter.xs}}px;
                            <# } #>
                        }
                        #sppb-addon-{{ data.id }} .sppb-tab-custom-content {
                            <# if(data.nav_width.xs !== "100"){ #>
                                width: {{100-data.nav_width.xs}}%;
                            <# } else { #>
                                width: 100%;
                            <# } #>
                            <# if(_.isObject(data.nav_gutter)){ #>
                                padding-left: {{data.nav_gutter.xs}}px;
                            <# } #>
                        }
                    <# } #>
                    #sppb-addon-{{ data.id }} .sppb-tab-custom-content > div {
                        <# if(_.isObject(data.content_padding)){ #>
                            padding: {{data.content_padding.xs}};
                        <# } #>
                        <# if(_.isObject(data.content_margin)){ #>
                            margin: {{data.content_margin.xs}};
                        <# } #>
                    }
                }
            <# } #>
		</style>
		<div class="sppb-addon sppb-addon-tab {{ data.class }}">
            <# if( !_.isEmpty( data.title ) ){ #>
                <{{ data.heading_selector }} class="sppb-addon-title">{{{ data.title }}}</{{ data.heading_selector }}>
            <# } 
            let icon_postion = (data.nav_icon_postion == \'top\' || data.nav_icon_postion == \'bottom\') ? \'tab-icon-block\' : \'\';
            #>
            <div class="sppb-addon-content sppb-tab {{data.style}}-tab">
                <ul class="sppb-nav sppb-nav-{{ data.style }}">
                    <# _.each(data.sp_tab_item, function(tab, key){ #>
                        <#
                            var active = "";
                            if(key == 0){
                                active = "active";
                            }

                            var title = "";
                            var icon_top ="";
                            var icon_bottom = "";
                            var icon_right = "";
                            var icon_left = "";
                            var icon_block = "";
                            if(!_.isEmpty(tab.icon) && tab.icon && data.nav_icon_postion == "top"){
                                icon_top = \'<span class="sppb-tab-icon tab-icon-block"><i class="fa \' + tab.icon + \'"></i></span>\';
                            } else if (!_.isEmpty(tab.icon) && tab.icon && data.nav_icon_postion == "bottom") {
                                icon_bottom = \'<span class="sppb-tab-icon tab-icon-block"><i class="fa \' + tab.icon + \'"></i></span>\';
                            } else if (!_.isEmpty(tab.icon) && tab.icon && data.nav_icon_postion == "right") {
                                icon_right = \'<span class="sppb-tab-icon"><i class="fa \' + tab.icon + \'"></i></span>\';
                            } else {
                                icon_left = \'<span class="sppb-tab-icon"><i class="fa \' + tab.icon + \'"></i></span>\';
                            }
                            if(tab.title){
                                title = tab.title;
                            }
                            if(data.nav_icon_postion == "top" || data.nav_icon_postion == "bottom"){
                                icon_block = "tab-icon-block-wrap";
                            }
                        #>
                        <li class="{{ active }}"><a data-toggle="sppb-tab" class="{{data.nav_text_align}} {{icon_block}}" href="#sppb-tab-{{ data.id }}{{ key }}">{{{icon_top}}} {{{icon_left}}} {{title}} {{{icon_right}}} {{{icon_bottom}}}</a></li>
                    <# }); #>
                </ul>
                <div class="sppb-tab-content sppb-tab-{{ data.style }}-content">
                    <# _.each(data.sp_tab_item, function(tab, key){ #>
                        <#
                            var active = "";
                            if(key == 0){
                                active = "active in";
                            }
                        #>
                        <div id="sppb-tab-{{ data.id }}{{ key }}" class="sppb-tab-pane sppb-fade {{ active }}">
                            <#
                            var htmlContent = "";
                            _.each(tab.content, function(content){
                                    htmlContent += content;
                            });
                            #>
                            {{{ htmlContent }}}
                        </div>
                    <# }); #>
                </div>
            </div>
		</div>
		';

		return $output;
	}

}
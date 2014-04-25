<?php

function add_meta_title ($string)
{
	$CI =& get_instance();
	$CI->data['meta_title'] = e($string) . ' | ' . $CI->data['meta_title'];
}
function btn_edit($uri) {
    return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>');
}

function btn_delete($uri) {
    return anchor($uri, '<i class="glyphicon glyphicon-remove"></i>', array('onclick' => 'return confirm("'
        . 'You are about to delete a record. This cannot be undone. Are you sure?");'));
}

function e($str) {
    return htmlentities($str);
}

function article_link($article){
	return 'blog/' . intval($article->id) . '/' . e($article->slug);
}
function article_links($articles) {
//	$string = '<ul class = "list-group">';
    $string = "";
	foreach ($articles as $article) {
		$url = article_link($article);
//		$string .= '<li class = "list-group-item">';
//		$string .= '<h5 style="text-align: left;">' . anchor($url, e($article->title).'...') .  '</h5>';
//		$string .= '<p style="text-align: left;" class="pubdate"><i>' . e($article->pubdate) . '</i></p>';
//		$string .= '</li>';
                $string .= '<a href = "'.base_url($url).'" class="list-group-item">' . e($article->title) .  '</a>';
	}
//	$string .= '</ul>';
	return $string;
}

function get_excerpt($article, $numwords = 50) {
	$string = '<div class="row">';
	$url = article_link($article);
	$string .= '<div class="col-lg-12"><h2>' . anchor($url, e($article->title)) . '</h2></div>';
	$string .= '<div class="col-lg-12"><p class="pubdate"><small><i class="glyphicon glyphicon-time"></i>  ' . $article->modified . '</small></p></div>';
	$string .= '<div class="col-lg-12"><p>' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p></div>';
	$string .= '<div class="col-lg-3"><p><a href="'.$url.'" class="label label-default"><h5>Read more '  .
                ' <span class="glyphicon glyphicon-chevron-right"></span> </h5></a></p></div><div class="col-lg-9"></div></div>';
	return $string;
}

function tutorial_link($tutorial) {
	return 'tutorial/' . $tutorial->category . '/' . e($tutorial->slug);
}
function tutorial_links($tutorials) {
	$string = '';
	foreach ($tutorials as $tutorial) {
		$url = tutorial_link($tutorial);
		
                $string .= '<a href = "'.  base_url($url).'" class="list-group-item">' . e($tutorial->title) .  '</a>';
	}
	return $string;
}

function get_excerpt_t($tutorial, $numwords = 50) {
	$string = '<div class="row">';
	$url = tutorial_link($tutorial);
	$string .= '<div class="col-lg-12"><h2>' . anchor($url, e($tutorial->title)) . '</h2></div>';
	$string .= '<div class="col-lg-12"><p class="pubdate"><small><i class="glyphicon glyphicon-time"></i> ' . e($tutorial->modified) . '</small></p></div>';
	$string .= '<div class="col-lg-12"><p>' . e(limit_to_numwords(strip_tags($tutorial->body), $numwords)) . '</p></div>';
	$string .= '<div class="col-lg-3"><p><a href="'.base_url($url).'" class="label label-default"><h5>Read more '  .
                ' <span class="glyphicon glyphicon-chevron-right"></span> </h5></a></p></div><div class="col-lg-9"></div></div>';
	return $string;
}

function course_link($course){
	return 'course/' . intval($course->id) . '/' . e($course->slug);
}
function course_links($courses){
	$string = '<ul>';
	foreach ($courses as $course) {
		$url = course_link($course);
		$string .= '<li>';
		$string .= '<h4>' . anchor($url, e($course->title)) .  ' ></h4>';
		$string .= '<p class="pubdate">' . e($course->pubdate) . '</p>';
		$string .= '</li>';
	}
	$string .= '</ul>';
	return $string;
}

function get_excerpt_c($course, $numwords = 50) {
	$string = '';
	$url = course_link($course);
	$string .= '<h2>' . anchor($url, e($course->title)) .  '</h2>';
	$string .= '<p class="pubdate">' . e($course->pubdate) . '</p>';
	$string .= '<p>' . e(limit_to_numwords(strip_tags($course->links), $numwords)) . '</p>';
	$string .= '<p>' . anchor($url, 'Read more >', array('title' => e($course->title))) . '</p>';
	return $string;
}

function limit_to_numwords($string, $numwords){
	$excerpt = explode(' ', $string, $numwords + 1);
	if (count($excerpt) >= $numwords) {
		array_pop($excerpt);
	}
	$excerpt = implode(' ', $excerpt);
	return $excerpt;
}

function get_menu($array, $child = FALSE, $nick=NULL) {
    $str = '';
    
    $CI =& get_instance();
    
    if(count($array)) {
        
        $str .= $child == FALSE ? '<ul class="nav navbar-nav">'.PHP_EOL:'<ul class="dropdown-menu">'.PHP_EOL;
        
        foreach ($array as $item) {
            
            $active = $CI->uri->segment(1) == $item['slug'] ? TRUE:FALSE;
            if(isset($item['children']) && count($item['children'])) {
                $str .= $active ? '<li class = "dropdown active">' : '<li class = "dropdown">';
                $str .= '<a class="dropdown-toggle my-link" data-toggle="dropdown" href="' . site_url($item['slug']).'">'.e($item['title']);
                $str .= '<b class="caret"></b></a>' . PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            }
            else {
                $str .= $active ? '<li class = "active">' : '<li class="">';
                $str .= '<a class = "active my-link" href = "' .  site_url($item['slug']) . '">'.  e($item['title']).'</a>';
            }
            $str .= '</li>'.PHP_EOL;
        }
        
        
        $str .= '</ul>'.PHP_EOL;
        $str .= '<ul class="navbar-nav nav navbar-right"><li><a class="my-link  " href = "'.  site_url('login').'">'. ''.$nick .'</a></li></ul>';
    }
    
    return $str;
}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Abhishek Banerjee
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}
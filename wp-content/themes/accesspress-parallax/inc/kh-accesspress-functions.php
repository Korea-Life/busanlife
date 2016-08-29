<?php

function omega_truncate_phrase( $text, $max_characters ) {

		$text = trim( $text );

		if ( mb_strlen( $text ) > $max_characters ) {
				//* Truncate $text to $max_characters + 1
				$text = mb_substr( $text, 0, $max_characters + 1 );

				//* Truncate to the last space in the truncated string
				$text = trim( mb_substr( $text, 0, mb_strrpos( $text, ' ' ) ) );
		}

		return $text;
}


function get_the_content_limit($max_characters){
		$content = get_the_content();

		//* Remove inline styles / scripts
		$content = trim( preg_replace( '#<(s(cript|tyle)).*?</\1>#si', '', $content ) );

		if ($max_characters < strlen( $content )){
			$content = omega_truncate_phrase( $content, $max_characters );
			$content = $content.' ...';
		}

		return $content;
}

function get_the_str_limit($str, $max_characters){
		if($max_characters < strlen($str)){
				$str = omega_truncate_phrase( $str, $max_characters );
				$str = $str . " ...";
		} 

		return $str;
}

function get_the_title_limit($max_characters){
		$title = get_the_title();

		if($max_characters < strlen($title)){
				$title = omega_truncate_phrase( $title, $max_characters );
				$title = $title . " ...";
		} 

		return $title;
}

function the_content_limit($max_characters){

		$content = get_the_content_limit( $max_characters );
		echo apply_filters( 'the_content_limit', $content );

}

function the_title_limit( $max_characters ){
		$title = get_the_title_limit( $max_characters );
		echo apply_filters( 'the_title_limit', $title );
}

?>

<?php
$title = $desc = $image = $img_size = $position = $custom_class = $data_img = $data_title = $data_desc = $data_position = '';
$layout = 1;
$wrap_class	= apply_filters( 'kc-el-class', $atts );

extract( $atts );

$wrap_class[] = 'kc-testimo';
$wrap_class[] = 'kc-testi-layout-' . $layout;
if ( !empty( $custom_class ) )
	$wrap_class[] = $custom_class;

if ( $image > 0 ) {

	$img_link = wp_get_attachment_image_src( $image, 'full' );
	$img_link = $img_link[0];
	if ( $img_size != 'full' ) {
		$img_link = kc_tools::createImageSize( $img_link, $img_size );
	}

	$data_img .= '<figure class="content-image">';
		$data_img .= '<img src="'. $img_link .'" alt="">';
	$data_img .= '</figure>';

}

if ( !empty( $title ) ) {

	$data_title .= '<div class="content-title">';
		$data_title .= $title;
	$data_title .= '</div>';

}

if ( !empty( $desc ) ) {

	$data_desc .= '<div class="content-desc">';
		$data_desc .= $desc;
	$data_desc .= '</div>';

}

if ( !empty( $position ) ) {

	$data_position .= '<div class="content-position">';
		$data_position .= $position;
	$data_position .= '</div>';

}

?>

<div class="<?php echo implode( ' ', $wrap_class ); ?>">

	<?php switch ( $layout ) {
		case '2':
			echo $data_title;
			echo $data_position;
			echo $data_desc;
		break;
		case '3':
			echo $data_img;
			echo $data_title;
			echo $data_position;
			echo $data_desc;
		break;
		case '4':
			echo $data_img;
			echo '<div class="box-right">';
			echo $data_desc;
			echo $data_position;
			echo $data_title;
			echo '</div>';
		break;
		case '5':
			echo $data_desc;
			echo $data_img;
			echo '<div class="box-right">';
			echo $data_title;
			echo $data_position;
			echo '</div>';
		break;
		default:
			echo $data_img;
			echo $data_desc;
			echo $data_title;
			echo $data_position;
		break;
	} ?>

</div>
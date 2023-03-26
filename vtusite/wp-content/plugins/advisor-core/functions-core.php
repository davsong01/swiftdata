<?php
// Contact form shortcode email
if ( ! function_exists( 'advisor_shortcode_contact_form_email' ) ) {
	function advisor_shortcode_contact_form_email() {

		if ( wp_verify_nonce( $_POST['bta_nonce'] ) && ! empty( $_POST['bta_name'] ) && ! empty( $_POST['bta_email']  ) && ! empty( $_POST['bta_purpose']) ) {

      $client_name = $_POST['bta_name'];
			$client_email = $_POST['bta_email'];
      $purpose = $_POST['bta_purpose'];

      if( !empty($_POST['bta_phone']) ){

        $phone = $_POST['bta_phone'];

      } else {

        $phone = esc_html__( 'Not Provided' , 'advisor-core' );

      }


			$subject = esc_html__( 'Help Required', 'advisor-core' ) . ' | ' . get_bloginfo( 'name' );

			$message  = __( 'Hello There' , 'advisor-core' ) . '<br><br>';
			$message .= __('My name is ', 'advisor-core') . $client_name . __( ' and I need your help. Please get in touch with me', 'advisor-core') . '<br><br>';

		  $message .= esc_html__( 'Email', 'advisor-core' ) . ': ' . $client_email . '<br>';

		  if ( $phone ) {

				$message .= esc_html__( 'Phone', 'advisor-core' ) . ': ' . $phone . '<br>';

			}

			if ( $purpose ) {

		  	$message .= esc_html__( 'Inquiry About', 'advisor-core' ) . ': ' . $purpose . '<br>';

		  }

			if( !empty($_POST['bta_phone']) ){

				$phone = $_POST['bta_phone'];

			} else {

				$phone = esc_html__( 'Not Provided' , 'advisor-core' );

			}

			if( !empty ($_POST['bta_recipient']) ){

				$recipient = $_POST['bta_recipient'];

			} else {

				$recipient = get_option('admin_email');

			}

			$site_name = get_option( 'blogname' );
		  $headers[] = "From: $client_name <$client_email>";

			add_filter( 'wp_mail_content_type', 'advisor_set_content_type' );


			if( wp_mail( $recipient, $subject, $message, $headers ) )
			{
				echo esc_html__( 'We have received your email, we will be in touch soon!' , 'advisor-core' );

			} else {

				echo esc_html__( 'Error: Email is not sent!' , 'advisor-core' );
			}

			remove_filter( 'wp_mail_content_type', 'advisor_set_content_type' );

		}

    // Contact Form Check
	 elseif (wp_verify_nonce( $_POST['bta_nonce'] )&& ! empty( $_POST['bta_name'] ) && ! empty( $_POST['bta_email']  ) && !empty ( $_POST['bta_message'] ) && !empty ( $_POST['bta_phone'] ) )
	 {
 		 $client_name = $_POST['bta_name'];
		 $client_email = $_POST['bta_email'];
		 $bta_message = $_POST['bta_message'];
		 $phone = $_POST['bta_phone'];


		 $subject = esc_html__( 'Help Required', 'advisor-core' ) . ' | ' . get_bloginfo( 'name' );

		 $message  = __( 'Hello There' , 'advisor-core' ) . '<br><br>';
		 $message .= esc_html__( 'My name is ' , 'advisor-core' ). $client_name. esc_html__( ' and I need your help. Please get in touch with me.', 'advisor-core'). '<br><br>';

		 $message .= esc_html__( 'Email', 'advisor-core' ) . ': ' . $client_email . '<br>';

		 if ( $phone ) {

			 $message .= esc_html__( 'Phone', 'advisor-core' ) . ': ' . $phone . '<br>';

		 }

		 if ( $bta_message ) {

			 $message .= esc_html__( 'Message', 'advisor-core' ) . ': ' . $bta_message . '<br>';

		 }

		 if( !empty ($_POST['bta_recipient']) ){

		 	$recipient = $_POST['bta_recipient'];

		 } else {

		 	$recipient = get_option('admin_email');

		 }

		 $headers[] = "From: $client_name <$client_email>";
		 add_filter( 'wp_mail_content_type', 'advisor_set_content_type' );
		 if(	wp_mail( $recipient, $subject, $message, $headers )	)
		 {
			 echo esc_html__( 'We have received your email, we will be in touch soon!' , 'advisor-core' );

		 } else {

			 echo esc_html__( 'Error: Email is not sent!' , 'advisor-core' );

		 }
		 remove_filter( 'wp_mail_content_type', 'advisor_set_content_type' );
	 }

    else {
      echo  esc_html__( 'Error: All fields are required!' , 'advisor-core' );
    }

		die();

	}
}
add_action( 'wp_ajax_nopriv_advisor_shortcode_contact_form_email', 'advisor_shortcode_contact_form_email' );
add_action( 'wp_ajax_advisor_shortcode_contact_form_email', 'advisor_shortcode_contact_form_email' );


function advisor_set_content_type( $content_type ) {
	return 'text/html';
}

if ( ! function_exists( 'advisor_custom_user_data' ) ) {

	function advisor_custom_user_data( $user_meta ) {

		$user_meta['advisor_user_designation'] = esc_html__( 'Designation: ', 'advisor-core' );

		return $user_meta;

	}
}
add_filter( 'user_contactmethods', 'advisor_custom_user_data' );
?>

/**
 * Plugin Name:       External API Project
 * Plugin URI:        https://www.google.com/
 * Description:       Pulls data from an API and display the results
 * Version:           1.0.0
 * Author:            Vanshika Verma
 * Author URI:        https://www.google.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       external-api-project
 */
 
<?php
defined( 'ABSPATH' ) || die( 'Unauthorized access' );

add_shortcode( 'external_data', 'callback_function_name' );

function callback_function_name() {

    $url = 'https://datausa.io/api/data?drilldowns=Nation&measures=Population';

    $arguments = array(
        'method' => 'GET',
    );

    $response = wp_remote_get( $url, $arguments );

    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();
        return "Something went wrong: $error_message";
    }

    $results = json_decode( wp_remote_retrieve_body( $response ) );
    //var_dump($results);
   
    $html = '';
    $html .= '<table>';

    $html .= '<tr>';
    $html .= '<td>ID_Nation</td>';
    $html .= '<td>Nation</td>';
    $html .= '<td>ID_Year</td>';
    $html .= '<td>Year</td>';
    $html .= '<td>Population</td>';
    $html .= '<td>Slug_Nation</td>';
    $html .= '</tr>';

    foreach( $results as $result ){ 

        $html .= '<tr>';
        $html .= '<td>' . $result->ID_Nation . '</td>';
        $html .= '<td>' . $result->Nation . '</td>';
        $html .= '<td>' . $result->ID_Year . '</td>';
        $html .= '<td>' . $result->Year . '</td>';
        $html .= '<td>' . $result->Population . '</td>';
        $html .= '<td>' . $result->Slug_Nation . '</td>';
        $html .= '</tr>';
    }
}
?>
